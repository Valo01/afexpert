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

<?foreach($arResult["ITEMS"] as $arItem):?>

		<?$arIdres = CFile::GetFileArray($arItem["PROPERTIES"]["FILE"]["VALUE"]);?>
			<a class="a-document loadmore_item_too" href="<?=$arIdres['SRC'];?>" data-modal-gallery="el-gallery">
              <div class="a-document__block-head">
                <span class="a-document__size"><?=$arIdSIZE=CFile::FormatSize($arIdres['FILE_SIZE']);?></span>
                <h3 class="a-document__name"><?=$arItem['NAME'];?></h3>
              </div>
              <div class="a-document__block-image">
                <img class="a-document__icon" src="<?= SITE_TEMPLATE_PATH ?>/assets/images/eye.png" alt="иконка глаза">
                <img class="a-document__image" src="<?=$arIdres['SRC'];?>" alt="<?=$arItem['NAME'];?>">
              </div>
            </a>

<?endforeach;?>

<?=$arResult["NAV_STRING"]?>