<?php

namespace Realweb\Site;

class Handlers
{

    function OnBeforeUserAdd(&$arFields)
    {
        $arFields["LOGIN"] = $arFields["EMAIL"];

        return $arFields;
    }
}