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
$APPLICATION->AddViewContent('HEADER_TOO', 'projects-page career-page');
$request = Bitrix\Main\Context::getCurrent()->getRequest()->toArray();

if (CModule::IncludeModule("iblock")){
	$str = CIBlockElement::GetList(
    [], ['IBLOCK_ID' => 31],
    false, false,
    ['ID', 'PREVIEW_TEXT', 'DETAIL_TEXT', 'DETAIL_PICTURE']
	);
	while ($res = $str->GetNext()) {
		$StrPREVIEW_TEXT = $res["PREVIEW_TEXT"];
		$StrDETAIL_TEXT = $res["DETAIL_TEXT"];
		$StrDETAIL_PICTURE = $res["DETAIL_PICTURE"];
  }
} ?>

<? //if($USER->IsAdmin()) { echo "<pre>"; print_r($arResult); echo "</pre>"; } ?>

	<div class="wrapper">
        <section class="a-intro-block mainScreen--career mainScreen--vacancies"
        data-scroll-section data-scroll-id="a-intro-block">
          <img class="a-intro-block__bg" src="<?echo CFile::GetPath($StrDETAIL_PICTURE);?>" alt="Задний фон баннера">
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
                <h1 class="a-intro-block__title"><? $APPLICATION->ShowTitle(false); ?></h1>
                <a class="btn anchor-link" href="#vacancyList" data-hystmodal="#m-vacancy">Откликнуться</a>
              </div>
            </div>
          </div>
        </section>

        <section class="vacancyList" data-scroll-section data-scroll-id="vacancyList" id="vacancyList">
          <div class="container">
            <form action="/vacancies/" method="GET" id="vacancies_form" class="vacancyList__filters vacancy__List">
              <div class="vacancyList__filters-selects">
                <div class="select select--withCheckbox  " data-select="checkboxes">
                  <div class="select__field">
                    <div class="select__head" data-select="head">
                      <span class="select__value" data-select="value">
						<? $selectall = 0; foreach($arResult['SPEC'] as $arId): $sels1++;
							if ($arId == $request['spec']) { echo $arId; } else { $selectall1++; }
						endforeach; 
						if ($selectall1 == $sels1) { echo 'Специализация'; } ?>
					  </span>
                      <svg class="select__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z" fill="#4B23EB" />
                      </svg>
                    </div>
                    <div class="select__body" data-select="body" data-custom-scrollbar>
                      <ul class="select__list list-reset">
						<?foreach($arResult['SPEC'] as $arId):?>
							<div class="checkbox">
							  <label class="checkbox__label">
								<input class="checkbox__input" type="checkbox" id="<?=$arId;?>" name="" value="<?=$arId;?>" <? foreach ($request['spec'] as $tags) { if ($tags == $arId) { ?>checked<?}}?> onclick="changeSpecList(this)">
								<span class="checkbox__text"><?=$arId;?></span>
								<span class="checkbox__decore">
								</span>
							  </label>
							</div>
						<?endforeach;?>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="select" data-select="main" data-select-value="">
                  <div class="select__field">
                    <div class="select__head" data-select="head">
                      <span class="select__value" data-select="value">
						<? $selectall = 0; foreach($arResult['EXP'] as $arId): $sels2++;
							if ($arId == $request['exp']) { echo $arId; } else { $selectall2++; }
						endforeach; 
						if ($selectall2 == $sels2) { echo 'Опыт работы'; } ?>
					  </span>
                      <svg class="select__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z" fill="#4B23EB" />
                      </svg>
                    </div>
                    <div class="select__body" data-select="body">
                      <ul class="select__list list-reset">
                        <li id="" class="<? if ('' == $request['exp']) {?>active<?}?>" onclick="changeaExpList(this)">Опыт работы</li>
						<?foreach($arResult['EXP'] as $arId):?>
							<li id="<?=$arId;?>" class="<? if ($arId == $request['exp']) {?>active<?}?>" onclick="changeaExpList(this)"><?=$arId;?></li>
						<?endforeach;?>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="select" data-select="main" data-select-value="">
                  <div class="select__field">
                    <div class="select__head" data-select="head">
                      <span class="select__value" data-select="value">
						<? $selectall = 0; foreach($arResult['JOB'] as $arId): $sels3++;
							if ($arId == $request['job']) { echo $arId; } else { $selectall3++; }
						endforeach; 
						if ($selectall3 == $sels3) { echo 'Тип занятости'; } ?>
					  </span>
                      <svg class="select__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z" fill="#4B23EB" />
                      </svg>
                    </div>
                    <div class="select__body" data-select="body">
                      <ul class="select__list list-reset">
						<li id="" class="<? if ('' == $request['job']) {?>active<?}?>" onclick="changeJobList(this)">Тип занятости</li>
						<?foreach($arResult['JOB'] as $arId):?>
							<li id="<?=$arId;?>" class="<? if ($arId == $request['job']) {?>active<?}?>" onclick="changeJobList(this)"><?=$arId;?></li>
						<?endforeach;?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="vacancyList__filters-btns">
                <button class="btn btn--blue" type="submit">Подобрать вакансии</button>
                <button class="btn -disabled-" type="button" onclick="offTagsList(this)">Сбросить</button>
              </div>

				<select name="exp" id="exp" class="input__field" style="opacity: 0; display: none;">
					<option value="">все</option>
					<?foreach($arResult['EXP'] as $arIds):?>
						<option value="<?=$arIds;?>" <? if ($request['exp'] == $arIds) {?>selected<?}?>><?=$arIds?></option>
					<?endforeach;?>
				</select>
				<select name="job" id="job" class="input__field" style="opacity: 0; display: none;">
					<option value="">все</option>
					<?foreach($arResult['JOB'] as $arIds):?>
						<option value="<?=$arIds;?>" <? if ($request['job'] == $arIds) {?>selected<?}?>><?=$arIds?></option>
					<?endforeach;?>
				</select>
				<select multiple="multiple" name="spec[]" id="spec" class="input__field" style="opacity: 0; display: none;">
					<option value="">все</option>
					<?foreach($arResult['SPEC'] as $arIds):?>
						<option value="<?=$arIds;?>" <? foreach ($request['spec'] as $tags) { if ($tags == $arIds) { ?>selected<?}}?>><?=$arIds?></option>
					<?endforeach;?>
				</select>

            </form>

            <div class="vacancyList__row">

				<?php $GLOBALS['requestFilter'] = array();
					if (!empty($request['exp'])) { $GLOBALS['requestFilter'] = array_merge($GLOBALS['requestFilter'], Array("PROPERTY_EXP_VALUE" => $request['exp'])); };
					if (!empty($request['job'])) { $GLOBALS['requestFilter'] = array_merge($GLOBALS['requestFilter'], Array("PROPERTY_JOB_VALUE" => $request['job'])); };
					if (!empty($request['spec'])) { $GLOBALS['requestFilter'] = array_merge($GLOBALS['requestFilter'], Array("PROPERTY_SPEC_VALUE" => $request['spec'])); };
				$APPLICATION->IncludeComponent(
					"bitrix:news.list",	"list_vacancy",
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

        <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "page",
            "AREA_FILE_RECURSIVE" => "Y",
            "PATH" => "/local/templates/main/includes/include_form_vacancy.php"
        ));?>

    </div>

	<script>
		function changeaExpList(thisEXP) {
			let elem = document.querySelector('#exp');
			let botton = thisEXP.getAttribute('id');
			let option;
			if(thisEXP.classList.contains('active')) {
				elem.dispatchEvent(new Event('change'));
			} else {
				for (i = 0; i < elem.length; i++) { elem[i].removeAttribute("selected"); }
				for (i = 0; i < elem.length; i++) {
					option = elem.options[i];
					if(option.value == botton){ option.setAttribute('selected', true);};
				}
				elem.dispatchEvent(new Event('change'));
			}
		}

		function changeJobList(thisJob) {
			let elem = document.querySelector('#job');
			let botton = thisJob.getAttribute('id');
			let option;
			if(thisJob.classList.contains('active')) {
				elem.dispatchEvent(new Event('change'));
			} else {
				for (i = 0; i < elem.length; i++) { elem[i].removeAttribute("selected"); }
				for (i = 0; i < elem.length; i++) {
					option = elem.options[i];
					if(option.value == botton){ option.setAttribute('selected', true);};
				}
				elem.dispatchEvent(new Event('change'));
			}
		}

		function changeSpecList(thisSpec) {
			let elem = document.querySelector('#spec');
			let botton = thisSpec.getAttribute('id');
			let values = [];
			let options = elem && elem.options;
			let opt;
			for (var i=0, iLen=options.length; i<iLen; i++) {
				opt = options[i];
				if (opt.selected) {
				  values.push(opt.value || opt.text);
				}
			}
			if(!thisSpec.checked) { 
				let index = values.indexOf(botton);
				if (index !== -1) { values.splice(index, 1); };
				for (i = 0; i < elem.length; i++) { 
					option = elem.options[i];
					if(option.value == botton){ elem[i].removeAttribute("selected"); };
				}
				elem.dispatchEvent(new Event('change'));
			} else {
				for (i = 0; i < elem.length; i++) {
					option = elem.options[i];
					if(option.value == botton){ option.setAttribute('selected', true);};
				}
				elem.dispatchEvent(new Event('change'));
			}
		}

		function offTagsList(thisTags) {
			let elem1 = document.querySelector('#exp');
			for (i = 0; i < elem1.length; i++) { elem1[i].removeAttribute("selected"); }
			elem1.dispatchEvent(new Event('change'));
			let elem2 = document.querySelector('#job');
			for (i = 0; i < elem2.length; i++) { elem2[i].removeAttribute("selected"); }
			elem2.dispatchEvent(new Event('change'));
			let elem3 = document.querySelector('#spec');
			for (i = 0; i < elem3.length; i++) {
				elem3[i].removeAttribute("selected");
			}
			elem3.dispatchEvent(new Event('change'));
			let vacancies_form = document.querySelector('#vacancies_form');
			vacancies_form.submit();
		}
	</script>
