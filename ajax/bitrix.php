<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

if (empty($action)) {
    return;
}

if (!function_exists('str_replace_once')) {

    function str_replace_once($search, $replace, $text)
    {
        $pos = strpos($text, $search);
        return $pos !== false ? substr_replace($text, $replace, $pos, strlen($search)) : $text;
    }

}

function do_method($class_name, $method)
{
    if (class_exists($class_name)) {
        if (method_exists($class_name, $method)) {
            $class = new $class_name();
            $result = $class->$method();
            if (!is_null($result)) {
                $json = json_encode($result);
                echo $json;
            }
            return $class;
        }
    }
    echo json_encode(array('error' => 'error'));
    return;
}

$data = explode('_', $action);
if (count($data) > 1) {
    $class_name = $data[0];
    $method = str_replace_once($class_name . '_', '', $action);
    do_method("Realweb\\Site\\" . $class_name, $method);
}
