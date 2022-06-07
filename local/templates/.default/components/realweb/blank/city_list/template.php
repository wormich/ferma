<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Application;
use Bitrix\Main\Web\Cookie;
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

/** @var \Realweb\Site\Table\EO_City $obItem */

use Realweb\Site\ArrayHelper;
use Realweb\Site\Site;
$this->setFrameMode(true);
?>

<?php

$current = Site::getInstance()->getCity()->getId();

if (!($current) || empty($current)) {
    $current = 1;
}

?>

<li class="nav-item dropdown">
<? if ($arResult["ITEMS"]): ?>
    <? foreach ($arResult["ITEMS"] as $key => $obItem): ?>
        <? if ($obItem->getId() == $current) { ?>
            <a class="nav-link dropdown-toggle" href="#" id="currentCity" role="button" data-bs-toggle="dropdown" >
                <?php echo $obItem->getUfName(); ?>
            </a>
        <?php } ?>
    <? endforeach; ?>
    <ul class="dropdown-menu dropdown-menu-dark">
        <? foreach ($arResult["ITEMS"] as $key => $obItem): ?>
            <li class="store__item"><a data-data='<?php echo json_encode(array(
                    'ID' => $obItem->getId(),
                    'action' => 'Action_changeCity'
                )); ?>' class="dropdown-item js-ajax-link"
                                       href="javascript: void();"><?php echo $obItem->getUfName(); ?></a>
            </li>

        <? endforeach; ?>
    </ul>

<? endif; ?>
</li>
