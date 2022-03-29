<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '<div class="card dish-card3"><div class="card-body "><nav aria-label="breadcrumb"><ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">';


$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++){
        $strReturn.= '  <li  itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1){
		$strReturn .= '<a itemprop="item" href="'.$arResult[$index]["LINK"].'" > <span itemprop="name">'.$title.'</span></a>';
	}else{
                $strReturn .= '<link itemprop="item" href="'.$APPLICATION->GetCurPage(false).'" />';
		$strReturn .= '<span  itemprop="name">'.$title.'</span>';
	}
        $strReturn .= '   <meta itemprop="position" content="'.($index + 2).'" />';
        $strReturn.= '  </li>';
}

$strReturn .= '</ol></nav></div></div>';

return $strReturn;
?>