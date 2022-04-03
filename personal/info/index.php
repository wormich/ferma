<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Кабинет ресторатора");
?>
<? if ($USER->IsAuthorized()): ?>


    <div class="card card-block card-stretch card-height">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Добро
                    пожаловать, <?= (CUser::GetFirstName()) ? CUser::GetFirstName() : CUser::GetLogin() ?></h4>
            </div>
        </div>
        <div class="card-body">
            <p class="mb-0">На этой странице вы сможете изменить информацию о вашем ресторане</p>


            <?php

            $uid = CUser::GetID();


            //CREATED_BY


            $arSelect = array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM", "PROPERTY_*");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
            $arFilter = array("IBLOCK_ID" => \Realweb\Site\Site::getIblockId('rest'), "ACTIVE_DATE" => "Y", "ACTIVE" => "Y", "CREATED_BY" => $uid);
            $res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize" => 50), $arSelect);
            while ($ob = $res->GetNextElement()) {
                $arFields = $ob->GetFields();

                $arProps = $ob->GetProperties();


            }
            $REST_IBLOCK = \Realweb\Site\Site::getIblockId('rest');
            $REST_ID = $arFields['ID'];

            ?>


                    <? $APPLICATION->IncludeComponent(
                        "realweb:info",
                        "",
                        array(
                            'IBLOCK_ID' => $REST_IBLOCK,
                            'AJAX_MODE' => 'N',
                            'ID' => $REST_ID
                        )
                    ); ?>



        </div>
    </div>
<? else: ?>

    <?
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: /personal/auth/");
    exit();
    ?>

<? endif; ?>



<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
