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

  <div class="stomatology__content width width_paddingStandart">

    <div class="stomatology__slider width width_full">
      <div class="stomatology__swiper swiper-container swiper-container-horizontal swiper-container-fade">
        <div class="swiper-wrapper">
        <? foreach ($arResult["ITEMS"] as $arItem): ?>
          <div class="swiper-slide">
            <div class="stomatology__wrap">
              <div class="stomatology__img">
                <a href="<? echo $arItem["DETAIL_PAGE_URL"] ?>" hreflang="ru">
                  <img src="<? echo $arItem["DETAIL_PICTURE"]["SRC"]; ?>" alt="">
                </a>
              </div>
              <div class="stomatology__info">
                <div class="stomatology__infoTop">
                  <span class="stomatology__infoTitle"><a href="<? echo $arItem["DETAIL_PAGE_URL"] ?>" hreflang="ru"><? echo $arItem["NAME"]; ?></a></span>
                  <div class="stomatology__field content_norm"><label>Должность:</label> <div><? echo $arItem["PROPERTIES"]["POSITION"]["VALUE"]; ?></div></div>
                  <div class="stomatology__field content_norm"><label>Опыт:</label> <div><? echo htmlspecialcharsBack($arItem["PROPERTIES"]["EXPERIENCE"]["VALUE"]["TEXT"]); ?></div></div>
                  <div class="stomatology__field content_norm"><label>Образование:</label><div><? echo htmlspecialcharsBack($arItem["PROPERTIES"]["EDUCATION"]["VALUE"]["TEXT"]); ?></div></div>
                </div>
                <span class="stomatology__actions">
                  <a href="<? echo $arItem["DETAIL_PAGE_URL"]; ?>" class="stomatology__more">Подробности</a>
                  <a href="/form/zapisatsa-k-vracu?doctor_nid=<?=$arItem["ID"]; ?>" data-dialog-options="{
                  &quot;width&quot;:&quot;500px&quot;,
                  &quot;minHeight&quot;:&quot;800px&quot;,
                  &quot;dialogClass&quot;:&quot;popupDialog&quot;
                }" data-dialog-type="modal" class="use-ajax stomatology__zapis">Записаться</a>
              </span>
            </div>
          </div>
        </div><!-- /swiper-slide -->
       <? endforeach; ?>

      </div>
      <div class="stomatology__swiperButtonNext swiper-button-next swiper-button-white"></div>
      <div class="stomatology__swiperButtonPrev swiper-button-prev swiper-button-white"></div>
    </div>  <!-- /end first slider -->

    </div><!-- /stomatology__content -->

  <div class="stomatology__sliderThumb width width_full">
      <div class="stomatology__swiperThumbs swiper-container">
          <div class="stomatology__swiperThumbsWrap swiper-container-horizontal">
              <div class="swiper-wrapper">
                  <? foreach ($arResult["ITEMS"] as $arItem): ?>
                      <div class="swiper-slide">

                              <div class="stomatology__Thumbimg">
                                  <img src="<? echo $arItem["DETAIL_PICTURE"]["SRC"]; ?>" alt="">
                              </div>
                              <div class="stomatology__thumname"><? echo $arItem["NAME"]; ?></div>
                              <div class="stomatology__thumdolznost"><? echo $arItem["PROPERTIES"]["POSITION"]["VALUE"]; ?></div>

                      </div><!-- / end swiper-slide -->
                  <? endforeach; ?>
              </div>

          </div>
          <div class="stomatology__swiperThumbButtonPrev swiper-button-prev swiper-button-white"></div>
          <div class="stomatology__swiperThumbButtonNext swiper-button-next swiper-button-white"></div>
      </div>
  </div><!-- /end slider thumbs -->