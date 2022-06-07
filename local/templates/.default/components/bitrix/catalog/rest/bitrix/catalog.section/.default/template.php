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


<div class="card-transparent bg-transparent mb-0">
    <div class="card-header border-0  ">
        <div class="d-flex justify-content-between align-items-center">
            <h3>Все рестораны</h3>

        </div>
    </div>
    <div class="card-body p-0 dish-card-vertical">


        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 row-cols-xxl-6">
            <!--RestartBuffer-->
            <? foreach ($arResult["ITEMS"] as $arItem): ?>


                <div class="col" data-iq-gsap="onStart" data-iq-opacity="0" data-iq-position-y="-40"
                     data-iq-duration=".6" data-iq-delay=".6" data-iq-trigger="scroll" data-iq-ease="none"
                     style="transform: translate(0px, 0px); opacity: 1;">
                    <div class="card card-light dish-card profile-img mb-0">
                        <a href="<? echo $arItem["DETAIL_PAGE_URL"] ?>">
                            <div class="profile-img21">

                                <img src="<? echo $arItem["PREVIEW_PICTURE"]["SRC"]; ?>"
                                     class="img-fluid rounded-pill avatar-170 "
                                     alt="profile-image" alt="<? echo $arItem["NAME"]; ?>">
                            </div>
                            <div class="card-body menu-image">
                                <h6 class="heading-title mt-4 mb-0"><? echo $arItem["NAME"]; ?></h6>

                                <div class="card-rating stars-ratings">
                                    <?
                                    $rating = round($arItem["PROPERTIES"]["RATING"]["VALUE"]);
                                    if ($rating > 0) {
                                        $delta = 5 - $rating;
                                        for ($i = 0; $i < $rating; $i++) {
                                            ?>
                                            <svg width="18" viewBox="0 0 30 30" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M27.2035 11.1678C27.127 10.9426 26.9862 10.7446 26.7985 10.5985C26.6109 10.4523 26.3845 10.3643 26.1474 10.3453L19.2112 9.79418L16.2097 3.14996C16.1141 2.93597 15.9586 2.75421 15.762 2.62662C15.5654 2.49904 15.336 2.43108 15.1017 2.43095C14.8673 2.43083 14.6379 2.49853 14.4411 2.6259C14.2444 2.75327 14.0887 2.93486 13.9929 3.14875L10.9914 9.79418L4.05515 10.3453C3.82211 10.3638 3.59931 10.449 3.41343 10.5908C3.22754 10.7325 3.08643 10.9249 3.00699 11.1447C2.92754 11.3646 2.91311 11.6027 2.96544 11.8305C3.01776 12.0584 3.13462 12.2663 3.30204 12.4295L8.42785 17.4263L6.61502 25.2763C6.55997 25.5139 6.57762 25.7626 6.66566 25.99C6.7537 26.2175 6.90807 26.4132 7.10874 26.5519C7.30942 26.6905 7.54713 26.7656 7.79103 26.7675C8.03493 26.7693 8.27376 26.6978 8.47652 26.5623L15.1013 22.1458L21.726 26.5623C21.9333 26.6999 22.1777 26.7707 22.4264 26.7653C22.6751 26.7598 22.9161 26.6783 23.1171 26.5318C23.3182 26.3852 23.4695 26.1806 23.5507 25.9455C23.632 25.7104 23.6393 25.456 23.5717 25.2167L21.3464 17.43L26.8652 12.4635C27.2266 12.1375 27.3592 11.6289 27.2035 11.1678Z"
                                                      fill="currentColor"></path>
                                            </svg>
                                        <? } ?>

                                        <? for ($i = 0; $i < $delta; $i++) {
                                            ?>

                                            <svg width="18" viewBox="0 0 30 30" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.22826 17.4264L6.41543 25.2763C6.35929 25.514 6.37615 25.7631 6.46379 25.9911C6.55142 26.2191 6.70578 26.4153 6.90668 26.5542C7.10759 26.6931 7.34571 26.7682 7.58994 26.7696C7.83418 26.7711 8.07317 26.6988 8.27571 26.5623L14.9005 22.1458L21.5252 26.5623C21.7325 26.6999 21.9769 26.7708 22.2256 26.7653C22.4743 26.7599 22.7153 26.6784 22.9163 26.5318C23.1174 26.3853 23.2687 26.1807 23.3499 25.9456C23.4312 25.7105 23.4385 25.4561 23.3709 25.2167L21.1456 17.43L26.6644 12.4636C26.8412 12.3045 26.9674 12.097 27.0275 11.8668C27.0876 11.6367 27.0789 11.394 27.0025 11.1688C26.9261 10.9435 26.7854 10.7456 26.5977 10.5995C26.4101 10.4533 26.1837 10.3654 25.9466 10.3466L19.0104 9.79424L16.0088 3.15003C15.9131 2.93608 15.7576 2.75441 15.5609 2.62693C15.3642 2.49946 15.1348 2.43163 14.9005 2.43163C14.6661 2.43163 14.4367 2.49946 14.24 2.62693C14.0434 2.75441 13.8878 2.93608 13.7921 3.15003L10.7906 9.79424L3.85435 10.3454C3.6213 10.3639 3.39851 10.4491 3.21262 10.5908C3.02674 10.7326 2.88563 10.9249 2.80618 11.1448C2.72673 11.3646 2.71231 11.6027 2.76463 11.8306C2.81696 12.0584 2.93382 12.2664 3.10123 12.4295L8.22826 17.4264ZM11.6994 12.1631C11.9166 12.146 12.1251 12.0708 12.3032 11.9453C12.4813 11.8199 12.6224 11.6488 12.7117 11.4501L14.9005 6.60658L17.0892 11.4501C17.1785 11.6488 17.3196 11.8199 17.4977 11.9453C17.6758 12.0708 17.8843 12.146 18.1015 12.1631L22.9341 12.5463L18.9544 16.1282C18.6089 16.4397 18.4714 16.919 18.5979 17.3668L20.1224 22.7019L15.5769 19.6711C15.3774 19.5372 15.1426 19.4657 14.9023 19.4657C14.662 19.4657 14.4272 19.5372 14.2276 19.6711L9.47778 22.8381L10.7553 17.3072C10.8021 17.1037 10.7958 16.8917 10.737 16.6914C10.6782 16.4911 10.5689 16.3093 10.4195 16.1635L6.72325 12.5597L11.6994 12.1631Z"
                                                      fill="currentColor"></path>
                                            </svg>
                                        <? }
                                    } ?>
                                </div>

                                <div class="d-flex justify-content-between mt-3">
                                    <div class="d-flex align-items-center">
                                        <span class="text-dark me-2">от <?= $arItem['ADD_INFO']['MIN']; ?> руб.</span>
                                    </div>

                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <rect width="24" height="24" rx="12" fill="currentColor"></rect>
                                        <path d="M10.25 8.5L13.75 12L10.25 15.5" stroke="currentColor"
                                              stroke-width="1.5"
                                              stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>

                                </div>
                            </div>
                        </a>
                    </div>
                </div>


            <? endforeach; ?>
            <?php
            $paramName = 'PAGEN_' . $arResult['NAV_RESULT']->NavNum;
            $paramValue = $arResult['NAV_RESULT']->NavPageNomer;
            $pageCount = $arResult['NAV_RESULT']->NavPageCount;

            if ($paramValue < $pageCount) {
                $paramValue = (int)$paramValue + 1;
                $url = htmlspecialcharsbx(
                    $APPLICATION->GetCurPageParam(
                        sprintf('%s=%s', $paramName, $paramValue),
                        array($paramName, 'AJAX_PAGE',)
                    )
                );
                echo sprintf('<div class="ajax-pager-wrap">
                      <a class="ajax-pager-link" data-wrapper-class="rests_block" href="%s"></a>
                  </div>',
                    $url);
            }
            ?>
            <!--RestartBuffer-->
        </div>


    </div>
</div>

