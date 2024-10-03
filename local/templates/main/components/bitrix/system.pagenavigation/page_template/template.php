<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

<? if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}
$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
?>
<div class="pagination load_more_too_<? echo $arResult['NavNum']?>">
<div class="container">
<div class="pagination__list">
 <div class="pagination__inner">

	<?// ссылка на первую страницу
	$firstPageUrl = $arResult['sUrlPath'];
	if (!empty($arResult['NavQueryString'])) {
	$firstPageUrl = $firstPageUrl.'?'.$arResult['NavQueryString'];
	}
	// ссылка на последнюю страницу
	$lastPageUrl = $arResult['sUrlPath'];
	if (!empty($arResult['NavQueryString'])) {
	$lastPageUrl = $lastPageUrl.'?'.$arResult['NavQueryString'].'&PAGEN_'.$arResult['NavNum'].'='.$arResult['NavPageCount'];
	} else {
	$lastPageUrl = $lastPageUrl.'?PAGEN_'.$arResult['NavNum'].'='.$arResult['NavPageCount'];
	}?>

	<?php if ($arResult['NavPageNomer'] > 1): /* ссылка на первую страницу */ ?>
	<a href="<?= $firstPageUrl ?>" title="Первая" class="pagination__item btn">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
			<path d="M14.9998 19.9201L8.47984 13.4001C7.70984 12.6301 7.70984 11.3701 8.47984 10.6001L14.9998 4.08008" stroke="#262531" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
		</svg>
    </a>
	<?php endif; ?>
	<?php for ($i = $arResult['nStartPage']; $i <= $arResult['nEndPage']; $i++): ?>
	<?php
	// ссылка на очередную страницу
	$pageUrl = $arResult['sUrlPath'];
	if (!empty($arResult['NavQueryString'])) {
	$pageUrl = $pageUrl.'?'.$arResult['NavQueryString'].'&PAGEN_'.$arResult['NavNum'].'='.$i;
	} else {
	$pageUrl = $pageUrl.'?PAGEN_'.$arResult['NavNum'].'='.$i;
	}
	?>
	<?php if ($arResult['NavPageNomer'] == $i): /* если это текущая страница */ ?>
	<span class="pagination__item btn active"><?= $i; ?></span>
	<?php else: ?>
	<a href="<?= $pageUrl; ?>" class="pagination__item btn"><?= $i; ?></a>
	<?php endif; ?>
	<?php endfor; ?>
	<?php if ($arResult['NavPageNomer'] < $arResult['NavPageCount']): /* ссылка на последнюю страницу */ ?>
	<a href="<?= $lastPageUrl; ?>" title="Последняя" class="pagination__item btn">
		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M8.91016 19.9201L15.4302 13.4001C16.2002 12.6301 16.2002 11.3701 15.4302 10.6001L8.91016 4.08008" stroke="#262531" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
		</svg>
	</a>
	<?php endif; ?>

 </div>
</div>
</div>
</div>