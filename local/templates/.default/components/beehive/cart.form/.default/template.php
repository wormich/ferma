<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>
<?

use Bitrix\Main;
use Bitrix\Main\Config\Option;
use Bitrix\Main\Localization\Loc;

if ($arParams["USE_PHONE_MASK"] == "Y") {
    $this->addExternalJS($templateFolder . "/js/jquery.mask.min.js");
}
?>
<?
if (!$arResult["SUCCESS_ORDER"]) {
    if (count($arResult["ELEMENTS"]) > 0) {
        ?>

        <div class="row">

            <?= bitrix_sessid_post() ?>
            <div class="col-12 col-md-8">

                <div class="card">


                    <div class="card-body">
                        <div class="mb-5">
                            <h4 class="mb-2 mt-3">Условия доставки</h4>

                            <div class="adr_block mt-3 dropdown">
                                <img src="/local/templates/main/assets/images/adr.svg">


                                <a class="current_order_adr" href="#" role="button" id="dropdownMenuLink"
                                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ленинский пр-т
                                    94к1</a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item adr_select" href="#">Невский пр., д. 41</a>
                                    <a class="dropdown-item adr_select" href="#">Литейный пр., д. 11</a>
                                    <a class="dropdown-item adr_select" href="#">Ул. Софьи Ковалевской, д. 15</a>
                                    <span class="dropdown-item">

                                <div class="input-group mb-3">

                                    <input type="text" class="form-control cust_adr_val"
                                           placeholder="Введите новый адрес" aria-label="Username"
                                           aria-describedby="basic-addon1">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary cust_adr" type="button">Ок</button>
                                    </div>
                               </div>

 </span>
                                </div>

                            </div>

                            <div class="row mt-3">
                                <div class="col-12 col-md-3">
                                    <div class="form-label-group">
                                        <input type="text" id="pod" class="form-control" placeholder="Floating Label"/>
                                        <label for="pos">Подъезд</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-label-group">
                                        <input type="text" id="etazh" class="form-control"
                                               placeholder="Floating Label"/>
                                        <label for="etazh">Этаж</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-label-group">
                                        <input type="text" id="flat" class="form-control" placeholder="Floating Label"/>
                                        <label for="flat">Квартира/Офис</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-label-group">
                                        <input type="text" id="domofon" class="form-control"
                                               placeholder="Floating Label"/>
                                        <label for="domofon">Домофон</label>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-12">

                                    <div class="form-label-group">
                                    <textarea id="tt" class="form-control" placeholder="Floating Label area"
                                              rows="4" name="DATA[COMMENT]"></textarea>
                                        <label for="tt">Комментарий к заказу</label>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <h4>Время доставки</h4>
                        <?

                        $t1 = explode(':', $arParams['TIME_1']);
                        //Час со скольки

                        $t1h = $t1[0];

                        $t2 = explode(':', $arParams['TIME_2']);

                        //Час до скольки
                        $t2h = $t2[0];

                        //Текущее время
                        $h = date('H');

if ($h>$t1h&&$h<$t2h){
    $act=0;

}else{
    $act=1;
}
                        ?>

                        <div class="bubble bubble2">

                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <?if ($act==0){?>
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                       href="#tab-today"
                                       role="tab" aria-controls="tab-today" aria-selected="true">Сегодня</a>
                                </li>
                                <?}?>
                                <li class="nav-item">
                                    <a class="nav-link  <?if ($act==1){?> active<?}?>" id="tab-tomorrow-tab" data-bs-toggle="pill" href="#tab-tomorrow"
                                       role="tab" aria-controls="tab-tomorrow" aria-selected="false">Завтра</a>
                                </li>

                            </ul>
                            <div class="tab-content" id="pills-tabContent-2">
                                <?if ($act==0){?>
                                <div class="tab-pane fade show active" id="tab-today" role="tabpanel"
                                     aria-labelledby="pills-home-tab">
                                    <div class="time_container">
                                        <ul class="DesktopDeliveryTimePane_timeList">
                                            <li class="DesktopDeliveryTimePane_timeItemNow DesktopDeliveryTimePane_timeItem"
                                                data-time="<?=$arParams['TIME_TO_DOST'];?>">Сейчас
                                            </li>
                                            <?for ($i=$h+1;$i<$t2h;$i++){?>
                                                <?
                                                if ($i < 10) {
                                                    $i = '0' . $i;
                                                }
                                                ?>
                                                <li class="DesktopDeliveryTimePane_timeItem" data-time="<?= $i; ?>:00"><?= $i; ?>:00</li>
                                                <li class="DesktopDeliveryTimePane_timeItem" data-time="<?= $i; ?>:30"><?= $i; ?>:30</li>
                                            <?}?>

                                        </ul>
                                    </div>
                                </div>
                                <?}?>
                                <div class="tab-pane fade <?if ($act==1){?> show active<?}?>" id="tab-tomorrow" role="tabpanel"
                                     aria-labelledby="pills-profile-tab">
                                    <div class="time_container">
                                        <ul class="DesktopDeliveryTimePane_timeList">
                                            <?for ($i=$t1h;$i<$t2h;$i++){?>
                                                <?
                                                if ($i < 10) {
                                                    $i = '0' . $i;
                                                }
                                                ?>
                                                <li class="DesktopDeliveryTimePane_timeItem" data-time="<?= $i; ?>:00"><?= $i; ?>:00</li>
                                                <li class="DesktopDeliveryTimePane_timeItem" data-time="<?= $i; ?>:30"><?= $i; ?>:30</li>
                                            <?}?>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-4">


                            <div class="time_dost">
                                <span class="label"><img src="/local/templates/main/assets/images/clock.svg"> </span>
                                <span id="time_result"><?=$arParams['TIME_TO_DOST'];?></span>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-12 col-md-4 offset-sm-12">
                <div class="card">


                    <div class="card-body">

                        <h4>Ваши данные</h4>
                        <?
                        if (!empty($arResult["COMMON_ERRORS"])) {
                            ?>
                            <div class="message message-error">
                                <i class="fa fa-times"></i>
                                <? foreach ($arResult["COMMON_ERRORS"] as $ERROR) { ?>
                                    <p><?= $ERROR ?></p>
                                <? } ?>
                            </div>
                            <?
                        }
                        ?>

                        <div class="form-label-group">
                            <input type="text" id="myname" class="form-control" placeholder="Floating Label"
                                   name="DATA[NAME]" required>
                            <label for="myname">Ваше имя</label>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="myemail" class="form-control" placeholder="Floating Label"
                                   name="DATA[EMAIL]">
                            <label for="myemail">Почта</label>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="myphone" class="bcf-checkout-phone form-control"
                                   placeholder="Floating Label" name="DATA[PHONE]" required>
                            <label for="myphone">Телефон</label>
                        </div>
                        <div class="form-label-group">
                            <input type="password" id="mypassword" class="form-control" placeholder="Floating Label">
                            <label for="mypassword">Пароль</label>
                        </div>
                        <!--           <button class="btn btn-primary rounded-pill mt-5">Сохранить для входа</button>-->

                    </div>
                </div>


            </div>

        </div>


        <script>
            BeeCartAppObjects.formId = 'bee-form-w';
            jQuery(document).ready(function () {

                <? if ($arParams["USE_PHONE_MASK"] == "Y"):?>
                jQuery('.<?=$arResult["FIELDS"]["PHONE"]["CLASS"]?>').mask("+7 (000) 000-00-00", {
                    clearIfNotMatch: true,
                    placeholder: "+7 (___) ___-__-__<?= ($arResult["FIELDS"]["PHONE"]["IS_REQUIRED"] == "Y") ? ' *' : '' ?>"
                });
                <? endif; ?>
                jQuery('.delivery_services select').change(function () {
                    var addPrice = jQuery('option:selected', this).attr('data-price') * 1;
                    BeeCartAppObjects.cartPageApp.DATA.DELIVERY_PRICE = addPrice;
                });
                jQuery('.delivery_services [data-price]').change(function () {
                    var addPrice = jQuery(this).attr('data-price') * 1;
                    BeeCartAppObjects.cartPageApp.DATA.DELIVERY_PRICE = addPrice;
                });
                jQuery('.delivery_services select').trigger('change');
                jQuery('.delivery_services [data-price]').trigger('change');
            });
        </script>
        <?
    } elseif ($arResult["SUCCESS_ORDER"]) {
        ?>
        <div class="bee-form">
            <div class="message message-ok">
                <i class="fa fa-check"></i>
                <?= Loc::GetMessage("BEEHIVE_CART_FORM_ORDER_SUCCESS", array("#ORDER_ID#" => $arResult["ORDER"]["ORDER_ID"])) ?>

                <?
                if ($arResult["ORDER"]["PAYMENT_TYPE"] == "ROBOKASSA" && is_numeric($arResult["ORDER"]["ORDER_ID"])) {
                    ?>
                    <p>
                        <?= Loc::GetMessage("ROBOKASSA_TEXT") ?>
                    </p>
                    <?
                    echo CBeeCartServices::getRoboForm($arResult["ORDER"]["ORDER_ID"], SITE_ID);
                }
                ?>
            </div>
        </div>
        <script>
            if (typeof BeeCartAppObjects.cartPageApp != "undefined")
                BeeCartAppObjects.cartPageApp.hideBlock();
        </script>
        <?
    }


} ?>