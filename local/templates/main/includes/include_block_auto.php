<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if (CModule::IncludeModule("iblock")){
	$str = CIBlockElement::GetList(
    [], ['IBLOCK_ID' => 19],
    false, false,
    ['ID', 'PREVIEW_TEXT', 'DETAIL_TEXT', 'PROPERTY_BLOCK', 'PROPERTY_BLOCK_FOTO', 'PROPERTY_BLOCK_ICON', 'PROPERTY_BLOCK_TITLE', 'PROPERTY_BLOCK_TEXT']
	);
	while ($res = $str->GetNext()) {
		$StrPREVIEW_TEXT = $res["PREVIEW_TEXT"];
		$StrDETAIL_TEXT = $res["DETAIL_TEXT"];
		$StrPROPERTY_BLOCK = $res["PROPERTY_BLOCK_VALUE"];
  }
} ?>

	<section class="meridianInfo" data-scroll-section data-scroll-id="<?=$arParams["BLOCK_SCROLL"]?>">
          <div class="container">
            <h2 class="h2__title">
              <span>«Меридиан автоматизация»</span>
              <span>производит промышленное</span>
              <span>оборудование</span>
            </h2>
            <div class="meridianInfo__container">
              <div class="meridianInfo__slider">
                <div class="swiper-wrapper">

					<?foreach($StrPROPERTY_BLOCK as $arId):?>
					  <div class="meridianInfo__item swiper-slide" style="background-image: url(<?echo CFile::GetPath($arId["SUB_VALUES"]["BLOCK_FOTO"]["VALUE"]);?>);">
						<img src="<?echo CFile::GetPath($arId["SUB_VALUES"]["BLOCK_ICON"]["VALUE"]);?>" alt="icon">
						<?if ($arId["SUB_VALUES"]["BLOCK_URL"]["VALUE"]):?>
							<a href="<?=$arId["SUB_VALUES"]["BLOCK_URL"]["VALUE"];?>" class="meridianInfo__item-title">
							  <?=$arId["SUB_VALUES"]["BLOCK_TITLE"]["VALUE"];?>
							</a>
						<?else:?>
							<h4 class="meridianInfo__item-title">
							  <?=$arId["SUB_VALUES"]["BLOCK_TITLE"]["VALUE"];?>
							</h4>
						<?endif;?>
						<p class="meridianInfo__item-text">
						  <?=$arId["SUB_VALUES"]["BLOCK_TEXT"]["VALUE"];?>
						</p>
					  </div>
					<?endforeach;?>

                </div>
                <div class="slick-next slick-arrow">
                </div>
                <div class="slick-prev slick-arrow">
                </div>
                <div class="swiper-pagination">
                </div>
              </div>
            </div>
          </div>
	</section>
