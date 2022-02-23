<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Регистрация пользователя");
?>
<?$APPLICATION->IncludeComponent(
	"realweb:main.register", 
	".default", 
	array(
		"USER_PROPERTY_NAME" => "",
		"SEF_MODE" => "Y",
		"SHOW_FIELDS" => array(
		),
		"REQUIRED_FIELDS" => array(
		),
		"AUTH" => "Y",
		"USE_BACKURL" => "Y",
		"SUCCESS_PAGE" => "",
		"SET_TITLE" => "Y",
		"USER_PROPERTY" => array(
			0 => "UF_RESTNAME",
		),
		"SEF_FOLDER" => "/",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?>
