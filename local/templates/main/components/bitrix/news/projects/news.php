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
$APPLICATION->AddViewContent('HEADER_TOO', 'projects-page');
$request = Bitrix\Main\Context::getCurrent()->getRequest()->toArray();

if (CModule::IncludeModule("iblock")){
	$str = CIBlockElement::GetList(
    [], ['IBLOCK_ID' => 27],
    false, false,
    ['ID', 'PREVIEW_TEXT', 'DETAIL_TEXT', 'DETAIL_PICTURE', 'PROPERTY_VIDEO_FON', 'PROPERTY_INFO1', 'PROPERTY_INFO2', 'PROPERTY_INFO3', 'PROPERTY_INFO4', 'PROPERTY_INFO5', 'PROPERTY_INFO6']
	);
	while ($res = $str->GetNext()) {
		$StrPREVIEW_TEXT = $res["PREVIEW_TEXT"];
		$StrDETAIL_TEXT = $res["DETAIL_TEXT"];
		$StrDETAIL_PICTURE = $res["DETAIL_PICTURE"];
		$StrPROPERTY_VIDEO_FON = $res["PROPERTY_VIDEO_FON_VALUE"];
		$StrPROPERTY_INFO1 = $res["PROPERTY_INFO1_VALUE"];
		$StrPROPERTY_INFO2 = $res["PROPERTY_INFO2_VALUE"];
		$StrPROPERTY_INFO3 = $res["PROPERTY_INFO3_VALUE"];
		$StrPROPERTY_INFO4 = $res["PROPERTY_INFO4_VALUE"];
		$StrPROPERTY_INFO5 = $res["PROPERTY_INFO5_VALUE"];
		$StrPROPERTY_INFO6 = $res["PROPERTY_INFO6_VALUE"];
  }
} ?>

