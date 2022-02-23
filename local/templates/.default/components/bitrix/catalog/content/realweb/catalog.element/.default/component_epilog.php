<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
/** @var array $templateData */
/** @var @global CMain $APPLICATION */
global $APPLICATION;

if(strlen($arResult['REDIRECT']) > 0){
    LocalRedirect($arResult['REDIRECT'], false, "301 Moved permanently");
}

if ($arResult['PROPERTIES']['HIDE_H1']['VALUE'] == "Y") {
    $APPLICATION->SetPageProperty("HIDE_H1", "Y");
}

$COMPONENTS = array();
foreach ($arResult['PROPERTIES']['PAGE_TYPE']['VALUE'] as $PAGE_TYPE) {
    if ($PAGE_TYPE['TYPE'] == 'COMPONENT') {
        $COMPONENTS[] = $PAGE_TYPE;
    }
}
$APPLICATION->SetPageProperty('COMPONENTS', $COMPONENTS);
if (intval($arResult['IBLOCK_SECTION_ID']) > 0 && strlen($arParams['SECTION_CODE']) == 0 && intval($arParams['SECTION_ID']) == 0) {
    define('ERROR_404', 'Y');
}

?>

