<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
?>

<div class="swipe width width_full">
<div class="swipe__slider swiper-container">
    <div class="swiper-wrapper">
        <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <div class="slide swiper-slide">
            <div>
                <div class="slide__1" style="cursor:pointer;background-image: url('<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>')" onclick="window.location.href='<?if($arItem["PROPERTIES"]["url"]["VALUE"]):?><?=$arItem["PROPERTIES"]["url"]["VALUE"]?><?endif;?>'">
                <div class="slide__wrap">
                    <div class="slide__wrapList">
                        <span class="slide__text" style="font-size: 50px;">
                            <? if ($arItem['PROPERTIES']['SHOW_TEXT']['VALUE_XML_ID'] != 'NO') : ?>
                                <? echo $arItem["NAME"] ?>
                            <? endif; ?>
                        </span>
                        <span class="osnovnoi_tekst_slaida" style="font-size: 25px;"></span>
                    </div>
                    <div class="slide__link">
                        <a href='<?if($arItem["PROPERTIES"]["url"]["VALUE"]):?><?=$arItem["PROPERTIES"]["url"]["VALUE"]?><?endif;?>'>Узнать подробности</a>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <? endforeach; ?>
    </div>
    <!-- Add Arrows -->
    <div class="swipe__ButtonNext swiper-button-next swiper-button-white"></div>
    <div class="swipe__ButtonPrev swiper-button-prev swiper-button-white"></div>
    <div class="swipe__Pagination swiper-pagination"></div>
</div>
</div>
