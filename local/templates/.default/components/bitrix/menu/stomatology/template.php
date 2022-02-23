<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul class="serviceMenu__list">

<?
$previousLevel = 0;
foreach($arResult as $arItem):?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li class="serviceMenu__element menu-item--expanded<?if ($arItem["SELECTED"]):?> menu-item--active-trail<?endif?>">
                <a href="<?=$arItem["LINK"]?>" class="serviceMenu__linck"><?=$arItem["TEXT"]?></a>
            <span class="menu_ml<?if ($arItem["SELECTED"]):?> sub_open<?else:?> sub_close<?endif?>"></span>
            <ul class="serviceMenu__list">
		<?else:?>
			<li class="serviceMenu__element <?if ($arItem["SELECTED"]):?> menu-item--active-trail<?endif?>">
                <a href="<?=$arItem["LINK"]?>" class="serviceMenu__linck"><?=$arItem["TEXT"]?></a>
				<ul>
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="serviceMenu__element menu-item--expanded<?if ($arItem["SELECTED"]):?> menu-item--active-trail<?endif?>">
                    <a href="<?=$arItem["LINK"]?>" class="serviceMenu__linck"><?=$arItem["TEXT"]?></a>
                </li>
			<?else:?>
				<li class="serviceMenu__element menu-item--expanded<?if ($arItem["SELECTED"]):?> menu-item--active-trail<?endif?>">
                    <a href="<?=$arItem["LINK"]?>" class="serviceMenu__linck"><?=$arItem["TEXT"]?></a>
                </li>
			<?endif?>

		<?else:?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="serviceMenu__element menu-item--expanded<?if ($arItem["SELECTED"]):?> menu-item--active-trail<?endif?>">
                    <a href="" class="serviceMenu__linck" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a>
                </li>
			<?else:?>
				<li class="serviceMenu__element menu-item--expanded<?if ($arItem["SELECTED"]):?> menu-item--active-trail<?endif?>">
                    <a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a>
                </li>
			<?endif?>

		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

</ul>
<?endif?>