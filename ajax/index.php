<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

$context = Bitrix\Main\Application::getInstance()->getContext();
$request = $context->getRequest();
$action = $request->get('action');

if (empty($action)) {
    return;
}

include_once 'bitrix.php';

require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/epilog_after.php');