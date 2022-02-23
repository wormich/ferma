<?php

namespace Realweb\Site;

use Bitrix\Main\Application;
use Bitrix\Main\Loader;
use Bitrix\Main\Data\Cache;
use Bitrix\Main\UserFieldTable;

class Site
{
    protected static $instance;

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public static function definders()
    {
        Loader::includeModule('iblock');
        $rsResult = \Bitrix\Iblock\IblockTable::getList(array(
            'select' => array('ID', 'IBLOCK_TYPE_ID', 'CODE'),
        ));
        while ($row = $rsResult->fetch()) {
            $CONSTANT = ToUpper(implode('_', array('IBLOCK', $row['IBLOCK_TYPE_ID'], $row['CODE'])));
            if (!defined($CONSTANT)) {
                define($CONSTANT, $row['ID']);
            }
        }

    }

    public static function localRedirect301($url)
    {
        LocalRedirect($url, false, "301 Moved Permanently");
        exit();
    }

    public static function getCookie($cookName, $default = null)
    {
        return \Bitrix\Main\Application::getInstance()->getContext()->getRequest()->getCookie($cookName) ?: $default;
    }

    public static function isMainPage()
    {
        global $APPLICATION;
        return $APPLICATION->GetCurPage(false) == SITE_DIR;
    }

    public static function isCatalogPage()
    {
        global $APPLICATION;
        return stripos($APPLICATION->GetCurPage(false), '/products/') === 0;;
    }

    public static function is404Page()
    {
        return (defined("ERROR_404") && ERROR_404 == "Y");
    }

    public static function showIncludeText($code, $isHideChange = false)
    {
        global $APPLICATION;
        $APPLICATION->IncludeComponent(
            "realweb:base.include",
            ".default",
            array(
                "CODE" => $code,
                "COMPONENT_TEMPLATE" => ".default",
                "EDIT_TEMPLATE" => ""
            ),
            false,
            array(
                "SHOW_ICON" => $isHideChange ? "Y" : 'N',
            )
        );
    }

    public function showH1()
    {
        global $APPLICATION;
        $html = '';
        $H1 = $APPLICATION->GetTitle();
        $HIDE_H1 = $APPLICATION->GetPageProperty('HIDE_H1', "N");
        if ($HIDE_H1 != "Y") {
            $html = "<h1 class='h1' id=\"pagetitle\">" . $H1 . "</h1>";
        }
        return $html;
    }

    public function addClassContent()
    {
        global $APPLICATION;
        $class = $APPLICATION->GetPageProperty('CONTENT_CLASS', "");
        if ($class != "") {
            return " " . $class;
        }
    }

    public static function setCookie($cookName, $value, $expire = false)
    {

        //$context = \Bitrix\Main\Application::getInstance()->getContext();
        if ($cookName && $value) {
            $cookie = new \Bitrix\Main\Web\Cookie($cookName, $value, $expire ? $expire : (time() + 60 * 60 * 24));
            $cookie->setSecure(false);
            /*Зачем в следующей строчке нужна единица не знаю - но без этого ни черта не работает*/
            \Bitrix\Main\Application::getInstance()->getContext()->getResponse()->addCookie($cookie);

        }
    }

