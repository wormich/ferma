<?php

namespace Realweb\Site;

class Handlers
{

    function OnBeforeUserAdd(&$arFields)
    {
        $arFields["LOGIN"] = $arFields["EMAIL"];

        return $arFields;
    }

    function OnAfterUserAdd(&$arFields)
    {
        //Создание ресторана после регистрации пользователя
        $arParams = array("replace_space" => "_", "replace_other" => "");

        $el = new \CIBlockElement();
        $el->Add(array(
            'IBLOCK_ID' => Site::getIblockId('rest'),
            'IBLOCK_SECTION_ID' => false,
            'CREATED_BY' => $arFields["ID"],
            'ACTIVE' => 'Y',
            'NAME' => $arFields["UF_RESTNAME"],
            'CODE' => \Cutil::translit($arFields["UF_RESTNAME"], "ru", $arParams)
        ));

        return $arFields;
    }
}