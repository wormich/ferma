<?php
use \Realweb\Site\Site;

AddEventHandler("main", "OnPageStart", "onPageStart");
AddEventHandler('iblock', 'OnIBlockPropertyBuildList', array('Realweb\Site\Property\PageType', 'GetUserTypeDescription'));
AddEventHandler('iblock', 'OnIBlockPropertyBuildList', array('Realweb\Site\Property\YoutubeVideo', 'GetUserTypeDescription'));
AddEventHandler("main", "OnBeforeUserRegister", Array("Realweb\Site\Handlers", "OnBeforeUserAdd"));
AddEventHandler("main", "OnBeforeUserUpdate", Array("Realweb\Site\Handlers", "OnBeforeUserAdd"));
AddEventHandler("main", "OnAfterUserAdd", Array("Realweb\Site\Handlers", "OnAfterUserAdd"));

AddEventHandler("bee_cart", "OnBeforeItemAdd", Array("Realweb\Site\Handlers", "OnBeforeItemAddHandler"));
AddEventHandler("bee_cart", "OnAfterItemLoad", Array("Realweb\Site\Handlers", "OnAfterItemLoadHandler"));



function onPageStart()
{
    Site::definders();
    //$GLOBALS['arrFilterMainBanner']['PROPERTY_TYPE'] = current(Site::getPropEnumValues(array('IBLOCK_ID' => IBLOCK_CONTENT_MAIN_BANNER, 'XML_ID' => 'main', 'CODE' => 'TYPE')))['ID'];
}

