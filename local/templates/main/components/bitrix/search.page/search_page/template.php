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
?>

		<div class="search-page container">
            <div class="pressList__filters">
              <div class="pressList__tabs">

                <form class="pressList__tabs-search" action="" method="get">
                  <button class="pressList__tabs-search-btn search__btn-reset">
                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M11.7362 1.08654L1.08669 11.7361" stroke="#c3c6d2" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="round" />
                      <path d="M11.7387 11.7362L1.08909 1.08669" stroke="#c3c6d2" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="round" />
                    </svg>
                  </button>
				  <input type="text" name="q" value="<?=$arResult["REQUEST"]["QUERY"]?>" style="padding-left: 46px;" size="40" class="input__field" placeholder="Введите запрос"/>
					<input type="hidden" name="how" value="<?echo $arResult["REQUEST"]["HOW"]=="d"? "d": "r"?>" />
					<button type="submit" class="header__search-submit" style="position: absolute; top: 13px; left: 13px;">
						<svg width="28" height="26" viewBox="0 0 28 26" fill="none" xmlns="http://www.w3.org/2000/svg" class="search-icon" data-v-61e15438="" style="width: 24px; height: 24px;">
						  <circle cx="11" cy="11" r="10" stroke="#878EA6" stroke-width="2" data-v-61e15438=""></circle> 
						  <line x1="18.6585" y1="18.2474" x2="26.6585" y2="25.2474" stroke="#878EA6" stroke-width="2"></line>
						</svg>
					</button>
                </form>

				<div class="pressList__tabs-inner">
						<button class="btn tabs__item active">Все</button>
						<?foreach($arResult["DROPDOWN"] as $key=>$value): $valueOne=true;?>
								<?foreach($arResult["SEARCH"] as $arItem):?>
									<? $resBlock = GetIBlock($arItem["PARAM2"]); $BlockName = $resBlock["NAME"]; if($BlockName==$value and $valueOne==true): $valueOne=false;?>
										<button class="btn tabs__item"><?=$value;?></button>
									<?endif;?>
								<?endforeach;?>
						<?endforeach;?>
				</div>

              </div>

				<?if(isset($arResult["REQUEST"]["ORIGINAL_QUERY"])):?>
					<div class="search-language-guess">
						<?echo GetMessage("CT_BSP_KEYBOARD_WARNING", array("#query#"=>'<a href="'.$arResult["ORIGINAL_QUERY_URL"].'">'.$arResult["REQUEST"]["ORIGINAL_QUERY"].'</a>'))?>
					</div>
				<?endif;?>

            </div>

				<?if($arResult["REQUEST"]["QUERY"] === false && $arResult["REQUEST"]["TAGS"] === false):?>
				<?elseif($arResult["ERROR_CODE"]!=0):?>
					<div class="pressList__text-result">Пустой запрос, ничего не найдено</div>
				<?elseif(count($arResult["SEARCH"])>0):?>

					  <div class="pressList__item active">
              			<div class="search__block loadmore_wrap_too_1">

						<?foreach($arResult["SEARCH"] as $arItem):?>

								<a class="search__item loadmore_item_too" href="<?echo $arItem["URL"]?>">
									<? $grab = GetIBlockElement($arItem["ITEM_ID"]); $image_prw = CFile::GetPath($grab["PREVIEW_PICTURE"]);
									 if($image_prw!=''):?>
									  <div class="search__item-img">
										<img src="<?=$image_prw;?>">
									  </div>
									<?endif?>
								  <div class="search__item-content">
									<div class="search__item-title"><?echo $arItem["TITLE_FORMATED"]?></div>
									<div class="search__item-subtitle"><?echo $arItem["BODY_FORMATED"]?></div>
								  </div>
								  <div class="search__item-icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
									  <path d="M15.833 4.58301L4.16634 16.2497" stroke="#4B23EB" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
									  <path d="M15.833 13.1413V4.58301H7.27467" stroke="#4B23EB" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
									</svg>
								  </div>
								</a>

						<?endforeach;?>

						<?if($arParams["DISPLAY_BOTTOM_PAGER"] != "N") echo $arResult["NAV_STRING"]?>

						</div>
            		  </div>

					<?foreach($arResult["DROPDOWN"] as $key=>$value):?>

					  <div class="pressList__item">
              			<div class="search__block loadmore_wrap_too_0">

						<?foreach($arResult["SEARCH"] as $arItem):?>
							<? $resBlock = GetIBlock($arItem["PARAM2"]); $BlockName = $resBlock["NAME"];
							if($BlockName==$value):?>

								<a class="search__item loadmore_item_too" href="<?echo $arItem["URL"]?>">
									<? $grab = GetIBlockElement($arItem["ITEM_ID"]); $image_prw = CFile::GetPath($grab["PREVIEW_PICTURE"]);
									 if($image_prw!=''):?>
									  <div class="search__item-img">
										<img src="<?=$image_prw;?>">
									  </div>
									<?endif?>
								  <div class="search__item-content">
									<div class="search__item-title"><?echo $arItem["TITLE_FORMATED"]?></div>
									<div class="search__item-subtitle"><?echo $arItem["BODY_FORMATED"]?></div>
								  </div>
								  <div class="search__item-icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
									  <path d="M15.833 4.58301L4.16634 16.2497" stroke="#4B23EB" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
									  <path d="M15.833 13.1413V4.58301H7.27467" stroke="#4B23EB" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
									</svg>
								  </div>
								</a>

							<?endif;?>
						<?endforeach;?>

						</div>
            		  </div>

					<?endforeach?>

				<?else:?>
					<div class="pressList__text-result"><?ShowNote(GetMessage("SEARCH_NOTHING_TO_FOUND"));?></div>
				<?endif;?>

		</div>
