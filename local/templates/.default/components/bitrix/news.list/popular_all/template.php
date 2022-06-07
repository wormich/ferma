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


<div class="card-transparent bg-transparent mb-0" id="popular_all">
    <div class="card-header border-0  ">
        <div class="d-flex justify-content-between align-items-center">
            <h3>Популярные рестораны</h3>
            <a onclick="$('#popular_all').hide();$('#popular').show()" class="text-dark d-flex">Свернуть
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

