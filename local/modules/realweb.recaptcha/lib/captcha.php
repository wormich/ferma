<?php

namespace Realweb\Recaptcha;


use Bitrix\Main\Application;
use Bitrix\Main\Page\Asset;
use Bitrix\Main\Page\AssetLocation;
use Bitrix\Main\SystemException;

class Captcha
{
    public static function isActive()
    {
        return \Bitrix\Main\Config\Option::get('realweb.recaptcha', 'active', 'N') == 'Y';
    }

    public static function getSiteKey()
    {
        return \Bitrix\Main\Config\Option::get('realweb.recaptcha', 'site_key');
    }

    public static function getSecretKey()
    {
        return \Bitrix\Main\Config\Option::get('realweb.recaptcha', 'secret_key');
    }

    public function OnEndBufferContent(&$content)
    {
        if (!defined("ADMIN_SECTION")) {
            if (self::isActive()) {
                $strId = uniqid('recaptcha_');
                $search = array(
                    '/<img src="\/bitrix\/tools\/captcha\.php\?captcha_sid=(.+?(?=>))>/is',
                    '/<img src="\/bitrix\/tools\/captcha\.php\?captcha_code=(.+?(?=>))>/is',
                    '/name="captcha_word"/is'
                );
                $replace = array(
                    '<input type="hidden" class="js-recaptcha-token" name="recaptcha_token" data-key="' . self::getSiteKey() . '"><input type="hidden" name="recaptcha_action" value="bx_form_submit">',
                    '<input type="hidden" class="js-recaptcha-token" name="recaptcha_token" data-key="' . self::getSiteKey() . '"><input type="hidden" name="recaptcha_action" value="bx_form_submit">',
                    'name="captcha_word" style="display:none" value="' . substr(self::getSiteKey(), 0, 5) . '"'
                );
                $content = preg_replace($search, $replace, $content);
            }
        }
    }

    public function OnPageStart()
    {
        if (defined("ADMIN_SECTION") || !self::isActive()) {
            return;
        }
        Asset::getInstance()->addJs('https://www.google.com/recaptcha/api.js?render=' . self::getSiteKey());
        Asset::getInstance()->addJs('/bitrix/js/realweb.recaptcha/script.js');
        $obRequest = Application::getInstance()->getContext()->getRequest();
        if (empty($obRequest->get('captcha_word')) && empty($obRequest->get('captcha_sid'))) {
            return;
        }
        try {
            if (self::check()) {
                $connection = \Bitrix\Main\Application::getConnection();
                $connection->queryExecute("UPDATE b_captcha SET `CODE` = '" . strtoupper($obRequest->get('captcha_word')) . "' WHERE `ID` = '" . $obRequest->get('captcha_sid') . "'");
            } else {
                throw new SystemException("Please verify your reCAPTCHA");
            }
        } catch (SystemException $exception) {
            $exception->getMessage();
        }
    }

    private static function check()
    {
        $obContext = Application::getInstance()->getContext();
        $obServer = $obContext->getServer();
        $obRequest = $obContext->getRequest();
        if ($obRequest->get('recaptcha_action') && $obRequest->get('recaptcha_token')) {
            $strToken = $obRequest->get('recaptcha_token');
            $strAction = $obRequest->get('recaptcha_action');
        } else {
            return false;
        }

        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $params = [
            'secret' => self::getSecretKey(),
            'response' => $strToken,
            'remoteip' => $obServer->get('REMOTE_ADDR')
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        if (!empty($response)) {
            $response = json_decode($response);
            if ($response->success && $response->action == $strAction && $response->score > 0) {
                return true;
            }
        }

        return false;
    }
}