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
$this->setFrameMode(true);?>

			<form class="search-form" action="<?=$arResult["FORM_ACTION"]?>">
					<img class="header__search-logo" src="<?= SITE_TEMPLATE_PATH ?>/assets/icons/wh-logo.svg" alt="logo">
					<div class="header__search-input-wrapper">

						<?if($arParams["USE_SUGGEST"] === "Y"):?><?$APPLICATION->IncludeComponent(
							"bitrix:search.suggest.input","suggest_input",
							array(
								"NAME" => "q",
								"VALUE" => "",
								"INPUT_SIZE" => 15,
								"DROPDOWN_SIZE" => 10,
							),
							$component, array("HIDE_ICONS" => "Y")
						);?><?else:?><input type="text" name="q" value="" size="15" maxlength="50" class="header__search-input" placeholder="Что будем искать?" required/><?endif;?>

						<button type="submit" class="header__search-submit">
							<svg width="28" height="26" viewBox="0 0 28 26" fill="none" xmlns="http://www.w3.org/2000/svg" class="search-icon" data-v-61e15438="">
							<circle cx="11" cy="11" r="10" stroke="#878EA6" stroke-width="2" data-v-61e15438=""></circle> 
							<line x1="18.6585" y1="18.2474" x2="26.6585" y2="25.2474" stroke="#878EA6" stroke-width="2"></line>
							</svg>
						</button>
						<button class="header__search-clear">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path d="M11.5456 12.5165L11.5014 12.4723L11.4572 12.5165L5.23782 18.7369C5.10881 18.8659 4.93384 18.9383 4.75139 18.9383C4.56895 18.9383 4.39397 18.8659 4.26496 18.7368C4.13595 18.6078 4.06348 18.4329 4.06348 18.2504C4.06348 18.068 4.13595 17.893 4.26496 17.764L10.4853 11.5446L10.5295 11.5004L10.4853 11.4562L4.26496 5.23685C4.26496 5.23685 4.26496 5.23685 4.26496 5.23684C4.13595 5.10784 4.06348 4.93286 4.06348 4.75042C4.06348 4.56797 4.13595 4.393 4.26496 4.26399C4.39397 4.13498 4.56895 4.0625 4.75139 4.0625C4.93384 4.0625 5.10881 4.13498 5.23782 4.26398C5.23782 4.26398 5.23782 4.26399 5.23782 4.26399L11.4572 10.4843L11.5014 10.5285L11.5456 10.4843L17.765 4.26398C17.894 4.13498 18.0689 4.0625 18.2514 4.0625C18.4338 4.0625 18.6088 4.13498 18.7378 4.26399C18.8668 4.393 18.9393 4.56797 18.9393 4.75042C18.9393 4.93286 18.8668 5.10784 18.7378 5.23685L12.5175 11.4562L12.4733 11.5004L12.5175 11.5446L18.7378 17.764C18.8017 17.8279 18.8524 17.9037 18.8869 17.9872C18.9215 18.0706 18.9393 18.1601 18.9393 18.2504C18.9393 18.3408 18.9215 18.4302 18.8869 18.5137C18.8524 18.5971 18.8017 18.673 18.7378 18.7368C18.6739 18.8007 18.5981 18.8514 18.5147 18.886C18.4312 18.9205 18.3417 18.9383 18.2514 18.9383C18.1611 18.9383 18.0716 18.9205 17.9881 18.886C17.9047 18.8514 17.8288 18.8007 17.765 18.7368L11.5456 12.5165Z" fill="#262531" stroke="#262531" stroke-width="0.125"/>
							</svg>
						</button>
						<!--<div class="header__search-result">
							<div class="header__search-result-links">
								<a class="header__search-result-link" href="javascript:void(0);">вывод</a>
							</div>
							<input name="s" type="submit" value="Смотреть все результаты поиска" class="header__search-result-all"/>
						</div>-->
					</div>
			</form>