<? //if($USER->IsAdmin()) { echo "<pre>"; print_r($arResult); echo "</pre>"; } ?>

	<div class="wrapper">
        <section class="a-intro-block mainScreen--projects" data-scroll-section data-scroll-id="a-intro-block">
			<?if ($StrPROPERTY_VIDEO_FON):?>
				<video autoplay="" loop="" muted="" playsinline="" id="mainScreenVideo">
				  <source src="<?echo CFile::GetPath($StrPROPERTY_VIDEO_FON);?>" type="video/mp4">
				</video>
			<?else:?>
			  <img class="a-intro-p__bg" src="<?echo CFile::GetPath($StrDETAIL_PICTURE);?>" alt="Задний Фон">
			<?endif;?>
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
                <h1 class="a-intro-block__title">
                  <? $APPLICATION->ShowTitle(false); ?>
                </h1>
              </div>
            </div>
            <div class="a-intro-block__cards-list">
              <div class="a-intro-block__cards-list-item">
                <div class="a-intro-block__cards-list-item-title">
                  <span><?=$StrPROPERTY_INFO1;?></span>
                </div>
                <div class="a-intro-block__cards-list-item-text"><?=$StrPROPERTY_INFO2;?></div>
              </div>
              <div class="a-intro-block__cards-list-item">
                <div class="a-intro-block__cards-list-item-title">
                  <span><?=$StrPROPERTY_INFO3;?></span>
                </div>
                <div class="a-intro-block__cards-list-item-text"><?=$StrPROPERTY_INFO4;?></div>
              </div>
              <div class="a-intro-block__cards-list-item">
                <div class="a-intro-block__cards-list-item-title">
                  <span><?=$StrPROPERTY_INFO5;?></span>
                </div>
                <div class="a-intro-block__cards-list-item-text"><?=$StrPROPERTY_INFO6;?></div>
              </div>
            </div>
          </div>
        </section>

        <section class="projects" data-scroll-section data-scroll-id="projects">
          <div class="container">
            <div class="projects__filter">
              <div class="projects__filter-inner">
                <button class="btn <? if ($arId == $request['industry']) {?>active<?}?>" id="" onclick="changeIndustryList(this)">Все отрасли</button>
				<? $rs = CIblockElement::GetList(
						["SORT" => "ASC"],
						['IBLOCK_ID' => '5', 'ACTIVE' => 'Y'],
						false,false,
						['ID', 'NAME']
				  );
				  while ($ar = $rs->GetNext()) { ?>
					<? foreach($arResult['INDUSTRY'] as $arId): if($arId==$ar['ID']): ?>
						<button class="btn <? if ($arId == $request['industry']) {?>active<?}?>" id="<?=$arId;?>" onclick="changeIndustryList(this)"><?=$ar['NAME'];?></button>
					<? endif; endforeach;?>
				 <? } ?>
              </div>
              <div class="select  " data-select="main" data-select-value="">
                <div class="select__field">
                  <div class="select__head" data-select="head">
                    <span class="select__value" data-select="value">
                       <? $selectall = 0; foreach($arResult['YEAR'] as $arId): $sel++;
							if ($arId == $request['year']) { echo $arId; } else { $selectall++; }
						endforeach; 
						if ($selectall == $sel) { echo 'Год реализации'; } ?>
                    </span>
                    <svg class="select__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                      <path d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z" fill="#4B23EB" />
                    </svg>
                  </div>
                  <div class="select__body" data-select="body">
                    <ul class="select__list list-reset">
                        <li id="" class="<? if ('' == $request['year']) {?>active<?}?>" onclick="changeYearList(this)">Год реализации</li>
						<?foreach($arResult['YEAR'] as $arId):?>
							<li id="<?=$arId;?>" class="<? if ($arId == $request['year']) {?>active<?}?>" onclick="changeYearList(this)"><?=$arId;?></li>
						<?endforeach;?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

			<form action="/projects/" method="GET" id="projects_form" style="opacity: 0; display: none;">
				<button type="submit">submit_projects</button>
				<select name="industry" id="industry" class="input__field">
					<option value="">все</option>
					<?foreach($arResult['INDUSTRY'] as $arIds):?>
						<?$res = CIBlockElement::GetByID($arIds);?>
						<?if($ar_res = $res->GetNext()) $arName = $ar_res['NAME'];?>
						<option value="<?=$arIds;?>" <? if ($request['industry'] == $arIds) {?>selected<?}?>><?=$arName?></option>
					<?endforeach;?>
				</select>
				<select name="year" id="year" class="input__field">
					<option value="">все</option>
					<?foreach($arResult['YEAR'] as $arIds):?>
						<option value="<?=$arIds;?>" <? if ($request['year'] == $arIds) {?>selected<?}?>><?=$arIds?></option>
					<?endforeach;?>
				</select>
			</form>

            <div class="projects__list loadmore_wrap_too_1" data-modal-gallery="gallery">

				<?php $GLOBALS['requestFilter'] = array();
					if (!empty($request['industry'])) { $GLOBALS['requestFilter'] = array_merge($GLOBALS['requestFilter'], Array("PROPERTY_INDUSTRY" => $request['industry'])); };
					if (!empty($request['year'])) { $GLOBALS['requestFilter'] = array_merge($GLOBALS['requestFilter'], Array("PROPERTY_YEAR" => $request['year'])); };
				$APPLICATION->IncludeComponent(
					"bitrix:news.list",	"list_projects",
					[
						"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
						"IBLOCK_ID" => $arParams["IBLOCK_ID"],
						"NEWS_COUNT" => $arParams["NEWS_COUNT"],
						"SORT_BY1" => $arParams["SORT_BY1"],
						"SORT_ORDER1" => $arParams["SORT_ORDER1"],
						"SORT_BY2" => $arParams["SORT_BY2"],
						"SORT_ORDER2" => $arParams["SORT_ORDER2"],
						"FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
						"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
						"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
						"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
						"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
						"SET_TITLE" => $arParams["SET_TITLE"],
						"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
						"MESSAGE_404" => $arParams["MESSAGE_404"],
						"SET_STATUS_404" => $arParams["SET_STATUS_404"],
						"SHOW_404" => $arParams["SHOW_404"],
						"FILE_404" => $arParams["FILE_404"],
						"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
						"CACHE_TYPE" => $arParams["CACHE_TYPE"],
						"CACHE_TIME" => $arParams["CACHE_TIME"],
						"CACHE_FILTER" => $arParams["CACHE_FILTER"],
						"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
						"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
						"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
						"PAGER_TITLE" => $arParams["PAGER_TITLE"],
						"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
						"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
						"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
						"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
						"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
						"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
						"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
						"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
						"PARENT_SECTION" => $arResult["VARIABLES"]["SECTION_ID"],
                        "PARENT_SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
						"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
						"DISPLAY_NAME" => "Y",
						"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
						"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
						"PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
						"ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
						"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
						"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
						"FILTER_NAME" => "requestFilter",
						"HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
						"CHECK_DATES" => $arParams["CHECK_DATES"],
					],
					$component,
					['HIDE_ICONS' => 'Y']
				); ?>

            </div>
          </div>
        </section>

		<div class="a-map-top-trigger" data-scroll-section></div>
		<?$APPLICATION->IncludeComponent("main:InteractiveMap", "", [], false);?>

		<?/*$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "page",
            "AREA_FILE_RECURSIVE" => "Y",
            "PATH" => "/local/templates/main/includes/include_block_mapworld.php",
			"BLOCK_SCROLL" => "a-map"
		));*/?>

		<?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "page",
            "AREA_FILE_RECURSIVE" => "Y",
            "PATH" => "/local/templates/main/includes/include_block_auto.php",
			"BLOCK_SCROLL" => "section5"
        ));?>

        <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "page",
            "AREA_FILE_RECURSIVE" => "Y",
            "PATH" => "/local/templates/main/includes/include_form_bottom.php"
        ));?>

      </div>

	<script>
		function changeIndustryList(thisIndustry) {
			let elem = document.querySelector('#industry');
			let botton = thisIndustry.getAttribute('id');
			let option;
			if(thisIndustry.classList.contains('active')) {
				elem.dispatchEvent(new Event('change'));
			} else {
				for (i = 0; i < elem.length; i++) {
					option = elem.options[i];
					if(option.value == botton){ option.setAttribute('selected', true);};
				}
				elem.dispatchEvent(new Event('change'));
			}
			let projects_form = document.querySelector('#projects_form');
			projects_form.submit();
		}

		function changeYearList(thisYear) {
			let elem = document.querySelector('#year');
			let botton = thisYear.getAttribute('id');
			let option;
			if(thisYear.classList.contains('active')) {
				elem.dispatchEvent(new Event('change'));
			} else {
				for (i = 0; i < elem.length; i++) {
					option = elem.options[i];
					if(option.value == botton){ option.setAttribute('selected', true);};
				}
				elem.dispatchEvent(new Event('change'));
			}
			let projects_form = document.querySelector('#projects_form');
			projects_form.submit();
		}
	</script>
