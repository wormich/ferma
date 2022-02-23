<?php

namespace Realweb\Site;

use Bitrix\Main\Web\Uri;
use Bitrix\Main\Application;
use Bitrix\Main\Loader;
use Bitrix\Main\Data\Cache;

class Catalog
{
    public static function getCatalogSectionParams($params = array(), $isAvailable = false)
    {
        $result = array_merge(array(
            "ACTION_VARIABLE" => "action",
            "ADD_PICT_PROP" => "MORE_PHOTO",
            "BRAND_PROPERTY" => "BRAND",
            "ADD_PROPERTIES_TO_BASKET" => "Y",
            "ADD_SECTIONS_CHAIN" => "N",
            "ADD_TO_BASKET_ACTION" => "ADD",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "BACKGROUND_IMAGE" => "-",
            "BASKET_URL" => "/basket/",
            "BROWSER_TITLE" => "-",
            "CACHE_FILTER" => "Y",
            "CACHE_GROUPS" => "N",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "COMPATIBLE_MODE" => "Y",
            "CONVERT_CURRENCY" => "N",
            "CUSTOM_FILTER" => "",
            "DETAIL_URL" => "",
            "DISABLE_INIT_JS_IN_COMPONENT" => "N",
            "DISPLAY_BOTTOM_PAGER" => "N",
            "DISPLAY_COMPARE" => "N",
            "DISPLAY_TOP_PAGER" => "N",
            "ELEMENT_SORT_FIELD" => "sort",
            "ELEMENT_SORT_FIELD2" => "id",
            "ELEMENT_SORT_ORDER" => "asc",
            "ELEMENT_SORT_ORDER2" => "desc",
            "ENLARGE_PRODUCT" => "STRICT",
            "FILTER_NAME" => "arrFilter",
            "HIDE_NOT_AVAILABLE" => "Y",
            "HIDE_NOT_AVAILABLE_OFFERS" => "Y",
            "IBLOCK_ID" => IBLOCK_CATALOG_CATALOG,
            "IBLOCK_TYPE" => "catalog",
            "INCLUDE_SUBSECTIONS" => "Y",
            "LABEL_PROP" => array(),
            "LAZY_LOAD" => "N",
            "LINE_ELEMENT_COUNT" => "3",
            "LOAD_ON_SCROLL" => "N",
            "MESSAGE_404" => "",
            "MESS_BTN_ADD_TO_BASKET" => "В корзину",
            "MESS_BTN_BUY" => "Купить",
            "MESS_BTN_DETAIL" => "Подробнее",
            "MESS_BTN_LAZY_LOAD" => "Показать ещё",
            "MESS_BTN_SUBSCRIBE" => "Подписаться",
            "MESS_NOT_AVAILABLE" => "Нет в наличии",
            "META_DESCRIPTION" => "-",
            "META_KEYWORDS" => "-",
            "OFFERS_CART_PROPERTIES" => array(),
            "OFFERS_FIELD_CODE" => array(0 => "ID"),
            "OFFERS_LIMIT" => "0",
            "OFFERS_PROPERTY_CODE" => array(),
            "OFFERS_SORT_FIELD" => "sort",
            "OFFERS_SORT_FIELD2" => "id",
            "OFFERS_SORT_ORDER" => "asc",
            "OFFERS_SORT_ORDER2" => "desc",
            "OFFER_ADD_PICT_PROP" => "-",
            "OFFER_TREE_PROPS" => array(),
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => "",
            "PAGER_TITLE" => "Товары",
            "PAGE_ELEMENT_COUNT" => "12",
            "PARTIAL_PRODUCT_PROPERTIES" => "N",
            "PRICE_CODE" => array("BASE"),
            "PRICE_VAT_INCLUDE" => "Y",
            "PRODUCT_BLOCKS_ORDER" => "sku,price,props,buttons,compare",
            "PRODUCT_DISPLAY_MODE" => "Y",
            "PRODUCT_ID_VARIABLE" => "id",
            "PRODUCT_PROPERTIES" => array(),
            "PRODUCT_PROPS_VARIABLE" => "prop",
            "PRODUCT_QUANTITY_VARIABLE" => "quantity",
            "LIST_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
            "PRODUCT_SUBSCRIPTION" => "Y",
            "PROPERTY_CODE" => array(
                "ARTICLE",
                "COUNTRY",
                "BRAND",
                "SURFACE"),
            "PROPERTY_CODE_MOBILE" => array(
                "ARTICLE",
                "COUNTRY",
                "BRAND",
                "SURFACE"),
            "RCM_PROD_ID" => "",
            "RCM_TYPE" => "personal",
            "SECTION_CODE" => "",
            "SECTION_ID" => "",
            "SECTION_ID_VARIABLE" => "SECTION_ID",
            "SECTION_URL" => "",
            "SECTION_USER_FIELDS" => array("", ""),
            "SEF_MODE" => "N",
            "SET_BROWSER_TITLE" => "N",
            "SET_LAST_MODIFIED" => "N",
            "SET_META_DESCRIPTION" => "N",
            "SET_META_KEYWORDS" => "N",
            "SET_STATUS_404" => "N",
            "SET_TITLE" => "N",
            "SHOW_404" => "N",
            "SHOW_ALL_WO_SECTION" => "Y",
            "SHOW_CLOSE_POPUP" => "N",
            "SHOW_DISCOUNT_PERCENT" => "N",
            "SHOW_FROM_SECTION" => "N",
            "SHOW_MAX_QUANTITY" => "N",
            "SHOW_OLD_PRICE" => "Y",
            "SHOW_PRICE_COUNT" => "1",
            "SHOW_SLIDER" => "N",
            "SLIDER_INTERVAL" => "3000",
            "SLIDER_PROGRESS" => "N",
            "TEMPLATE_THEME" => "blue",
            "USE_ENHANCED_ECOMMERCE" => "N",
            "USE_MAIN_ELEMENT_SECTION" => "Y",
            "USE_PRICE_COUNT" => "N",
            "USE_PRODUCT_QUANTITY" => "N",
            "TYPE_ITEM_VIEW" => "CARD",
            'HIDE_SECTION_DESCRIPTION' => 'Y',
            'ROW_CLASS' => 'row product__row',
            'COL_CLASS' => 'col-6 col-xl-4 product__col'), $params);
        if ($isAvailable) {
            //$GLOBALS[$result['FILTER_NAME']][] = self::getCatalogFilter();
        }
        return $result;
    }

