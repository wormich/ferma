<?
$arFilter = ['IBLOCK_ID' => $MENU_IBLOCK, 'UF_RES' => $arResult['ID']];
$sects = \Realweb\Site\Site::getSections($arFilter, false, true);
$popular = \Realweb\Site\Catalog::get_popular($arResult['ID']);

?>

    <nav class="card-body">
        <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav nav-fill w-100">
                <? if (count($popular) > 0) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#menucat_popular">Популярные блюда</a>
                    </li>
                <? } ?>
                <? $sects1 = array_slice($sects, 0, 5); ?>
                <? foreach ($sects1 as $key => $s) { ?>

                    <li class="nav-item">
                        <a class="nav-link <? if ($key == 0) { ?>active<? } ?>"
                           href="#menucat_<?= $s['ID']; ?>"

                        >
                            <?= $s["NAME"]; ?>
                        </a>
                    </li>
                <? } ?>
                <? if (count($sects) > 5) { ?>
                    <?

                    $sects2 = array_slice($sects, 5, count($sects) - 5);
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Еще...
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <? foreach ($sects2 as $key => $s) { ?>
                                <a class="dropdown-item" href="#menucat_<?= $s['ID']; ?>"><?= $s["NAME"]; ?></a>
                            <? } ?>


                        </div>
                    </li>
                <? } ?>
            </ul>
        </nav>
    </nav>
<? if (count($popular) > 0) { ?>
    <div class="row bluda_container  mt-2" id="menucat_popular">

        <div class="col-12">
            <h3 class="category_title">Популярные блюда <span>(<? echo count($popular); ?>)</span></h3>

        </div>
        <? foreach ($popular as $item) { ?>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mt-3">
                <div class="bludo">
                    <div class="bludo_image">
                        <div class="bludo_icons">
      <span class="icon me-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Вкусное">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
  <g id="vuesax_linear_weight" data-name="vuesax/linear/weight" transform="translate(-492 -508)">
    <g id="weight">
      <path id="Vector" d="M3,12c2.4,0,3-1.35,3-3V3c0-1.65-.6-3-3-3S0,1.35,0,3V9C0,10.65.6,12,3,12Z"
            transform="translate(506.18 514)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
            stroke-width="1"/>
      <path id="Vector-2" data-name="Vector"
            d="M3,12C.6,12,0,10.65,0,9V3C0,1.35.6,0,3,0S6,1.35,6,3V9C6,10.65,5.4,12,3,12Z"
            transform="translate(495.82 514)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
            stroke-width="1"/>
      <path id="Vector-3" data-name="Vector" d="M0,0H4.36" transform="translate(501.82 520)" fill="none" stroke="#fff"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
      <path id="Vector-4" data-name="Vector" d="M0,5V0" transform="translate(514.5 517.5)" fill="none" stroke="#fff"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
      <path id="Vector-5" data-name="Vector" d="M0,5V0" transform="translate(493.5 517.5)" fill="none" stroke="#fff"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
      <path id="Vector-6" data-name="Vector" d="M0,0H24V24H0Z" transform="translate(492 508)" fill="none" opacity="0"/>
    </g>
  </g>
</svg>

      </span>


                            <span class="icon me-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                  data-bs-original-title="Акция 1+1">
<svg xmlns="http://www.w3.org/2000/svg" width="37" height="21" viewBox="0 0 37 21">
  <text id="_1_1" data-name="1 + 1" transform="translate(0 17)" fill="#fff" font-size="16"
        font-family="SegoeUI, Segoe UI"><tspan x="0" y="0">1 + 1</tspan></text>
</svg>


      </span>

                        </div>


                        <?
                        $file = CFile::ResizeImageGet($item['PREVIEW_PICTURE'], array('width' => 346, 'height' => 231), BX_RESIZE_IMAGE_EXACT, true);

                        ?>

                        <img src="<?= $file['src']; ?>" class="img-fluid"
                             alt="Заказать <?= $item['NAME']; ?> с доставкой">
                    </div>

                    <span class="bludo_title">
                  <?= $item['NAME']; ?>

               </span>
                    <span class="bludo_desc">
                 <?= $item['PREVIEW_TEXT']; ?>
               </span>
                    <span class="bludo_footer">
<span class="d-flex justify-content-between mt-2 mb-2">
    <? if ($item['PROPERTIES']['OLD_PRICE']['VALUE'] > 0) { ?>
        <span class="old_price"><s><?= $item['PROPERTIES']['OLD_PRICE']['VALUE']; ?> &#x20bd;</s></span>
    <? } ?>
    <span class="bludo_price"><?= $item['PROPERTIES']['PRICE']['VALUE'] ?> &#x20bd;</span>
 <? if (empty($item['adds'])) { ?>
     <!-- У блюда нет добавок -->
     <button class="btn btn-sm  btn-primary rounded-pill product-buy-link" data-id="<?=$item['ID'];?>" data-weight="<?=$item['PROPERTIES']['WEIGHT']['VALUE'];?>">Заказать</button>
 <? } else { ?>
     <!-- Есть добавки -->
     <button class="btn btn-sm js-ajax-adds btn-primary rounded-pill" data-id="<?=$item['ID'];?>" data-weight="<?=$item['PROPERTIES']['WEIGHT']['VALUE'];?>" data-data='{"ID":<?=$item['ID'];?>,"action":"Action_showAdds"}' >Заказать</button>

 <? } ?>
</span>
</span>

                </div>

            </div>
        <? } ?>
    </div>
<? } ?>


