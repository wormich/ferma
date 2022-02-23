<?php

namespace Realweb\Site;


class Import
{
    const DOMAIN = 'http://kafelnet.ru';
    public $url;
    public $sectionId;
    private $pages;
    private $el;

    public function __construct($url, $pages, $sectionId)
    {
        $this->url = $url;
        $this->pages = $pages;
        $this->sectionId = $sectionId;
        \Bitrix\Main\Loader::includeModule('iblock');
        \Bitrix\Main\Loader::includeModule('catalog');
        $this->el = new \CIBlockElement();
    }

    private function sendRequest($url, $params = array())
    {
        $query = $params ? ("?" . http_build_query($params)) : "";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1");
        curl_setopt($ch, CURLOPT_URL, self::DOMAIN . $url . $query);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_ENCODING, "");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $html = curl_exec($ch);
        return $html;
    }

    private function getDom($url)
    {
        $html = $this->sendRequest($url);
        if ($html) {
            $dom = new \DomDocument();
            $html = mb_convert_encoding($html, 'HTML-ENTITIES', "UTF-8");
            $dom->loadHTML($html);
            $dom->preserveWhiteSpace = false;
            return $dom;
        }
    }

    private function findNode($dom, $className)
    {
        $finder = new \DomXPath($dom);
        $nodes = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $className ')]");
        return $nodes;
    }

    private function getElementsByClass(&$parentNode, $tagName, $className)
    {
        $nodes = array();
        if ($parentNode) {
            $childNodeList = $parentNode->getElementsByTagName($tagName);
            for ($i = 0; $i < $childNodeList->length; $i++) {
                $temp = $childNodeList->item($i);
                if (stripos($temp->getAttribute('class'), $className) !== false) {
                    $nodes[] = $temp;
                }
            }
        }
        return $nodes;
    }

    public function import()
    {
        for ($page = 1; $page <= $this->pages; ++$page) {
            $url = $this->url . ($page > 1 ? ('?PAGEN_2=' . $page) : '');
            if ($dom = $this->getDom($url)) {
                $nodes = $this->findNode($dom, 'product_1');
                foreach ($nodes as $node) {
                    if ($node) {
                        $product = [];
                        if ($image = $node->getElementsByTagName('img')) {
                            if ($image->item(0)) {
                                $product['PREVIEW_PICTURE'] = $image->item(0)->getAttribute('src');
                            }
                        }
                        if ($dataProduct = $this->getElementsByClass($node, 'div', 'data_product')) {
                            if ($a = current($dataProduct)->getElementsByTagName('a')) {
                                $product['NAME'] = $a->item(0)->nodeValue;
                                $product['LINK'] = $a->item(0)->getAttribute('href');
                            }
                        }
                        if ($props = $this->getElementsByClass($node, 'div', 'dotted_pair')) {
                            foreach ($props as $prop) {
                                if ($name = $this->getElementsByClass($prop, 'div', 'left')) {
                                    if ($value = $this->getElementsByClass($prop, 'div', 'right')) {
                                        $product['PROPS'][$name[0]->nodeValue] = trim($value[0]->nodeValue);
                                    }
                                }
                            }
                        }
                        preg_match('/Ценовая группа:(.*)руб/ui', $node->nodeValue, $matches);
                        if ($matches[1]) {
                            $product['PRICE'] = $this->makePrice($matches[1]);
                        }
                        if ($product['LINK']) {
                            if ($domDetail = $this->getDom($product['LINK'])) {
                                if ($domDetailPictures = $this->getElementsByClass($domDetail, 'ul', 'm_pics')) {
                                    if ($a = current($domDetailPictures)->getElementsByTagName('a')) {
                                        foreach ($a as $item) {
                                            $product['PICTURES'][] = $item->getAttribute('href');
                                        }
                                        if ($product['PICTURES']) {
                                            $product['DETAIL_PICTURE'] = $product['PICTURES'][0];
                                            unset($product['PICTURES'][0]);
                                        }
                                    }
                                }
                                if ($domDetailText = $this->getElementsByClass($domDetail, 'div', 'desc')) {
                                    $product['DETAIL_TEXT'] = str_replace('src="', 'src="' . self::DOMAIN, current($domDetailText)->c14n());
                                }
                                if ($domDetailProps = $this->getElementsByClass($domDetail, 'div', 'right_blc data_product')) {
                                    if ($domDetailProps = current($domDetailProps)) {
                                        if ($props = $this->getElementsByClass($domDetailProps, 'div', 'dotted_pair')) {
                                            foreach ($props as $prop) {
                                                if ($name = $this->getElementsByClass($prop, 'div', 'left')) {
                                                    if ($value = $this->getElementsByClass($prop, 'div', 'right')) {
                                                        $product['PROPS'][trim($name[0]->nodeValue, ':')] = trim($value[0]->nodeValue);
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                if (!$product['PROPS']['Производитель']) {
                                    if ($domDetailBrand = $this->getElementsByClass($domDetail, 'div', 'stopmanufacturer')) {
                                        if ($domDetailBrand = current($domDetailBrand)) {
                                            if ($brand = $domDetailBrand->getElementsByTagName('a')) {
                                                if ($brand->item(0)) {
                                                    $product['PROPS']['Производитель'] = trim($brand->item(0)->nodeValue);
                                                }
                                            }
                                        }
                                    }
                                }
                                if ($video = $domDetail->getElementsByTagName('iframe')) {
                                    if ($video->item(0)) {
                                        $product['VIDEO'] = str_replace('https://www.youtube.com/embed/', '', $video->item(0)->getAttribute('src'));
                                    }
                                }
                                $arProducts = $this->findProducts($domDetail);
                            }
                        }
                        if ($product['NAME']) {
                            if (!$product['PRICE'] && !empty($arProducts)) {
                                $sum = 0;
                                $num = 0;
                                foreach ($arProducts as $arProduct) {
                                    if ($arProduct['PRICE']) {
                                        $sum += $arProduct['PRICE'];
                                        $num++;
                                    }
                                }
                                if ($sum > 0) {
                                    $product['PRICE'] = doubleval($sum / $num);
                                }
                            }
                            $product['TYPE'] = 13;
                            //Util::var_dump($product);die();
                            if ($id = $this->productAdd($product)) {
                                //Util::var_dump($product);
                                if (!empty($arProducts)) {
                                    foreach ($arProducts as $arProduct) {
                                        $arProduct['TYPE'] = 12;
                                        $arProduct['COLLECTION'] = $id;
                                        $this->productAdd($arProduct);
                                    }
                                    //Util::var_dump($arProducts);
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    public function importProduct()
    {
        for ($page = 1; $page <= $this->pages; ++$page) {
            $url = $this->url . ($page > 1 ? ('?PAGEN_1=' . $page) : '');
            if ($dom = $this->getDom($url)) {
                $nodes = $this->findNode($dom, 'product_1');
                foreach ($nodes as $node) {
                    if ($node) {
                        $product = [];
                        if ($image = $node->getElementsByTagName('img')) {
                            if ($image->item(0)) {
                                $product['PREVIEW_PICTURE'] = $image->item(0)->getAttribute('src');
                            }
                        }
                        if ($name = $node->getElementsByTagName('a')) {
                            if ($name->item(0)) {
                                $product['NAME'] = $name->item(0)->nodeValue;
                                $product['LINK'] = $name->item(0)->getAttribute('href');
                            }
                        }
                        if ($props = $this->getElementsByClass($node, 'div', 'dotted_pair')) {
                            foreach ($props as $prop) {
                                if ($name = $this->getElementsByClass($prop, 'div', 'left')) {
                                    if ($value = $this->getElementsByClass($prop, 'div', 'right')) {
                                        $product['PROPS'][$name[0]->nodeValue] = trim($value[0]->nodeValue);
                                    }
                                }
                            }
                        }
                        if ($dataProduct = $this->getElementsByClass($node, 'div', 'data_product')) {
                            if ($dataProduct = current($dataProduct)) {
                                if ($price = $this->getElementsByClass($dataProduct, 'div', 'price')) {
                                    if ($item = current($price)->getElementsByTagName('strike')) {
                                        preg_match('/^(.*)р/ui', $item->item(0)->nodeValue, $matches);
                                        if ($matches[1]) {
                                            $product['PRICE'] = $this->makePrice($matches[1]);
                                        }
                                    }
                                }
                            }
                        }
                        if ($product['LINK']) {
                            if ($domDetail = $this->getDom($product['LINK'])) {
                                if ($domDetailPictures = $this->getElementsByClass($domDetail, 'div', 'b_pic')) {
                                    if ($a = current($domDetailPictures)->getElementsByTagName('a')) {
                                        foreach ($a as $item) {
                                            $product['PICTURES'][] = $item->getAttribute('href');
                                        }
                                        if ($product['PICTURES']) {
                                            $product['DETAIL_PICTURE'] = $product['PICTURES'][0];
                                            unset($product['PICTURES'][0]);
                                        }
                                    }
                                }
                                if ($domDetailText = $this->getElementsByClass($domDetail, 'div', 'desc')) {
                                    $product['DETAIL_TEXT'] = str_replace('src="', 'src="' . self::DOMAIN, current($domDetailText)->c14n());
                                }
                                if ($domDetailProps = $this->getElementsByClass($domDetail, 'div', 'right_blc data_product')) {
                                    if ($domDetailProps = current($domDetailProps)) {
                                        if ($props = $this->getElementsByClass($domDetailProps, 'div', 'dotted_pair')) {
                                            foreach ($props as $prop) {
                                                if ($name = $this->getElementsByClass($prop, 'div', 'left')) {
                                                    if ($value = $this->getElementsByClass($prop, 'div', 'right')) {
                                                        $product['PROPS'][trim($name[0]->nodeValue, ':')] = trim($value[0]->nodeValue);
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                if (!$product['PROPS']['Производитель']) {
                                    if ($domDetailBrand = $this->getElementsByClass($domDetail, 'div', 'stopmanufacturer')) {
                                        if ($domDetailBrand = current($domDetailBrand)) {
                                            if ($brand = $domDetailBrand->getElementsByTagName('a')) {
                                                if ($brand->item(0)) {
                                                    $product['PROPS']['Производитель'] = trim($brand->item(0)->nodeValue);
                                                }
                                            }
                                        }
                                    }
                                }
                                if ($video = $domDetail->getElementsByTagName('iframe')) {
                                    if ($video->item(0)) {
                                        $product['VIDEO'] = str_replace('https://www.youtube.com/embed/', '', $video->item(0)->getAttribute('src'));
                                    }
                                }
                                if (!$product['PRICE']) {
                                    if ($dataProduct = $this->getElementsByClass($domDetail, 'div', 'data_product')) {
                                        if ($dataProduct = current($dataProduct)) {
                                            if ($price = $this->getElementsByClass($dataProduct, 'div', 'price')) {
                                                if ($item = current($price)) {
                                                    preg_match('/^(.*)р/ui', $item->item(0)->nodeValue, $matches);
                                                    if ($matches[1]) {
                                                        $product['PRICE'] = $this->makePrice($matches[1]);
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }

                        if ($product['NAME']) {
                            $product['TYPE'] = 12;
                            if ($id = $this->productAdd($product)) {
                                //Util::var_dump($product);die();
                            }
                        }
                    }
                }
            }
        }
    }

    private function loadImage($file)
    {
        $url = $this::DOMAIN . $file;
        $path = $_SERVER['DOCUMENT_ROOT'] . '/upload/tmp/' . basename($file);
        if ($fileData = file_get_contents($url)) {
            file_put_contents($path, $fileData);
            return \CFile::MakeFileArray($path);
        }
    }

    public function getPropsHBValue($CLASS, $VALUE)
    {
        $arValues = explode(";", $VALUE);
        $res = array();
        foreach ($arValues as $value) {
            $value = trim($value);
            $xmlId = \Cutil::translit($value, "ru", array("replace_space"=>"-","replace_other"=>"-"));
            if ($value) {
                $row = $CLASS::getList(array(
                    'filter' => array('UF_NAME' => $value)
                ))->fetch();
                if ($row) {
                    return $row['UF_XML_ID'];
                } else {
                    $CLASS::add(array(
                        'UF_NAME' => $value,
                        'UF_XML_ID' => $xmlId
                    ));
                    return $xmlId;
                }
            }
        }
        return $res;
    }

    public function getPropsEnumValue($CODE, $VALUE, $IBLOCK_ID)
    {
        $PropID = 0;
        $property_enums = \CIBlockPropertyEnum::GetList(Array("DEF" => "DESC", "SORT" => "ASC"), Array("IBLOCK_ID" => $IBLOCK_ID, "CODE" => $CODE, "VALUE" => $VALUE));
        if ($enum_fields = $property_enums->GetNext()) {
            $PropID = $enum_fields["ID"];
        } else {
            $properties = \CIBlockProperty::GetList(Array("sort" => "asc", "name" => "asc"), Array("IBLOCK_ID" => $IBLOCK_ID, "CODE" => $CODE));
            if ($prop_fields = $properties->GetNext()) {
                $ibpenum = new \CIBlockPropertyEnum;
                $PropID = $ibpenum->Add(Array('PROPERTY_ID' => $prop_fields["ID"], 'VALUE' => $VALUE));
            }
        }
        return $PropID;
    }

    private function productAdd($product)
    {
        $arFields = array(
            'IBLOCK_ID' => IBLOCK_CATALOG_CATALOG,
            'ACTIVE' => 'Y',
            'IBLOCK_SECTION_ID' => $this->sectionId,
            'NAME' => $product['NAME'],
            'CODE' => \Cutil::translit($product['NAME'], "ru", array("replace_space"=>"-","replace_other"=>"-")),
            'DETAIL_TEXT' => $product['DETAIL_TEXT'],
            'DETAIL_TEXT_TYPE' => 'html',
            'PROPERTY_VALUES' => array(
                'TYPE' => $product['TYPE'],
                'COLLECTION' => array($product['COLLECTION'] ?: false),
                'VIDEO' => $product['VIDEO'] ?: false,
            )
        );
        if ($product['PREVIEW_PICTURE']) {
            if ($file = $this->loadImage($product['PREVIEW_PICTURE'])) {
                $arFields['PREVIEW_PICTURE'] = $file;
            }
        }
        if ($product['DETAIL_PICTURE']) {
            if ($file = $this->loadImage($product['DETAIL_PICTURE'])) {
                $arFields['DETAIL_PICTURE'] = $file;
            }
        }
        if ($product['PICTURES']) {
            foreach ($product['PICTURES'] as $picture) {
                if ($file = $this->loadImage($picture)) {
                    $arFields['PROPERTY_VALUES']['MORE_PHOTO'][] = $file;
                }
            }
        }
        if ($product['PROPS']) {
            foreach ($product['PROPS'] as $name => $value) {
                switch ($name) {
                    case 'Производитель':
                        $arFields['PROPERTY_VALUES']['BRAND'] = $this->getPropsHBValue('Realweb\Site\Hlbd\BrandsTable', trim($value));
                        break;
                    case 'Поверхность':
                        $values = explode(",", $value);
                        foreach ($values as $val) {
                            $arFields['PROPERTY_VALUES']['SURFACE'][] = $this->getPropsHBValue('Realweb\Site\Hlbd\SurfaceTable', trim($val));
                        }
                        break;
                    case 'Применение':
                        $values = explode(",", $value);
                        foreach ($values as $val) {
                            $arFields['PROPERTY_VALUES']['PURPOSE'][] = $this->getPropsHBValue('Realweb\Site\Hlbd\PurposeTable', trim($val));
                        }
                        break;
                    case 'Стиль':
                        $values = explode(",", $value);
                        foreach ($values as $val) {
                            $arFields['PROPERTY_VALUES']['STYLE'][] = $this->getPropsHBValue('Realweb\Site\Hlbd\StyleTable', trim($val));
                        }
                        break;
                    case 'Цвет':
                        $values = explode(",", $value);
                        foreach ($values as $val) {
                            $arFields['PROPERTY_VALUES']['COLOR'][] = $this->getPropsHBValue('Realweb\Site\Hlbd\ColorTable', trim($val));
                        }
                        break;
//                    case 'В зале':
//                        $values = explode("|", $value);
//                        foreach ($values as $val) {
//                            $arFields['PROPERTY_VALUES']['IN_ROOM'][] = $this->getPropsEnumValue('IN_ROOM', trim($val), $arFields['IBLOCK_ID']);
//                        }
//                        break;
                    case 'Вид плитки':
                        $values = explode(",", $value);
                        foreach ($values as $val) {
                            $arFields['PROPERTY_VALUES']['VIEW'][] = $this->getPropsHBValue('Realweb\Site\Hlbd\ViewTable', trim($val));
                        }
                        break;
                    case 'Материал':
                        $values = explode(",", $value);
                        foreach ($values as $val) {
                            $arFields['PROPERTY_VALUES']['MATERIAL'][] = $this->getPropsHBValue('Realweb\Site\Hlbd\MaterialTable', trim($val));
                        }
                        break;
                    case 'Страна производитель':
                        $arFields['PROPERTY_VALUES']['COUNTRY'] = $this->getPropsEnumValue('COUNTRY', trim($value), $arFields['IBLOCK_ID']);
                        break;
                    case 'Ширина':
                        $arFields['PROPERTY_VALUES']['WIDTH'] = trim($value);
                        break;
                    case 'Высота':
                        $arFields['PROPERTY_VALUES']['HEIGHT'] = trim($value);
                        break;
                    case 'Размеры':
                        $arFields['PROPERTY_VALUES']['SIZE'] = trim($value);
                        break;
                    case 'Износостойкость':
                        $arFields['PROPERTY_VALUES']['STABILITY'] = trim($value);
                        break;
                }
            }
        }
        $rsResult = \Bitrix\Iblock\ElementTable::getList([
            'select' => array('ID'),
            'filter' => array('NAME' => $arFields['NAME'], 'IBLOCK_ID' => $arFields['IBLOCK_ID']),
        ]);
        if ($rsResult->getSelectedRowsCount() == 0) {
            if ($productId = $this->el->Add($arFields)) {
                var_dump("New ID: " . $productId . "\n");
            } else {
                var_dump("Error: " . $this->el->LAST_ERROR . ' ' . $arFields['CODE'] . "\n");
            }
        } else {
            $row = $rsResult->fetch();
            if ($productId = $row['ID']) {
                if ($product['COLLECTION']) {
                    $values = array();
                    $res = \CIBlockElement::GetProperty($arFields['IBLOCK_ID'], $productId, "sort", "asc", array("CODE" => "COLLECTION"));
                    while ($ob = $res->GetNext()) {
                        $values[$ob['VALUE']] = $ob['VALUE'];
                    }
                    $values[$product['COLLECTION']] = $product['COLLECTION'];
                    \CIBlockElement::SetPropertyValuesEx($productId, $arFields['IBLOCK_ID'], array('COLLECTION' => $values));
                    var_dump("Update ID: " . $productId . "\n");
                }
//                if ($this->el->Update($row['ID'], $arFields)) {
//                    $productId = $row['ID'];
//                    var_dump("Update ID: " . $productId . "\n");
//                } else {
//                    var_dump("Error: " . $this->el->LAST_ERROR . "\n");
//                }
            }
        }
        if (!empty($productId) && !empty($product['PRICE'])) {
            $catalog_product = \CCatalogProduct::GetByID($productId);
            if (!$catalog_product) {
                $arFields = array(
                    "ID" => $productId,
                    'PURCHASING_PRICE' => 0,
                    'PURCHASING_CURRENCY' => 'RUB',
                    'QUANTITY' => 1
                );
                \CCatalogProduct::Add($arFields);
            } else {
                \CCatalogProduct::Update($productId, array(
                    'QUANTITY' => 1
                ));
            }
            $PRICE_TYPE_ID = 1;
            $arFields = Array(
                "PRODUCT_ID" => $productId,
                "CATALOG_GROUP_ID" => $PRICE_TYPE_ID,
                "PRICE" => $product['PRICE'],
                "CURRENCY" => 'RUB',
            );
            $res = \CPrice::GetList(
                array(), array(
                    "PRODUCT_ID" => $productId,
                    "CATALOG_GROUP_ID" => $PRICE_TYPE_ID
                )
            );
            if ($arr = $res->Fetch()) {
                \CPrice::Update($arr["ID"], $arFields);
            } else {
                \CPrice::Add($arFields);
            }
            return $productId;
        }
    }

    private function findProducts($node)
    {
        $arProducts = [];
        if ($nodes = $this->getElementsByClass($node, 'div', 'product_1')) {
            foreach ($nodes as $node) {
                $product = [];
                if ($item = $node->getElementsByTagName('h3')) {
                    $product['NAME'] = $item->item(0)->nodeValue;
                }
                if ($image = $this->getElementsByClass($node, 'div', 'pic')) {
                    if ($item = current($image)->getElementsByTagName('img')) {
                        $product['PREVIEW_PICTURE'] = $item->item(0)->getAttribute('src');
                    }
                }
                if ($price = $this->getElementsByClass($node, 'div', 'cennik')) {
                    if ($item = current($price)->getElementsByTagName('strike')) {
                        preg_match('/^(.*)р/ui', $item->item(0)->nodeValue, $matches);
                        if ($matches[1]) {
                            $product['PRICE'] = $this->makePrice($matches[1]);
                        }
                    }
                }
                if ($props = $this->getElementsByClass($node, 'div', 'dotted_pair')) {
                    foreach ($props as $prop) {
                        if ($name = $this->getElementsByClass($prop, 'div', 'left')) {
                            if ($value = $this->getElementsByClass($prop, 'div', 'right')) {
                                $product['PROPS'][$name[0]->nodeValue] = $value[0]->nodeValue;
                            }
                        }
                    }
                }
                if ($product['NAME']) {
                    $arProducts[] = $product;
                }
            }
        }
        return $arProducts;
    }

    private function makePrice($price)
    {
        return doubleval(trim(preg_replace('/[^0-9]/', '', $price)));
    }
}