    public static function getSortCatalog(&$arPrams)
    {
        $result = [];
        $uri = new Uri(Application::getInstance()->getContext()->getRequest()->
            getRequestUri());
        $request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
        $sortValue = ["cheap" => array(
            'name' => "Сначала дешевые",
            'code' => 'catalog_PRICE_1',
            'ORDER' => 'ASC'), "expencive" => array(
            'name' => "Сначала дорогие",
            'code' => 'catalog_PRICE_1',
            'ORDER' => 'DESC'), "date" => array(
            'name' => "По новизне",
            'code' => 'DATE_CREATED',
            'ORDER' => 'DESC'), "name" => array(
            'name' => "По популярности",
            'code' => 'TIMESTAMP_X',
            'ORDER' => 'DESC'), ];
        $sort = $request->get("sort") ? : Site::getCookie('catalog_sort');
        $order = $request->get("order") ? : Site::getCookie('catalog_order');
        foreach ($sortValue as $key => $item) {
            $sortItem = ["name" => $item['name'], "field" => $item['code'], "order" => $item['ORDER'],
                "selected" => ($key == $sort), "url" => $uri->deleteParams(["bxajaxid"])->
                addParams(["sort" => $key, "order" => $item['ORDER']])->getUri(), ];
            if ($sortItem['selected']) {

                $arPrams['ELEMENT_SORT_FIELD2'] = 'catalog_QUANTITY';
                $arPrams['ELEMENT_SORT_ORDER2'] = 'DESC';
                $arPrams['ELEMENT_SORT_FIELD'] = $sortItem['field'];
                $arPrams['ELEMENT_SORT_ORDER'] = $order;
                Site::setCookie('catalog_sort', $key);
                Site::setCookie('catalog_order', $order);


            }
            $result[] = $sortItem;
        }
        return $result;
    }

