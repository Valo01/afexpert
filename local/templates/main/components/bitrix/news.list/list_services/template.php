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

<? foreach($arResult["ITEMS"] as $arItem): $num++;
	$arImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array("width" => 600, "height" => 400), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false);?>

			<a class="a-service-card" href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>">
              <div class="a-service-card__block-info">
                <div class="a-service-card__block-title">
                  <h3 class="a-service-card__title"><?=$arItem["NAME"];?><sup>0<?=$num?></sup></h3>
                </div>
                <span class="a-service-card__desc"><?=$arItem["PREVIEW_TEXT"]?></span>
              </div>
              <div class="a-service-card__block-image">
                <img class="a-service-card__image" src="<?=$arImage['src'];?>" alt="<?=$arItem["NAME"];?>">
              </div>
            </a>

<?endforeach;?>
