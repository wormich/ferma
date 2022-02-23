<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
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
<div class="card-header border-0  ">
    <div class="d-flex justify-content-between align-items-center">
        <h3>Категории ресторанов</h3>
        <a href="/menu/" class="text-dark d-flex">Показать все
            <svg width="24" height="24"  class="ms-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="24" height="24" rx="12" fill="#EA6A12"/>
                <path d="M10.25 8.5L13.75 12L10.25 15.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
    </div>
</div>

<div class="swiper-container d-slider2">
    <div class="swiper-wrapper">
        <?php foreach ($arResult['SECTIONS'] as $arSection): ?>

        <?php
        $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
        $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
        ?>
        <div class="swiper-slide">
            <div class="card category-menu"
                 data-iq-gsap="onStart"
                 data-iq-opacity="0"
                 data-iq-position-y="-40"
                 data-iq-duration=".6"
                 data-iq-delay=".6"
                 data-iq-trigger="scroll"
                 data-iq-ease="none"
            >
                <div class="card-body">
                    <a class="text-center iq-menu-category" href="<?php echo $arSection['SECTION_PAGE_URL']; ?>">
                        <img src="<?=$arSection['PICTURE']['SRC']?>" alt="header" class="img-fluid rounded-pill mb-3">
                        <h6 class="heading-title fw-bolder pb-4"><?php echo $arSection['NAME']; ?></h6>
                        <div class="category-icon pt-4">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="24" height="24" rx="12" fill="currentColor"/>
                                <path d="M10.25 8.5L13.75 12L10.25 15.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>


