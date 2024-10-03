<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */
global $APPLICATION;
//delayed function must return a string
if(empty($arResult))  return "";

$strReturn = '';

$strReturn .= '<div class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{	if($itemSize<=2){ $itemIndex = 0; }else{ $itemIndex = 1; };
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	$arrow = ($index > 0? '<span class="breadcrumbs__item breadcrumbs__link"> / </span>' : '');

	if($arResult[$index]["LINK"] <> "" && $index <= $itemIndex)
	{
		$strReturn .= '
			<div class="bx-breadcrumb-item" id="bx_breadcrumb_'.$index.'" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" style="display: inline;">
				'.$arrow.'
				<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" class="breadcrumbs__item breadcrumbs__link" itemprop="item">
					<span itemprop="name">'.$title.'</span>
				</a>
				<meta itemprop="position" content="'.($index + 1).'" />
			</div>';
	}
	else
	{	if($index == $itemSize-1):
		$strReturn .= '
			<div class="bx-breadcrumb-item" style="display: inline;">
				'.$arrow.'
				<span class="breadcrumbs__item breadcrumbs__text">'.$title.'</span>
			</div>';
	endif; }
}

$strReturn .= '</div>';

return $strReturn;
?>