<?php
foreach ($arResult["ITEMS"] as $key => $arItem) {
    $arf = ['IBLOCK_ID' => \Realweb\Site\Site::getIblockId('menu'), 'PROPERTY_REST' => $arItem['ID'], 'PROPERTY_TYPE_VALUE' => 'Основное блюдо'];


    $arResult["ITEMS"][$key]["ADD_INFO"] = \Realweb\Site\Catalog::get_rest_info_list($arf);


    if ($arItem["PREVIEW_PICTURE"]["SRC"] == '') {

        $arResult["ITEMS"][$key]["PREVIEW_PICTURE"]["SRC"] = '/local/templates/main/assets/images/logo.svg';

    }


}
?>