    public static function getMenu($iblockId, $level, $type = '')
    {
        global $APPLICATION;
        $aMenuLinksExt = array();
        if (Loader::IncludeModule('iblock')) {
            $arFilter = array(
                "SITE_ID" => SITE_ID,
                "ID" => $iblockId
            );

            $dbIBlock = \CIBlock::GetList(array('SORT' => 'ASC', 'ID' => 'ASC'), $arFilter);
            $dbIBlock = new \CIBlockResult($dbIBlock);

            if ($arIBlock = $dbIBlock->GetNext()) {
                if (defined("BX_COMP_MANAGED_CACHE"))
                    $GLOBALS["CACHE_MANAGER"]->RegisterTag("iblock_id_" . $arIBlock["ID"]);

                if ($arIBlock["ACTIVE"] == "Y") {
                    $filterSectionName = 'arrFilterSection' . $type;
                    $GLOBALS[$filterSectionName] = array();
                    $filterElementName = 'arrFilterElement' . $type;
                    $GLOBALS[$filterElementName] = array();
                    if ($type) {
                        if ($row = current(self::getUserFieldEnumValues(array('XML_ID' => 'UF_TYPE_MENU', 'ENTITY_ID' => 'IBLOCK_' . $iblockId . '_SECTION'), array('XML_ID' => $type)))) {
                            $GLOBALS[$filterSectionName]['UF_TYPE_MENU'] = $row['ID'];
                        }
                        if ($row = current(self::getPropEnumValues(array('CODE' => 'TYPE_MENU', 'IBLOCK_ID' => $iblockId, 'XML_ID' => $type)))) {
                            $GLOBALS[$filterElementName]['PROPERTY_TYPE_MENU'] = $row['ID'];
                        } else {
                            $filterElementName = '';
                        }
                    }
                    $aMenuLinksExt = $APPLICATION->IncludeComponent("realweb:menu.sections", "", array(
                        "IS_SEF" => "Y",
                        "SEF_BASE_URL" => "",
                        "SECTION_PAGE_URL" => $arIBlock['SECTION_PAGE_URL'],
                        "DETAIL_PAGE_URL" => $arIBlock['DETAIL_PAGE_URL'],
                        "IBLOCK_TYPE" => $arIBlock['IBLOCK_TYPE_ID'],
                        "IBLOCK_ID" => $arIBlock['ID'],
                        "DEPTH_LEVEL" => $level,
                        "CACHE_TYPE" => "N",
                        "SECTION_FILTER" => $filterSectionName,
                        "ELEMENT_FILTER" => $filterElementName
                    ), false, array('HIDE_ICONS' => 'Y'));
                }
            }

            if (defined("BX_COMP_MANAGED_CACHE"))
                $GLOBALS["CACHE_MANAGER"]->RegisterTag("iblock_id_new");
        }
        return $aMenuLinksExt;
    }

    public static function getUserFieldEnumValues($arFilter, $arFilterValues = array())
    {
        $arResult = array();
        $cacheTime = 3600;
        $cacheDir = __FUNCTION__;
        $cacheId = md5(__FUNCTION__ . "|" . serialize(array($arFilter, $arFilterValues)));
        $cache = Cache::createInstance();
        if ($cache->initCache($cacheTime, $cacheId, $cacheDir)) {
            $arResult = $cache->GetVars();
        } elseif ($cache->StartDataCache()) {
            $rows = UserFieldTable::getList(array(
                'select' => array('ID'),
                'filter' => $arFilter
            ))->fetch();
            $FIELD_STATUS_ID = $rows['ID'];
            $cUserFieldsEnum = new \CUserFieldEnum();
            $rows = $cUserFieldsEnum->GetList(array("ID" => "ASC"), array_merge(array('USER_FIELD_ID' => $FIELD_STATUS_ID), $arFilterValues));
            while ($row = $rows->Fetch()) {
                $arResult[$row['ID']] = $row;
            }
            $cache->endDataCache($arResult);
        }
        return $arResult;
    }

    public static function getPropEnumValues($arFilter)
    {
        $arValues = [];
        $rsPropertyEnums = \CIBlockPropertyEnum::GetList(array("DEF" => "DESC", "SORT" => "ASC"), $arFilter);
        while ($enumFields = $rsPropertyEnums->GetNext()) {
            $arValues[$enumFields["ID"]] = $enumFields;
        }
        return $arValues;
    }

    public static function getPropValue($CODE, $IBLOCK_ID, $ELEMENT_ID)
    {
        $arResult = array();
        if (Loader::includeModule('iblock')) {
            $dbProperty = \CIBlockElement::getProperty(
                $IBLOCK_ID,
                $ELEMENT_ID,
                "sort",
                "asc",
                array("CODE" => $CODE)
            );
            while ($arProperty = $dbProperty->Fetch()) {
                $arResult[] = $arProperty;
            }
        }
        return $arResult;
    }

    public static function setPropValue($CODE, $VALUE, $IBLOCK_ID, $ELEMENT_ID)
    {
        if (Loader::includeModule('iblock')) {
            \CIBlockElement::SetPropertyValuesEx($ELEMENT_ID, $IBLOCK_ID, array($CODE => $VALUE ? $VALUE : false));
        }
    }

    public static function normalizePhone($phone)
    {
        return preg_replace('/[^0-9]/', "", $phone);
    }

    public static function getDomain()
    {
        return (\CMain::IsHTTPS() ? 'https' : 'http') . "://" . $_SERVER['SERVER_NAME'];
    }

