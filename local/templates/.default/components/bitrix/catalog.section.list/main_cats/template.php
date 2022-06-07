<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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


<div class="card-transparent bg-transparent mb-0" id="cats_start">

    <div class="card-body p-0">

        <div class="card-header border-0  ">
            <div class="d-flex justify-content-between align-items-center">
                <h3>Категории ресторанов</h3>
                <a onclick="$('#cats_all').show();$('#cats_start').hide()" class="text-dark d-flex">Показать все
                    <svg width="24" height="24" class="ms-1" viewBox="0 0 24 24" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <rect width="24" height="24" rx="12" fill="#EA6A12"></rect>
                        <path d="M10.25 8.5L13.75 12L10.25 15.5" stroke="white" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </a>
            </div>
        </div>

        <div class="swiper-container d-slider2 swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
            <div class="swiper-wrapper" id="swiper-wrapper-10ff673e101010926a4e" aria-live="polite"
                 style="transform: translate3d(0px, 0px, 0px);">
                <?
                $cnt = count($arResult['SECTIONS']);
                ?>

                <?php foreach ($arResult['SECTIONS'] as $key => $arSection): ?>

                    <?php
                    $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
                    $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
                    ?>


                    <div class="swiper-slide <? if ($key == 0) { ?>swiper-slide-active<? } ?>" role="group"
                         aria-label="<?= $key + 1; ?> / <?= $cnt ?>" style="width: 233px; margin-right: 40px;">
                        <div class="card category-menu" data-iq-gsap="onStart" data-iq-opacity="0"
                             data-iq-position-y="-40" data-iq-duration=".6" data-iq-delay=".6"
                             data-iq-trigger="scroll" data-iq-ease="none"
                             style="transform: translate(0px, 0px); opacity: 1;">
                            <div class="card-body">
                                <a class="text-center iq-menu-category"
                                   href="<?php echo $arSection['SECTION_PAGE_URL']; ?>">
                                    <img src="<?= $arSection['PICTURE']['SRC'] ?>" alt="header" class="img-fluid mb-3">
                                    <h6 class="heading-title fw-bolder pb-4"><?php echo $arSection['NAME']; ?></h6>
                                    <div class="category-icon pt-4">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <rect width="24" height="24" rx="12" fill="currentColor"></rect>
                                            <path d="M10.25 8.5L13.75 12L10.25 15.5" stroke="currentColor"
                                                  stroke-width="1.5" stroke-linecap="round"
                                                  stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>

    </div>
</div>






