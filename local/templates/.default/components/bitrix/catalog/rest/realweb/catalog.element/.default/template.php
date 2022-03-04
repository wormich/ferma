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
?>

<div class="row">
    <div class="col-lg-3">

        <div class="card">
            <div class="border-0">
                <h4 class="card-title">Меню ресторана <?= $arResult['NAME']; ?></h4>
            </div>
            <div class="py-0">
                <?
                $current_code = '';

                if ($arResult['VARIABLES']['SECTION_CODE']) {

                    $current_code = $arResult['VARIABLES']['SECTION_CODE'];
                }

                ?>

                <? $APPLICATION->IncludeComponent("bitrix:catalog.section.list", "rest_cats",
                    array(
                        "VIEW_MODE" => "TEXT",
                        "SHOW_PARENT_NAME" => "Y",
                        "IBLOCK_TYPE" => "catalog",
                        "IBLOCK_ID" => $MENU_IBLOCK,
                        "SECTION_ID" => 0,
                        "SECTION_CODE" => "",
                        "SECTION_URL" => "",
                        "COUNT_ELEMENTS" => "Y",
                        "TOP_DEPTH" => "1",
                        "SECTION_FIELDS" => "",
                        "SECTION_USER_FIELDS" => "",
                        "ADD_SECTIONS_CHAIN" => "Y",
                        "CACHE_TYPE" => "A",
                        "CACHE_TIME" => "36000000",
                        "CACHE_NOTES" => "",
                        "CACHE_GROUPS" => "Y",

                    )
                ); ?>

            </div>
        </div>
    </div>
    <div class="col-lg-6">


        <?
        $arFilter = ['IBLOCK_ID' => $MENU_IBLOCK, 'UF_RES' => $arResult['ID']];
        $sects = \Realweb\Site\Site::getSections($arFilter, false, true);
        ?>

        <? foreach ($sects as $s) { ?>
            <div class="card">
                <div class="card-header ">
                    <h4 class="card-title list-main" id="#cat<?= $s['ID']; ?>"><?= $s['NAME']; ?></h4>
                </div>
                <div class="card-body py-0">
                    <?
                    $arFilterb = ['IBLOCK_ID' => $MENU_IBLOCK, 'IBLOCK_SECTION_ID' => $s['ID'], 'PROPERTY_TYPE_VALUE' => 'Основное блюдо'];
                    $bluda = \Realweb\Site\Site::getIBlockElements($arFilterb);
                    ?>

                    <ul class="list-inline chat-list-main1">
                        <?
                        foreach ($bluda as $b) {
                            ?>

                            <li class="py-5 border-bottom border-soft-primary">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <img src="<?= $b['PREVIEW_PICTURE']['SRC']; ?>"
                                             class="img-fluid avatar avatar-40"
                                             alt="profile-image">
                                        <div class="d-flex justify-content-between ms-3">
                                            <div>
                                                <a href="<?= $b['CODE']; ?>/"><h6 class="mb-1 fw-bolder heading-title"><?= $b['NAME']; ?></h6></a>
                                                <small class="mb-0"><?= $b['PREVIEW_TEXT']; ?></small>
                                            </div>
                                            <div>
                                                <svg width="20" viewBox="0 0 24 24" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M6.32857 8.34749L6.93157 15.5195C6.97557 16.0715 7.42657 16.4855 7.97757 16.4855H7.98157H18.8926H18.8946C19.4156 16.4855 19.8606 16.0975 19.9346 15.5825L20.8846 9.02349C20.9066 8.86749 20.8676 8.71149 20.7726 8.58549C20.6786 8.45849 20.5406 8.37649 20.3846 8.35449C20.1756 8.36249 11.5026 8.35049 6.32857 8.34749ZM7.97557 17.9855C6.65857 17.9855 5.54357 16.9575 5.43657 15.6425L4.52057 4.74849L3.01357 4.48849C2.60457 4.41649 2.33157 4.02949 2.40157 3.62049C2.47357 3.21149 2.86857 2.94549 3.26857 3.00949L5.34857 3.36949C5.68357 3.42849 5.93857 3.70649 5.96757 4.04649L6.20257 6.84749C20.4786 6.85349 20.5246 6.86049 20.5936 6.86849C21.1506 6.94949 21.6406 7.24049 21.9746 7.68849C22.3086 8.13549 22.4486 8.68649 22.3686 9.23849L21.4196 15.7965C21.2406 17.0445 20.1566 17.9855 18.8966 17.9855H18.8916H7.98357H7.97557Z"
                                                          fill="#07143B"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M17.2876 12.0439H14.5156C14.1006 12.0439 13.7656 11.7079 13.7656 11.2939C13.7656 10.8799 14.1006 10.5439 14.5156 10.5439H17.2876C17.7016 10.5439 18.0376 10.8799 18.0376 11.2939C18.0376 11.7079 17.7016 12.0439 17.2876 12.0439Z"
                                                          fill="#07143B"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M7.545 20.7021C7.846 20.7021 8.089 20.9451 8.089 21.2461C8.089 21.5471 7.846 21.7911 7.545 21.7911C7.243 21.7911 7 21.5471 7 21.2461C7 20.9451 7.243 20.7021 7.545 20.7021Z"
                                                          fill="#07143B"></path>
                                                    <mask id="mask8" style="mask-type:alpha" maskUnits="userSpaceOnUse"
                                                          x="7"
                                                          y="20" width="2" height="2">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                              d="M7 21.2452C7 21.5472 7.243 21.7912 7.546 21.7912C7.847 21.7912 8.09 21.5472 8.09 21.2452C8.09 20.9442 7.847 20.7012 7.546 20.7012C7.243 20.7012 7 20.9442 7 21.2452Z"
                                                              fill="white"></path>
                                                    </mask>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M7.544 21.0411C7.431 21.0411 7.339 21.1331 7.339 21.2461C7.339 21.4731 7.75 21.4731 7.75 21.2461C7.75 21.1331 7.657 21.0411 7.544 21.0411ZM7.544 22.5411C6.83 22.5411 6.25 21.9601 6.25 21.2461C6.25 20.5321 6.83 19.9521 7.544 19.9521C8.258 19.9521 8.839 20.5321 8.839 21.2461C8.839 21.9601 8.258 22.5411 7.544 22.5411Z"
                                                          fill="#07143B"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M18.8263 20.7021C19.1273 20.7021 19.3713 20.9451 19.3713 21.2461C19.3713 21.5471 19.1273 21.7911 18.8263 21.7911C18.5243 21.7911 18.2812 21.5471 18.2812 21.2461C18.2812 20.9451 18.5243 20.7021 18.8263 20.7021Z"
                                                          fill="#07143B"></path>
                                                    <mask id="mask61" style="mask-type:alpha" maskUnits="userSpaceOnUse"
                                                          x="18"
                                                          y="20" width="2" height="2">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                              d="M18.2812 21.2452C18.2812 21.5472 18.5243 21.7912 18.8263 21.7912C19.1263 21.7912 19.3713 21.5472 19.3713 21.2452C19.3713 20.9442 19.1263 20.7012 18.8263 20.7012C18.5243 20.7012 18.2812 20.9442 18.2812 21.2452Z"
                                                              fill="white"></path>
                                                    </mask>
                                                    <g mask="url(#mask1)">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                              d="M13.2812 26.7902H24.3713V15.7012H13.2812V26.7902Z"
                                                              fill="#07143B"></path>
                                                    </g>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M18.8253 21.0411C18.7133 21.0411 18.6213 21.1331 18.6213 21.2461C18.6222 21.4751 19.0323 21.4731 19.0312 21.2461C19.0312 21.1331 18.9382 21.0411 18.8253 21.0411ZM18.8253 22.5411C18.1113 22.5411 17.5312 21.9601 17.5312 21.2461C17.5312 20.5321 18.1113 19.9521 18.8253 19.9521C19.5403 19.9521 20.1212 20.5321 20.1212 21.2461C20.1212 21.9601 19.5403 22.5411 18.8253 22.5411Z"
                                                          fill="#07143B"></path>
                                                </svg>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end">
                                        <small class="text-dark">$70</small>
                                    </div>
                                </div>
                            </li>
                        <? } ?>
                    </ul>
                </div>
            </div>
        <? } ?>
    </div>
    <div class="col-lg-3">
        <div class="dish-card-vertical1">
            <div class="card dish-card3">
                <div class="card-body ">
                    <div class="d-flex profile-img41">
                        <div class="profile-img">
                            <img src="<?= $arResult['PREVIEW_PICTURE']['SRC']; ?>"
                                 class="img-fluid rounded-pill avatar-130" alt="<?= $arResult['NAME']; ?>">
                        </div>
                        <div class="d-flex align-items-center mb-4 mb-md-0">
                            <div class="d-flex ms-3">
                                <div>
                                    <h5 class="mb-1d"><?= $arResult['NAME']; ?></h5>
                                    <div class="d-flex mb-2">
                                        <svg width="18" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M13.1043 4.17701L14.9317 7.82776C15.1108 8.18616 15.4565 8.43467 15.8573 8.49218L19.9453 9.08062C20.9554 9.22644 21.3573 10.4505 20.6263 11.1519L17.6702 13.9924C17.3797 14.2718 17.2474 14.6733 17.3162 15.0676L18.0138 19.0778C18.1856 20.0698 17.1298 20.8267 16.227 20.3574L12.5732 18.4627C12.215 18.2768 11.786 18.2768 11.4268 18.4627L7.773 20.3574C6.87023 20.8267 5.81439 20.0698 5.98724 19.0778L6.68385 15.0676C6.75257 14.6733 6.62033 14.2718 6.32982 13.9924L3.37368 11.1519C2.64272 10.4505 3.04464 9.22644 4.05466 9.08062L8.14265 8.49218C8.54354 8.43467 8.89028 8.18616 9.06937 7.82776L10.8957 4.17701C11.3477 3.27433 12.6523 3.27433 13.1043 4.17701Z"
                                                  fill="#FDB913"></path>
                                        </svg>
                                        <svg width="18" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M13.1043 4.17701L14.9317 7.82776C15.1108 8.18616 15.4565 8.43467 15.8573 8.49218L19.9453 9.08062C20.9554 9.22644 21.3573 10.4505 20.6263 11.1519L17.6702 13.9924C17.3797 14.2718 17.2474 14.6733 17.3162 15.0676L18.0138 19.0778C18.1856 20.0698 17.1298 20.8267 16.227 20.3574L12.5732 18.4627C12.215 18.2768 11.786 18.2768 11.4268 18.4627L7.773 20.3574C6.87023 20.8267 5.81439 20.0698 5.98724 19.0778L6.68385 15.0676C6.75257 14.6733 6.62033 14.2718 6.32982 13.9924L3.37368 11.1519C2.64272 10.4505 3.04464 9.22644 4.05466 9.08062L8.14265 8.49218C8.54354 8.43467 8.89028 8.18616 9.06937 7.82776L10.8957 4.17701C11.3477 3.27433 12.6523 3.27433 13.1043 4.17701Z"
                                                  fill="#FDB913"></path>
                                        </svg>
                                        <svg width="18" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M13.1043 4.17701L14.9317 7.82776C15.1108 8.18616 15.4565 8.43467 15.8573 8.49218L19.9453 9.08062C20.9554 9.22644 21.3573 10.4505 20.6263 11.1519L17.6702 13.9924C17.3797 14.2718 17.2474 14.6733 17.3162 15.0676L18.0138 19.0778C18.1856 20.0698 17.1298 20.8267 16.227 20.3574L12.5732 18.4627C12.215 18.2768 11.786 18.2768 11.4268 18.4627L7.773 20.3574C6.87023 20.8267 5.81439 20.0698 5.98724 19.0778L6.68385 15.0676C6.75257 14.6733 6.62033 14.2718 6.32982 13.9924L3.37368 11.1519C2.64272 10.4505 3.04464 9.22644 4.05466 9.08062L8.14265 8.49218C8.54354 8.43467 8.89028 8.18616 9.06937 7.82776L10.8957 4.17701C11.3477 3.27433 12.6523 3.27433 13.1043 4.17701Z"
                                                  fill="#FDB913"></path>
                                        </svg>
                                        <svg width="18" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M13.1043 4.17701L14.9317 7.82776C15.1108 8.18616 15.4565 8.43467 15.8573 8.49218L19.9453 9.08062C20.9554 9.22644 21.3573 10.4505 20.6263 11.1519L17.6702 13.9924C17.3797 14.2718 17.2474 14.6733 17.3162 15.0676L18.0138 19.0778C18.1856 20.0698 17.1298 20.8267 16.227 20.3574L12.5732 18.4627C12.215 18.2768 11.786 18.2768 11.4268 18.4627L7.773 20.3574C6.87023 20.8267 5.81439 20.0698 5.98724 19.0778L6.68385 15.0676C6.75257 14.6733 6.62033 14.2718 6.32982 13.9924L3.37368 11.1519C2.64272 10.4505 3.04464 9.22644 4.05466 9.08062L8.14265 8.49218C8.54354 8.43467 8.89028 8.18616 9.06937 7.82776L10.8957 4.17701C11.3477 3.27433 12.6523 3.27433 13.1043 4.17701Z"
                                                  stroke="#232D42" stroke-width="1.5" stroke-linecap="round"
                                                  stroke-linejoin="round"></path>
                                        </svg>
                                        <svg width="18" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M13.1043 4.17701L14.9317 7.82776C15.1108 8.18616 15.4565 8.43467 15.8573 8.49218L19.9453 9.08062C20.9554 9.22644 21.3573 10.4505 20.6263 11.1519L17.6702 13.9924C17.3797 14.2718 17.2474 14.6733 17.3162 15.0676L18.0138 19.0778C18.1856 20.0698 17.1298 20.8267 16.227 20.3574L12.5732 18.4627C12.215 18.2768 11.786 18.2768 11.4268 18.4627L7.773 20.3574C6.87023 20.8267 5.81439 20.0698 5.98724 19.0778L6.68385 15.0676C6.75257 14.6733 6.62033 14.2718 6.32982 13.9924L3.37368 11.1519C2.64272 10.4505 3.04464 9.22644 4.05466 9.08062L8.14265 8.49218C8.54354 8.43467 8.89028 8.18616 9.06937 7.82776L10.8957 4.17701C11.3477 3.27433 12.6523 3.27433 13.1043 4.17701Z"
                                                  stroke="#232D42" stroke-width="1.5" stroke-linecap="round"
                                                  stroke-linejoin="round"></path>
                                        </svg>
                                        <small class="ms-1 text-dark">3.0</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-4">
                        <p><?= $arResult['PREVIEW_TEXT']; ?></p>
                        <div class="d-flex align-items-center">
                            <p class="mb-0"><?= $arResult['PROPERTIES']['TIME']['VALUE']; ?></p>

                        </div>
                        <div class="d-flex align-items-center">

                                <? foreach ($arResult['PROPERTIES']['DOSTAVKA']['VALUE'] as $val) { ?>
                                    <span class="badge bg-soft-primary text-dark m-2"><?= $val; ?></span>
                                <? } ?>

                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>

</div>