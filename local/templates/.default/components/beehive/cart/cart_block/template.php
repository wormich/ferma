<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
<?

use \Bitrix\Main\Localization\Loc;


$blockId = 'bee_cart';
?>
<?php



$cart = CBeeCart::getUserCartData('s1');
if (is_array($cart) && !empty($cart)) {

    $bludo_id = $cart[0]['PRODUCT_ID'];

    $rest_data = \Realweb\Site\Catalog::getRestByBludo($bludo_id);
}
if (!empty($rest_data)) {

    $time1 = $rest_data['PROPERTIES']['TIME_1']['VALUE'];
    $time2 = $rest_data['PROPERTIES']['TIME_2']['VALUE'];
    $time_to_dost = $rest_data['PROPERTIES']['TIME_TO_DOST']['VALUE'];

}

?>

<template v-if="ELEMENTS.length > 0">

    <div class="d-flex justify-content-between align-items-center mt-2" v-for="(item, index) in ELEMENTS">

        <div class="title">{{item.NAME}}<br><span class="adds">{{item.PARAMS_STR}}</span>
        </div>
        <div class="weight" style="width:40px;"><span v-if="item.weight > 0">{{item.weight}} г.</span></div>
        <div class="quantity">{{item.QTY}}</div>
        <div class="price">{{ item.PRICE }} &#x20bd;</div>
        <span class="mb-1" @click="removeItemById(item.CART_ITEM_ID, $event)" style="">
                              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path opacity="0.4" d="M19.6449 9.48924C19.6449 9.55724 19.112 16.298 18.8076 19.1349C18.6169 20.8758 17.4946 21.9318 15.8111 21.9618C14.5176 21.9908 13.2514 22.0008 12.0055 22.0008C10.6829 22.0008 9.38936 21.9908 8.1338 21.9618C6.50672 21.9228 5.38342 20.8458 5.20253 19.1349C4.88936 16.288 4.36613 9.55724 4.35641 9.48924C4.34668 9.28425 4.41281 9.08925 4.54703 8.93126C4.67929 8.78526 4.86991 8.69727 5.07026 8.69727H18.9408C19.1402 8.69727 19.3211 8.78526 19.464 8.93126C19.5973 9.08925 19.6644 9.28425 19.6449 9.48924" fill="#E60A0A"></path>
                              <path d="M21 5.97686C21 5.56588 20.6761 5.24389 20.2871 5.24389H17.3714C16.7781 5.24389 16.2627 4.8219 16.1304 4.22692L15.967 3.49795C15.7385 2.61698 14.9498 2 14.0647 2H9.93624C9.0415 2 8.26054 2.61698 8.02323 3.54595L7.87054 4.22792C7.7373 4.8219 7.22185 5.24389 6.62957 5.24389H3.71385C3.32386 5.24389 3 5.56588 3 5.97686V6.35685C3 6.75783 3.32386 7.08982 3.71385 7.08982H20.2871C20.6761 7.08982 21 6.75783 21 6.35685V5.97686Z" fill="#E60A0A"></path>
                              </svg>
                           </span>


    </div>

</template>

<template v-else>
    <?= Loc::getMessage("BC_C_CART_EMPTY_TEXT_TITLE") ?>
</template>


<div class="bubble">
    <?

    $t1 = explode(':', $time1);
    //Час со скольки

    $t1h = $t1[0];

    $t2 = explode(':',$time2);

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

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <?if ($act==0){?>
        <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#tab-today"
               role="tab" aria-controls="tab-today" aria-selected="true">Сегодня</a>
        </li>
        <?}?>
        <li class="nav-item">
            <a class="nav-link<?if ($act==1){?> active<?}?>" id="tab-tomorrow-tab" data-bs-toggle="pill" href="#tab-tomorrow"
               role="tab" aria-controls="tab-tomorrow" aria-selected="false">Завтра</a>
        </li>

    </ul>
    <div class="tab-content" id="pills-tabContent-2">
        <?if ($act==0){?>
        <div class="tab-pane fade show active" id="tab-today" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="time_container">
                <ul class="DesktopDeliveryTimePane_timeList">
                    <li class="DesktopDeliveryTimePane_timeItemNow DesktopDeliveryTimePane_timeItem"
                        data-time="<?=$time_to_dost;?>">Сейчас
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
        <div class="tab-pane fade" id="tab-tomorrow" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="time_container">
                <ul class="DesktopDeliveryTimePane_timeList">
                    <? for ($i = 0; $i < 24; $i++) { ?>
                        <?
                        if ($i < 10) {
                            $i = '0' . $i;
                        }
                        ?>
                        <li class="DesktopDeliveryTimePane_timeItem" data-time="<?= $i; ?>:00">Завтра, <?= $i; ?>:00</li>
                        <li class="DesktopDeliveryTimePane_timeItem" data-time="<?= $i; ?>:30">Завтра, <?= $i; ?>:30</li>
                    <? } ?>

                </ul>
            </div>
        </div>

    </div>

</div>
<div class="cart_footer d-flex justify-content-between align-items-center mt-4" v-if="ELEMENTS.length > 0">

<!--
    <div class="time_dost">
        <span class="label">Время доставки</span>
        <span id="time_result"><?=$time_to_dost;?></span>

    </div>
    -->
    <div class="itogo">

        <span class="label">Итого</span>
        <span id="sum_result">{{ DATA.TOTAL_SUM}} руб.</span>

    </div>

</div>
<div class='bc-cart-w-content-tbl-discount' v-if="DATA.TOTAL_DISCOUNT_SUM != 0">
    <?= Loc::getMessage("BC_C_CART_TOTAL_DISCOUNT_SUM_TEXT") ?>: {{ DATA.TOTAL_DISCOUNT_SUM
    }} руб.
</div>
<div v-if="DATA.TOTAL_SUM < DATA.MINIMAL_ORDER_SUM">
    <?= Loc::getMessage("BC_C_CART_PAGE_MINIMAL_ORDER_SUM_NOT_ENOUGH") ?>
    {{ DATA.MINIMAL_ORDER_SUM - DATA.TOTAL_SUM }} {{DATA.CURRENCY}}
</div>
<div v-else class='bc-cart-page-w-content-title bc-cart-page-w-content-title-empty'>
<a class="btn btn-primary rounded-pill btn-chekout" v-if="ELEMENTS.length > 0" href="<?= SITE_DIR ?>cart/">Оформить заказ</a>
</div>
<script>
    new BeeCartAppObject({
        selector: '#<?=$blockId?>',
        type: 'block',
        path: <?=CUtil::PhpToJSObject($this->__component->GetPath() . "/ajax.php")?>
    });
</script>