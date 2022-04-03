<?php

use \Bitrix\Main;
use \Bitrix\Main\Loader;
use \Bitrix\Main\Error;
use \Bitrix\Main\Type\DateTime;
use \Bitrix\Main\Localization\Loc;
use \Bitrix\Iblock;
use \Bitrix\Main\Data\Cache;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @global CUser $USER
 * @global CMain $APPLICATION
 * @global CIntranetToolbar $INTRANET_TOOLBAR
 */

Loc::loadMessages(__FILE__);

if (!\Bitrix\Main\Loader::includeModule('iblock')) {
    ShowError(Loc::getMessage('IBLOCK_MODULE_NOT_INSTALLED'));
    return;
}

class CRealwebCompanyComponent extends CBitrixComponent
{
    protected $request = array();

    public function onPrepareComponentParams($params)
    {
        $this->request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
        if (!isset($params["CACHE_TIME"])) {
            $params["CACHE_TIME"] = 3600;
        }
        return $params;
    }

    private function getDataProps()
    {
        $dbProperty = CIBlockProperty::GetList(
            Array("sort" => "asc", "name" => "asc"),
            Array("ACTIVE" => "Y", "IBLOCK_ID" => $this->arParams['IBLOCK_ID'])
        );
        while ($arProperty = $dbProperty->GetNext()) {
            if ($arProperty['PROPERTY_TYPE'] == 'L') {
                $arProperty['VALUES'] = \Realweb\Site\Site::getPropEnumValues([
                    "IBLOCK_ID" => $this->arParams['IBLOCK_ID'],
                    "CODE" => $arProperty['CODE']
                ]);
            } elseif ($arProperty['PROPERTY_TYPE'] == 'S' && $arProperty['USER_TYPE'] == 'directory') {
                $directory = new \Realweb\Site\HLoad(['TABLE_NAME' => $arProperty['USER_TYPE_SETTINGS']['TABLE_NAME']]);
                $arProperty['VALUES'] = $directory->GetAll();
            }
            $this->arResult['PROPS'][$arProperty['CODE']] = $arProperty;
        }
        $this->arResult['SECTIONS'] = \Bitrix\Iblock\SectionTable::query()
            ->setSelect(['ID', 'NAME'])
            ->setFilter([
                'IBLOCK_ID' => $this->arParams['IBLOCK_ID'],
                'ACTIVE' => 'Y',
                'DEPTH_LEVEL' => 1
            ])
            ->exec()
            ->fetchAll();
    }

    private function getFileArray($files)
    {
        $result = [];
        foreach ($files as $fileKey => $arData) {
            foreach ($arData as $code => $arFiles) {
                if (is_array($arFiles)) {
                    foreach ($arFiles as $key => $value) {
                        $result[$code][$key][$fileKey] = $value;
                    }
                } else {
                    $result[$code][$fileKey] = $arFiles;
                }
            }
        }
        foreach ($result as $code => $item) {
            if (isset($item['tmp_name']) && !$item['tmp_name']) {
                unset($result[$code]);
            } else {
                foreach ($item as $key => $value) {
                    if (isset($value['tmp_name']) && !$value['tmp_name']) {
                        unset($result[$code][$key]);
                    }
                }
                if (!$result[$code]) {
                    unset($result[$code]);
                }
            }
        }
        return $result;
    }



    public function executeComponent()
    {
        global $USER;
        if (!$USER->IsAuthorized()) {
            ShowError('Необходимо авторизоваться');
            return;
        }
        if (!in_array(USER_GROUP_EXECUTOR, CUser::GetUserGroup($USER->GetId()))) {

            $g=CUser::GetUserGroup($USER->GetId());
/*
            if(in_array(6, CUser::GetUserGroup($USER->GetId()))) {
                LocalRedirect("/catalog/");


            }else{
                ShowError('Доступ закрыт');
                return;

            }
*/
        }
        $this->getDataProps();
        if (!empty($this->arParams['ID'])) {
            $this->arResult['ITEM']['ID'] = $this->arParams['ID'];
        }
        if ($this->request->isPost() && $this->request['action'] == 'make_company') {
            if (!$this->makeCompany()) {
                $this->arResult['ITEM'] = $this->request['FIELDS'];
                $this->arResult['ITEM']['PROPS'] = $this->request['PROPS'];
            }
        }
        if (!empty($this->arResult['ITEM']['ID']) && intval($this->arResult['ITEM']['ID']) > 0) {
            $this->arResult['ITEM'] = current(\Realweb\Site\Site::getIBlockElements([
                "IBLOCK_ID" => $this->arParams['IBLOCK_ID'],
                'CREATED_BY' => $USER->GetID(),
                'ID' => $this->arResult['ITEM']['ID']
            ]));
        }
        $this->IncludeComponentTemplate();
    }
}

?>