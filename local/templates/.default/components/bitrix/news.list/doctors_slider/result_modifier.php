<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
CModule::IncludeModule("iblock");

foreach ($arResult["ITEMS"] as $key => $arElement) {
    if (!empty($arElement["DETAIL_PICTURE"]["SRC"])) {
        $arFileTmp = CFile::ResizeImageGet(
            $arElement["DETAIL_PICTURE"],
            array("width" => 410, "height" => 520),
            BX_RESIZE_IMAGE_EXACT,
            true,
            false,
            false,
            99
        );
        $arResult["ITEMS"][$key]["DETAIL_PICTURE"] = array(
            "SRC"    => $arFileTmp["src"],
            "WIDTH"  => $arFileTmp["width"],
            "HEIGHT" => $arFileTmp["height"],
        );

    }

}