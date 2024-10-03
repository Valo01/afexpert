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
	$arImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array("width" => 500, "height" => 500), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false);?>

			<?$arImageBig = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"]["ID"], array("width" => 560, "height" => 390), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false);?>
              <div class="a-product-card loadmore_item_too">
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="a-product-card__header">
                  <span class="a-product-card__desc"><?=$arItem["PROPERTIES"]["TITLE"]["VALUE"];?></span>
                  <h4 class="a-product-card__title"><?=$arItem["NAME"];?></h4>
                </a>
                <div class="a-product-card__scope-application">
                  <span class="a-product-card__title-scope-application">Область применения</span>
                  <ul class="a-product-card__list-scope-application list-reset">
					<?$index=0; foreach($arItem["PROPERTIES"]["AREAS"]["VALUE"] as $arId): $index++;?>
						<?if($index<=4):?>
							<li>
								<?$resElement = CIBlockElement::GetList(
									[],['IBLOCK_ID' => 5,'ID' => $arId],
									false, false,
									['ID','NAME','PROPERTY_ICON']
								);?>
								<img class="inject_svg" src="<?if($ar_res = $resElement->GetNext()) echo CFile::GetPath($ar_res["PROPERTY_ICON_VALUE"]);?>" alt="icon">
								<span><?=$ar_res["NAME"];?></span>
							</li>
						<?endif;?>
						<?$length = count($arItem["PROPERTIES"]["AREAS"]["VALUE"]); if($index==$length):?>
							<?if($index>=5):?>
								<li><div class="product__button-empty">+<?=$length=$length-4;?></div></li>
							<?endif;?>
						<?endif;?>
					<?endforeach;?>
                  </ul>
                </div>
                <div class="a-product-card__wrap-info">
                  <div class="a-product-card__block-image">
                    <img class="a-product-card__image" src="<?=$arImage['src'];?>" alt="<?=$arItem["NAME"];?>">
                  </div>
                  <button class="a-product-card__btn-spec btn-reset">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                      <path d="M11 11.5V5.5H13V11.5H19V13.5H13V19.5H11V13.5H5V11.5H11Z" fill="#4B23EB"/>
                    </svg>
                    <span>Показать характеристики</span>
                  </button>
                  <div class="a-product-card__spec">
                    <button class="a-product-card__btn-spec btn-reset">
                      <span>Скрыть характеристики</span>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M5 11V13H19V11H5Z" fill="#4B23EB" />
                      </svg>
                    </button>
                    <ul class="a-product-card__spec-list list-reset">
					  <?if($arItem["PROPERTIES"]["OPTIONS"]["VALUE"]):?>
						<?usort($arItem["PROPERTIES"]["OPTIONS"]["VALUE"], function($a, $b) {
							return $a["SUB_VALUES"]["OPTIONS_sort"]["VALUE"] <=> $b["SUB_VALUES"]["OPTIONS_sort"]["VALUE"];
						});?>
						<?$indexsub=0; foreach($arItem["PROPERTIES"]["OPTIONS"]["VALUE"] as $arId): $indexsub++;?>
							<?if($indexsub<=4):?>
							  <li>
								<span><?=$arId["SUB_VALUES"]["OPTIONS_title"]["VALUE"];?></span>
								<span><?=htmlspecialcharsBack($arId["SUB_VALUES"]["OPTIONS_text"]["VALUE"]["TEXT"]);?></span>
							  </li>
							<?endif;?>
						<?endforeach;?>
        			  <?endif;?>
                    </ul>
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="a-product-card__spec-link">
                      <span>Подробнее</span>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z" fill="#4B23EB" />
                      </svg>
                    </a>
                  </div>
                </div>
              </div>

<?endforeach;?>

<?=$arResult["NAV_STRING"]?>
