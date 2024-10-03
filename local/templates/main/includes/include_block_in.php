<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if (CModule::IncludeModule("iblock")){
	$str = CIBlockElement::GetList(
    [], ['IBLOCK_ID' => 20, 'ID' => 52],
    false, false,
    ['ID', 'PREVIEW_TEXT', 'DETAIL_TEXT', 'PROPERTY_LOGO']
	);
	while ($res = $str->GetNext()) {
		$StrPREVIEW_TEXT = $res["PREVIEW_TEXT"];
		$StrDETAIL_TEXT = $res["DETAIL_TEXT"];
		$StrPROPERTY_LOGO = $res["PROPERTY_LOGO_VALUE"];
  }
} ?>

		<section class="residents" data-scroll-section data-scroll-id="<?=$arParams["BLOCK_SCROLL"]?>">
          <div class="container">
            <h2 class="title__h2">
              Являемся резидентами
            </h2>
            <div class="residents__list">
				<?foreach($StrPROPERTY_LOGO as $arId):
					$arFile = CFile::GetFileArray($arId);
					$arImage = CFile::ResizeImageGet($arId, array("width" => 256, "height" => 86), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false);?>
					<div class="residents__list-item">
						<img src="<?=$arImage['src'];?>" alt="<?=$arFile['DESCRIPTION'];?>" title="<?=$arFile['DESCRIPTION'];?>">
					</div>
				<?endforeach;?>
            </div>
          </div>
        </section>