    public static function getIBlockElements($filter)
    {
        $arResult = array();
        if (Loader::includeModule("iblock")) {
            global $CACHE_MANAGER;
            $cacheTime = 3600;
            $cacheDir = "/" . __FUNCTION__;
            $cacheId = md5(__FUNCTION__ . "|" . serialize($filter));
            $cache = Cache::createInstance();
            if ($cache->initCache($cacheTime, $cacheId, $cacheDir)) {
                $arResult = $cache->GetVars();
            } elseif ($cache->StartDataCache()) {
                $CACHE_MANAGER->StartTagCache($cacheDir);
                $rsElement = \CIBlockElement::GetList(
                    array("SORT" => "ASC"),
                    $filter,
                    false,
                    false,
                    array("*", "PROPERTY_*")
                );
                while ($obElement = $rsElement->GetNextElement()) {
                    $arFields = $obElement->GetFields();
                    $arFields['FIELDS'] = $arFields;
                    if ($arFields['PREVIEW_PICTURE']) $arFields['PREVIEW_PICTURE'] = \CFile::GetFileArray($arFields['PREVIEW_PICTURE']);
                    if ($arFields['DETAIL_PICTURE']) $arFields['DETAIL_PICTURE'] = \CFile::GetFileArray($arFields['DETAIL_PICTURE']);
                    $arFields['PROPERTIES'] = $obElement->GetProperties();
                    foreach ($arFields['PROPERTIES'] as &$prop) {
                        if ($prop['PROPERTY_TYPE'] == 'F') {
                            if (is_array($prop['VALUE'])) {
                                foreach ($prop['VALUE'] as $val) {
                                    $prop['DISPLAY_VALUE'][] = \CFile::GetFileArray($val);
                                }
                            } else {
                                $prop['DISPLAY_VALUE'] = \CFile::GetFileArray($prop['VALUE']);
                            }
                        }
                        $arFields['PROPS'][$prop['CODE']] = $prop['VALUE'];
                    }
                    $arResult[$arFields['ID']] = $arFields;
                }
                $CACHE_MANAGER->RegisterTag("iblock_id_" . $filter['IBLOCK_ID']);
                $CACHE_MANAGER->EndTagCache();
                $cache->endDataCache($arResult);
            }
        }
        return $arResult;
    }

    public static function getSections($filter, $cntElement = false, $withElements = false)
    {
        $arResult = array();
        if (Loader::includeModule("iblock")) {
            global $CACHE_MANAGER;
            $cacheTime = 3600;
            $cacheDir = "/" . __FUNCTION__;
            $cacheId = md5(__FUNCTION__ . "|" . serialize($filter) . "|" . $cntElement . "|" . $withElements);
            $cache = Cache::createInstance();
            if ($cache->initCache($cacheTime, $cacheId, $cacheDir)) {
                $arResult = $cache->GetVars();
            } elseif ($cache->StartDataCache()) {
                $CACHE_MANAGER->StartTagCache($cacheDir);
                $rsElement = \CIBlockSection::GetList(
                    array("SORT" => "ASC"),
                    $filter,
                    $cntElement,
                    array("*", "UF_*")
                );
                while ($obElement = $rsElement->GetNext()) {
                    if ($withElements && !$obElement['ELEMENT_CNT']) {
                        continue;
                    }
                    $arResult[$obElement['ID']] = $obElement;
                }
                $CACHE_MANAGER->RegisterTag("iblock_id_" . $filter['IBLOCK_ID']);
                $CACHE_MANAGER->EndTagCache();
                $cache->endDataCache($arResult);
            }
        }
        return $arResult;
    }

    public function getIblockId($code = '')
    {


        $iblockId = \Bitrix\Iblock\IblockTable::getList(['filter' => ['CODE' => $code]])->Fetch()["ID"];

        return $iblockId;

    }

    public static function morph($n, $f1, $f2, $f5)
    {
        $n = abs(intval($n)) % 100;
        if ($n > 10 && $n < 20) return $f5;
        $n = $n % 10;
        if ($n > 1 && $n < 5) return $f2;
        if ($n == 1) return $f1;
        return $f5;
    }

    public function getClinic()
    {
        if ($clinicId = Application::getInstance()->getContext()->getRequest()->getCookie('clinic')) {
            $this->_city = $this->_getClinic(array('ID' => $clinicId));
        }else{

            $this->_city = $this->_getClinic(array('ID' => 335));
        }

        return $this->_city;
    }

    private function _getClinic($filter = array())
    {
        if (Loader::includeModule('iblock')) {
            $res = \CIBlockElement::GetByID($filter['ID']);
            if ($ar_res = $res->GetNext()) {

                return $ar_res;
            }
        }
    }
}
