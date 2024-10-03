<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

	<section class="a-form" id="m-bottom" data-scroll-section data-scroll-id="a-form">
          <div class="container">

				<? $APPLICATION->IncludeComponent(
                        "bitrix:form.result.new", "form_ajax_005",
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
                            "WEB_FORM_ID" => 5,
                            "COMPONENT_TEMPLATE" => "form_ajax_005",
                            "AJAX_MODE" => "Y",
                            "AJAX_OPTION_SHADOW" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "AJAX_OPTION_HISTORY" => "N",
                            "VARIABLE_ALIASES" => array(
                                "WEB_FORM_ID" => "WEB_FORM_ID",
                                "RESULT_ID" => "RESULT_ID",
                            ),
                            'PARENT_CLASS' => '#m-bottom',
                        ),
                        false
                  ); ?>

          </div>
          <div class="a-form__block-image smooth-show" data-scroll data-scroll-offset="120" data-scroll-repeat>
            <img class="a-form__image" src="<?= SITE_TEMPLATE_PATH ?>/assets/images/form-image.png" alt="Будьте эффективнее конкурентов">
          </div>
	</section>