    public static function getCountViewCatalog(&$arPrams)
    {
        $result = [];
        $uri = new Uri(Application::getInstance()->getContext()->getRequest()->
            getRequestUri());
        $request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
        $countValue = ["9" => array('name' => "9 на странице"), "12" => array('name' =>
                "12 на странице"), "15" => array('name' => "15 на странице"), ];
        $count = $request->get("count_view") ? : Site::getCookie('count_view', 9);
        foreach ($countValue as $key => $item) {
            $countItem = ["name" => $item['name'], "selected" => ($key == $count), "url" =>
                $uri->deleteParams(["bxajaxid"])->addParams(["count_view" => $key])->getUri(), ];

           if ($countItem['selected']) {
                $arPrams['PAGE_ELEMENT_COUNT'] = $key;

                Site::setCookie('count_view', $key);
            }
            $result[] = $countItem;
        }
        return $result;
    }


    public static function getViewedProducts()
    {
        $ids = unserialize(Application::getInstance()->getContext()->getRequest()->
            getCookie("VIEWED"));
        return $ids;
    }

    public static function getCountProducts($filter)
    {
        $arResult = array();
        if (Loader::includeModule("iblock")) {
            global $CACHE_MANAGER;
            $cacheTime = 3600;
            $cacheDir = "/" . __function__;
            $cacheId = md5(__function__ . "|" . serialize($filter));
            $cache = Cache::createInstance();
            if ($cache->initCache($cacheTime, $cacheId, $cacheDir)) {
                $arResult = $cache->GetVars();
            } elseif ($cache->StartDataCache()) {
                $CACHE_MANAGER->StartTagCache($cacheDir);
                $arProps = Site::getPropEnumValues(array('IBLOCK_ID' => $filter['IBLOCK_ID'],
                        'CODE' => 'TYPE'));
                $arPropsXmlId = array_column($arProps, 'ID', 'XML_ID');
                unset($filter['=PROPERTY_' . current($arProps)['PROPERTY_ID']]);
                $rsElement = \CIBlockElement::GetList(array("propertysort_TYPE" => "ASC"), $filter,
                    array('PROPERTY_TYPE'), false);
                while ($arFields = $rsElement->GetNext()) {
                    $arResult[$arProps[$arFields['PROPERTY_TYPE_ENUM_ID']]['XML_ID']] = $arProps[$arFields['PROPERTY_TYPE_ENUM_ID']];
                    $arResult[$arProps[$arFields['PROPERTY_TYPE_ENUM_ID']]['XML_ID']]['CNT'] = $arFields['CNT'];
                }
                //                foreach ($arProps as $prop) {
                //                    if (!$arResult[$prop['XML_ID']]) {
                //                        $arFilter = array('IBLOCK_ID' => $filter['IBLOCK_ID'], 'ACTIVE' => 'Y');
                //                        if ($prop['XML_ID'] == 'simple') {
                //                            $arFilter['PROPERTY_TYPE'] = $arPropsXmlId['simple'];
                //                            $rsElement = \CIBlockElement::GetList(
                //                                array_merge($filter, array('PROPERTY_TYPE' => $arPropsXmlId['collection'])),
                //                                $filter,
                //                                array('ID')
                //                            );
                //                            while ($arFields = $rsElement->GetNext()) {
                //                                $arFilter['PROPERTY_COLLECTION'][] = $arFields['ID'];
                //                            }
                //                        } else {
                //                            $arFilter['PROPERTY_TYPE'] = $arPropsXmlId['collection'];
                //                            $rsElement = \CIBlockElement::GetList(
                //                                array_merge($filter, array('PROPERTY_TYPE' => $arPropsXmlId['simple'])),
                //                                $filter,
                //                                array('PROPERTY_COLLECTION')
                //                            );
                //                            while ($arFields = $rsElement->GetNext()) {
                //                                $arFilter['ID'][] = $arFields['PROPERTY_COLLECTION_VALUE'];
                //                            }
                //                        }
                //                        $rsElement = \CIBlockElement::GetList(
                //                            array("propertysort_TYPE" => "ASC"),
                //                            $arFilter,
                //                            array('PROPERTY_TYPE'),
                //                            false
                //                        );
                //                        if ($arFields = $rsElement->GetNext()) {
                //                            $arResult[$prop['XML_ID']] = $arProps[$arFields['PROPERTY_TYPE_ENUM_ID']];
                //                            $arResult[$prop['XML_ID']]['CNT'] = $arFields['CNT'];
                //                        }
                //                    }
                //                }
                $CACHE_MANAGER->RegisterTag("iblock_id_" . $filter['IBLOCK_ID']);
                $CACHE_MANAGER->EndTagCache();
                $cache->endDataCache($arResult);
            }
        }
        return $arResult;
    }
}
