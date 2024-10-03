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
	$arImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array("width" => 600, "height" => 400), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false);?>

    		<a class="industry-solutions-list__item smooth-show" href="<?=$arItem["DETAIL_PAGE_URL"]?>" data-scroll data-scroll-offset="90" data-scroll-repeat>
                <img class="industry-solutions-list__item-img" src="<?=$arImage['src'];?>" alt="image">
                <div class="industry-solutions-list__item-inner">
                  <div class="industry-solutions-list__item-icon">
					  <img class="inject_svg" src="<?=CFile::GetPath($arItem["PROPERTIES"]["ICON"]["VALUE"]);?>" alt="icon">
                  </div>
                  <div class="industry-solutions-list__item-title"><?=$arItem["NAME"];?></div>
                </div>
                <div class="industry-solutions-list__item-pattern">
                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="32" viewBox="0 0 25 32" fill="none">
                    <path d="M8.28408 15.9201L16.2031 23.8403L24.1222 15.9201L16.2031 8L8.28408 15.9201Z" fill="white" />
                    <path opacity="0.3" d="M0.284075 23.9201L8.20312 31.8403L16.1222 23.9201L8.20312 16L0.284075 23.9201Z" fill="white" />
                    <path opacity="0.3" d="M0.284075 7.92014L8.20312 15.8403L16.1222 7.92014L8.20312 0L0.284075 7.92014Z" fill="white" />
                  </svg>
                </div>
            </a>

<?endforeach;?>
