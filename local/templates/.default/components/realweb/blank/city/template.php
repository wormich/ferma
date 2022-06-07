<?php
use Realweb\Site\ArrayHelper;
use Realweb\Site\Site;

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
<?php if (Site::getInstance()->getCity()): ?>
    <li class="nav-item <?php echo ArrayHelper::getValue($arParams, 'CLASS'); ?>">
        <a class="nav-link js-popover-city"
           data-container="header"
           data-toggle="popover"
           title="Ваш город"
           data-html="true"
           data-content="<div><?php echo Site::getInstance()->getCity()->getUfName(); ?></div><a href='#' data-id='<?php echo Site::getInstance()->getCity()->getId(); ?>' data-popover='.js-popover-city' class='btn btn-white btn-white_outer sm js-confirm-city'>Да</a> &nbsp; <a data-toggle='modal' href='#cityModal' class='btn btn-white btn-white_outer sm'>Изменить</a>"
           data-placement="bottom"
           href="javascript: void(0)"><i
                    class="fas fa-map-marker-alt"></i>&nbsp; <?php echo Site::getInstance()->getCity()->getUfName(); ?>
        </a>
    </li>
<?php endif; ?>