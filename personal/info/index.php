<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Кабинет ресторатора");
?>
<?if($USER->IsAuthorized()):?>

    <div class="col-lg-12">
        <div class="card card-block card-stretch card-height">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Добро пожаловать, <?=(CUser::GetFirstName())?CUser::GetFirstName():CUser::GetLogin()?></h4>
                </div>
            </div>
            <div class="card-body">
                <p class="mb-0">На этой странице вы сможете изменить информацию о вашем ресторане</p>
            </div>
        </div>
    </div>


<?else:?>

    <?
header("HTTP/1.1 301 Moved Permanently");
header("Location: /personal/auth/");
exit();
?>

    <?endif;?>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
