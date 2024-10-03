<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)	die();
	use Bitrix\Main\Page\Asset;
?>		<footer class="footer" data-scroll-section data-scroll-id="section11">
        <div class="container">
          <div class="footer__main">
            <div class="footer__left">
              <a class="footer__logo">
                <img src="<?= SITE_TEMPLATE_PATH ?>/assets/icons/logo.svg" alt="logo">
              </a>
              <div class="footer__social">
				<?if($Cntelegram):?>
					<a class="footer__social-link" href="<?=$Cntelegram;?>" target="_blank" rel="nofollow">
					  <img src="<?= SITE_TEMPLATE_PATH ?>/assets/icons/tg.svg" alt="telegram">
					</a>
				<?endif;?>
				<?if($Cnwhatsapp):?>
					<a class="footer__social-link" href="<?=$Cnwhatsapp;?>" target="_blank" rel="nofollow">
					  <img src="<?= SITE_TEMPLATE_PATH ?>/assets/icons/youtube.svg" alt="youtube">
					</a>
				<?endif;?>
				<?if($Cnyoutube):?>
					<a class="footer__social-link" href="<?=$Cnyoutube;?>" target="_blank" rel="nofollow">
					  <img src="<?= SITE_TEMPLATE_PATH ?>/assets/icons/wa.svg" alt="wa">
					</a>
				<?endif;?>
				<?if($Cndzen):?>
					<a class="footer__social-link" href="<?=$Cndzen;?>" target="_blank" rel="nofollow">
					  <img src="<?= SITE_TEMPLATE_PATH ?>/assets/icons/dzen.svg" alt="dzen">
					</a>
				<?endif;?>
              </div>
              <div class="footer__address">
                <div class="footer__address-title">Адреса</div>
				<?foreach($CnAdress as $arId):?>
					<div class="footer__address-text"><?=$arId;?></div>
				<?endforeach;?>
              </div>
            </div>
            <div class="footer__links">
				<a class="footer__link" href="/technical-solutions/">Продукты</a>
				<a class="footer__link" href="/projects/">Кейсы</a>
				<a class="footer__link" href="/services/">Услуги</a>
				<a class="footer__link" href="/company/">О компании</a>
				<a class="footer__link" href="/contacts/">Контакты</a>
            </div>
            <div class="footer__contacts">
              <p>Все условия и предложения уточняйте<br>у менеджеров по телефону</p>
              <div class="footer__contacts-link-wrapper">
                <a class="footer__tel" href="mailto:<?=$CnEmail;?>" target="_blank"><?=$CnEmail;?></a>
                <a class="footer__tel" href="tel:<?=str_replace(['(',')','-',' '], '', $CnPhone);?>" target="_blank"><?=$CnPhone;?></a>
              </div>
              <div class="footer__contacts-btn-wrapper">
                <a class="btn__big-blue" href="javascript:void(0);" data-hystmodal="#m-application">Узнать больше</a>
                <button class="btn__up upButton">
                  <img src="<?= SITE_TEMPLATE_PATH ?>/assets/icons/white-arrow-right.svg" alt="arrow-icon">
                  <span>Вверх</span>
                </button>
              </div>
            </div>
          </div>
          <div class="footer__bot">
            <p>© 2024 ООО «Меридиан Автоматизация»</p>
            <div class="footer__docs">
              <a href="/privacy-policy/">Политика конфиденциальности данных</a>
              <a href="/labor-protection-policy/">Политика охраны труда</a>
            </div>
             <div class="footer__development">
                 <!--<a href="https://kompot.bz" target="_blank" rel="nofollow">
                <img src="<?= SITE_TEMPLATE_PATH ?>/assets/icons/kompot.svg" alt="kompot">
              </a>-->
            </div>
          </div>
        </div>
      </footer>
	</div>

    <div class="a-cookies" id="cookie_note" data-a-cookies="cookies">
      <span class="a-cookies__text">Мы используем файлы cookie, чтобы улучшать сайт для Вас. Оставаясь на сайте, Вы соглашаетесь с <a href="#">условиями использования</a>файлов cookie.</span>
      <button class="a-cookies__btn" data-a-cookies="btn">Согласен</button>
    </div>

    <div class="hystmodal modal m-vacancy " id="m-vacancy" aria-hidden="true">
      <div class="hystmodal__wrap">

				<? $APPLICATION->IncludeComponent(
                        "bitrix:form.result.new", "form_ajax_004",
                        array(
                            "CACHE_TIME" => "3600",
                            "CACHE_TYPE" => "Y",
                            "CHAIN_ITEM_LINK" => "",
                            "CHAIN_ITEM_TEXT" => "",
                            "EDIT_URL" => "result_edit.php",
                            "IGNORE_CUSTOM_TEMPLATE" => "Y",
                            "LIST_URL" => "result_list.php",
                            "SEF_MODE" => "N",
                            "SUCCESS_URL" => "",
                            "USE_EXTENDED_ERRORS" => "Y",
                            "WEB_FORM_ID" => 4,
                            "COMPONENT_TEMPLATE" => "form_ajax_004",
                            "AJAX_MODE" => "Y",
                            "AJAX_OPTION_SHADOW" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "AJAX_OPTION_HISTORY" => "N",
                            "VARIABLE_ALIASES" => array(
                                "WEB_FORM_ID" => "WEB_FORM_ID",
                                "RESULT_ID" => "RESULT_ID",
                            ),
                            'PARENT_CLASS' => '#m-vacancy',
                        ),
                        false
                  ); ?>

      </div>
    </div>

    <div class="hystmodal modal m-application " id="m-application" aria-hidden="true">
      <div class="hystmodal__wrap">

				<? $APPLICATION->IncludeComponent(
                        "bitrix:form.result.new", "form_ajax_001",
                        array(
                            "CACHE_TIME" => "3600",
                            "CACHE_TYPE" => "Y",
                            "CHAIN_ITEM_LINK" => "",
                            "CHAIN_ITEM_TEXT" => "",
                            "EDIT_URL" => "result_edit.php",
                            "IGNORE_CUSTOM_TEMPLATE" => "Y",
                            "LIST_URL" => "result_list.php",
                            "SEF_MODE" => "N",
                            "SUCCESS_URL" => "",
                            "USE_EXTENDED_ERRORS" => "Y",
                            "WEB_FORM_ID" => 1,
                            "COMPONENT_TEMPLATE" => "form_ajax_001",
                            "AJAX_MODE" => "Y",
                            "AJAX_OPTION_SHADOW" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "AJAX_OPTION_HISTORY" => "N",
                            "VARIABLE_ALIASES" => array(
                                "WEB_FORM_ID" => "WEB_FORM_ID",
                                "RESULT_ID" => "RESULT_ID",
                            ),
                            'PARENT_CLASS' => '#m-application',
                        ),
                        false
                  ); ?>

      </div>
    </div>

    <div class="hystmodal modal m-consultation " id="m-consultation" aria-hidden="true">
      <div class="hystmodal__wrap">

				<? $APPLICATION->IncludeComponent(
                        "bitrix:form.result.new", "form_ajax_002",
                        array(
                            "CACHE_TIME" => "3600",
                            "CACHE_TYPE" => "Y",
                            "CHAIN_ITEM_LINK" => "",
                            "CHAIN_ITEM_TEXT" => "",
                            "EDIT_URL" => "result_edit.php",
                            "IGNORE_CUSTOM_TEMPLATE" => "Y",
                            "LIST_URL" => "result_list.php",
                            "SEF_MODE" => "N",
                            "SUCCESS_URL" => "",
                            "USE_EXTENDED_ERRORS" => "Y",
                            "WEB_FORM_ID" => 2,
                            "COMPONENT_TEMPLATE" => "form_ajax_002",
                            "AJAX_MODE" => "Y",
                            "AJAX_OPTION_SHADOW" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "AJAX_OPTION_HISTORY" => "N",
                            "VARIABLE_ALIASES" => array(
                                "WEB_FORM_ID" => "WEB_FORM_ID",
                                "RESULT_ID" => "RESULT_ID",
                            ),
                            'PARENT_CLASS' => '#m-consultation',
                        ),
                        false
                  ); ?>

      </div>
    </div>

    <div class="hystmodal modal m-cost " id="m-cost" aria-hidden="true">
      <div class="hystmodal__wrap">

				<? $APPLICATION->IncludeComponent(
                        "bitrix:form.result.new", "form_ajax_003",
                        array(
                            "CACHE_TIME" => "3600",
                            "CACHE_TYPE" => "Y",
                            "CHAIN_ITEM_LINK" => "",
                            "CHAIN_ITEM_TEXT" => "",
                            "EDIT_URL" => "result_edit.php",
                            "IGNORE_CUSTOM_TEMPLATE" => "Y",
                            "LIST_URL" => "result_list.php",
                            "SEF_MODE" => "N",
                            "SUCCESS_URL" => "",
                            "USE_EXTENDED_ERRORS" => "Y",
                            "WEB_FORM_ID" => 3,
                            "COMPONENT_TEMPLATE" => "form_ajax_003",
                            "AJAX_MODE" => "Y",
                            "AJAX_OPTION_SHADOW" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "AJAX_OPTION_HISTORY" => "N",
                            "VARIABLE_ALIASES" => array(
                                "WEB_FORM_ID" => "WEB_FORM_ID",
                                "RESULT_ID" => "RESULT_ID",
                            ),
                            'PARENT_CLASS' => '#m-cost',
                        ),
                        false
                  ); ?>

      </div>
    </div>

    <div class="hystmodal modal m-list" id="m-list" aria-hidden="true">
      <div class="hystmodal__wrap">

				<? $APPLICATION->IncludeComponent(
                        "bitrix:form.result.new", "form_ajax_007",
                        array(
                            "CACHE_TIME" => "3600",
                            "CACHE_TYPE" => "Y",
                            "CHAIN_ITEM_LINK" => "",
                            "CHAIN_ITEM_TEXT" => "",
                            "EDIT_URL" => "result_edit.php",
                            "IGNORE_CUSTOM_TEMPLATE" => "Y",
                            "LIST_URL" => "result_list.php",
                            "SEF_MODE" => "N",
                            "SUCCESS_URL" => "",
                            "USE_EXTENDED_ERRORS" => "Y",
                            "WEB_FORM_ID" => 7,
                            "COMPONENT_TEMPLATE" => "form_ajax_007",
                            "AJAX_MODE" => "Y",
                            "AJAX_OPTION_SHADOW" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "AJAX_OPTION_HISTORY" => "N",
                            "VARIABLE_ALIASES" => array(
                                "WEB_FORM_ID" => "WEB_FORM_ID",
                                "RESULT_ID" => "RESULT_ID",
                            ),
                            'PARENT_CLASS' => '#m-list',
                        ),
                        false
                  ); ?>

      </div>
    </div>

	<script>
		function setCookie(name, value, days) {
			let expires = "";
			if (days) {
				let date = new Date();
				date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
				expires = "; expires=" + date.toUTCString();
			}
			document.cookie = name + "=" + (value || "") + expires + "; path=/";
		}
		function getCookie(name) {
			let matches = document.cookie.match(new RegExp("(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"));
			return matches ? decodeURIComponent(matches[1]) : undefined;
		}
		function checkCookies() {
			let cookieNote = document.getElementById('cookie_note');
			let cookieBtnAccept = cookieNote.querySelector('.a-cookies__btn');

			if (!getCookie('cookies_policy')) {
				cookieNote.classList.add('active');
			}

			cookieBtnAccept.addEventListener('click', function () {
				setCookie('cookies_policy', 'true', 365);
				cookieNote.classList.remove('active');
			});
		}
		checkCookies();

	  // Elements to inject
	  let mySVGsToInject = document.querySelectorAll('img.inject_svg');
	  SVGInjector(mySVGsToInject);
	</script>
<!-- Roistat Counter Start -->
<script>(function(w, d, s, h, id) {    w.roistatProjectId = id; w.roistatHost = h;    var p = d.location.protocol == "https:" ? "https://" : "http://";    var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/"+id+"/init?referrer="+encodeURIComponent(d.location.href);    var js = d.createElement(s); js.charset="UTF-8"; js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);})(window, document, 'script', 'cloud.roistat.com', '0e8d8299d84f5380eda4dffb17a52d01');</script>
<!-- Roistat Counter End -->
</body>
</html>