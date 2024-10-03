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

		<div class="cases__slider-item swiper-slide loadmore_item_too">
                <img class="cases__bg" src="<?=$arImage['src'];?>" alt="background">
                <div class="cases__slider-item-wrp">
                  <div class="cases__top">
                    <div class="cases__brand">
                      <div class="cases__brand-inner">
                        <div class="cases__brand-name"><?=$arItem["PROPERTIES"]["CLIENT"]["VALUE"];?></div>
                      </div>
                      <div class="cases__brand-separator">
                      </div>
                      <div class="cases__year"><?=$arItem["PROPERTIES"]["YEAR"]["VALUE"];?> г</div>
                    </div>
                  </div>
                  <div class="cases__bot">
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="cases__name"><?=$arItem["NAME"];?></a>
					<? if(($arItem["PROPERTIES"]["VIDEO"]["VALUE"]) OR ($arItem["PROPERTIES"]["VIDEO_URL"]["VALUE"])):?>
						<?if($arItem["PROPERTIES"]["VIDEO"]["VALUE"]):?> 
							<span class="btn__play-video" data-video='{"source": [{"src":"<?echo CFile::GetPath($arItem["PROPERTIES"]["VIDEO"]["VALUE"]);?>", "type":"video/mp4"}], "tracks": [], "attributes": {"preload": false, "controls": true, "playsinline": true}}' data-poster="<?=CFile::GetPath($arItem["PROPERTIES"]["VIDEO_FON"]["VALUE"]);?>" data-modal-gallery="el-gallery">
							  <img src="<?= SITE_TEMPLATE_PATH ?>/assets/icons/play.svg" alt="play">
							</span>
						<?else:?> 
							<span class="btn__play-video" data-src="<?echo $arItem["PROPERTIES"]["VIDEO_URL"]["VALUE"];?>" data-modal-gallery="el-gallery">
							  <img src="<?= SITE_TEMPLATE_PATH ?>/assets/icons/play.svg" alt="play">
							</span>
						<?endif;?>
					<?endif;?>
                  </div>
                </div>
                <div class="cases__bot-mob">
                  <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="cases__name-mob"><?=$arItem["NAME"];?></a>
                </div>
		</div>

<?endforeach;?>

<?=$arResult["NAV_STRING"]?>
