<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$APPLICATION->AddViewContent('HEADER_TOO', 'white-body');
$request = Bitrix\Main\Context::getCurrent()->getRequest()->toArray();
$Getpage = $APPLICATION->GetCurPage();
?>
<? //if($USER->IsAdmin()) { echo "<pre>"; print_r($request); echo "</pre>"; } ?>

	<div class="wrapper">

		<section class="mainScreen--press" data-scroll-section data-scroll-id="press">
          <div class="container">

			<?$APPLICATION->IncludeComponent(
				"bitrix:breadcrumb", "template_breadcrumb",
				Array(
					"PATH" => "",
					"SITE_ID" => "s1",
					"START_FROM" => "0"
				)
			);?>

            <h1 class="a-intro-block__title"><? $APPLICATION->ShowTitle(false); ?></h1>
          </div>
		</section>

        <section class="pressList" data-scroll-section data-scroll-id="pressList">
          <div class="container">

				<? $GLOBALS['searchFilter'] = array();
					$sectionId = $request['category_id'];
					$tags_list_Id = $request['tags_list'];
					if (!empty($sectionId)) { $GLOBALS['searchFilter']['PARAMS']["iblock_section"] = $sectionId; }
					if (!empty($tags_list_Id)) { $GLOBALS['searchFilter']['PARAMS']["iblock_tags_list"] =  $tags_list_Id; }
					//if (!empty($request['tags_list'])) { $GLOBALS['searchFilter'] = array_merge($GLOBALS['searchFilter'], Array("PROPERTY_TAGS_LIST_VALUE" => $request['tags_list'])); }
				$APPLICATION->IncludeComponent("bitrix:search.page", "search_press", Array(
						"AJAX_MODE" => "N",	// Включить режим AJAX
						"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
						"AJAX_OPTION_HISTORY" => "Y",	// Включить эмуляцию навигации браузера
						"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
						"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
						"CACHE_TIME" => "3600",	// Время кеширования (сек.)
						"CACHE_TYPE" => "N",	// Тип кеширования
						"CHECK_DATES" => "N",	// Искать только в активных по дате документах
						"DEFAULT_SORT" => "rank",	// Сортировка по умолчанию
						"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под результатами
						"DISPLAY_TOP_PAGER" => "N",	// Выводить над результатами
						"DETAIL_PROPERTY_CODE" => array(
							0 => "STYLE",
							1 => "TAGS_LIST",
							2 => "VIDEO",
						),
						"USE_FILTER" => "Y",
						"FILTER_NAME" => "searchFilter",	// Дополнительный фильтр
						"NO_WORD_LOGIC" => "N",	// Отключить обработку слов как логических операторов
						"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
						"PAGER_TEMPLATE" => "page_template",	// Название шаблона
						"PAGER_TITLE" => "Результаты поиска",	// Название результатов поиска
						"PAGE_RESULT_COUNT" => "15",	// Количество результатов на странице
						"RESTART" => "N",	// Искать без учета морфологии (при отсутствии результата поиска)
						"SHOW_WHEN" => "N",	// Показывать фильтр по датам
						"SHOW_WHERE" => "Y",	// Показывать выпадающий список "Где искать"
						"USE_LANGUAGE_GUESS" => "Y",	// Включить автоопределение раскладки клавиатуры
						"USE_SUGGEST" => "Y",	// Показывать подсказку с поисковыми фразами
						"USE_TITLE_RANK" => "Y",	// При ранжировании результата учитывать заголовки
						"arrFILTER" => array(	// Ограничение области поиска
							0 => "iblock_blog",
						),
						"arrFILTER_iblock_blog" => array(	// Искать в информационных блоках типа "iblock_blog"
							0 => "all",
						)
					),
					false
				);?>

            <div class="pressList__more">
              <h2 class="title__h2">
                Другие статьи
              </h2>
              <div class="pressList__item-list" data-modal-gallery="gallery">

					<?$APPLICATION->IncludeComponent(
                        "bitrix:news.list", "list_press",
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
                            "IBLOCK_ID" => "2",
                            "IBLOCK_TYPE" => "press",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "INCLUDE_SUBSECTIONS" => "Y",
                            "MESSAGE_404" => "",
                            "NEWS_COUNT" => "3",
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
                            "PROPERTY_CODE" => array(0 => "STYLE",1 => "TAGS_LIST",2 => "VIDEO"),
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
							"BLOCK_MORE" => "YES"
                        )
                    );?>

              </div>
            </div>

          </div>
        </section>
      </div>
