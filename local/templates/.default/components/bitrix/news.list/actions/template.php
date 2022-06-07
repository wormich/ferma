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


<div class="card-transparent bg-transparent mb-0" id="actions">
    <div class="card-header border-0  ">
        <div class="d-flex justify-content-between align-items-center">
            <h3>Акции в ресторанах</h3>
            <a onclick="$('#actions_all').show();$('#actions').hide()" class="text-dark d-flex">Показать все
                <svg width="24" height="24" class="ms-1" viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <rect width="24" height="24" rx="12" fill="#EA6A12"></rect>
                    <path d="M10.25 8.5L13.75 12L10.25 15.5" stroke="white" stroke-width="1.5"
                          stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </a>
        </div>
    </div>
    <div class="card-body p-0 dish-card-vertical">


        <div class="my-pad">
            <div class="row">

                <? foreach ($arResult["ITEMS"] as $arItem): ?>


                    <div class="col-12 col-md-2">
                        <a href="<? echo $arItem["DETAIL_PAGE_URL"] ?>">
                            <div class="card card-light bg-light2 dish-card index">
                                <div class="card-body ">
                                    <div class="d-flex profile-img1">
                                        <div class="profile-img31">

                                            <img src="<? echo $arItem["PREVIEW_PICTURE"]["SRC"]; ?>"
                                                 class="img-fluid rounded-pill avatar-130"
                                                 alt="profile-image"
                                            >
                                        </div>
                                        <div>
                                            <? if ($arItem['PROPERTIES']['REST_MES']['VALUE'] == 'Да') { ?>
                                                <span class="text-primary">

                                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                              viewBox="0 0 24 24">
  <g id="vuesax_linear_flash" data-name="vuesax/linear/flash" transform="translate(-428 -316)">
    <g id="flash">
      <path id="Vector"
            d="M1.368,11.281h3.09v7.2c0,1.68.91,2.02,2.02.76l7.57-8.6c.93-1.05.54-1.92-.87-1.92h-3.09v-7.2c0-1.68-.91-2.02-2.02-.76L.5,9.361C-.422,10.421-.032,11.281,1.368,11.281Z"
            transform="translate(432.722 317.999)" fill="#ea6a10" stroke="#ea6a10" stroke-linecap="round"
            stroke-linejoin="round" stroke-width="1.5"/>
      <g id="Vector-2" data-name="Vector" transform="translate(428 316)" fill="#ea6a10" opacity="0">
        <path d="M 23.5 23.5 L 0.5 23.5 L 0.5 0.5 L 23.5 0.5 L 23.5 23.5 Z" stroke="none"/>
        <path d="M 1 1 L 1 23 L 23 23 L 23 1 L 1 1 M 0 0 L 24 0 L 24 24 L 0 24 L 0 0 Z" stroke="none" fill="#707070"/>
      </g>
    </g>
  </g>
</svg>

                                         <small>Ресторан месяца</small>
                                     </span>
                                            <? } ?>
                                            <h6 class="mb-3 mt-3 heading-title fw-bolder t-left"><? echo $arItem["NAME"]; ?></h6>
                                            <? if ($arItem['ADD_INFO']['CNT'] > 0) { ?>
                                                <p class="mt-2 mb-0 pb-4 iq-calories small"><?= $arItem['ADD_INFO']['CNT']; ?>
                                                    позиций</p>
                                            <? } ?>
                                            <!--<div class="actions">
    <span class="act_bg me-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Ресторан месяца">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
        <g id="vuesax_linear_cup" data-name="vuesax/linear/cup" transform="translate(-364 -380)">
            <g id="cup">
                <path id="Vector" d="M0,0V2.1" transform="translate(376.15 396.5)" fill="none" stroke="#fff"
                      stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                <path id="Vector-2" data-name="Vector" d="M0,3H10V2A2.006,2.006,0,0,0,8,0H2A2.006,2.006,0,0,0,0,2V3Z"
                      transform="translate(371.15 399)" fill="none" stroke="#fff" stroke-width="1"/>
                <path id="Vector-3" data-name="Vector" d="M0,0H12" transform="translate(370.15 402)" fill="none"
                      stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                <path id="Vector-4" data-name="Vector"
                      d="M7,14A7,7,0,0,1,0,7V4A4,4,0,0,1,4,0h6a4,4,0,0,1,4,4V7A7,7,0,0,1,7,14Z"
                      transform="translate(369 382)" fill="none" stroke="#fff" stroke-linecap="round"
                      stroke-linejoin="round" stroke-width="1"/>
                <path id="Vector-5" data-name="Vector"
                      d="M3.43,7.3A4.859,4.859,0,0,1,1.5,6.1,5.334,5.334,0,0,1,0,2.5,2.476,2.476,0,0,1,2.5,0h.65a3.756,3.756,0,0,0-.3,1.5v3A7.047,7.047,0,0,0,3.43,7.3Z"
                      transform="translate(366.04 384.35)" fill="none" stroke="#fff" stroke-linecap="round"
                      stroke-linejoin="round" stroke-width="1"/>
                <path id="Vector-6" data-name="Vector"
                      d="M0,7.3A4.859,4.859,0,0,0,1.93,6.1a5.334,5.334,0,0,0,1.5-3.6A2.476,2.476,0,0,0,.93,0H.28a3.756,3.756,0,0,1,.3,1.5v3A7.047,7.047,0,0,1,0,7.3Z"
                      transform="translate(382.53 384.35)" fill="none" stroke="#fff" stroke-linecap="round"
                      stroke-linejoin="round" stroke-width="1"/>
                <path id="Vector-7" data-name="Vector" d="M0,0H24V24H0Z" transform="translate(364 380)" fill="none"
                      opacity="0"/>
            </g>
        </g>
    </svg>
        </span>
                                                <span class="act_bg me-2" data-bs-toggle="tooltip"
                                                      data-bs-placement="top" data-bs-original-title="Лучшая кухня">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
        <g id="vuesax_linear_ticket-expired" data-name="vuesax/linear/ticket-expired" transform="translate(-620 -572)">
            <g id="ticket-expired">
                <path id="Vector"
                      d="M0,14.79H6.47c3.7,0,4.62-.92,4.62-4.62a2.315,2.315,0,0,1,0-4.63V4.62C11.09.92,10.17,0,6.47,0H.09V6.79"
                      transform="translate(630.902 577.08)" fill="none" stroke="#fff" stroke-linecap="round"
                      stroke-linejoin="round" stroke-width="1"/>
                <path id="Vector-2" data-name="Vector"
                      d="M8.994,12.87v3H6.224c-1.48,0-2.35-1.01-3.31-3.33l-.18-.45A2.351,2.351,0,0,0,4.024,9a2.37,2.37,0,0,0-3.1-1.29l-.17-.43c-1.44-3.52-.94-4.75,2.58-6.2L5.974,0l3.02,7.32V9.87"
                      transform="translate(622 576)" fill="none" stroke="#fff" stroke-linecap="round"
                      stroke-linejoin="round" stroke-width="1"/>
                <path id="Vector-3" data-name="Vector" d="M.17,0H0" transform="translate(627.992 591.87)" fill="none"
                      stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                <path id="Vector-4" data-name="Vector" d="M0,0H24V24H0Z" transform="translate(620 572)" fill="none"
                      opacity="0"/>
            </g>
        </g>
    </svg>
    </span>

                                            </div>-->
                                            <? if ($arItem['ADD_INFO']['MIN'] > 0) { ?>
                                                <div class="d-flex mt-2">
                                                    <span class="text-dark me-2">от <?= $arItem['ADD_INFO']['MIN']; ?> руб.</span>

                                                </div>
                                            <? } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <? endforeach; ?>
            </div>
        </div>


    </div>
</div>

