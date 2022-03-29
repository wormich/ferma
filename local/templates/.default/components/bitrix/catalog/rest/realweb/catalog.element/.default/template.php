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


<div class="row  mt-5">
    <div class="col-md-12 col-lg-8">
        <div class="dish-card-vertical1">
            <div class="card dish-card3">
                <div class="card-body ">
                    <div class="d-flex profile-img41">
                        <div class="profile-img42">
                            <img src="<?= $arResult['DETAIL_PICTURE']['SRC'] ?>"
                                 class="img-fluid rounded-pill avatar-130" alt="profile-image">
                        </div>
                        <div class="d-flex align-items-center mb-4 mb-md-0">
                            <img src="<?= $arResult['PREVIEW_PICTURE']['SRC'] ?>"
                                 class="img-fluid avatar-rounded avatar-60">
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
                        <h6 class="heading-title fw-bolder"><?= $arResult['PROPERTIES']['KITCHENS']['VALUE'] ?></h6>
                        <div class="d-flex align-items-center">
                            <p class="mb-0"><?= $arResult['PROPERTIES']['TIME']['VALUE'] ?></p>

                            <? foreach ($arResult['PROPERTIES']['DOSTAVKA']['VALUE'] as $val) { ?>
                                <span class="badge bg-soft-primary ms-5 text-dark"><?= $val; ?></span>
                            <? } ?>
                        </div>
                    </div>
                    <div class="py-2">
                        <h6 class="heading-title fw-bolder">Наш адрес</h6>
                        <div class="d-flex mt-2">
                            <svg width="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 10.8421C21 16.9172 12 23 12 23C12 23 3 16.9172 3 10.8421C3 4.76697 7.02944 1 12 1C16.9706 1 21 4.76697 21 10.8421Z"
                                      stroke="#07143B" stroke-width="1.5"></path>
                                <circle cx="12" cy="9" r="3" stroke="#07143B" stroke-width="1.5"></circle>
                            </svg>
                            <p class="mb-0 ms-3"><?= $arResult['PROPERTIES']['MAIN_ADR']['VALUE'] ?></p>
                        </div>
                        <div class="d-flex mt-2">
                            <svg width="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M11.5317 12.4724C15.5208 16.4604 16.4258 11.8467 18.9656 14.3848C21.4143 16.8328 22.8216 17.3232 19.7192 20.4247C19.3306 20.737 16.8616 24.4943 8.1846 15.8197C-0.493478 7.144 3.26158 4.67244 3.57397 4.28395C6.68387 1.17385 7.16586 2.58938 9.61449 5.03733C12.1544 7.5765 7.54266 8.48441 11.5317 12.4724Z"
                                      stroke="#232D42" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"></path>
                            </svg>
                            <p class="mb-0 ms-3"><?= $arResult['PROPERTIES']['PHONE']['VALUE'] ?></p>
                        </div>
                    </div>
                    <div class="py-3">
                        <h6 class="heading-title fw-bolder">Дополнительные адреса</h6>
                        <? foreach ($arResult['PROPERTIES']['ADRESSES']['VALUE'] as $adr) { ?>
                            <div class="d-flex mt-2">
                                <svg width="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 10.8421C21 16.9172 12 23 12 23C12 23 3 16.9172 3 10.8421C3 4.76697 7.02944 1 12 1C16.9706 1 21 4.76697 21 10.8421Z"
                                          stroke="#07143B" stroke-width="1.5"></path>
                                    <circle cx="12" cy="9" r="3" stroke="#07143B" stroke-width="1.5"></circle>
                                </svg>
                                <p class="mb-0 ms-3"><?= $adr; ?></p>
                            </div>
                        <? } ?>
                    </div>
                    <div class="d-flex flex-wrap mt-4">


                        <ul class="nav nav-pills mb-3 nav-fill" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="pill" href="#tabmenu" role="tab"
                                   aria-controls="tabmenu" aria-selected="true">Меню</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="pill" href="#tabsotz" role="tab"
                                   aria-controls="tabsotz" aria-selected="false">Отзывы</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="pill" href="#tabzakaz" role="tab"
                                   aria-controls="tabzakaz" aria-selected="false">Заказать столик</a>
                            </li>
                        </ul>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-4">
        <div class="card">
            <div class="card-header border-0">
                <h5>Фотогалерея</h5>
            </div>
            <div class="card-body pt-0">
                <div class="row">


                    <div class="d-grid gap-card grid-cols-2 ">
                        <? foreach ($arResult['PROPERTIES']['GALLERY']['VALUE'] as $pic) {
                            $image = CFile::ResizeImageGet($pic, array("width" => 568, "height" => 550));

                            ?>
                            <img src="<?= $image['src']; ?>" alt="post-image" class="img-fluid rounded-1">
                        <? } ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>


<div class="row  mt-2">
    <div class="col-12">
        <div class="dish-card-vertical1">
            <div class="card">
                <div class="card-body ">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="tabmenu" role="tabpanel"
                             aria-labelledby="nav-home-tab">
                            <!-- Меню ресторана-->
                            <? include_once('menu_block.php') ?>
                        </div>

                        <div class="tab-pane fade" id="tabsotz" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <button type="button" class="btn btn-primary rounded" data-bs-toggle="modal" data-bs-target="#modal_otz" onclick="$('#otz_rest').val(<?=$arResult['ID']?>)">
                                Оставить отзыв о ресторане
                            </button>

                            <!-- Отзывы о ресторане-->

                            <? include_once('otz_block.php') ?>
                        </div>

                        <div class="tab-pane fade" id="tabzakaz" role="tabpanel" aria-labelledby="nav-contact-tab">
                            Заказать столик
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>