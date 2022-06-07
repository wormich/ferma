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


<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <? foreach ($arResult["ITEMS"] as $key => $arItem): ?>
            <div class="carousel-item <? if ($key == 0) { ?>active<? } ?>">
                <a href="<?= $arItem["CODE"] ?>">
                <img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" class="d-block w-100" alt="#">
                </a>
            </div>
        <? endforeach; ?>

    </div>
</div>
