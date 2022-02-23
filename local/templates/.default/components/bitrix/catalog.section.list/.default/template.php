<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

<h1 class="services__title title_grey width width_norm width_paddingStandart">
    <span class="title__br"></span><span class="services__titleText title__text">Услуги</span><span class="title__br"></span>
</h1>
<div class="uslugi_all width width_full width_paddingStandart">
    <nav class="uslugi__content width width width_norm width_paddingStandart">
        <div class="views-element-container">
            <div class="viewServices">
                <? foreach ($arResult['SECTIONS'] as &$arSection) {
                    $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
                    $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
                    ?>
                    <div class="viewServices__row views-row">
                        <div class="uslugiPrevu">
                            <a class="uslugiPrevu__link" href="<? echo $arSection['SECTION_PAGE_URL']; ?>">
                                <img class="uslugiPrevu__img test" src="<? echo $arSection['PICTURE']['SRC']; ?>" alt="<? echo $arSection['NAME']; ?>">
                                <div class="uslugiPrevu__nameWrap">
                                <span class="uslugiPrevu__name"><div><? echo $arSection['NAME']; ?></div></span>
                                </div>
                                <div class="uslugiPrevu__nameWrapHover">
                                <span class="uslugiPrevu__nameHover"><div><? echo $arSection['NAME']; ?></div></span>
                                <span class="uslugiPrevu__moreHover">Узнать</span>
                                </div>
                            </a>
                        </div>

                    </div>
                <? } ?>
            </div>
        </div>
    </nav>
</div>






