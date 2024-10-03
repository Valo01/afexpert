<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)	die();
  use Bitrix\Main\Page\Asset; 
  if (CModule::IncludeModule("iblock")){
	$contacts = CIBlockElement::GetList(
    [], ['IBLOCK_ID' => 25],
    false, false,
    ['ID', 'PROPERTY_Phone', 'PROPERTY_Email', 'PROPERTY_Adress', 'PROPERTY_telegram', 'PROPERTY_whatsapp', 'PROPERTY_youtube', 'PROPERTY_dzen']
	);
	while ($contres = $contacts->GetNext()) {
    $CnPhone = $contres["PROPERTY_PHONE_VALUE"];
	$CnEmail = $contres["PROPERTY_EMAIL_VALUE"];
	$CnAdress[] = $contres["PROPERTY_ADRESS_VALUE"];
	$Cntelegram = $contres["PROPERTY_TELEGRAM_VALUE"];
	$Cnwhatsapp = $contres["PROPERTY_WHATSAPP_VALUE"];
	$Cnyoutube = $contres["PROPERTY_YOUTUBE_VALUE"];
	$Cndzen = $contres["PROPERTY_DZEN_VALUE"];
  }
}?>

<!doctype html>
<html xml:lang="<?= LANGUAGE_ID ?>" lang="<?= LANGUAGE_ID ?>">

