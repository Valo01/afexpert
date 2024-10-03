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
	$arImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array("width" => 500, "height" => 400), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false);?>

			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="production__slider-item swiper-slide">
                  <div class="production__slider-item-title">
                    <div class="production__slider-item-link">
                      <img class="inject_svg" src="<?=CFile::GetPath($arItem["PROPERTIES"]["ICON"]["VALUE"]);?>" alt="icon">
                    </div>
                  </div>
                  <div class="production__slider-item-bot">
                    <h4><?=$arItem["NAME"];?></h4>
                  </div>
                  <img src="<?=$arImage['src'];?>" alt="image">
			</a>

<?endforeach;?>
