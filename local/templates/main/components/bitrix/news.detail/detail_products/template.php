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

	<div class="wrapper" data-modal-gallery="gallery">
        <section class="a-intro-block mainScreen--project" data-scroll-section data-scroll-id="a-intro-block" data-modal="trigger">
          <div class="container">
            <?$APPLICATION->IncludeComponent(
				"bitrix:breadcrumb", "template_breadcrumb",
				Array(
					"PATH" => "",
					"SITE_ID" => "s1",
					"START_FROM" => "0"
				)
			);?>
            <div class="mainScreen--project-content">
              <div class="mainScreen--project-content-left">
                <h1 class="a-intro-block__title">
                  <?=$arResult["NAME"]?>
                </h1>
                <div class="mainScreen--project-content-left-btn">
                  <a class="btn active" href="javascript:void(0);" data-hystmodal="#m-cost">
                    Запросить стоимость
                  </a>
                  <a class="btn" href="javascript:void(0);" data-hystmodal="#m-list ">
                    Заполнить опросный лист
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                      <path d="M19 5.5L5 19.5" stroke="#4B23EB" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                      <path d="M19 15.77V5.5H8.73" stroke="#4B23EB" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                  </a>
                </div>
              </div>
              <div class="mainScreen--project-content-right">
			   <?if($arResult["PREVIEW_TEXT"]):?>
                <div class="mainScreen--project-content-right-title">Описание</div>
                <div>
					<?=$arResult["PREVIEW_TEXT"];?>
                </div>
			   <?endif;?>
              </div>
              <div class="mainScreen--project-content-center">

				 <?foreach($arResult["PROPERTIES"]["MORE"]["VALUE"] as $arId):
					$arImage = CFile::ResizeImageGet($arId["SUB_VALUES"]["MORE_img"]["VALUE"], array("width" => 600, "height" => 600), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false);?>
					<div class="modalBar modalBar--modules" data-modal="modal<?=$arId["SUB_VALUES"]["MORE_img"]["VALUE"];?>">
					  <div class="modalBar__close" data-modal="close"></div>
					  <div class="modalBar__content">
						<div class="modalBar__content-inner" data-custom-scrollbar>
						  <img src="<?=$arImage['src'];?>">
						  <div class="modalBar__content-inner-wrapper">
							<div class="modalBar__title">
							  <?=$arId["SUB_VALUES"]["MORE_title"]["VALUE"];?>
							</div>
							<div class="modalBar__desc">
							  <?=htmlspecialcharsBack($arId["SUB_VALUES"]["MORE_text"]["VALUE"]);?>
							</div>
						  </div>
						</div>
						<button class="modalBar__close-btn" data-modal="close">
						  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path d="M18.75 5.25L5.25 18.75" stroke="#C3C6D2" stroke-width="2.5" stroke-linecap="square" stroke-linejoin="round" />
							<path d="M18.75 18.75L5.25 5.25" stroke="#C3C6D2" stroke-width="2.5" stroke-linecap="square" stroke-linejoin="round" />
						  </svg>
						</button>
					  </div>
					</div>
				  <?endforeach;?>

                <div class="swiper-wrapper">
                  <div class="project-block">
                    <div class="project-block__wrapper">
                      <div class="project-block__item">
                        <img class="project-block__item-img" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>">
                        <div class="project-block__item-tabs">

							<?foreach($arResult["PROPERTIES"]["MORE"]["VALUE"] as $arId):
							$arImageMin = CFile::ResizeImageGet($arId["SUB_VALUES"]["MORE_img"]["VALUE"], array("width" => 200, "height" => 200), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false);?>
							  <div class="project-block__item-tabs-item" style="top:<?=$arId["SUB_VALUES"]["MORE_top"]["VALUE"];?>px;left:<?=$arId["SUB_VALUES"]["MORE_left"]["VALUE"];?>px;">
								<div class="project-block__item-tabs-content" data-modal="init<?=$arId["SUB_VALUES"]["MORE_img"]["VALUE"];?>">
								  <div class="project-block__item-tabs-content-img">
									<img src="<?=$arImageMin['src'];?>">
								  </div>
								  <div class="project-block__item-tabs-content-inner">
									<div class="project-block__item-tabs-content-title">
									  <?=$arId["SUB_VALUES"]["MORE_title"]["VALUE"];?>
									</div>
									<div class="project-block__item-tabs-content-text">
									  <?=htmlspecialcharsBack($arId["SUB_VALUES"]["MORE_text"]["VALUE"]);?>
									</div>
								  </div>
								</div>
							  </div>
							<?endforeach;?>

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="project-block__item project-block__item--video">
					<? if($arResult["PROPERTIES"]["VIDEO"]["VALUE"]):?>
						<a class="btn__play-video" data-src="<?=$arResult["PROPERTIES"]["VIDEO"]["VALUE"];?>" data-modal-gallery="el-gallery">
						  <img src="<?= SITE_TEMPLATE_PATH ?>/assets/icons/play.svg" alt="play">
						</a>
					<?endif;?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="projectInfo" data-scroll-section data-scroll-id="projectInfo">
          <div class="container">
            <div class="projectInfo__tabs">
			  <? if($arResult["DETAIL_TEXT"]):?>
              	<button class="btn active">Описание</button>
			  <?endif;?>
			  <? if($arResult["PROPERTIES"]["OPTIONS"]["VALUE"]):?>
              	<button class="btn <? if(!$arResult["DETAIL_TEXT"]):?>active<?endif;?>">Характеристики</button>
			  <?endif;?>
              <? if(($arResult["PROPERTIES"]["SETS"]["VALUE"])OR($arResult["PROPERTIES"]["OPTIONAL"]["VALUE"])):?>
              	<button class="btn <? if(!$arResult["DETAIL_TEXT"] and !$arResult["PROPERTIES"]["OPTIONS"]["VALUE"]):?>active<?endif;?>">Комплектация</button>
			  <?endif;?>
			  <? if($arResult["PROPERTIES"]["AREAS"]["VALUE"]):?>
              	<button class="btn <? if(!$arResult["DETAIL_TEXT"] and !$arResult["PROPERTIES"]["OPTIONS"]["VALUE"] and !$arResult["PROPERTIES"]["SETS"]["VALUE"]):?>active<?endif;?>">Области применения</button>
			  <?endif;?>
              <? if($arResult["PROPERTIES"]["DOC"]["VALUE"]):?>
				<button class="btn <? if(!$arResult["DETAIL_TEXT"] and !$arResult["PROPERTIES"]["OPTIONS"]["VALUE"] and !$arResult["PROPERTIES"]["SETS"]["VALUE"] and !$arResult["PROPERTIES"]["AREAS"]["VALUE"]):?>active<?endif;?>">Документация</button>
			  <?endif;?>
              <? if($arResult["PROPERTIES"]["MODEL3D_PACH"]["VALUE"]):?>
				<button class="btn">3D модель</button>
			  <?endif;?>
            </div>

			<? if($arResult["DETAIL_TEXT"]):?>
              	<div class="projectInfo__content projectInfo--techs active">
				  <div class="projectInfo__content-title">
					Описание
				  </div>
				  <div class="">
					<?=($arResult["DETAIL_TEXT"]);?>
				  </div>
				</div>
			<?endif;?>

			<? if($arResult["PROPERTIES"]["OPTIONS"]["VALUE"]):?>
            <div class="projectInfo__content projectInfo--techs <? if(!$arResult["DETAIL_TEXT"]):?>active<?endif;?>">
              <div class="projectInfo__content-title">
                Характеристики
              </div>
              <div class="projectInfo__list projectInfo__list--grid2">
				<?usort($arResult["PROPERTIES"]["OPTIONS"]["VALUE"], function($a, $b) {
					return $a["SUB_VALUES"]["OPTIONS_sort"]["VALUE"] <=> $b["SUB_VALUES"]["OPTIONS_sort"]["VALUE"];
				});?>
				<?foreach($arResult["PROPERTIES"]["OPTIONS"]["VALUE"] as $arId):?>
				  <div class="projectInfo__techs-item">
					<span><?=$arId["SUB_VALUES"]["OPTIONS_title"]["VALUE"];?></span>
					<span><?=htmlspecialcharsBack($arId["SUB_VALUES"]["OPTIONS_text"]["VALUE"]["TEXT"]);?></span>
				  </div>
				<?endforeach;?>
              </div>
            </div>
			<?endif;?>

			<? if(($arResult["PROPERTIES"]["SETS"]["VALUE"])OR($arResult["PROPERTIES"]["OPTIONAL"]["VALUE"])):?>
            <div class="projectInfo__content projectInfo--complect <? if(!$arResult["DETAIL_TEXT"] and !$arResult["PROPERTIES"]["OPTIONS"]["VALUE"]):?>active<?endif;?>">
              <div class="projectInfo--complect-list">

				<? if($arResult["PROPERTIES"]["SETS"]["VALUE"]):?>
					<div class="projectInfo--complect-list-item">
					  <div class="projectInfo__content-title">
						Возможности комплектации
						<div class="projectInfo--complect-list-item-inner">
							<?foreach($arResult["PROPERTIES"]["SETS"]["VALUE"] as $arId):?>
						  		<div class="tasks__item"><?=$arId;?></div>
							<?endforeach;?>
						</div>
					  </div>
					</div>
				<?endif;?>
				<? if($arResult["PROPERTIES"]["OPTIONAL"]["VALUE"]):?>
					<div class="projectInfo--complect-list-item">
					  <div class="projectInfo__content-title projectInfo__content-title--color">
						Опционально возможно
						<div class="projectInfo--complect-list-item-inner">
							<?foreach($arResult["PROPERTIES"]["OPTIONAL"]["VALUE"] as $arId):?>
						  		<div class="tasks__item"><?=$arId;?></div>
							<?endforeach;?>
						</div>
					  </div>
					</div>
				<?endif;?>
              </div>
            </div>
			<?endif;?>

			<? if($arResult["PROPERTIES"]["AREAS"]["VALUE"]):?>
            <div class="projectInfo__content projectInfo--areas <? if(!$arResult["DETAIL_TEXT"] and !$arResult["PROPERTIES"]["OPTIONS"]["VALUE"] and !$arResult["PROPERTIES"]["SETS"]["VALUE"]):?>active<?endif;?>">
              <div class="projectInfo__content-title">
                Области применения
              </div>
              <div class="projectInfo__list projectInfo__list--grid3">
				<?foreach($arResult["PROPERTIES"]["AREAS"]["VALUE"] as $arId):?>
					<?$resElement = CIBlockElement::GetList(
						[],['IBLOCK_ID' => 5,'ID' => $arId],
						false, false,
						['ID','NAME','PROPERTY_ICON']
					);?>
					<div class="projectInfo--areas__item">
					  <div class="projectInfo--areas__item-icon">
						<img class="inject_svg" src="<?if($ar_res = $resElement->GetNext()) echo CFile::GetPath($ar_res["PROPERTY_ICON_VALUE"]);?>" alt="icon">
					  </div>
					  <span><?=$ar_res["NAME"];?></span>
					</div>
				<?endforeach;?>
              </div>
            </div>
			<?endif;?>

			<? if($arResult["PROPERTIES"]["DOC"]["VALUE"]):?>
            <div class="projectInfo__content projectInfo--docs <? if(!$arResult["DETAIL_TEXT"] and !$arResult["PROPERTIES"]["OPTIONS"]["VALUE"] and !$arResult["PROPERTIES"]["SETS"]["VALUE"] and !$arResult["PROPERTIES"]["AREAS"]["VALUE"]):?>active<?endif;?>">
              <div class="projectInfo__content-title">
                Документация
              </div>
              <div class="projectInfo__list projectInfo__list--grid1">
				<?foreach($arResult["PROPERTIES"]["DOC"]["VALUE"] as $arDoc):
					$arIdres = CFile::GetFileArray($arDoc);?>
					<a href="<?=$arIdres['SRC'];?>" target="_blank" class="projectInfo--docs-item" download>
					  <div class="projectInfo--docs-item-content">
						<div class="projectInfo--docs-item-title"><?=$arIdres['ORIGINAL_NAME'];?></div>
						<div class="projectInfo--docs-item-size"><?=$arIdSIZE=CFile::FormatSize($arIdres['FILE_SIZE']);?></div>
					  </div>
					  <div class="projectInfo--docs-item-icon">
						<svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
						  <path d="M18.3337 8.83268V12.9993C18.3337 17.166 16.667 18.8327 12.5003 18.8327H7.50033C3.33366 18.8327 1.66699 17.166 1.66699 12.9993V7.99935C1.66699 3.83268 3.33366 2.16602 7.50033 2.16602H11.667" stroke="#4B23EB" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						  <path d="M7.5 9.66602V14.666L9.16667 12.9993" stroke="#4B23EB" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
						  <path d="M7.49967 14.6667L5.83301 13" stroke="#4B23EB" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
						  <path d="M18.3337 8.83268H15.0003C12.5003 8.83268 11.667 7.99935 11.667 5.49935V2.16602L18.3337 8.83268Z" stroke="#4B23EB" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					  </div>
					</a>
				<?endforeach;?>
              </div>
            </div>
			<?endif;?>

			<? if($arResult["PROPERTIES"]["MODEL3D_PACH"]["VALUE"]):?>
				<?$iterator = new \RecursiveIteratorIterator(
					new \RecursiveDirectoryIterator(Application::getDocumentRoot() . $arResult["PROPERTIES"]["MODEL3D_PACH"]["VALUE"], \RecursiveDirectoryIterator::SKIP_DOTS | \FilesystemIterator::FOLLOW_SYMLINKS),\RecursiveIteratorIterator::SELF_FIRST
				);?>
            <div class="projectInfo__content projectInfo__content--3d">
              <div class="projectInfo__content-title">
                3D модель
              </div>
              <div class="projectInfo__content--3d-icon">
                <img title="Зажмите мышь, для просмотра оборудования" src="<?= SITE_TEMPLATE_PATH ?>/assets/images/count-btn.png">
              </div>
              <div class="projectInfo__content--3d-icon projectInfo__content--3d-icon--mob">
                <img title="Зажмите мышь, для просмотра оборудования" src="<?= SITE_TEMPLATE_PATH ?>/assets/images/count-btn-mob.png">
              </div>
              <div class="projectInfo__content--3d-img-hidden" style="display:none">
				<?$index=0; foreach($iterator as $item) { $index++;
					if ($item->isFile()) {
						$file = new IO\File($item->getPathname());
						echo \sprintf('<img class="projectInfo__content--3d-img" src="%s">', \str_replace(Application::getDocumentRoot(), '', $file->getPath()), $file->getName());
					}
				}?>
              </div>
				<div class="project_3D cloudimage-360" data-speed="99999999999" data-drag-speed="80" data-autoplay stop-at-edges data-keys data-magnifier="2" 
				data-folder="<?=$arResult["PROPERTIES"]["MODEL3D_PACH"]["VALUE"];?>" data-filename-x="<?=$arResult["PROPERTIES"]["MODEL3D_URL"]["VALUE"];?>" data-amount-x="<?=$index;?>" data-control>
              </div>
            </div>
			<?endif;?>
          </div>
        </section>

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
						<div class="cases__name"><?=$arResult["PROPERTIES"]["VIDEO_TEXT"]["VALUE"];?></div>
						<span class="btn__play-video">
						  <img src="<?= SITE_TEMPLATE_PATH ?>/assets/icons/play.svg" alt="play">
						</span>
					  </div>
					</div>
					<div class="cases__bot-mob">
					  <div class="cases__name-mob"><?=$arResult["PROPERTIES"]["VIDEO_TEXT"]["VALUE"];?></div>
					</div>
				  </a>
				</div>
			  </div>
			</section>
		<?endif;?>

        <section class="cases" data-scroll-section data-scroll-id="">
          <div class="container">
            <div class="cases__container">
              <h2 class="title__h2">
                Наши кейсы
              </h2>
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
            </div>
          </div>
        </section>

		<?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "page",
            "AREA_FILE_RECURSIVE" => "Y",
            "PATH" => "/local/templates/main/includes/include_block_service.php"
        ));?>

        <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "page",
            "AREA_FILE_RECURSIVE" => "Y",
            "PATH" => "/local/templates/main/includes/include_form_bottom.php"
        ));?>

      </div>
