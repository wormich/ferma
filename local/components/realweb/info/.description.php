<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
    "NAME" => "Информация о ресторане",
    "DESCRIPTION" => "",
    "ICON" => "/images/icon.gif",
    "CACHE_PATH" => "Y",
    "PATH" => array(
        "ID" => "utility",
        "CHILD" => array(
            "ID" => "subscribe",
            "NAME" => "Сервис"
        )
    ),
);

?>