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

<div class="wrapper" data-modal-gallery="gallery">
        <section class="a-intro-block" data-scroll-section data-scroll-id="a-intro-block">
          <img class="a-intro-block__bg" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="Задний фон баннера">
          <div class="container">
            <div class="a-intro-block__info-section">
                <?$APPLICATION->IncludeComponent(
					"bitrix:breadcrumb", "template_breadcrumb",
					Array(
						"PATH" => "",
						"SITE_ID" => "s1",
						"START_FROM" => "0"
					)
				);?>
              <div class="a-intro-block__content">
                <h1 class="a-intro-block__title"><?=$arResult["NAME"]?></h1>
                <button class="a-intro-block__btn btn-reset" type="button" data-hystmodal="#m-consultation">Запросить подробности</button>
              </div>
            </div>
            <div class="a-intro-block__btns-section">
              <a class="a-intro-block__anchor-link anchor-link" href="#introductory">Вводные</a>
              <a class="a-intro-block__anchor-link anchor-link" href="#tasks">Решение</a>
			  <?if ($arResult["PROPERTIES"]["IMAGES"]["VALUE"]):?>
              <a class="a-intro-block__anchor-link anchor-link" href="#gallery">Галерея</a>
			  <?endif;?>
              <a class="a-intro-block__anchor-link anchor-link" href="#result">Результат</a>
              <a class="a-intro-block__anchor-link anchor-link" href="#cases">Другие проекты</a>
            </div>
          </div>
        </section>

        <section class="introductory" id="introductory" data-scroll-section data-scroll-id="section0">
          <div class="container introductory__container">
            <div class="introductory__info">
              <div class="introductory__info-item">
                <span class="introductory__info-name">Год</span>
                <span class="introductory__info-value">
                  <?=$arResult["PROPERTIES"]["YEAR"]["VALUE"];?>
                </span>
              </div>
              <div class="introductory__info-item">
                <span class="introductory__info-name">Экспертиза</span>
				<?foreach($arResult["PROPERTIES"]["EXP"]["VALUE"] as $arId):?>
					<span class="introductory__info-value"><?=$arId;?></span>
				<?endforeach;?>
              </div>
              <div class="introductory__info-item">
                <span class="introductory__info-name">Индустрия</span>
					<?$res = CIBlockElement::GetByID($arResult["PROPERTIES"]["INDUSTRY"]["VALUE"]);?>
					<span class="introductory__info-value"><?if($ar_res = $res->GetNext()) echo $ar_res['NAME'];?></span>
              </div>
              <div class="introductory__info-item">
                <span class="introductory__info-name">Клиент</span>
                <span class="introductory__info-value">
                  <?=$arResult["PROPERTIES"]["CLIENT"]["VALUE"];?>
                </span>
              </div>
            </div>
            <div class="introductory__details">
              <p class="introductory__details-title">
                <?=htmlspecialcharsBack($arResult["PREVIEW_TEXT"]);?>
              </p>
			  <?foreach($arResult["PROPERTIES"]["BLOCK_NUM"]["VALUE"] as $arId):?>
				<div class="introductory__details-card">
					<span class="introductory__details-card__title"><?=$arId["SUB_VALUES"]["BLOCK_NUM_title"]["VALUE"];?></span>
					<span class="introductory__details-card__number"><?=$arId["SUB_VALUES"]["BLOCK_NUM_num"]["VALUE"];?></span>
					<span class="introductory__details-card__text"><?=$arId["SUB_VALUES"]["BLOCK_NUM_text"]["VALUE"];?></span>
				</div>
			  <?endforeach;?>
            </div>
          </div>
        </section>

        <section class="tasks" id="tasks" data-scroll-section data-scroll-id="section1">
          <div class="container">
            <h2 class="title__h2 tasks__title">Выполненные задачи</h2>
            <div class="tasks__container">
				<?foreach($arResult["PROPERTIES"]["TASK"]["VALUE"] as $arId):?>
					<div class="tasks__item"><?=$arId;?></div>
				<?endforeach;?>
            </div>
          </div>
        </section>

		<?if ($arResult["PROPERTIES"]["IMAGES"]["VALUE"]):?>
        <section class="gallery" id="gallery" data-scroll-section data-scroll-id="section2">
          <div class="container">
            <h2 class="title__h2 gallery__title">Галерея</h2>
            <div class="a-images-slider">
              <div class="swiper-wrapper">
				<?foreach($arResult["PROPERTIES"]["IMAGES"]["VALUE"] as $arId):
				$arImage = CFile::ResizeImageGet($arId, array("width" => 1280, "height" => 800), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false);?>
					<div class="a-images-slider__item swiper-slide">
					  <img src="<?=$arImage['src'];?>" alt="slide">
					  <!--<span></span>-->
					</div>
				<?endforeach;?>
              </div>
              <div class="a-images-slider__controls">
                <div class="slick-prev slick-arrow">
                </div>
                <div class="swiper-pagination">
                </div>
                <div class="slick-next slick-arrow">
                </div>
              </div>
            </div>
          </div>
        </section>
		<?endif;?>

		<? if(($arResult["PROPERTIES"]["VIDEO"]["VALUE"]) OR ($arResult["PROPERTIES"]["VIDEO_URL"]["VALUE"])):?>
			<section class="projects projects--project" id="video" data-scroll-section data-scroll-id="projects">
			  <div class="container">
				<h2 class="projects--project__title">Видео</h2>
				<div class="projects__list">
				  	<?if($arResult["PROPERTIES"]["VIDEO"]["VALUE"]):?> 
						<a class="cases__slider-item swiper-slide" data-video='{"source": [{"src":"<?echo CFile::GetPath($arResult["PROPERTIES"]["VIDEO"]["VALUE"]);?>", "type":"video/mp4"}], "tracks": [], "attributes": {"preload": false, "controls": true, "playsinline": true}}' data-poster="<?=CFile::GetPath($arResult["PROPERTIES"]["VIDEO_FON"]["VALUE"]);?>" data-modal-gallery="el-gallery">
					<?else:?> 
						<a class="cases__slider-item swiper-slide" data-src="<?echo $arResult["PROPERTIES"]["VIDEO_URL"]["VALUE"];?>" data-modal-gallery="el-gallery">
					<?endif;?>
					<? if($arResult["PROPERTIES"]["VIDEO_FON"]["VALUE"]):?>
						<img class="cases__bg" src="<?=CFile::GetPath($arResult["PROPERTIES"]["VIDEO_FON"]["VALUE"]);?>" alt="background">
					<?else:?>
					  <div class="cases__bg"></div>
					<?endif;?>
					<div class="cases__slider-item-wrp">
					  <div class="cases__top"></div>
					  <div class="cases__bot">
						<div class="cases__name"></div>
						<span class="btn__play-video">
						  <img src="<?= SITE_TEMPLATE_PATH ?>/assets/icons/play.svg" alt="play">
						</span>
					  </div>
					</div>
				  </a>
				</div>
			  </div>
			</section>
		<?endif;?>

		<?if ($arResult["PROPERTIES"]["RESULT_TITLE"]["VALUE"]):?>
        <section class="result" id="result" data-scroll-section data-scroll-id="section3">
          <div class="container result__container">
            <h2 class="title__h2 result__title">Результат</h2>
            <div class="result__info">
              <div class="result__text">
				<?=htmlspecialcharsBack($arResult["PROPERTIES"]["RESULT_TITLE"]["VALUE"]["TEXT"]);?>
              </div>
              <div class="result__additional">
				<?=htmlspecialcharsBack($arResult["PROPERTIES"]["RESULT_TEXT"]["VALUE"]);?>
              </div>
			  <?if ($arResult["PROPERTIES"]["RESULT_FILE"]["VALUE"]):?>
              <div class="a-document-download result__thanks" data-modal-gallery="gallery">
                <div class="a-document-download__block-head">
                  <h3 class="a-document-download__name">
                    <?$arIdres = CFile::GetFileArray($arResult["PROPERTIES"]["RESULT_FILE"]["VALUE"]);?>
					<?=$arIdres['ORIGINAL_NAME'];?>
                  </h3>
                  <span class="a-document-download__size">
                    <?=$arIdSIZE=CFile::FormatSize($arIdres['FILE_SIZE']);?>
                  </span>
                  <a class="a-document-download__btn btn btn__big-white" href="<?=$arIdres['SRC'];?>" target="_blank">
                    <span>Скачать</span>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M11.9992 15.935V3.15723" stroke="#4B23EB" stroke-width="1.5" stroke-linecap="square" />
                      <path d="M8.72656 13.395L12.0015 16.6846L15.2776 13.395" stroke="#4B23EB" stroke-width="1.5" stroke-linecap="square" />
                      <path d="M16.625 9.41406H21.25V20.8429H2.75V9.41406H7.375" stroke="#4B23EB" stroke-width="1.5" stroke-linecap="square" />
                    </svg>
                  </a>
                </div>
				<?if ($arResult["PROPERTIES"]["RESULT_FOTO"]["VALUE"]):?>
					<?$arImageMin = CFile::ResizeImageGet($arResult["PROPERTIES"]["RESULT_FOTO"]["VALUE"], array("width" => 160, "height" => 220), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false);?>
					<?$arImage = CFile::ResizeImageGet($arResult["PROPERTIES"]["RESULT_FOTO"]["VALUE"], array("width" => 600, "height" => 900), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false);?>
					<a class="a-document-download__block-image" href="<?=$arImage['src'];?>" data-src="<?=$arImage['src'];?>" data-modal-gallery="el-gallery">
					  <img class="a-document-download__icon" src="<?= SITE_TEMPLATE_PATH ?>/assets/images/eye.png" alt="иконка глаза">
					  <img class="a-document-download__image" src="<?=$arImageMin['src'];?>" alt="<?=$arIdres['ORIGINAL_NAME'];?>">
					</a>
				<?endif;?>
              </div>
			  <?endif;?>
            </div>
          </div>
        </section>
		<?endif;?>

        <section class="cases" id="cases" data-scroll-section data-scroll-id="section4">
          <div class="container">
            <div class="cases__container">
              <h2 class="title__h2">Другие проекты</h2>
              <div class="cases__slider">
                <div class="swiper-wrapper">

					<?$APPLICATION->IncludeComponent(
                        "bitrix:news.list", "list_projects",
                        Array(
                            "ACTIVE_DATE_FORMAT" => "d.m.Y",
                            "ADD_SECTIONS_CHAIN" => "N",
                            "AJAX_MODE" => "N",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "N",
                            "CACHE_FILTER" => "N",
                            "CACHE_GROUPS" => "N",
                            "CACHE_TIME" => "36000000",
                            "CACHE_TYPE" => "Y",
                            "CHECK_DATES" => "Y",
                            "DETAIL_URL" => "",
                            "DISPLAY_BOTTOM_PAGER" => "N",
                            "DISPLAY_DATE" => "N",
                            "DISPLAY_NAME" => "N",
                            "DISPLAY_PICTURE" => "N",
                            "DISPLAY_PREVIEW_TEXT" => "N",
                            "DISPLAY_TOP_PAGER" => "N",
                            "FIELD_CODE" => array("NAME","PREVIEW_TEXT","PREVIEW_PICTURE",""),
                            "FILTER_NAME" => "",
                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                            "IBLOCK_ID" => "3",
                            "IBLOCK_TYPE" => "projects",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "INCLUDE_SUBSECTIONS" => "Y",
                            "MESSAGE_404" => "",
                            "NEWS_COUNT" => "9",
                            "PAGER_BASE_LINK_ENABLE" => "N",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "N",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_TEMPLATE" => "",
                            "PAGER_TITLE" => "",
                            "PARENT_SECTION" => "",
                            "PARENT_SECTION_CODE" => "",
                            "PREVIEW_TRUNCATE_LEN" => "",
                            "PROPERTY_CODE" => array(0 => "YEAR",1 => "INDUSTRY",2 => "CLIENT",3 => "VIDEO"),
                            "SET_BROWSER_TITLE" => "N",
                            "SET_LAST_MODIFIED" => "N",
                            "SET_META_DESCRIPTION" => "N",
                            "SET_META_KEYWORDS" => "N",
                            "SET_STATUS_404" => "N",
                            "SET_TITLE" => "N",
                            "SHOW_404" => "N",
                            "SORT_BY1" => "RAND",
                            "SORT_BY2" => "",
                            "SORT_ORDER1" => "RAND",
                            "SORT_ORDER2" => "",
                            "STRICT_SECTION_CHECK" => "N",
							"BLOCK_SLIDER" => "YES"
                        )
                    );?>

                </div>
                <div class="slick-next slick-arrow">
                </div>
                <div class="slick-prev slick-arrow">
                </div>
                <div class="swiper-pagination">
                </div>
              </div>
              <a class="btn__big-gray" href="/projects/">Cмотреть все</a>
            </div>
          </div>
        </section>

        <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "page",
            "AREA_FILE_RECURSIVE" => "Y",
            "PATH" => "/local/templates/main/includes/include_form_bottom.php"
        ));?>

	</div>
