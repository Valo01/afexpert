<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if (CModule::IncludeModule("iblock")){
	$str = CIBlockElement::GetList(
    [], ['IBLOCK_ID' => 21, 'ID' => 51],
    false, false,
    ['ID', 'PREVIEW_TEXT', 'DETAIL_TEXT', 'PROPERTY_LOGO']
	);
	while ($res = $str->GetNext()) {
		$StrPREVIEW_TEXT = $res["PREVIEW_TEXT"];
		$StrDETAIL_TEXT = $res["DETAIL_TEXT"];
		$StrPROPERTY_LOGO = $res["PROPERTY_LOGO_VALUE"];
  }
} ?>

		<section class="brands" data-scroll-section data-scroll-id="<?=$arParams["BLOCK_SCROLL"]?>">
          <div class="container">
            <h2 class="title__h2">
              Работаем с лидерами рынка
            </h2>
          </div>
          <div class="brands__line">
            <div class="brands__line-items-wrap">
              <div class="brands__line-items marquee">
				<?foreach($StrPROPERTY_LOGO as $arId):
					$arFile = CFile::GetFileArray($arId);
					$arImage = CFile::ResizeImageGet($arId, array("width" => 170, "height" => 60), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false);?>
					<a class="brands__line-item brands__line-item-content">
					  <img src="<?=$arImage['src'];?>" alt="<?=$arFile['DESCRIPTION'];?>" title="<?=$arFile['DESCRIPTION'];?>">
					</a>
					<!--.brands__line-item.brands__line-item--separator-->
				<?endforeach;?>
              </div>
              <div class="brands__line-items marquee" aria-hidden="true">
				<?foreach($StrPROPERTY_LOGO as $arId):
					$arFile = CFile::GetFileArray($arId);
					$arImage = CFile::ResizeImageGet($arId, array("width" => 170, "height" => 60), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false);?>
					<a class="brands__line-item brands__line-item-content">
					  <img src="<?=$arImage['src'];?>" alt="<?=$arFile['DESCRIPTION'];?>" title="<?=$arFile['DESCRIPTION'];?>">
					</a>
					<!--.brands__line-item.brands__line-item--separator-->
				<?endforeach;?>
              </div>
              <div class="brands__line-items marquee" aria-hidden="true">
				<?foreach($StrPROPERTY_LOGO as $arId):
					$arFile = CFile::GetFileArray($arId);
					$arImage = CFile::ResizeImageGet($arId, array("width" => 170, "height" => 60), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false);?>
					<a class="brands__line-item brands__line-item-content">
					  <img src="<?=$arImage['src'];?>" alt="<?=$arFile['DESCRIPTION'];?>" title="<?=$arFile['DESCRIPTION'];?>">
					</a>
					<!--.brands__line-item.brands__line-item--separator-->
				<?endforeach;?>
              </div>
            </div>
          </div>
        </section>