<?
foreach ($sects as $key => $s) {

    $bluda = \Realweb\Site\Catalog::get_bluda_categ($s['ID']);
    ?>
    <div class="row bluda_container  mt-5" id="menucat_<?= $s['ID']; ?>">

        <div class="col-12">
            <h3 class="category_title"><?= $s['NAME'] ?> <span>(<?= count($bluda); ?>)</span></h3>
        </div>
        <?
        foreach ($bluda as $item) {
            ?>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mt-3">
                <div class="bludo">
                    <?
                    $file = CFile::ResizeImageGet($item['PREVIEW_PICTURE'], array('width' => 346, 'height' => 231), BX_RESIZE_IMAGE_EXACT, true);

                    ?>

                    <img src="<?= $file['src']; ?>" class="img-fluid" alt="Заказать <?= $item['NAME']; ?> с доставкой">


                    <span class="bludo_title">
         <?= $item['NAME']; ?>

               </span>
                    <span class="bludo_desc">
                 <?= $item['PREVIEW_TEXT']; ?>
               </span>
                    <span class="bludo_footer">
<span class="d-flex justify-content-between mt-2 mb-2">

     <? if ($item['PROPERTIES']['OLD_PRICE']['VALUE'] > 0) { ?>
         <span class="old_price"><s><?= $item['PROPERTIES']['OLD_PRICE']['VALUE']; ?> &#x20bd;</s></span>
     <? } ?>
    <span class="bludo_price"><?= $item['PROPERTIES']['PRICE']['VALUE'] ?> &#x20bd;</span>
    <? if (empty($item['adds'])) { ?>
        <!-- У блюда нет добавок -->
        <button class="btn btn-sm  btn-primary rounded-pill product-buy-link" data-id="<?=$item['ID'];?>" data-weight="<?=$item['PROPERTIES']['WEIGHT']['VALUE'];?>">Заказать</button>
    <? } else { ?>
        <!-- Есть добавки -->
        <button class="btn btn-sm js-ajax-adds btn-primary rounded-pill" data-id="<?=$item['ID'];?>" data-weight="<?=$item['PROPERTIES']['WEIGHT']['VALUE'];?>" data-data='{"ID":<?=$item['ID'];?>,"action":"Action_showAdds"}' >Заказать</button>

    <? } ?>
</span>
</span>

                </div>

            </div>
        <? } ?>

    </div>
<? } ?>