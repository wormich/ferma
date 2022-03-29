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
}

?>