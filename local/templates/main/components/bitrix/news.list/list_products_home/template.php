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
use \Bitrix\Main\{ Application, IO };
?>

<? //if($USER->IsAdmin()) { echo "<pre>"; print_r($arResult); echo "</pre>"; } ?>

<div class="swiper-wrapper">

<?foreach($arResult["ITEMS"] as $arItem):
	$arImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array("width" => 600, "height" => 600), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false);?>
	<?if($arItem["PROPERTIES"]["HOME"]["VALUE"]=='Да'): $index++;?>
			<div class="products__product product swiper-slide product--<?=$index;?>">
                    <div class="product__number"><?=$index;?></div>
                    <div class="product__content product__content--<?=$index;?>">
                      <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="product__content-title">
                        <?=$arItem["NAME"];?>
                      </a>
                      <div class="product__content-wrapper">

						<?if($arItem["PROPERTIES"]["OPTIONS"]["VALUE"]):
							usort($arItem["PROPERTIES"]["OPTIONS"]["VALUE"], function($a, $b) {
								return $a["SUB_VALUES"]["OPTIONS_sort"]["VALUE"] <=> $b["SUB_VALUES"]["OPTIONS_sort"]["VALUE"];
						}); endif;?>
						<?$indexsub=0; foreach($arItem["PROPERTIES"]["OPTIONS"]["VALUE"] as $arId): $indexsub++;?>
						  <?if($indexsub<=4):?>
							<div class="product__content-item">
							  <div class="product__content-item-line"><?=$arId["SUB_VALUES"]["OPTIONS_title"]["VALUE"];?></div>
							  <div class="product__content-item-line"><?=htmlspecialcharsBack($arId["SUB_VALUES"]["OPTIONS_text"]["VALUE"]["TEXT"]);?></div>
							</div>
				 		  <?endif;?>
						<?endforeach;?>

                        <div class="product__content-item">
                          <div class="product__content-item-line">
                            Сферы применения
                          </div>
                          <div class="product__content-item-buttons">

							<?foreach($arItem["PROPERTIES"]["AREAS"]["VALUE"] as $arId):?>
								<?$resElement = CIBlockElement::GetList(
									[],['IBLOCK_ID' => 5,'ID' => $arId],
									false, false,
									['ID','NAME','PROPERTY_ICON']
								);?>
								<button>
								  <img class="inject_svg" src="<?if($ar_res = $resElement->GetNext()) echo CFile::GetPath($ar_res["PROPERTY_ICON_VALUE"]);?>" alt="icon">
								  <div class="product__content-item-button-tooltip">
								  <p><?=$ar_res["NAME"];?></p>
								  </div>
								</button>
							<?endforeach;?>

                          </div>
                        </div>
                      </div>
                    </div>
                    <img class="render-img--mobile" src="<?=$arImage['src'];?>" alt="image">
                    <canvas class="product__img product__img--<?=$index;?>" id="renderProduct<?=$index;?>"></canvas>
              </div>
	<?endif;?>
<?endforeach;?>

</div>
<div class="products-slider__controls">
		<div class="slick-prev slick-arrow"></div>
		<div class="swiper-pagination"></div>
		<div class="slick-next slick-arrow"></div>
        <!--Добаваляем на страницу рендеры, чтобы вебпак их загрузил на прод при сборке.-->
		<div class="images" style="display:none;">
			<?foreach($arResult["ITEMS"] as $arItem):?>
			  <?if($arItem["PROPERTIES"]["HOME"]["VALUE"]=='Да'):?>
				<? if($arItem["PROPERTIES"]["MODEL3D_PACH"]["VALUE"]):?>
					<?$iterator = new \RecursiveIteratorIterator(
						new \RecursiveDirectoryIterator(Application::getDocumentRoot() . $arItem["PROPERTIES"]["MODEL3D_PACH"]["VALUE"], \RecursiveDirectoryIterator::SKIP_DOTS | \FilesystemIterator::FOLLOW_SYMLINKS),\RecursiveIteratorIterator::SELF_FIRST
					);?>
					<?$index=0; foreach($iterator as $item) { $index++;
						if ($item->isFile()) {
							$file = new IO\File($item->getPathname());
							echo \sprintf('<img alt="image" src="%s">', \str_replace(Application::getDocumentRoot(), '', $file->getPath()), $file->getName());
						}
					}?>
				<?endif;?>
			  <?endif;?>
			<?endforeach;?>
			<img src="<?= SITE_TEMPLATE_PATH ?>/assets/images/icon-map.png" alt="image">
		</div>
</div>

<script>
	document.addEventListener('DOMContentLoaded', function(){

			<?$info=[]; foreach($arResult["ITEMS"] as $arItem):?>
			  <?if($arItem["PROPERTIES"]["HOME"]["VALUE"]=='Да'):?>
				<? if($arItem["PROPERTIES"]["MODEL3D_PACH"]["VALUE"]):?>
					<?$info[]=$arItem["PROPERTIES"]["MODEL3D_PACH"]["VALUE"];?>
				<?endif;?>
			  <?endif;?>
			<?endforeach;?>

			var product_info = [
				<?$index=0; foreach($info as $Item):?>
					{'upload': '<?=$Item;?>'}
				<?$length=count($info); $index++; if($length!=$index){echo',';};?>
			  <?endforeach;?>
		   ];
			var product_col = <?=$length?>;

		sessionStorage.setItem("import_info", JSON.stringify(product_info));
		sessionStorage.setItem("import_col", product_col);
		const eventproduct = new StorageEvent('storage', {key: 'import_info',key: 'import_col'});
		window.dispatchEvent(eventproduct);
	});
</script>
