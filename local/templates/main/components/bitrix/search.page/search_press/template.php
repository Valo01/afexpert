<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
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
$request = Bitrix\Main\Context::getCurrent()->getRequest()->toArray();
$Getpage = $APPLICATION->GetCurPage();
//if($USER->IsAdmin()) { echo "<pre>"; print_r($arResult); echo "</pre>"; } ?>

			<div class="pressList__filters">
              <div class="pressList__tabs">
                <div class="pressList__tabs-inner">
					<a class="btn _tabs__item_ <?if($Getpage == '/press-center/'){echo'active';}?>" href="/press-center/">Все</a>
				  <?$rs = CIBlockSection::GetList(
						["SORT" => "ASC"],
						['IBLOCK_ID' => '2', 'ACTIVE' => 'Y'],
						false,
						['ID', 'NAME', 'SECTION_PAGE_URL']
				  );
				  while ($ar = $rs->GetNext()) { ?>
					<a class="btn _tabs__item_ <?if($Getpage == $ar['SECTION_PAGE_URL']){echo'active';}?>" href="<?=$ar['SECTION_PAGE_URL'];?>">
							<?=$ar['NAME'];?>
					</a>
				  <?if($Getpage == $ar['SECTION_PAGE_URL']){$FilterSectionId=$ar['ID'];}?>
				  <? } ?>
                </div>

				<?php
					 $db_groups = CIBlockElement::GetElementGroups($arItem['ID'], true);
					
					 while($ar_group = $db_groups->Fetch()) {
						?>
							<p class="sub-para">#<?=$ar_group['NAME'] ?> </p>
						
						<?php   
				}?>

				<form action="<?=$Getpage;?>" method="GET" class="pressList__tabs-search" id="press_form">
					  <button type="submit" class="pressList__tabs-search-btn">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							  <g id="MagnifyingGlass">
								<path id="Vector" d="M21.3975 20.6023L16.5806 15.7854C17.9542 14.2057 18.6608 12.1545 18.5515 10.064C18.4422 7.9735 17.5255 6.00712 15.9946 4.57934C14.4638 3.15157 12.4384 2.37395 10.3453 2.41041C8.25232 2.44686 6.25521 3.29454 4.775 4.77475C3.29478 6.25497 2.4471 8.25208 2.41065 10.3451C2.3742 12.4381 3.15182 14.4635 4.57959 15.9944C6.00736 17.5253 7.97374 18.442 10.0642 18.5513C12.1547 18.6606 14.206 17.954 15.7856 16.5804L20.6025 21.3973C20.7091 21.4966 20.8502 21.5507 20.9959 21.5481C21.1416 21.5456 21.2807 21.4865 21.3837 21.3835C21.4868 21.2804 21.5458 21.1414 21.5484 20.9957C21.551 20.8499 21.4969 20.7089 21.3975 20.6023ZM3.5625 10.4998C3.5625 9.12765 3.96938 7.78636 4.73168 6.64549C5.49399 5.50463 6.57748 4.61543 7.84514 4.09035C9.1128 3.56526 10.5077 3.42788 11.8534 3.69556C13.1992 3.96325 14.4353 4.62398 15.4056 5.59421C16.3758 6.56443 17.0365 7.80058 17.3042 9.14632C17.5719 10.4921 17.4345 11.887 16.9094 13.1546C16.3843 14.4223 15.4951 15.5058 14.3543 16.2681C13.2134 17.0304 11.8721 17.4373 10.5 17.4373C8.66075 17.435 6.89747 16.7034 5.59692 15.4028C4.29637 14.1023 3.56474 12.339 3.5625 10.4998Z" fill="white" />
							  </g>
							</svg>
					  </button>
					  <input class="input__field" type="hidden" name="where" id="where" value="iblock_blog">
					  <input class="input__field" type="text" name="q" id="q" value="<?=$arResult["REQUEST"]["QUERY"]?>" size="40" placeholder="Поиск по пресс-центру">
					  <input type="hidden" name="how" value="<?echo $arResult["REQUEST"]["HOW"]=="d"? "d": "r"?>" />

						<? $tagsResult = [];
						$tags_enums = CIBlockPropertyEnum::GetList(Array(), Array("IBLOCK_ID"=>2, "CODE"=>"TAGS_LIST"));
						while($enum_fields = $tags_enums->GetNext()) {
								$tagsResult[] = [
									'ID' => $enum_fields["ID"],
									'NAME' => $enum_fields["VALUE"],
								];
						} 
						$GLOBALS['requestFilter'] = array(); /*$arrrequest = explode(',', $request['tags_list']);*/ 
						if (!empty($request['tags_list'])) { $GLOBALS['requestFilter'] = array_merge($GLOBALS['requestFilter'], Array("PROPERTY_TAGS_LIST_VALUE" => $request['tags_list'])); }
						if ($Getpage != '/press-center/') { $GLOBALS['requestFilter'] = array_merge($GLOBALS['requestFilter'], Array("SECTION_ID" => $FilterSectionId)); } ?>
						<select multiple="multiple" name="tags_list[]" id="tags_list" class="input__field" style="opacity: 0; display: none;">
							<option value="">все</option>
							<? foreach ($tagsResult as $tags_list) {?>
								<option value="<?=$tags_list['NAME']?>" <? foreach ($request['tags_list'] as $tags) { if ($tags == $tags_list['NAME']) { ?>selected<?}}?>><?=$tags_list['NAME']?></option>
							<? }?>
						</select>
				</form>

              </div>
              <div class="pressList__tags">
                <div class="pressList__tags-inner">

					<? foreach ($tagsResult as $tags_id) {?>
						<button class="btn pressList__tags-item <? foreach ($request['tags_list'] as $tags) { if ($tags == $tags_id['NAME']) { ?>active<?}}?>" onclick="changeTagsList(this)">
							<span class="value"><?=$tags_id['NAME'];?></span>
							<svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
							  <path d="M11.7362 1.08654L1.08669 11.7361" stroke="black" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="round" />
							  <path d="M11.7387 11.7362L1.08909 1.08669" stroke="black" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="round" />
							</svg>
						</button>
				   <? } ?>

                </div>
                <button class="btn btn--reset <? if (!empty($request['tags_list'])){?>visible<?}?>" onclick="offTagsList(this)">
				  <span>Сбросить все</span>
                  <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.7362 1.08654L1.08669 11.7361" stroke="black" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="round" />
                    <path d="M11.7387 11.7362L1.08909 1.08669" stroke="black" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="round" />
                  </svg>
                </button>
              </div>
            </div>
            <div class="pressList__item active">
              <div class="pressList__item-list loadmore_wrap_too_1" data-modal-gallery="gallery">

				  <?if($arResult["REQUEST"]["QUERY"] === false && $arResult["REQUEST"]["TAGS"] === false || $arResult["ERROR_CODE"]!=0):?>

						<? $APPLICATION->IncludeComponent(
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
								"DISPLAY_BOTTOM_PAGER" => "Y",
								"DISPLAY_DATE" => "N",
								"DISPLAY_NAME" => "N",
								"DISPLAY_PICTURE" => "N",
								"DISPLAY_PREVIEW_TEXT" => "N",
								"DISPLAY_TOP_PAGER" => "N",
								"FIELD_CODE" => array("NAME","PREVIEW_TEXT","PREVIEW_PICTURE",""),
								"FILTER_NAME" => "requestFilter",
								"HIDE_LINK_WHEN_NO_DETAIL" => "N",
								"IBLOCK_ID" => "2",
								"IBLOCK_TYPE" => "press",
								"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
								"INCLUDE_SUBSECTIONS" => "Y",
								"MESSAGE_404" => "",
								"NEWS_COUNT" => "15",
								"PAGER_BASE_LINK_ENABLE" => "N",
								"PAGER_DESC_NUMBERING" => "N",
								"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
								"PAGER_SHOW_ALL" => "N",
								"PAGER_SHOW_ALWAYS" => "N",
								"PAGER_TEMPLATE" => "page_template",
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
								"SORT_BY1" => "active_from",
								"SORT_BY2" => "",
								"SORT_ORDER1" => "ABS",
								"SORT_ORDER2" => "",
								"STRICT_SECTION_CHECK" => "N"
							)
						);?>

				<?elseif(count($arResult["SEARCH"])>0):?>
					<?if($arParams["DISPLAY_TOP_PAGER"] != "N") echo $arResult["NAV_STRING"]?>

					<?foreach($arResult["SEARCH"] as $arItem):
						$grab = GetIBlockElement($arItem["ITEM_ID"]); //echo print_r($grab);
						if($grab["PREVIEW_PICTURE"]!=''):
							$arImage = CFile::ResizeImageGet($grab["PREVIEW_PICTURE"], array("width" => 600, "height" => 600), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false);
						endif;?>

						<?if($grab["PROPERTIES"]["STYLE"]["VALUE"]=="card-file"):
							$arImageBig = CFile::ResizeImageGet($grab["PREVIEW_PICTURE"], array("width" => 1200, "height" => 1200), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false);?>
							<a class="pressList__card pressList__card--default pressList__card--default--letter loadmore_item_too" href="<?=$arImageBig['src'];?>" data-modal-gallery="el-gallery">
								  <div class="pressList__card-content">
									<div class="pressList__card-content-inner">
									  <div class="pressList__card-content-date">
										<?=$grab["PROPERTIES"]["DATE"]["VALUE"];?>
									  </div>
									  <div class="pressList__card-content-title">
										<?=$grab["VALUE"];?>
									  </div>
									</div>
									<div class="pressList__card-content-tags">
										<?foreach($grab["PROPERTIES"]["TAGS_LIST"]["VALUE"] as $arId):?>
										  <span class="pressList__card-content-tags-item">
											<?=$arId;?>
										  </span>
										<?endforeach;?>
									</div>
								  </div>
								  <img class="pressList__card-img" src="<?=$arImage['src'];?>" alt="img">
						   </a>
						<?elseif($grab["PROPERTIES"]["STYLE"]["VALUE"]=="big-photo"):?>
							<div class="pressList__card pressList__card--default pressList__card--default--img loadmore_item_too">
								  <? if($arImage['src']):?><img class="pressList__card-img" src="<?=$arImage['src'];?>" alt="img"><?endif;?>
								  <div class="pressList__card-content">
									<div class="pressList__card-content-inner">
									  <div class="pressList__card-content-date">
										<?=$grab["PROPERTIES"]["DATE"]["VALUE"];?>
									  </div>
									  <a href="<?echo $grab["URL"]?>" class="pressList__card-content-title">
										<?=$grab["NAME"];?>
									  </a>
									</div>
									<div class="pressList__card-content-tags">
									  <div class="pressList__card-content-tags-inner">
										<?foreach($grab["PROPERTIES"]["TAGS_LIST"]["VALUE"] as $arId):?>
										  <span class="pressList__card-content-tags-item">
											<?=$arId;?>
										  </span>
										<?endforeach;?>
									  </div>
										<? if(($grab["PROPERTIES"]["VIDEO"]["VALUE"]) OR ($grab["PROPERTIES"]["VIDEO_URL"]["VALUE"])):?>
										  <?if($arItem["PROPERTIES"]["VIDEO"]["VALUE"]):?> 
											<span class="btn__play-video" data-video='{"source": [{"src":"<?echo CFile::GetPath($arItem["PROPERTIES"]["VIDEO"]["VALUE"]);?>", "type":"video/mp4"}], "tracks": [], "attributes": {"preload": false, "controls": true, "playsinline": true}}' data-poster="<?=CFile::GetPath($arItem["PROPERTIES"]["VIDEO_FON"]["VALUE"]);?>" data-modal-gallery="el-gallery">
											  <img src="<?= SITE_TEMPLATE_PATH ?>/assets/icons/play.svg" alt="play">
											</span>
										  <?else:?> 
											<span class="btn__play-video" data-src="<?echo $arItem["PROPERTIES"]["VIDEO_URL"]["VALUE"];?>" data-modal-gallery="el-gallery">
											  <img src="<?= SITE_TEMPLATE_PATH ?>/assets/icons/play.svg" alt="play">
											</span>
										  <?endif;?>
										<?endif;?>
									</div>
								  </div>
							</div>
						<?elseif($grab["PROPERTIES"]["STYLE"]["VALUE"]=="big-card" && $arParams["BLOCK_MORE"]!="YES"):?>
							<div class="pressList__card pressList__card--big loadmore_item_too">
								  <? if($arImage['src']):?><img class="pressList__card-img" src="<?=$arImage['src'];?>" alt="img"><?endif;?>
								  <div class="pressList__card-content">
									<div class="pressList__card-content-inner">
									  <div class="pressList__card-content-date">
										<?=$grab["PROPERTIES"]["DATE"]["VALUE"];?>
									  </div>
									  <a href="<?echo $grab["URL"]?>" class="pressList__card-content-title">
										<?=$grab["NAME"];?>
									  </a>
									</div>
									<div class="pressList__card-content-tags">
										<div class="pressList__card-content-tags-inner">
											<?foreach($grab["PROPERTIES"]["TAGS_LIST"]["VALUE"] as $arId):?>
											  <span class="pressList__card-content-tags-item">
												<?=$arId;?>
											  </span>
											<?endforeach;?>
										</div>
										<? if(($grab["PROPERTIES"]["VIDEO"]["VALUE"]) OR ($grab["PROPERTIES"]["VIDEO_URL"]["VALUE"])):?>
										  <?if($arItem["PROPERTIES"]["VIDEO"]["VALUE"]):?> 
											<span class="btn__play-video" data-video='{"source": [{"src":"<?echo CFile::GetPath($arItem["PROPERTIES"]["VIDEO"]["VALUE"]);?>", "type":"video/mp4"}], "tracks": [], "attributes": {"preload": false, "controls": true, "playsinline": true}}' data-poster="<?=CFile::GetPath($arItem["PROPERTIES"]["VIDEO_FON"]["VALUE"]);?>" data-modal-gallery="el-gallery">
											  <img src="<?= SITE_TEMPLATE_PATH ?>/assets/icons/play.svg" alt="play">
											</span>
										  <?else:?> 
											<span class="btn__play-video" data-src="<?echo $arItem["PROPERTIES"]["VIDEO_URL"]["VALUE"];?>" data-modal-gallery="el-gallery">
											  <img src="<?= SITE_TEMPLATE_PATH ?>/assets/icons/play.svg" alt="play">
											</span>
										  <?endif;?>
										<?endif;?>
									</div>
								  </div>
							</div>
						<?else:?>
							<div class="pressList__card pressList__card--default loadmore_item_too">
								  <? if($arImage['src']):?><img class="pressList__card-img" src="<?=$arImage['src'];?>" alt="img"><?endif;?>
								  <div class="pressList__card-content">
									<div class="pressList__card-content-inner">
									  <div class="pressList__card-content-date">
										<?=$grab["PROPERTIES"]["DATE"]["VALUE"];?>
									  </div>
									  <a href="<?echo $grab["URL"]?>" class="pressList__card-content-title">
										<?=$grab["NAME"];?>
									  </a>
									</div>
									<div class="pressList__card-content-tags">
										<div class="pressList__card-content-tags-inner">
											<?foreach($grab["PROPERTIES"]["TAGS_LIST"]["VALUE"] as $arId):?>
											  <span class="pressList__card-content-tags-item">
												<?=$arId;?>
											  </span>
											<?endforeach;?>
										</div>
										<? if(($grab["PROPERTIES"]["VIDEO"]["VALUE"]) OR ($grab["PROPERTIES"]["VIDEO_URL"]["VALUE"])):?>
										  <?if($arItem["PROPERTIES"]["VIDEO"]["VALUE"]):?> 
											<span class="btn__play-video" data-video='{"source": [{"src":"<?echo CFile::GetPath($arItem["PROPERTIES"]["VIDEO"]["VALUE"]);?>", "type":"video/mp4"}], "tracks": [], "attributes": {"preload": false, "controls": true, "playsinline": true}}' data-poster="<?=CFile::GetPath($arItem["PROPERTIES"]["VIDEO_FON"]["VALUE"]);?>" data-modal-gallery="el-gallery">
											  <img src="<?= SITE_TEMPLATE_PATH ?>/assets/icons/play.svg" alt="play">
											</span>
										  <?else:?> 
											<span class="btn__play-video" data-src="<?echo $arItem["PROPERTIES"]["VIDEO_URL"]["VALUE"];?>" data-modal-gallery="el-gallery">
											  <img src="<?= SITE_TEMPLATE_PATH ?>/assets/icons/play.svg" alt="play">
											</span>
										  <?endif;?>
										<?endif;?>
									</div>
								  </div>
							</div>
						<?endif;?>

					<?endforeach;?>

				<?else:?>
					<div class="pressList__text-result"><?ShowNote(GetMessage("SEARCH_NOTHING_TO_FOUND"));?></div>
				<?endif;?>

				<?if($arParams["DISPLAY_BOTTOM_PAGER"] != "N") echo $arResult["NAV_STRING"]?>

				</div>
            </div>

	<script>
		function changeTagsList(thisTags) {
			let elem = document.querySelector('#tags_list');
			let botton = thisTags.querySelector('.value');
			let values = [];
			let options = elem && elem.options;
			let opt;
			for (var i=0, iLen=options.length; i<iLen; i++) {
				opt = options[i];
				if (opt.selected) {
				  values.push(opt.value || opt.text);
				}
			}
			if(thisTags.classList.contains('active')) {
				let index = values.indexOf(botton.innerHTML);
				if (index !== -1) { values.splice(index, 1); };
				for (i = 0; i < elem.length; i++) { 
					if(elem[i].value == botton.innerHTML){ elem[i].removeAttribute("selected"); };
				}
				elem.dispatchEvent(new Event('change'));
			} else {
				values.push(botton.innerHTML);
				for (i = 0; i < elem.length; i++) {
					if(elem[i].value == botton.innerHTML){ elem[i].setAttribute('selected', true); };
				}
				elem.dispatchEvent(new Event('change'));
			}
			let press_form = document.querySelector('#press_form');
			press_form.submit();
		}
		function offTagsList(thisTags) {
			let elem = document.querySelector('#tags_list');
			for (i = 0; i < elem.length; i++) {
				elem[i].removeAttribute("selected");
			}
			elem.dispatchEvent(new Event('change'));
			let press_form = document.querySelector('#press_form');
			press_form.submit();
		}
	</script>
