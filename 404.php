<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404", "Y");

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetTitle("Страница не найдена");
?>
<div class="d-flex align-items-center justify-content-center vh-100">
    <div class="container text-center mt-5">
        <div class="row">
            <div class="col-lg-12">

                <h2 class="mb-0 mt-4">404. Страница не найдена</h2>
                <p class="mt-2">Запрашиваемая Вами страница была удалена или перемещена.<br> Пожалуйста, воспользуйтесь
                    поиском, меню или начните с главной страницы.</p>
                <div class="d-flex justify-content-center">
                    <a href="/" class="btn btn-primary">На главную</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>