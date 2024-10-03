<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if (CModule::IncludeModule("iblock")){
	$str = CIBlockElement::GetList(
    [], ['IBLOCK_ID' => 24],
    false, false,
    ['ID', 'PROPERTY_INFO01', 'PROPERTY_INFO02', 'PROPERTY_INFO03', 'PROPERTY_INFO04', 'PROPERTY_INFO01_TEXT', 'PROPERTY_INFO02_TEXT', 'PROPERTY_INFO03_TEXT', 'PROPERTY_INFO04_TEXT']
	);
	while ($res = $str->GetNext()) {
		$StrPROPERTY_INFO01 = $res["PROPERTY_INFO01_VALUE"];
		$StrPROPERTY_INFO02 = $res["PROPERTY_INFO02_VALUE"];
		$StrPROPERTY_INFO03 = $res["PROPERTY_INFO03_VALUE"];
		$StrPROPERTY_INFO04 = $res["PROPERTY_INFO04_VALUE"];
		$StrPROPERTY_INFO01_TEXT = $res["PROPERTY_INFO01_TEXT_VALUE"];
		$StrPROPERTY_INFO02_TEXT = $res["PROPERTY_INFO02_TEXT_VALUE"];
		$StrPROPERTY_INFO03_TEXT = $res["PROPERTY_INFO03_TEXT_VALUE"];
		$StrPROPERTY_INFO04_TEXT = $res["PROPERTY_INFO04_TEXT_VALUE"];
  }
} ?>

	<section class="auto-scroll auto-scroll--project" data-scroll-section data-scroll-id="section3" id="auto-scroll">
          <div class="auto-scroll-inner" data-scroll data-scroll-sticky data-scroll-target="#auto-scroll">
            <div class="auto-scroll__pretitle">
              Наш сервис
            </div>
            <h3>Поможем провести интеграцию на производстве</h3>
          </div>
          <div class="container">
            <div class="auto-scroll__container">
              <div class="auto-scroll__card" data-scroll data-scroll-speed="1">
                <span>1</span>
                <p><?=$StrPROPERTY_INFO01?></p>
                <p><?=$StrPROPERTY_INFO01_TEXT?></p>
              </div>
              <div class="auto-scroll__card" data-scroll data-scroll-speed="4">
                <span>2</span>
                <p><?=$StrPROPERTY_INFO02?></p>
                <p><?=$StrPROPERTY_INFO02_TEXT?></p>
              </div>
              <div class="auto-scroll__card" data-scroll data-scroll-speed="6">
                <span>3</span>
                <p><?=$StrPROPERTY_INFO03?></p>
                <p><?=$StrPROPERTY_INFO03_TEXT?></p>
              </div>
              <div class="auto-scroll__card" data-scroll data-scroll-speed="1">
                <span>4</span>
                <p><?=$StrPROPERTY_INFO04?></p>
                <p><?=$StrPROPERTY_INFO04_TEXT?></p>
              </div>
            </div>
          </div>
	</section>
