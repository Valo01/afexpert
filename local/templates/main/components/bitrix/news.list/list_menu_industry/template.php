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

<?foreach($arResult["ITEMS"] as $arItem):
	$arImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array("width" => 1280, "height" => 570), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false);?>

			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="submenu__card">
				<img class="submenu__card-img" src="<?=$arImage['src'];?>">
				<p class="submenu__card-title"><?=$arItem["NAME"];?></p>
				<img class="submenu__card-goto" src="<?= SITE_TEMPLATE_PATH ?>/assets/icons/arrow-link.svg">
            </a>

<?endforeach;?>
