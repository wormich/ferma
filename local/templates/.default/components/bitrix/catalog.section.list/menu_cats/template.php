<? foreach ($arResult['SECTIONS'] as &$arSection) { ?>

<?php
$class = 'secondary';

if ($arSection['CODE'] == $arParams['CURRENT_SECTION']) {

    $class = 'primary';
}

?>

<a href="<?= $arSection['SECTION_PAGE_URL'] ?>"
   class="btn btn-outline-<?= $class; ?> rounded-1 iq-fetch-details">
    <img src="<?=$arSection['PICTURE']['SRC']?>" alt="header" class="img-fluid rounded-pill mb-3"><br>
    <? echo $arSection['NAME']; ?></a>


    <? } ?>


