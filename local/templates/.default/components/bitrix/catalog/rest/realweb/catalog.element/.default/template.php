<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
$name = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])
    ? $arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
    : $arResult['NAME'];
$MENU_IBLOCK = \Realweb\Site\Site::getIblockId('menu');
$OTZ_IBLOCK = \Realweb\Site\Site::getIblockId('otz');
?>

</main>
<main class="main-content asider">
    <div class="content-inner mt-5 py-0">
        <div class="row">
            <div class="col-12">
                <div class="hero-image p-3"
                     style="background: url('<?= $arResult['DETAIL_PICTURE']['SRC'] ?>') no-repeat center right;background-size: cover;background-position: center;">
                    <div class="card-body p-5">
                        <div class="row banner-container">
                            <div class="col-12 col-md-6 col-lg-4 banner-item">
                                <h1 class="fw-bold mb-4 banner-zag">
                                    <?= $arResult['NAME']; ?>
                                </h1>
                                <div class="banner-text pt-3">
                                    <p>
                                        <? foreach ($arResult['PROPERTIES']['DOSTAVKA']['VALUE'] as $val) { ?>
                                            <?= $val; ?>
                                        <? } ?>
                                    </p>
                                    <? if ($arResult['PROPERTIES']['MIN_PRICE']['VALUE'] > 0) { ?>
                                        <p> Заказ от <?= $arResult['PROPERTIES']['MIN_PRICE']['VALUE'] ?>₽</p>
                                    <? } ?>
                                </div>

                                <button type="button" class="btn btn-primary btn_info" style="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <g id="vuesax_linear_info-circle" data-name="vuesax/linear/info-circle"
                                           transform="translate(388 276) rotate(180)">
                                            <g id="info-circle">
                                                <path id="Vector" d="M10,20A10,10,0,1,0,0,10,10.029,10.029,0,0,0,10,20Z"
                                                      transform="translate(366 254)" fill="none" stroke="#fff"
                                                      stroke-linecap="round" stroke-linejoin="round"
                                                      stroke-width="1.5"/>
                                                <path id="Vector-2" data-name="Vector" d="M0,0V5"
                                                      transform="translate(376 260)" fill="none" stroke="#fff"
                                                      stroke-linecap="round" stroke-linejoin="round"
                                                      stroke-width="1.5"/>
                                                <path id="Vector-3" data-name="Vector" d="M0,0H.009"
                                                      transform="translate(375.995 268)" fill="none" stroke="#fff"
                                                      stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                                <path id="Vector-4" data-name="Vector" d="M0,0H24V24H0Z"
                                                      transform="translate(364 252)" fill="none" opacity="0"/>
                                            </g>
                                        </g>
                                    </svg>


                                </button>
                                <div class="bubble_info">
                                    <div class="AppPopup_root AppPopup_xcenter AppPopup_ybottom AppPopup_xacenter AppPopup_yatop AppPopup_defaultWidth AppPopup_isVisible">
                                        <div class="AppPopup_wrapper">
                                            <div class="AppPopup_body AppPopup_light">
                                                <div class="RestaurantPageHeader_infoPopup">
                                                    <p class="RestaurantPageHeader_infoPopupLegal">
                                                        <?= $arResult['PREVIEW_TEXT'] ?><br>

                                                        <br>Режим работы:
                                                        с <?= $arResult['PROPERTIES']['TIME_1']['VALUE'] ?>
                                                        до <?= $arResult['PROPERTIES']['TIME_2']['VALUE'] ?></p></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row_category_menu mt-5">
                <div class="col-12">

                    <div class="card">
                        <? include_once('menu_block.php') ?>

                    </div>

                </div>


            </div>


        </div>
    </div>
