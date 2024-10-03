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
	$arImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array("width" => 600, "height" => 600), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false);
	$res = CIBlockSection::GetByID($arItem['IBLOCK_SECTION_ID']); $ar_res = $res->GetNext();?>

		<?if($arItem["PROPERTIES"]["STYLE"]["VALUE"]=="card-file"):
			$arImageBig = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array("width" => 1200, "height" => 1200), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);?>
			<a class="production__slider-item swiper-slide pressList__card--default--letter loadmore_item_too" href="<?=$arImageBig['src'];?>" data-modal-gallery="el-gallery">
				<div class="pressList__card-content">
                    <div class="pressList__card-content-inner">
                      <div class="pressList__card-content-date">
                        <?=$arItem["PROPERTIES"]["DATE"]["VALUE"];?>
                      </div>
                      <div class="pressList__card-content-title">
                        <?=$arItem["VALUE"];?>
                      </div>
                    </div>
                    <div class="pressList__card-content-tags">
                        <?foreach($arItem["PROPERTIES"]["TAGS_LIST"]["VALUE"] as $arId):?>
						  <span class="pressList__card-content-tags-item">
							<?=$arId;?>
						  </span>
						<?endforeach;?>
                    </div>
                </div>
                <img class="pressList__card-img" src="<?=$arImage['src'];?>" alt="img">
            </a>
		<?elseif($arItem["PROPERTIES"]["STYLE"]["VALUE"]=="big-photo"):?>
			<div class="production__slider-item swiper-slide">
				<? if($arImage['src']):?><img src="<?=$arImage['src'];?>" class="pressList__card-content-img" alt="image"><?endif;?>
				<div class="pressList__card-content">
                  <div class="pressList__card-content-inner">
                      <div class="pressList__card-content-date">
                        <?=$arItem["PROPERTIES"]["DATE"]["VALUE"];?>
                      </div>
                      <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="pressList__card-content-title">
                        <?=$arItem["NAME"];?>
                      </a>
                  </div>
                  <div class="pressList__card-content-tags">
						<div class="pressList__card-content-tags-inner">
							<?foreach($arItem["PROPERTIES"]["TAGS_LIST"]["VALUE"] as $arId):?>
							  <span class="pressList__card-content-tags-item">
								<?=$arId;?>
							  </span>
							<?endforeach;?>
						</div>	
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
            </div>
		<?elseif($arItem["PROPERTIES"]["STYLE"]["VALUE"]=="big-card" && $arParams["BLOCK_MORE"]!="YES"):?>
			<div class="production__slider-item swiper-slide">
				<? if($arImage['src']):?><img src="<?=$arImage['src'];?>" class="pressList__card-content-img" alt="image"><?endif;?>
				<div class="pressList__card-content">
                  <div class="pressList__card-content-inner">
                      <div class="pressList__card-content-date">
                        <?=$arItem["PROPERTIES"]["DATE"]["VALUE"];?>
                      </div>
                      <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="pressList__card-content-title">
                        <?=$arItem["NAME"];?>
                      </a>
                  </div>
                  <div class="pressList__card-content-tags">
						<div class="pressList__card-content-tags-inner">
							<?foreach($arItem["PROPERTIES"]["TAGS_LIST"]["VALUE"] as $arId):?>
							  <span class="pressList__card-content-tags-item">
								<?=$arId;?>
							  </span>
							<?endforeach;?>
						</div>	
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
            </div>
		<?else:?>
			<div class="production__slider-item swiper-slide">
				<? if($arImage['src']):?><img src="<?=$arImage['src'];?>" class="pressList__card-content-img" alt="image"><?endif;?>
				<div class="pressList__card-content">
                  <div class="pressList__card-content-inner">
                      <div class="pressList__card-content-date">
                        <?=$arItem["PROPERTIES"]["DATE"]["VALUE"];?>
                      </div>
                      <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="pressList__card-content-title">
                        <?=$arItem["NAME"];?>
                      </a>
                  </div>
                  <div class="pressList__card-content-tags">
						<div class="pressList__card-content-tags-inner">
							<?foreach($arItem["PROPERTIES"]["TAGS_LIST"]["VALUE"] as $arId):?>
							  <span class="pressList__card-content-tags-item">
								<?=$arId;?>
							  </span>
							<?endforeach;?>
						</div>	
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
            </div>
		<?endif;?>
<?endforeach;?>
