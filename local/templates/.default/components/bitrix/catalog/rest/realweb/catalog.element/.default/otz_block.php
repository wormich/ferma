

<?
$arFilterOtz = ['IBLOCK_ID' => $OTZ_IBLOCK, 'PROPERTY_REST_VALUE' => $arResult['ID'], "ACTIVE_DATE" => "Y", "ACTIVE" => "Y"];
$otzivy = \Realweb\Site\Site::getIBlockElements($arFilterOtz);
?>
<? foreach ($otzivy as $otz) { ?>
<?php
    $rate= $otz['PROPERTIES']["RATING"]["VALUE"];
    if ($rate<5){
        $or=5-$rate;
    }
    $sdate=time()-strtotime($otz['DATE_ACTIVE_FROM']);

    if ($sdate<24*3600){

        $rd='сегодня';
    }

    if ($sdate>24*3600&&$sdate<7*24*3600){
        $days=round($sdate/(24*3600));
        $rd=$days.' дней назад';

    }
    if ($sdate>7*24*3600){

        $rd=date('d.m.Y',strtotime($otz['DATE_ACTIVE_FROM']));
    }
    ?>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-xl-2">
                    <small class="heading-title fw-bolder text-dark ms-3 ms-lg-0"><?=$otz['NAME'];?></small>
                </div>
                <div class="col-lg-9 col-xl-10 ps-lg-0">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex">
                            <small class="text-dark fw-bolder me-1"><?=$rate;?></small>
                            <?for($ir=1;$ir<=$rate;$ir++){?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18px" fill="orange" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                            </svg>
                            <?}?>
                            <?for($ir=1;$ir<=$or;$ir++){?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18px" fill="none" viewBox="0 0 24 24"
                                 stroke="currentcolor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                            </svg>
<?}?>
                        </div>
                        <small class="text-primary"><?=$rd;?></small>
                    </div>


                    <p><?=$otz['PREVIEW_TEXT'];?></p>

                </div>

            </div>
        </div>
    </div>
<? } ?>