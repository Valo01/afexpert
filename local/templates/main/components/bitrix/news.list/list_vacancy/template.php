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

<? //if($USER->IsAdmin()) { echo "<pre>"; print_r($arResult); echo "</pre>"; } ?>

<?if($arResult["ITEMS"]):?>
	<?foreach($arResult["ITEMS"] as $arItem):?>
	
				<a class="vacancySingle" href="<?=$arItem["DETAIL_PAGE_URL"]?>">
					<div class="vacancySingle__inner">
					  <div class="vacancySingle__title"><?=$arItem["NAME"];?></div>
					  <div class="vacancySingle__location"><?=$arItem["PREVIEW_TEXT"]?></div>
					</div>
					<div class="vacancySingle__icon">
					  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
						<path d="M15.832 5.08398L4.16536 16.7507" stroke="#4B23EB" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M15.832 13.6423V5.08398H7.2737" stroke="#4B23EB" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
					  </svg>
					</div>
				</a>
	
	<?endforeach;?>
<?else:?>
	<h3 class="title__h3">Сейчас нет активных вакансий</h3>
<?endif;?>