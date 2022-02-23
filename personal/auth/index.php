<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Авторизация пользователя");
?>
<?$APPLICATION->IncludeComponent("bitrix:system.auth.form","",Array(
        "REGISTER_URL" => "/personal/register/",
        "FORGOT_PASSWORD_URL" => "",
        "PROFILE_URL" => "/personal/",
        "SHOW_ERRORS" => "Y"
    )
);?>

