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

?>




<div class="klinika__title">
    <h1 class="klinika__titleText title_norm width width_norm width_paddingStandart"><? echo $name; ?></h1>
</div>
<div class="klinika__mainContent width">
    <div class="klinika__content width width_norm">
        <div class="block-region-main">
            <div class="block">
                <article class="clinic width width_norm width_paddingStandart">
                    <div class="clinic__topWrap" itemscope="" itemtype="http://schema.org/Organization">
                        <meta itemprop="name" content="ООО 'Дентал Менджемент'">
                        <div class="clinic__img">
                            <div> <img src="<?=$arResult["PREVIEW_PICTURE"]["SRC"];?>" alt="<?=$arResult["PREVIEW_PICTURE"]["ALT"];?>" width="320" height="320"></div>
                        </div>
                        <div class="clinic__info">
                            <div class="clinic__adres">
                                <label>Адрес:</label>
                                <div>
                                    <?=$arResult["PROPERTIES"]["ADDRESS"]["VALUE"];?>
                                </div>
                            </div>
                            <div class="clinic__rezim">
                                <label>Режим работы:</label>
                                <div><?=$arResult["PROPERTIES"]["SCHEDULE"]["VALUE"];?></div>
                            </div>
                            <div itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
                                <meta itemprop="streetAddress" content="<?=$arResult["PROPERTIES"]["ADDRESS"]["VALUE"];?>">
                                <meta itemprop="postalCode" content="190000">
                                <meta itemprop="addressLocality" content="Санкт-Петербург">
                            </div>
                            <div class="clinic__metro">
                                <div>
                                    <div>Станция метро</div>
                                    <div><?=$arResult["PROPERTIES"]["METRO_STATION"]["VALUE"];?></div>
                                </div>
                            </div>
                            <div class="clinic__phone">
                                <meta itemprop="telephone" content="<?=$arResult["PROPERTIES"]["PHONES"]["VALUE"][0]?>">
                                <label>Телефон:</label>
                                <? foreach ($arResult["PROPERTIES"]["PHONES"]["VALUE"] as $number) { ?>
                                <div>
                                    <a class="<?=$arResult["PROPERTIES"]["CALLTOUCH"]["VALUE"];?>" href="tel:<?=$number;?>">
                                        <?=$number;?>
                                    </a>
                                </div>
                                <? } ?>
                            </div>
                            <meta itemprop="email" content="info@ctoma.ru">
                            <div class="clinic__zapisatsa">
                                <a href="/make-an-appointment?title=<?=$arResult["ID"];?>" class=" button_red">Записаться</a>
                            </div>
                        </div>
                    </div><!-- /clinic__topWrap -->

                    <div class="clinic__bottom">
                        <div class="clinic__bottomRight">
                            <div class="clinic__informacia content_norm">
                                <?php echo $arResult['DETAIL_TEXT']; ?>
                            </div>
                        <div class="kliniksGallery content_norm">
                            <h2>Фотографии клиники</h2>
                            <? if($arResult['GALLARY_PHOTOS']) { ?>
                                <div>
                                    <? foreach ($arResult['GALLARY_PHOTOS'] as $key => $photo) { ?>
                                        <div>
                                            <a href="<?=$photo['SRC_BIG'];?>" class="colorbox cboxElement" data-fancybox="images" data-caption="<?=$photo['ALT'];?>" >
                                                <img src="<?=$photo['SRC'];?>" alt="<?=$photo['ALT'];?>">
                                            </a>
                                        </div>
                                    <? } ?>
                                </div>

                            <? } ?>
                        </div>
                        <div class="clinic__description content_norm"></div>
                        </div>
                    </div><!-- /clinic__bottom -->
                </article>
            </div>
        </div>
    </div>
</div>