<?php


namespace Realweb\Site;

use Bitrix\Main\Application;
use Bitrix\Main\Config\Option;
use Bitrix\Main\HttpRequest;
use Bitrix\Main\Loader;
use Bitrix\Main\Type\DateTime;
use Realweb\Recaptcha\Captcha;


class Action
{
    private function _getRequest()
    {
        if ($this->_request === null) {
            $this->_request = Application::getInstance()->getContext()->getRequest();
        }

        return $this->_request;
    }
    public function showAdds(){
        \CModule::IncludeModule('highloadblock');
      //Загружает добавки
        $hlblock = \Bitrix\Highloadblock\HighloadBlockTable::getById(2)->fetch();

        $entity = \Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hlblock);
        $entity_data_class = $entity->getDataClass();
        $rsData = $entity_data_class::getList(array(
            "select" => array("*"),
            "order" => array("ID" => "ASC"),
            "filter" => array("UF_BLUDO"=>$this->_getRequest()->get('ID'))  // Задаем параметры фильтра выборки
        ));
        $vals=[];
$html='';
        while($arData = $rsData->Fetch()){
$html.='<div class="form-check bludo-variant col-6">
                            <input class="form-check-input bludo_add" type="checkbox" data-price="'.$arData['UF_ZNAK'].$arData['UF_PRICE'].'" data-text="'.$arData['UF_NAME'].'"  id="flexCheckDefault11">
                            <label class="form-check-label" for="flexCheckDefault11">
                                '.$arData['UF_NAME'].' <span>'.$arData['UF_ZNAK'].$arData['UF_PRICE'].' &#x20bd;</span>
                            </label>
                        </div>';
            $vals[]=$arData;
        }


        return array('message' => 'Добавки загружены','html'=>$html, 'reload' => false);

    }
    public function changeCity()
    {
        if ($id = intval($this->_getRequest()->get('ID'))) {
            Site::setCookie('city', $id, (time() + 60 * 60 * 24 * 30));
            //User::getInstance()->clearBasket();

            return array('message' => 'Город успешно изменен', 'reload' => true);
        }
    }
    public function formSubmit()
    {
        $request = $this->_getRequest();
        $errors = array();

        $input = array();

        try {
            parse_str($request->getInput(), $input);

        } catch (Exception $e) {

            $errors[] = $e->getMessage();


        }


        /*
         *     [action] => Action_formSubmit
    [otz_rest] => 1
    [fio] => sad
    [rating] => 2
    [pr_text] => asd
         *
         * */

        \Bitrix\Main\Loader::includeModule('iblock');

        $el = new \CIBlockElement;
        $iblock_id = Site::getIblockId('otz');
        $PROPS = ['REST' => $input['otz_rest'], 'RATING' => $input['rating']];
        $fields = array(
            "DATE_ACTIVE_FROM" => date("d.m.Y H:i:s"), //Передаем дата создания
            "IBLOCK_ID" => $iblock_id, //ID информационного блока
            "PROPERTY_VALUES" => $PROPS, // Передаем массив значении для свойств
            "NAME" => $input['fio'],
            "PREVIEW_TEXT" => $input['pr_text'],
            "ACTIVE" => "N", //поумолчанию делаем активным или ставим N для отключении поумолчанию


        );


        if (empty($errors)) {
            //Результат в конце отработки
            if ($ID = $el->Add($fields)) {
                $result = ['success' => 1];
            } else {
                $result = ['error' => 1];
            }
        } else {
            $result = ['error' => $errors[0]];
        }
        return $result;
    }
    public function make_company()
    {

        $request = $this->_getRequest();
        global $USER;
        if (empty($request['FIELDS']) || empty($request['PROPS'])) {
            $this->arResult['STATUS'] = 'error';
            $this->arResult["MESSAGE"] = "Ошибка заполения данных";
            return 0;
        }
        $files = $request->getFileList()->toArray();
        $arProps = $request['PROPS'];
        $this->arParams['IBLOCK_ID']=Site::getIblockId('rest');
        $arFields = Array(
            "MODIFIED_BY" => $USER->GetID(),
            "IBLOCK_SECTION" => $request['FIELDS']['IBLOCK_SECTION'],
            "IBLOCK_ID" => Site::getIblockId('rest'),
            "NAME" => $request['FIELDS']['NAME'],
            "PREVIEW_TEXT" => $request['FIELDS']['PREVIEW_TEXT'],
            "PREVIEW_TEXT_TYPE" => 'TEXT',
            "DETAIL_TEXT" => $request['FIELDS']['DETAIL_TEXT'],
            "DETAIL_TEXT_TYPE" => 'TEXT',
        );

        if (!empty($files['FIELDS'])) {
            $arFieldFiles = $this->getFileArray($files['FIELDS']);
            if (!empty($arFieldFiles)) {
                $arFields = array_merge($arFields, $arFieldFiles);
            }
        }
        if (!empty($files['PROPS'])) {
            $arPropsFiles = $this->getFileArray($files['PROPS']);
            if (!empty($arPropsFiles)) {
                $arProps = array_merge($arProps, $arPropsFiles);
            }
        }

        $el = new \CIBlockElement();
        if ($id = $request['FIELDS']['ID']) {

            if ($element = \Bitrix\Iblock\ElementTable::query()
                ->setSelect(['ID'])
                ->setFilter(['ID' => $id, 'IBLOCK_ID' => $this->arParams['IBLOCK_ID'], 'CREATED_BY' => $USER->GetID()])
                ->exec()
                ->fetch()
            ) {
                unset($arFields['CODE']);
                if ($el->Update($id, $arFields)) {

                    $this->arResult["MESSAGE"] = "Сохранение успешно выполнено";
                    $this->arResult['STATUS'] = 'success';
                    $this->arResult['ITEM']['ID'] = $id;
                    if (!empty($this->request['PROP_del'])) {
                        foreach ($this->request['PROP_del'] as $propCode => $values) {
                            $obProp = \CIBlockElement::GetProperty($this->arParams['IBLOCK_ID'], $id, 'ID', 'DESC', array('CODE' => $propCode));
                            while ($arProp = $obProp->GetNext()) {
                                $propertyValues[$arProp['VALUE']] = $arProp;
                            }
                            if (!empty($propertyValues)) {
                                foreach ($values as $value) {
                                    if ($valueId = $propertyValues[$value]['PROPERTY_VALUE_ID']) {
                                        \CIBlockElement::SetPropertyValueCode($id, $propCode, array($valueId => array('del' => 'Y')));
                                    }
                                }
                            }
                        }
                    }
                    foreach ($arProps as $code => $value) {
                        if ($this->arResult['PROPS'][$code]['PROPERTY_TYPE'] == 'F' && $this->arResult['PROPS'][$code]['MULTIPLE'] == 'Y') {
                            \CIBlockElement::SetPropertyValueCode($id, $code, $value);
                        } else {
                            \CIBlockElement::SetPropertyValuesEx($id, $this->arParams['IBLOCK_ID'], [$code => $value]);
                        }
                    }

                } else {
                    $this->arResult['STATUS'] = 'error';
                    $this->arResult["MESSAGE"] = $el->LAST_ERROR;
                }
            }

        }

        return !empty($this->arResult) ? $this->arResult : false;
    }
}

?>