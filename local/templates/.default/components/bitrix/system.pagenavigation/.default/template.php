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

if (!$arResult["NavShowAlways"]) {
    if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
        return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"] . "&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?" . $arResult["NavQueryString"] : "");
?>


<nav class="pager" role="navigation" aria-labelledby="pagination-heading">
    <ul class="pager__items js-pager__items">
        <? if ($arResult["NavPageNomer"] > 1) { ?>
            <li class="pager__item pager__item--first">
                <a href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>" title="На первую страницу">
                    <span aria-hidden="true">« Первая</span>
                </a>
            </li>
            <li class="pager__item pager__item--previous">
                <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] - 1) ?>"
                   title="На предыдущую страницу" rel="prev">
                    <span class="visually-hidden">←</span>
                    <span aria-hidden="true">‹ Предыдущий</span>
                </a>
            </li>
        <? } ?>


        <? while ($arResult["nStartPage"] <= $arResult["nEndPage"]): ?>
            <li class="pager__item <? if ($arResult["nStartPage"] == $arResult["NavPageNomer"]): ?>is-active<? endif ?>">

                <? if ($arResult["nStartPage"] == $arResult["NavPageNomer"]): ?>
                    <a><?= $arResult["nStartPage"] ?></a>
                <? elseif ($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false): ?>
                    <a href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"><?= $arResult["nStartPage"] ?></a>
                <? else: ?>
                    <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>"><?= $arResult["nStartPage"] ?></a>
                <? endif ?>

            </li>
            <? $arResult["nStartPage"]++ ?>
        <? endwhile ?>


        <? if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]) { ?>
            <li class="pager__item pager__item--next">
                <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] + 1) ?>"
                   title="На следующую страницу" rel="next">
                    <span aria-hidden="true">Следующий ›</span>
                </a>
            </li>
            <li class="pager__item pager__item--last">
                <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["NavPageCount"] ?>"
                   title="На последнюю страницу">
                    <span aria-hidden="true">Последняя »</span>
                </a>
            </li>
        <? } ?>
    </ul>
</nav>


