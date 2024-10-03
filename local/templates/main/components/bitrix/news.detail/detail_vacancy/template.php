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
$this->setFrameMode(true);
?>

<? //if($USER->IsAdmin()) { echo "<pre>"; print_r($arResult); echo "</pre>"; } ?>

	<div class="wrapper">
        <section class="vacancy-intro" data-scroll-section data-scroll-id="section0">
          <div class="container">
            <?$APPLICATION->IncludeComponent(
					"bitrix:breadcrumb", "template_breadcrumb",
					Array(
						"PATH" => "",
						"SITE_ID" => "s1",
						"START_FROM" => "0"
					)
		    );?>
            <a class="a-page-back-link" href="javacript:void(0);">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="Iconly/Sharp/Bold/Arrow - Left 2">
                  <path id="Fill 175" fill-rule="evenodd" clip-rule="evenodd" d="M15.4999 20.4139L7.08594 11.9999L15.4999 3.58594L16.9139 4.99994L9.91394 11.9999L16.9139 18.9999L15.4999 20.4139Z"
                  fill="#4A4952" />
                </g>
              </svg>
              <span>
                Вакансии
              </span>
            </a>
            <div class="vacancy-intro__container">
              <h1 class="vacancy-intro__title">
                <?=$arResult["NAME"]?>
              </h1>
              <button class="vacancy-intro__btn">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M13.7036 7.41602C16.7036 7.67435 17.9286 9.21602 17.9286 12.591V12.6993C17.9286 16.4243 16.437 17.916 12.712 17.916H7.28698C3.56198 17.916 2.07031 16.4243 2.07031 12.6993V12.591C2.07031 9.24102 3.27865 7.69935 6.22865 7.42435"
                  stroke="#4B23EB" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M10 12.5009V3.01758" stroke="#4B23EB" stroke-linecap="round"
                  stroke-linejoin="round" />
                  <path d="M12.7943 4.87565L10.0026 2.08398L7.21094 4.87565" stroke="#4B23EB"
                  stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </button>
              <button class="vacancy-intro__btn">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M6.03906 5.83268H13.9557V4.16602C13.9557 2.49935 13.3307 1.66602 11.4557 1.66602H8.53906C6.66406 1.66602 6.03906 2.49935 6.03906 4.16602V5.83268Z"
                  stroke="#4B23EB" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"
                  />
                  <path d="M13.3307 12.5V15.8333C13.3307 17.5 12.4974 18.3333 10.8307 18.3333H9.16406C7.4974 18.3333 6.66406 17.5 6.66406 15.8333V12.5H13.3307Z"
                  stroke="#4B23EB" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"
                  />
                  <path d="M17.5 8.33398V12.5007C17.5 14.1673 16.6667 15.0007 15 15.0007H13.3333V12.5007H6.66667V15.0007H5C3.33333 15.0007 2.5 14.1673 2.5 12.5007V8.33398C2.5 6.66732 3.33333 5.83398 5 5.83398H15C16.6667 5.83398 17.5 6.66732 17.5 8.33398Z"
                  stroke="#4B23EB" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"
                  />
                  <path d="M14.1693 12.5H13.1609H5.83594" stroke="#4B23EB" stroke-miterlimit="10"
                  stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M5.83594 9.16602H8.33594" stroke="#4B23EB" stroke-miterlimit="10"
                  stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </button>
            </div>
          </div>
        </section>
        <section class="vacancy-desc" id="test" data-scroll-section data-scroll-id="section2">
          <div class="container vacancy-desc__container" id="vacancy-desc-container">
            <div class="vacancy-desc__conditions noStickyOnMobile" data-scroll data-scroll-sticky
            data-scroll-target="#vacancy-desc-container">
              <div class="conditions-list">
                <div class="conditions-list__item">
                  <span class="conditions-list__name">
                    Город
                  </span>
                  <span class="conditions-list__value">
                    <?=$arResult["PROPERTIES"]["CITY"]["VALUE"];?>
                  </span>
                </div>
                <div class="conditions-list__item">
                  <span class="conditions-list__name">
                    Опыт
                  </span>
                  <span class="conditions-list__value">
                    <?=$arResult["PROPERTIES"]["EXP"]["VALUE"];?>
                  </span>
                </div>
                <div class="conditions-list__item">
                  <span class="conditions-list__name">
                    Занятость
                  </span>
                  <span class="conditions-list__value">
                    <?=$arResult["PROPERTIES"]["JOB"]["VALUE"];?>
                  </span>
                </div>
				<div class="conditions-list__item">
                  <span class="conditions-list__name">
                    Специализация
                  </span>
                  <span class="conditions-list__value">
                    <?=$arResult["PROPERTIES"]["SPEC"]["VALUE"];?>
                  </span>
                </div>
              </div>
              <button class="btn btn--blue vacancy-desc__conditions-btn" data-hystmodal="#m-vacancy">
                Откликнуться
              </button>
            </div>
            <div class="vacancy-desc__info">
              <div class="vacancy-desc__info-details">

				<div><?=$arResult["DETAIL_TEXT"]?></div>

              </div>

              <div class="vacancy-desc__info-contacts contacts-block">
                <h3 class="title__h3">
                  Служба управления персоналом
                </h3>
                <div class="contacts-block__container">
                  <div class="contacts-block__item">
                    <div class="contacts-block__item-value">
                      <a href="tel:+73422919215">
                        +7 (342) 291-92-15
                      </a>
                      <span>
                        (доб 135)
                      </span>
                    </div>
                    <span class="contacts-block__item-name">
                      Телефон
                    </span>
                  </div>
                  <div class="contacts-block__item">
                    <div class="contacts-block__item-value">
                      <a href="mailto:elts@meridiant.ru">
                        elts@meridiant.ru
                      </a>
                    </div>
                    <span class="contacts-block__item-name">
                      Электронная почта
                    </span>
                  </div>
                  <div class="contacts-block__item">
                    <div class="contacts-block__item-value">
                      <span>
                        г. Пермь, ул. Докучаева, д. 50
                      </span>
                    </div>
                    <span class="contacts-block__item-name">
                      Адрес
                    </span>
                  </div>
                  <div class="contacts-block__item contacts-block__social">
                    <a class="contacts-block__item-social" href="#">
                      <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.157748 7.32244C-0.250946 9.47663 0.140817 11.7059 1.25947 13.5917L1.25954 13.5917L0.371049 16.7014C0.334289 16.83 0.332603 16.9662 0.366167 17.0957C0.399731 17.2252 0.467324 17.3434 0.561941 17.4381C0.656557 17.5327 0.774755 17.6003 0.904285 17.6338C1.03382 17.6674 1.16996 17.6657 1.29862 17.629L4.40835 16.7405L4.40833 16.7406C6.29412 17.8592 8.52342 18.2509 10.6776 17.8422C12.8318 17.4335 14.7627 16.2525 16.1077 14.5209C17.4527 12.7893 18.1194 10.6262 17.9824 8.43785C17.8455 6.24952 16.9144 4.18644 15.3639 2.63603C13.8135 1.08562 11.7504 0.15452 9.5621 0.0175805C7.37376 -0.119359 5.2107 0.547277 3.47909 1.89231C1.74748 3.23734 0.566443 5.16825 0.157748 7.32244ZM8.57758 13.4382C9.47819 13.8105 10.4434 14.0014 11.4179 14C12.1031 13.9952 12.7587 13.7202 13.2422 13.2348C13.7257 12.7493 13.998 12.0926 14 11.4074C14 11.2949 13.9703 11.1844 13.9138 11.0871C13.8573 10.9898 13.7761 10.9091 13.6784 10.8533L11.784 9.77079C11.6698 9.70551 11.5402 9.67183 11.4087 9.67323C11.2771 9.67463 11.1483 9.71105 11.0354 9.77875L9.5865 10.6481C8.59393 10.2008 7.79916 9.40607 7.3519 8.4135L8.22126 6.96457C8.28895 6.85174 8.32538 6.72291 8.32677 6.59134C8.32817 6.45977 8.2945 6.33019 8.22922 6.21595L7.14671 4.32157C7.09089 4.22388 7.01024 4.14269 6.91293 4.08622C6.81562 4.02974 6.7051 4 6.59259 4C5.90664 3.99942 5.24846 4.27093 4.76243 4.75499C4.2764 5.23904 4.00221 5.89611 4.00001 6.58207C3.99862 7.55659 4.18955 8.52181 4.56184 9.42242C4.93414 10.323 5.48049 11.1413 6.16958 11.8304C6.85867 12.5195 7.67697 13.0659 8.57758 13.4382Z"
                        fill="#C3C6D2" />
                      </svg>
                    </a>
                    <a class="contacts-block__item-social" href="#">
                      <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.3749 7.31839C6.74359 4.9193 10.3236 3.33767 12.1148 2.5735C17.2292 0.391658 18.2919 0.0126486 18.9846 0.000133439C19.1369 -0.00261913 19.4776 0.0361057 19.6982 0.219742C19.8845 0.374801 19.9358 0.584264 19.9603 0.731277C19.9848 0.87829 20.0154 1.21319 19.9911 1.47487C19.714 4.46165 18.5147 11.7098 17.9046 15.055C17.6465 16.4705 17.1382 16.9451 16.6461 16.9916C15.5766 17.0925 14.7645 16.2667 13.7287 15.5702C12.1078 14.4805 11.1921 13.8021 9.61879 12.7387C7.80053 11.5097 8.97923 10.8343 10.0154 9.73037C10.2866 9.44148 14.9987 5.04547 15.0899 4.64668C15.1013 4.59681 15.1119 4.41089 15.0042 4.31273C14.8965 4.21456 14.7376 4.24813 14.6229 4.27483C14.4604 4.31267 11.871 6.06807 6.85486 9.54101C6.11988 10.0587 5.45416 10.3109 4.8577 10.2977C4.20015 10.2831 2.93528 9.91632 1.99498 9.60282C0.84166 9.2183 -0.074973 9.01501 0.00484519 8.36197C0.0464194 8.02183 0.503103 7.67397 1.3749 7.31839Z"
                        fill="#4B23EB" />
                      </svg>
                    </a>
                  </div>
                </div>

              </div>
              <button class="btn btn--blue vacancy-desc__info-btn" data-hystmodal="#m-vacancy">
                Откликнуться
              </button>
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