<head>
    <?$APPLICATION->ShowHead();?>

	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<title><?$APPLICATION->ShowTitle();?></title>
	<link rel="icon" type="image/x-icon" href="<?= SITE_TEMPLATE_PATH ?>/assets/favicon.ico">
	<link rel="canonical" href="<?$current_link  = (CMain::IsHTTPS() ? "https://" : "http://").$_SERVER["SERVER_NAME"].$APPLICATION->GetCurDir();; echo $current_link;?>">

	<? Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/css/index.css"); ?>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/jquery-ui-slider@1.12.1/jquery-ui.min.css">
	<!--link(rel="preconnect" href="https://fonts.googleapis.com")-->
	<!--link(rel="preconnect" href="https://fonts.gstatic.com" crossorigin)-->
	<!--link(href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600&display=swap" rel="stylesheet")-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/hystmodal@1.0.1/dist/hystmodal.min.css">
	<!--link(href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" rel='stylesheet')-->
	<!--link(href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" media="(min-width: 1024px)")-->
	<!--link(rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css")-->
	<!--link(rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="")-->
	<? Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/scripts/index.1.js"); ?>
	<? Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/scripts/svg-injector.min.js"); ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" defer></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-ui-slider@1.12.1/jquery-ui.min.js" defer></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js" defer></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js" defer integrity="sha512-efAcjYoYT0sXxQRtxGY37CKYmqsFVOIwMApaEbrxJr4RwqVVGw8o+Lfh/+59TU07+suZn1BWq4fDl5fdgyCNkw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js" defer></script>
	<script src="https://cdn.scaleflex.it/plugins/js-cloudimage-360-view/latest/js-cloudimage-360-view.min.js" defer></script>
	<script src="https://cdn.jsdelivr.net/npm/hystmodal@1.0.1/dist/hystmodal.min.js" defer></script>
	<!--script(src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" defer)-->
	<!--script(src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer)-->
	<!--script(src="https://cdnjs.cloudflare.com/ajax/libs/smoothscroll/1.4.10/SmoothScroll.min.js" integrity="sha256-huW7yWl7tNfP7lGk46XE+Sp0nCotjzYodhVKlwaNeco=" crossorigin="anonymous")-->
	<!--script(src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js")-->
	<!--script(src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js")-->
	<!--script(src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollToPlugin.min.js")-->
	<!--script(src="https://unpkg.com/locomotive-scroll@4.1.4/dist/locomotive-scroll.js")-->
	<!--script(src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js")-->
	<!--script(src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.4/swiper-bundle.min.js")-->
	<!--script(src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js")-->
	<!--script(src="http://api-maps.yandex.ru/2.1/?lang=ru_RU")-->
	<!--script(src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin="")-->
<!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date(); for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }} k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(97812749, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/97812749" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
</head>

<body class="body">
<!-- Roistat Counter Start -->
<script>(function(w, d, s, h, id) {    w.roistatProjectId = id; w.roistatHost = h;    var p = d.location.protocol == "https:" ? "https://" : "http://";    var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/"+id+"/init?referrer="+encodeURIComponent(d.location.href);    var js = d.createElement(s); js.charset="UTF-8"; js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);})(window, document, 'script', 'cloud.roistat.com', '0e8d8299d84f5380eda4dffb17a52d01');</script>
<!-- Roistat Counter End -->
<div id="panel"><?$APPLICATION->ShowPanel();?></div>

<!--предотвращаем нативный скролл до запуска локомотива, скрипт нужнен на всех страницах и как можно раньше, поэтому разместил тут-->
<script type="text/javascript">window.addEventListener('scroll', function () {  window.scrollTo(0, 0);});</script>
<div class="page <? $APPLICATION->ShowViewContent("HEADER_TOO");?>" data-scroll-container>
<!--script(type="text/javascript").window.addEventListener('scroll', function () {
  window.scrollTo(0, 0);
});-->

	<div class="header__address">
		<div class="header__address-close"></div>
		<div class="header__address-content"><h3>Наши адреса</h3>
			<div class="header__address-close">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M18.75 5.25L5.25 18.75" stroke="#262531" stroke-width="2.5" stroke-linecap="square" stroke-linejoin="round"/>
				<path d="M18.75 18.75L5.25 5.25" stroke="#262531" stroke-width="2.5" stroke-linecap="square" stroke-linejoin="round"/>
				</svg>
			</div>
			<div class="header__address-list">
				<?foreach($CnAdress as $arId):?>
					<a class="header__address-link" href="https://<?=$_SERVER["SERVER_NAME"];?>/#section_map"> 
						<span><?=$arId;?></span>
					<!--img(src=require("../../icons/long-arrow-blue-left.svg"))--></a>
				<?endforeach;?>
			</div>
		</div>
	</div>

	<div class="header__search">
		<div class="header__search-content">
			<div class="container">

				<?$APPLICATION->IncludeComponent(
					"bitrix:search.form", "search_modal",
					Array(
						"PAGE" => "#SITE_DIR#search/index.php",
						"USE_SUGGEST" => "N"
					)
				);?>

			</div>
		</div>
	</div>

	<div class="header__burger" id="burgerMenu">
        <div class="header__burger-content">
          <div class="container">
            <div class="mobile-search-wrap">
              <div class="header__search">
                <div class="header__search-content">
                  <div class="container">

                    <?$APPLICATION->IncludeComponent(
						"bitrix:search.form", "search_modal",
						Array(
							"PAGE" => "#SITE_DIR#search/index.php",
							"USE_SUGGEST" => "N"
						)
					);?>

                  </div>
                </div>
              </div>
            </div>
            <div class="header__burger-menu">
              <div class="header__burger-menu--top">
                <div class="header__burger-menu-items active">
					<div class="header__burger-menu-item" data-id="1">Технические решения</div>
                  <div class="header__burger-menu-item" data-id="2">Отраслевые решения</div>
                  <div class="header__burger-menu-item" data-id="3">Услуги</div>
                  <div class="header__burger-menu-item" data-id="4">О компании</div>
                  <div class="header__burger-menu-item header__burger-menu-item--mobile" data-id="5">Наши адеса</div>
                </div>
                <div class="header__burger-submenu">
                  <div class="header__burger-submenu-item submenu-tech" data-id="1">
                    <div class="submenu__back-btn">Назад</div>
                    <div class="submenu__item-title">Технические решения</div>
                    <div class="submenu-cards">
						<?$APPLICATION->IncludeComponent(
							"bitrix:news.list", "list_menu_products",
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
								"IBLOCK_ID" => "4",
								"IBLOCK_TYPE" => "",
								"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
								"INCLUDE_SUBSECTIONS" => "Y",
								"MESSAGE_404" => "",
								"NEWS_COUNT" => "4",
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
								"PROPERTY_CODE" => array(0 => ""),
								"SET_BROWSER_TITLE" => "N",
								"SET_LAST_MODIFIED" => "N",
								"SET_META_DESCRIPTION" => "N",
								"SET_META_KEYWORDS" => "N",
								"SET_STATUS_404" => "N",
								"SET_TITLE" => "N",
								"SHOW_404" => "N",
								"SORT_BY1" => "SORT",
								"SORT_BY2" => "",
								"SORT_ORDER1" => "ASC",
								"SORT_ORDER2" => "",
								"STRICT_SECTION_CHECK" => "N"
							)
						);?>
					</div>
					<a class="submenu-more-btn btn__big-gray" href="/technical-solutions/">Смотреть все</a>
                  </div>
                  <div class="header__burger-submenu-item submenu-industry" data-id="2">
                    <div class="submenu__back-btn">Назад</div>
                    <div class="submenu__item-title">Отраслевые решения</div>
					<div class="submenu-cards submenu-services">
						<?$APPLICATION->IncludeComponent(
							"bitrix:news.list", "list_menu_industry",
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
								"IBLOCK_ID" => "5",
								"IBLOCK_TYPE" => "",
								"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
								"INCLUDE_SUBSECTIONS" => "Y",
								"MESSAGE_404" => "",
								"NEWS_COUNT" => "4",
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
								"PROPERTY_CODE" => array(0 => ""),
								"SET_BROWSER_TITLE" => "N",
								"SET_LAST_MODIFIED" => "N",
								"SET_META_DESCRIPTION" => "N",
								"SET_META_KEYWORDS" => "N",
								"SET_STATUS_404" => "N",
								"SET_TITLE" => "N",
								"SHOW_404" => "N",
								"SORT_BY1" => "SORT",
								"SORT_BY2" => "",
								"SORT_ORDER1" => "ASC",
								"SORT_ORDER2" => "",
								"STRICT_SECTION_CHECK" => "N"
							)
						);?>
					</div>
					<a class="submenu-more-btn btn__big-gray" href="/industry-solutions/">Смотреть все</a>
                  </div>
                  <div class="header__burger-submenu-item submenu-services" data-id="3">
                    <div class="submenu__back-btn">Назад</div>
                    <div class="submenu__item-title">Услуги</div>
                    <div class="submenu-cards">
						<?$APPLICATION->IncludeComponent(
							"bitrix:news.list", "list_menu_services",
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
								"IBLOCK_ID" => "6",
								"IBLOCK_TYPE" => "",
								"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
								"INCLUDE_SUBSECTIONS" => "Y",
								"MESSAGE_404" => "",
								"NEWS_COUNT" => "4",
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
								"PROPERTY_CODE" => array(0 => "LINK"),
								"SET_BROWSER_TITLE" => "N",
								"SET_LAST_MODIFIED" => "N",
								"SET_META_DESCRIPTION" => "N",
								"SET_META_KEYWORDS" => "N",
								"SET_STATUS_404" => "N",
								"SET_TITLE" => "N",
								"SHOW_404" => "N",
								"SORT_BY1" => "SORT",
								"SORT_BY2" => "",
								"SORT_ORDER1" => "ASC",
								"SORT_ORDER2" => "",
								"STRICT_SECTION_CHECK" => "N"
							)
						);?>
                    </div>
                    <a class="submenu-more-btn btn__big-gray" href="/services/">Смотреть все</a>
                  </div>
                  <div class="header__burger-submenu-item submenu-about" data-id="4">
                    <div class="submenu__back-btn">Назад</div>
                    <div class="submenu__item-title">О компании</div>
					<div class="submenu-cards submenu-services">
						<?$APPLICATION->IncludeComponent(
							"bitrix:news.list", "list_menu_company",
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
								"IBLOCK_ID" => "32",
								"IBLOCK_TYPE" => "",
								"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
								"INCLUDE_SUBSECTIONS" => "Y",
								"MESSAGE_404" => "",
								"NEWS_COUNT" => "4",
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
								"PROPERTY_CODE" => array(0 => "LINK"),
								"SET_BROWSER_TITLE" => "N",
								"SET_LAST_MODIFIED" => "N",
								"SET_META_DESCRIPTION" => "N",
								"SET_META_KEYWORDS" => "N",
								"SET_STATUS_404" => "N",
								"SET_TITLE" => "N",
								"SHOW_404" => "N",
								"SORT_BY1" => "SORT",
								"SORT_BY2" => "",
								"SORT_ORDER1" => "ASC",
								"SORT_ORDER2" => "",
								"STRICT_SECTION_CHECK" => "N"
							)
						);?>
					</div>
                  </div>
                  <div class="header__burger-submenu-item submenu-addresses" data-id="5">
                    <div class="submenu__back-btn">Назад</div>
                    <div class="submenu__item-title">Наши адреса</div>
                    <div class="submenu__address-list">
						<?foreach($CnAdress as $arId):?>
							<a class="submenu__address-link" href="https://<?=$_SERVER["SERVER_NAME"];?>/#section_map">
                        		<span><?=$arId;?></span></a>
						<?endforeach;?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="header__burger-menu--bottom">
				<a class="header__burger-menu-link" href="/projects/">Проекты</a>
				<a class="header__burger-menu-link" href="/press-center/">Пресс-центр</a>
				<a class="header__burger-menu-link" href="/contacts/">Контакты</a>
                <a class="header__btn header__btn-phone" href="tel:<?=str_replace(['(',')','-',' '], '', $CnPhone);?>" target="_blank">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="Phone">
                      <path id="Vector" d="M20.7741 15.0279L16.3453 13.0432C16.1447 12.9573 15.9257 12.9227 15.7083 12.9427C15.4909 12.9626 15.282 13.0365 15.1003 13.1576C15.0819 13.1695 15.0643 13.1826 15.0478 13.197L12.7331 15.1657C12.7091 15.1788 12.6824 15.1862 12.655 15.1871C12.6277 15.1881 12.6005 15.1827 12.5756 15.1714C11.0878 14.4532 9.54657 12.9214 8.82563 11.4542C8.81362 11.4297 8.80738 11.4027 8.80738 11.3754C8.80738 11.3481 8.81362 11.3212 8.82563 11.2967L10.8009 8.95293C10.8151 8.93559 10.8283 8.91744 10.8403 8.89856C10.9597 8.71622 11.0319 8.50701 11.0502 8.28981C11.0685 8.07262 11.0325 7.85427 10.9453 7.6545L8.97469 3.23325C8.86278 2.97226 8.66924 2.7546 8.42312 2.61295C8.177 2.47129 7.89158 2.41328 7.60969 2.44762C6.38459 2.60868 5.26005 3.21031 4.44621 4.14009C3.63238 5.06987 3.18494 6.26417 3.1875 7.49981C3.1875 14.8404 9.15938 20.8123 16.5 20.8123C17.7356 20.8147 18.9298 20.3672 19.8595 19.5534C20.7893 18.7396 21.3909 17.6151 21.5522 16.3901C21.5865 16.1096 21.5292 15.8254 21.389 15.58C21.2488 15.3345 21.0332 15.1409 20.7741 15.0279ZM16.5 19.6873C9.78 19.6873 4.3125 14.2198 4.3125 7.49981C4.30937 6.53787 4.65657 5.60769 5.28923 4.88307C5.9219 4.15845 6.79674 3.68895 7.75032 3.56231H7.77188C7.80966 3.56301 7.84634 3.57512 7.87712 3.59703C7.90791 3.61895 7.93135 3.64965 7.94438 3.68512L9.9225 8.10168C9.93378 8.12624 9.93963 8.15294 9.93963 8.17997C9.93963 8.20699 9.93378 8.23369 9.9225 8.25825L7.94344 10.6076C7.92868 10.6244 7.9152 10.6423 7.90313 10.6611C7.77929 10.8501 7.70637 11.0679 7.69142 11.2934C7.67647 11.519 7.72001 11.7445 7.81782 11.9482C8.64938 13.6507 10.365 15.3532 12.0863 16.1848C12.2912 16.2821 12.5178 16.3246 12.7441 16.3081C12.9703 16.2917 13.1885 16.2169 13.3772 16.0911C13.395 16.0789 13.4128 16.0657 13.4297 16.0517L15.7434 14.0829C15.7663 14.0707 15.7915 14.0635 15.8174 14.0618C15.8433 14.0602 15.8692 14.0642 15.8934 14.0736L20.3231 16.0582C20.3593 16.0737 20.3897 16.1001 20.4101 16.1337C20.4304 16.1673 20.4397 16.2065 20.4366 16.2457C20.3106 17.1998 19.8415 18.0753 19.1171 18.7086C18.3926 19.342 17.4623 19.6899 16.5 19.6873Z" fill="white" />
                    </g>
                  </svg>
                  <?=$CnPhone;?>
                </a>
                <button class="header__btn header__btn-collback blue" data-hystmodal="#m-application">Обратный звонок</button>
                <div class="header__burger-social">
				<?if($Cntelegram):?>
                  <a class="header__burger-social-link" href="<?=$Cntelegram;?>" target="_blank" rel="nofollow">
                    <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M1.3749 7.31839C6.74359 4.9193 10.3236 3.33767 12.1148 2.5735C17.2292 0.391658 18.2919 0.0126486 18.9846 0.000133439C19.1369 -0.00261913 19.4776 0.0361057 19.6982 0.219742C19.8845 0.374801 19.9358 0.584264 19.9603 0.731277C19.9848 0.87829 20.0154 1.21319 19.9911 1.47487C19.714 4.46165 18.5147 11.7098 17.9046 15.055C17.6465 16.4705 17.1382 16.9451 16.6461 16.9916C15.5766 17.0925 14.7645 16.2667 13.7287 15.5702C12.1078 14.4805 11.1921 13.8021 9.61879 12.7387C7.80053 11.5097 8.97923 10.8343 10.0154 9.73037C10.2866 9.44148 14.9987 5.04547 15.0899 4.64668C15.1013 4.59681 15.1119 4.41089 15.0042 4.31273C14.8965 4.21456 14.7376 4.24813 14.6229 4.27483C14.4604 4.31267 11.871 6.06807 6.85486 9.54101C6.11988 10.0587 5.45416 10.3109 4.8577 10.2977C4.20015 10.2831 2.93528 9.91632 1.99498 9.60282C0.84166 9.2183 -0.074973 9.01501 0.00484519 8.36197C0.0464194 8.02183 0.503103 7.67397 1.3749 7.31839Z" fill="#31303B" />
                    </svg>
                  </a>
				<?endif;?>
				<?if($Cnwhatsapp):?>
                  <a class="header__burger-social-link" href="<?=$Cnwhatsapp;?>" target="_blank" rel="nofollow">
                    <svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M17.8136 0.418176C18.6746 0.648666 19.3513 1.32532 19.5818 2.18637C19.9983 3.74547 20 7.00033 20 7.00033C20 7.00033 20 10.2552 19.5818 11.8143C19.3513 12.6754 18.6746 13.352 17.8136 13.5825C16.2545 14.0007 9.99996 14.0007 9.99996 14.0007C9.99996 14.0007 3.74547 14.0007 2.18636 13.5825C1.32532 13.352 0.648666 12.6754 0.418176 11.8143C0 10.2552 0 7.00033 0 7.00033C0 7.00033 0 3.74547 0.418176 2.18637C0.648666 1.32532 1.32532 0.648666 2.18636 0.418176C3.74547 0 9.99996 0 9.99996 0C9.99996 0 16.2545 0 17.8136 0.418176ZM13 7.00002L8 10V4L13 7.00002Z" fill="#31303B" />
                    </svg>
                  </a>
				<?endif;?>
				<?if($Cnyoutube):?>
                  <a class="header__burger-social-link" href="<?=$Cnyoutube;?>" target="_blank" rel="nofollow">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M0.157748 7.32244C-0.250946 9.47663 0.140817 11.7059 1.25947 13.5917L1.25954 13.5917L0.371049 16.7014C0.334289 16.83 0.332603 16.9662 0.366167 17.0957C0.399731 17.2252 0.467324 17.3434 0.561941 17.4381C0.656557 17.5327 0.774755 17.6003 0.904285 17.6338C1.03382 17.6674 1.16996 17.6657 1.29862 17.629L4.40835 16.7405L4.40833 16.7406C6.29412 17.8592 8.52342 18.2509 10.6776 17.8422C12.8318 17.4335 14.7627 16.2525 16.1077 14.5209C17.4527 12.7893 18.1194 10.6262 17.9824 8.43785C17.8455 6.24952 16.9144 4.18644 15.3639 2.63603C13.8135 1.08562 11.7504 0.15452 9.5621 0.0175805C7.37376 -0.119359 5.2107 0.547277 3.47909 1.89231C1.74748 3.23734 0.566443 5.16825 0.157748 7.32244ZM8.57758 13.4382C9.47819 13.8105 10.4434 14.0014 11.4179 14C12.1031 13.9952 12.7587 13.7202 13.2422 13.2348C13.7257 12.7493 13.998 12.0926 14 11.4074C14 11.2949 13.9703 11.1844 13.9138 11.0871C13.8573 10.9898 13.7761 10.9091 13.6784 10.8533L11.784 9.77079C11.6698 9.70551 11.5402 9.67183 11.4087 9.67323C11.2771 9.67463 11.1483 9.71105 11.0354 9.77875L9.5865 10.6481C8.59393 10.2008 7.79916 9.40607 7.3519 8.4135L8.22126 6.96457C8.28895 6.85174 8.32538 6.72291 8.32677 6.59134C8.32817 6.45977 8.2945 6.33019 8.22922 6.21595L7.14671 4.32157C7.09089 4.22388 7.01024 4.14269 6.91293 4.08622C6.81562 4.02974 6.7051 4 6.59259 4C5.90664 3.99942 5.24846 4.27093 4.76243 4.75499C4.2764 5.23904 4.00221 5.89611 4.00001 6.58207C3.99862 7.55659 4.18955 8.52181 4.56184 9.42242C4.93414 10.323 5.48049 11.1413 6.16958 11.8304C6.85867 12.5195 7.67697 13.0659 8.57758 13.4382Z" fill="#31303B" />
                    </svg>
                  </a>
				<?endif;?>
				<?if($Cndzen):?>
                  <a class="header__burger-social-link" href="<?=$Cndzen;?>" target="_blank" rel="nofollow">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M0.00440602 9.7003C0.00147552 9.79985 0 9.8997 0 10C0 10.1002 0.00147548 10.2001 0.00440589 10.2997C4.05552 10.3502 6.33289 10.6273 7.85283 12.1472C9.37269 13.6671 9.64978 15.9445 9.7003 19.9956C9.79985 19.9985 9.89978 20 10 20C10.1002 20 10.2001 19.9985 10.2997 19.9956C10.3502 15.9445 10.6273 13.6671 12.1472 12.1472C13.6671 10.6273 15.9445 10.3502 19.9956 10.2997C19.9985 10.2001 20 10.1002 20 10C20 9.8997 19.9985 9.79985 19.9956 9.7003C15.9445 9.64978 13.6671 9.37269 12.1472 7.85275C10.6273 6.33288 10.3502 4.05551 10.2997 0.00440574C10.2001 0.00147543 10.1002 0 10 0C9.89978 0 9.79985 0.00147545 9.7003 0.00440583C9.64978 4.05551 9.37269 6.33289 7.85283 7.85275C6.33289 9.37269 4.05551 9.64978 0.00440602 9.7003Z" fill="#31303B" />
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M9.7003 0V0.00440583C9.79985 0.00147545 9.89978 0 10 0C10.1002 0 10.2001 0.00147543 10.2997 0.00440574V0H10H9.7003ZM0 9.7003H0.00440602C0.00147552 9.79985 0 9.8997 0 10V9.7003ZM0.00440589 10.2997C0.00147548 10.2001 0 10.1002 0 10V10.2997H0.00440589ZM9.7003 19.9956L9.70037 20H10H10.2997V19.9956C10.2001 19.9985 10.1002 20 10 20C9.89978 20 9.79985 19.9985 9.7003 19.9956ZM20 10.2996L19.9956 10.2997C19.9985 10.2001 20 10.1002 20 10V10.2996ZM20 9.7003V10C20 9.8997 19.9985 9.79985 19.9956 9.7003H20Z" fill="#31303B" />
                    </svg>
                  </a>
				<?endif;?>
                </div>
              </div>
            </div>

            <div class="header__burger-submenu">
              <div class="header__burger-submenu-item submenu-tech active" data-id="1">
                <div class="submenu-cards">
						<?$APPLICATION->IncludeComponent(
							"bitrix:news.list", "list_menu_products",
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
								"IBLOCK_ID" => "4",
								"IBLOCK_TYPE" => "",
								"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
								"INCLUDE_SUBSECTIONS" => "Y",
								"MESSAGE_404" => "",
								"NEWS_COUNT" => "4",
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
								"PROPERTY_CODE" => array(0 => ""),
								"SET_BROWSER_TITLE" => "N",
								"SET_LAST_MODIFIED" => "N",
								"SET_META_DESCRIPTION" => "N",
								"SET_META_KEYWORDS" => "N",
								"SET_STATUS_404" => "N",
								"SET_TITLE" => "N",
								"SHOW_404" => "N",
								"SORT_BY1" => "SORT",
								"SORT_BY2" => "",
								"SORT_ORDER1" => "ASC",
								"SORT_ORDER2" => "",
								"STRICT_SECTION_CHECK" => "N"
							)
						);?>
				</div>
				<a class="submenu-more-btn btn__big-gray" href="/technical-solutions/">Смотреть все</a>
              </div>
              <div class="header__burger-submenu-item submenu-industry" data-id="2">
				<div class="submenu-cards submenu-services">
						<?$APPLICATION->IncludeComponent(
							"bitrix:news.list", "list_menu_industry",
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
								"IBLOCK_ID" => "5",
								"IBLOCK_TYPE" => "",
								"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
								"INCLUDE_SUBSECTIONS" => "Y",
								"MESSAGE_404" => "",
								"NEWS_COUNT" => "4",
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
								"PROPERTY_CODE" => array(0 => ""),
								"SET_BROWSER_TITLE" => "N",
								"SET_LAST_MODIFIED" => "N",
								"SET_META_DESCRIPTION" => "N",
								"SET_META_KEYWORDS" => "N",
								"SET_STATUS_404" => "N",
								"SET_TITLE" => "N",
								"SHOW_404" => "N",
								"SORT_BY1" => "SORT",
								"SORT_BY2" => "",
								"SORT_ORDER1" => "ASC",
								"SORT_ORDER2" => "",
								"STRICT_SECTION_CHECK" => "N"
							)
						);?>
                </div>
                <a class="submenu-more-btn btn__big-gray" href="/industry-solutions/">Смотреть все</a>
              </div>
              <div class="header__burger-submenu-item submenu-services" data-id="3">
                <div class="submenu-cards">
						<?$APPLICATION->IncludeComponent(
							"bitrix:news.list", "list_menu_services",
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
								"IBLOCK_ID" => "6",
								"IBLOCK_TYPE" => "",
								"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
								"INCLUDE_SUBSECTIONS" => "Y",
								"MESSAGE_404" => "",
								"NEWS_COUNT" => "4",
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
								"PROPERTY_CODE" => array(0 => "LINK"),
								"SET_BROWSER_TITLE" => "N",
								"SET_LAST_MODIFIED" => "N",
								"SET_META_DESCRIPTION" => "N",
								"SET_META_KEYWORDS" => "N",
								"SET_STATUS_404" => "N",
								"SET_TITLE" => "N",
								"SHOW_404" => "N",
								"SORT_BY1" => "SORT",
								"SORT_BY2" => "",
								"SORT_ORDER1" => "ASC",
								"SORT_ORDER2" => "",
								"STRICT_SECTION_CHECK" => "N"
							)
						);?>
                </div>
                <a class="submenu-more-btn btn__big-gray" href="/services/">Смотреть все</a>
              </div>
              <div class="header__burger-submenu-item submenu-about" data-id="4">
				<div class="submenu-cards submenu-services">
						<?$APPLICATION->IncludeComponent(
							"bitrix:news.list", "list_menu_company",
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
								"IBLOCK_ID" => "32",
								"IBLOCK_TYPE" => "",
								"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
								"INCLUDE_SUBSECTIONS" => "Y",
								"MESSAGE_404" => "",
								"NEWS_COUNT" => "4",
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
								"PROPERTY_CODE" => array(0 => "LINK"),
								"SET_BROWSER_TITLE" => "N",
								"SET_LAST_MODIFIED" => "N",
								"SET_META_DESCRIPTION" => "N",
								"SET_META_KEYWORDS" => "N",
								"SET_STATUS_404" => "N",
								"SET_TITLE" => "N",
								"SHOW_404" => "N",
								"SORT_BY1" => "SORT",
								"SORT_BY2" => "",
								"SORT_ORDER1" => "ASC",
								"SORT_ORDER2" => "",
								"STRICT_SECTION_CHECK" => "N"
							)
						);?>
				</div>
              </div>
              <div class="header__burger-submenu-item submenu-addresses" data-id="5">
                <div class="submenu__address-list">
					<?foreach($CnAdress as $arId):?>
						<a class="submenu__address-link" href="javascript:void(0);">
						  <span><?=$arId;?></span>
						</a>
					<?endforeach;?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <header class="header visible">
        <div class="container">
          <div class="header__wrapper">
            <div class="header__left">
			  <a href="/" class="header__logo">
                <img class="white" src="<?= SITE_TEMPLATE_PATH ?>/assets/icons/logo.svg" alt="logo">
                <img class="blue" src="<?= SITE_TEMPLATE_PATH ?>/assets/icons/logo--blue.svg" alt="logo">
              </a>
              <div class="header__btns">
                <button class="header__btn burger js-btn-visible js-header-btn-burger">
                  <span class="_open">Меню</span>
                  <span class="_close">Закрыть</span>
                  <div class="burger__btn">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect class="svg-hide" x="11.4001" y="3" width="2.8" height="2.8" transform="rotate(90 11.4001 3)" fill="#4B23EB" />
                      <rect x="17" y="3" width="2.8" height="2.8" transform="rotate(90 17 3)" fill="#4B23EB" />
                      <rect x="5.80005" y="3" width="2.8" height="2.8" transform="rotate(90 5.80005 3)" fill="#4B23EB" />
                      <rect x="11.4001" y="8.6001" width="2.8" height="2.8" transform="rotate(90 11.4001 8.6001)" fill="#4B23EB" />
                      <rect class="svg-hide" x="17" y="8.6001" width="2.8" height="2.8" transform="rotate(90 17 8.6001)" fill="#4B23EB" />
                      <rect class="svg-hide" x="11.4001" y="14.1997" width="2.8" height="2.8" transform="rotate(90 11.4001 14.1997)" fill="#4B23EB" />
                      <rect x="17" y="14.1997" width="2.8" height="2.8" transform="rotate(90 17 14.1997)" fill="#4B23EB" />
                      <rect class="svg-hide" x="5.80005" y="8.6001" width="2.8" height="2.8" transform="rotate(90 5.80005 8.6001)" fill="#4B23EB" />
                      <rect x="5.80005" y="14.1997" width="2.8" height="2.8" transform="rotate(90 5.80005 14.1997)" fill="#4B23EB" />
                    </svg>
                  </div>
                </button>
                <button class="header__btn header__btn-search js-header-btn-search js-btn-visible">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="MagnifyingGlass">
                      <path id="Vector" d="M21.3975 20.6023L16.5806 15.7854C17.9542 14.2057 18.6608 12.1545 18.5515 10.064C18.4422 7.9735 17.5255 6.00712 15.9946 4.57934C14.4638 3.15157 12.4384 2.37395 10.3453 2.41041C8.25232 2.44686 6.25521 3.29454 4.775 4.77475C3.29478 6.25497 2.4471 8.25208 2.41065 10.3451C2.3742 12.4381 3.15182 14.4635 4.57959 15.9944C6.00736 17.5253 7.97374 18.442 10.0642 18.5513C12.1547 18.6606 14.206 17.954 15.7856 16.5804L20.6025 21.3973C20.7091 21.4966 20.8502 21.5507 20.9959 21.5481C21.1416 21.5456 21.2807 21.4865 21.3837 21.3835C21.4868 21.2804 21.5458 21.1414 21.5484 20.9957C21.551 20.8499 21.4969 20.7089 21.3975 20.6023ZM3.5625 10.4998C3.5625 9.12765 3.96938 7.78636 4.73168 6.64549C5.49399 5.50463 6.57748 4.61543 7.84514 4.09035C9.1128 3.56526 10.5077 3.42788 11.8534 3.69556C13.1992 3.96325 14.4353 4.62398 15.4056 5.59421C16.3758 6.56443 17.0365 7.80058 17.3042 9.14632C17.5719 10.4921 17.4345 11.887 16.9094 13.1546C16.3843 14.4223 15.4951 15.5058 14.3543 16.2681C13.2134 17.0304 11.8721 17.4373 10.5 17.4373C8.66075 17.435 6.89747 16.7034 5.59692 15.4028C4.29637 14.1023 3.56474 12.339 3.5625 10.4998Z" fill="white" />
                    </g>
                  </svg>
                  Поиск
                </button>
                <button class="header__btn header__btn-address js-header-btn-address js-btn-visible">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="MapPin">
                      <path id="Vector" d="M12 6.1875C11.2954 6.1875 10.6066 6.39644 10.0208 6.78789C9.43493 7.17934 8.97832 7.73573 8.70868 8.38669C8.43904 9.03765 8.36849 9.75395 8.50595 10.445C8.64341 11.1361 8.98271 11.7708 9.48093 12.2691C9.97916 12.7673 10.6139 13.1066 11.305 13.244C11.996 13.3815 12.7123 13.311 13.3633 13.0413C14.0143 12.7717 14.5707 12.3151 14.9621 11.7292C15.3536 11.1434 15.5625 10.4546 15.5625 9.75C15.5625 8.80517 15.1872 7.89903 14.5191 7.23093C13.851 6.56283 12.9448 6.1875 12 6.1875ZM12 12.1875C11.5179 12.1875 11.0466 12.0445 10.6458 11.7767C10.245 11.5089 9.93253 11.1282 9.74804 10.6828C9.56356 10.2374 9.51528 9.7473 9.60934 9.27447C9.70339 8.80164 9.93554 8.36732 10.2764 8.02643C10.6173 7.68554 11.0516 7.45339 11.5245 7.35934C11.9973 7.26528 12.4874 7.31356 12.9328 7.49804C13.3782 7.68253 13.7589 7.99495 14.0267 8.3958C14.2945 8.79664 14.4375 9.26791 14.4375 9.75C14.4375 10.3965 14.1807 11.0165 13.7236 11.4736C13.2665 11.9307 12.6465 12.1875 12 12.1875ZM12 1.6875C9.86245 1.68998 7.81317 2.54022 6.30169 4.05169C4.79022 5.56317 3.93998 7.61245 3.9375 9.75C3.9375 12.6478 5.28188 15.7256 7.82531 18.6506C8.97329 19.9773 10.2653 21.1722 11.6775 22.2131C11.772 22.2793 11.8846 22.3148 12 22.3148C12.1154 22.3148 12.228 22.2793 12.3225 22.2131C13.7347 21.1722 15.0267 19.9773 16.1747 18.6506C18.7181 15.7256 20.0625 12.6506 20.0625 9.75C20.06 7.61245 19.2098 5.56317 17.6983 4.05169C16.1868 2.54022 14.1375 1.68998 12 1.6875ZM12 21.0478C10.5938 19.9622 5.0625 15.3394 5.0625 9.75C5.0625 7.91006 5.79341 6.14548 7.09445 4.84445C8.39548 3.54341 10.1601 2.8125 12 2.8125C13.8399 2.8125 15.6045 3.54341 16.9056 4.84445C18.2066 6.14548 18.9375 7.91006 18.9375 9.75C18.9375 15.3394 13.4062 19.9622 12 21.0478Z" fill="#ffffff" />
                    </g>
                  </svg>
                  Наши адреса
                </button>
              </div>
            </div>
            <div class="header__right">
              <a class="header__btn header__btn-phone" href="tel:<?=str_replace(['(',')','-',' '], '', $CnPhone);?>" target="_blank">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g id="Phone">
                    <path id="Vector" d="M20.7741 15.0279L16.3453 13.0432C16.1447 12.9573 15.9257 12.9227 15.7083 12.9427C15.4909 12.9626 15.282 13.0365 15.1003 13.1576C15.0819 13.1695 15.0643 13.1826 15.0478 13.197L12.7331 15.1657C12.7091 15.1788 12.6824 15.1862 12.655 15.1871C12.6277 15.1881 12.6005 15.1827 12.5756 15.1714C11.0878 14.4532 9.54657 12.9214 8.82563 11.4542C8.81362 11.4297 8.80738 11.4027 8.80738 11.3754C8.80738 11.3481 8.81362 11.3212 8.82563 11.2967L10.8009 8.95293C10.8151 8.93559 10.8283 8.91744 10.8403 8.89856C10.9597 8.71622 11.0319 8.50701 11.0502 8.28981C11.0685 8.07262 11.0325 7.85427 10.9453 7.6545L8.97469 3.23325C8.86278 2.97226 8.66924 2.7546 8.42312 2.61295C8.177 2.47129 7.89158 2.41328 7.60969 2.44762C6.38459 2.60868 5.26005 3.21031 4.44621 4.14009C3.63238 5.06987 3.18494 6.26417 3.1875 7.49981C3.1875 14.8404 9.15938 20.8123 16.5 20.8123C17.7356 20.8147 18.9298 20.3672 19.8595 19.5534C20.7893 18.7396 21.3909 17.6151 21.5522 16.3901C21.5865 16.1096 21.5292 15.8254 21.389 15.58C21.2488 15.3345 21.0332 15.1409 20.7741 15.0279ZM16.5 19.6873C9.78 19.6873 4.3125 14.2198 4.3125 7.49981C4.30937 6.53787 4.65657 5.60769 5.28923 4.88307C5.9219 4.15845 6.79674 3.68895 7.75032 3.56231H7.77188C7.80966 3.56301 7.84634 3.57512 7.87712 3.59703C7.90791 3.61895 7.93135 3.64965 7.94438 3.68512L9.9225 8.10168C9.93378 8.12624 9.93963 8.15294 9.93963 8.17997C9.93963 8.20699 9.93378 8.23369 9.9225 8.25825L7.94344 10.6076C7.92868 10.6244 7.9152 10.6423 7.90313 10.6611C7.77929 10.8501 7.70637 11.0679 7.69142 11.2934C7.67647 11.519 7.72001 11.7445 7.81782 11.9482C8.64938 13.6507 10.365 15.3532 12.0863 16.1848C12.2912 16.2821 12.5178 16.3246 12.7441 16.3081C12.9703 16.2917 13.1885 16.2169 13.3772 16.0911C13.395 16.0789 13.4128 16.0657 13.4297 16.0517L15.7434 14.0829C15.7663 14.0707 15.7915 14.0635 15.8174 14.0618C15.8433 14.0602 15.8692 14.0642 15.8934 14.0736L20.3231 16.0582C20.3593 16.0737 20.3897 16.1001 20.4101 16.1337C20.4304 16.1673 20.4397 16.2065 20.4366 16.2457C20.3106 17.1998 19.8415 18.0753 19.1171 18.7086C18.3926 19.342 17.4623 19.6899 16.5 19.6873Z"
                    fill="white" />
                  </g>
                </svg>
                <?=$CnPhone;?>
              </a>
              <button class="header__btn header__btn-collback blue js-btn-visible" data-hystmodal="#m-application">Обратный звонок</button>
            </div>
          </div>
        </div>
      </header>
