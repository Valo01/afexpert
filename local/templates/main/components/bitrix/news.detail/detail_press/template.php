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

	<div class="wrapper" data-modal-gallery="gallery">
        <section class="img-banner" data-scroll-section data-scroll-id="section0">
          <div class="container">

            <?$APPLICATION->IncludeComponent(
				"bitrix:breadcrumb", "template_breadcrumb",
				Array(
					"PATH" => "",
					"SITE_ID" => "s1",
					"START_FROM" => "0"
				)
			);?>

          </div>
			<?if($arResult["DETAIL_PICTURE"]["SRC"]):?>
          		<img class="img-banner__img" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="Баннер">
			<?endif;?>
        </section>

        <section class="article" data-scroll-section data-scroll-id="section1">
          <div class="container article__container">
            <div class="article__header">
              <h1 class="article__title">
                <?=$arResult["NAME"]?>
              </h1>
              <div class="article__date">
                <?=$arResult["PROPERTIES"]["DATE"]["VALUE"];?>
              </div>
              <div class="article__links article-links">
                <div class="article-links__tags">
					<?foreach($arResult["PROPERTIES"]["TAGS_LIST"]["VALUE"] as $arId):?>
						<a class="article-links__tag" href="/press-center/?where=iblock_blog&tags_list%5B%5D=<?=$arId;?>">
							<?=$arId;?>
						</a>
					<?endforeach;?>
                </div>
                <div class="article-links__socials">
                  <a href="https://t.me/share/url?url=https://<?=$_SERVER["SERVER_NAME"];?><?=$APPLICATION->GetCurPage();?>&text=" target="_blank" rel="nofollow" class="article-links__social">
                    <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M1.3749 7.31839C6.74359 4.9193 10.3236 3.33767 12.1148 2.5735C17.2292 0.391658 18.2919 0.0126486 18.9846 0.000133439C19.1369 -0.00261913 19.4776 0.0361057 19.6982 0.219742C19.8845 0.374801 19.9358 0.584264 19.9603 0.731277C19.9848 0.87829 20.0154 1.21319 19.9911 1.47487C19.714 4.46165 18.5147 11.7098 17.9046 15.055C17.6465 16.4705 17.1382 16.9451 16.6461 16.9916C15.5766 17.0925 14.7645 16.2667 13.7287 15.5702C12.1078 14.4805 11.1921 13.8021 9.61879 12.7387C7.80053 11.5097 8.97923 10.8343 10.0154 9.73037C10.2866 9.44148 14.9987 5.04547 15.0899 4.64668C15.1013 4.59681 15.1119 4.41089 15.0042 4.31273C14.8965 4.21456 14.7376 4.24813 14.6229 4.27483C14.4604 4.31267 11.871 6.06807 6.85486 9.54101C6.11988 10.0587 5.45416 10.3109 4.8577 10.2977C4.20015 10.2831 2.93528 9.91632 1.99498 9.60282C0.84166 9.2183 -0.074973 9.01501 0.00484519 8.36197C0.0464194 8.02183 0.503103 7.67397 1.3749 7.31839Z"
                      fill="#4B23EB" />
                    </svg>
                  </a>
                  <a href="https://vk.com/share.php?url=https://<?=$_SERVER["SERVER_NAME"];?><?=$APPLICATION->GetCurPage();?>&title=" target="_blank" rel="nofollow" class="article-links__social">
                    <svg width="18" height="10" viewBox="0 0 18 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M9.83515 9.7387C9.83515 9.7387 10.1432 9.7051 10.3009 9.53877C10.4453 9.38637 10.4403 9.09877 10.4403 9.09877C10.4403 9.09877 10.4211 7.75583 11.0564 7.55754C11.6824 7.36253 12.4863 8.85624 13.3394 9.43062C13.9838 9.86488 14.4729 9.76984 14.4729 9.76984L16.7526 9.7387C16.7526 9.7387 17.9446 9.6666 17.3795 8.74644C17.3327 8.67106 17.0497 8.06555 15.6849 6.82174C14.2551 5.51977 14.447 5.73035 16.1683 3.4779C17.2167 2.10627 17.6357 1.26888 17.5047 0.910814C17.3803 0.568318 16.609 0.659268 16.609 0.659268L14.043 0.674836C14.043 0.674836 13.8527 0.649436 13.7116 0.732192C13.5739 0.81331 13.4846 1.00258 13.4846 1.00258C13.4846 1.00258 13.0789 2.06367 12.5372 2.96661C11.3944 4.87083 10.9378 4.97161 10.7509 4.85362C10.316 4.57749 10.4245 3.74583 10.4245 3.15507C10.4245 1.30903 10.7099 0.53964 9.86938 0.340533C9.59058 0.274164 9.38523 0.230738 8.67154 0.223364C7.75584 0.214351 6.98121 0.226641 6.54214 0.437219C6.24998 0.577331 6.0246 0.89033 6.16233 0.908356C6.33178 0.930479 6.71576 1.00996 6.91944 1.28199C7.18238 1.6335 7.17319 2.42173 7.17319 2.42173C7.17319 2.42173 7.32428 4.5947 6.8201 4.86427C6.47452 5.04945 6.0004 4.67172 4.98119 2.94367C4.45948 2.05875 4.06549 1.08042 4.06549 1.08042C4.06549 1.08042 3.98953 0.897705 3.85347 0.79938C3.68903 0.680572 3.45947 0.6437 3.45947 0.6437L1.02122 0.659268C1.02122 0.659268 0.654777 0.6691 0.520385 0.8256C0.401019 0.964073 0.511203 1.25167 0.511203 1.25167C0.511203 1.25167 2.42023 5.63612 4.58219 7.84596C6.56467 9.87144 8.81511 9.7387 8.81511 9.7387H9.83515Z"
                      fill="#C7CCD7" />
                    </svg>
                  </a>
                  <a href="whatsapp://send?text=<?=$APPLICATION->GetCurPage();?>" target="_blank" rel="nofollow" class="article-links__social">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M0.157748 7.32244C-0.250946 9.47663 0.140817 11.7059 1.25947 13.5917L1.25954 13.5917L0.371049 16.7014C0.334289 16.83 0.332603 16.9662 0.366167 17.0957C0.399731 17.2252 0.467324 17.3434 0.561941 17.4381C0.656557 17.5327 0.774755 17.6003 0.904285 17.6338C1.03382 17.6674 1.16996 17.6657 1.29862 17.629L4.40835 16.7405L4.40833 16.7406C6.29412 17.8592 8.52342 18.2509 10.6776 17.8422C12.8318 17.4335 14.7627 16.2525 16.1077 14.5209C17.4527 12.7893 18.1194 10.6262 17.9824 8.43785C17.8455 6.24952 16.9144 4.18644 15.3639 2.63603C13.8135 1.08562 11.7504 0.15452 9.5621 0.0175805C7.37376 -0.119359 5.2107 0.547277 3.47909 1.89231C1.74748 3.23734 0.566443 5.16825 0.157748 7.32244ZM8.57758 13.4382C9.47819 13.8105 10.4434 14.0014 11.4179 14C12.1031 13.9952 12.7587 13.7202 13.2422 13.2348C13.7257 12.7493 13.998 12.0926 14 11.4074C14 11.2949 13.9703 11.1844 13.9138 11.0871C13.8573 10.9898 13.7761 10.9091 13.6784 10.8533L11.784 9.77079C11.6698 9.70551 11.5402 9.67183 11.4087 9.67323C11.2771 9.67463 11.1483 9.71105 11.0354 9.77875L9.5865 10.6481C8.59393 10.2008 7.79916 9.40607 7.3519 8.4135L8.22126 6.96457C8.28895 6.85174 8.32538 6.72291 8.32677 6.59134C8.32817 6.45977 8.2945 6.33019 8.22922 6.21595L7.14671 4.32157C7.09089 4.22388 7.01024 4.14269 6.91293 4.08622C6.81562 4.02974 6.7051 4 6.59259 4C5.90664 3.99942 5.24846 4.27093 4.76243 4.75499C4.2764 5.23904 4.00221 5.89611 4.00001 6.58207C3.99862 7.55659 4.18955 8.52181 4.56184 9.42242C4.93414 10.323 5.48049 11.1413 6.16958 11.8304C6.85867 12.5195 7.67697 13.0659 8.57758 13.4382Z"
                      fill="#C3C6D2" />
                    </svg>
                  </a>
                </div>
              </div>
            </div>

			<div><?=$arResult["DETAIL_TEXT"]?></div>

            <div class="a-images-slider article__slider">
              <div class="swiper-wrapper">
					<?foreach($arResult["PROPERTIES"]["IMAGES"]["VALUE"] as $arItem):
					$arImage = CFile::ResizeImageGet($arItem, array("width" => 1280, "height" => 1000), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false);?>
						<div class="a-images-slider__item swiper-slide">
						  <img src="<?=$arImage['src'];?>" alt="slide">
						</div>
					<?endforeach;?>
              </div>
              <div class="a-images-slider__controls">
                <div class="slick-prev slick-arrow">
                </div>
                <div class="swiper-pagination">
                </div>
                <div class="slick-next slick-arrow">
                </div>
              </div>
            </div>
			<?if($arResult["PROPERTIES"]["END_TITLE"]["VALUE"]):?>
            <h3 class="title__h4">
              <?=htmlspecialcharsBack($arResult["PROPERTIES"]["END_TITLE"]["VALUE"]);?>
            </h3>
			<?endif;?>
			<?if($arResult["PROPERTIES"]["END_TEXT"]["VALUE"]):?>
            <div class="text article__text">
              <?=htmlspecialcharsBack($arResult["PROPERTIES"]["END_TEXT"]["VALUE"]["TEXT"]);?>
            </div>
			<?endif;?>
          </div>
        </section>

		<? if(($arResult["PROPERTIES"]["VIDEO"]["VALUE"]) OR ($arResult["PROPERTIES"]["VIDEO_URL"]["VALUE"])):?>
			<section class="projects projects--project" id="video" data-scroll-section data-scroll-id="projects">
			  <div class="container">
				<h2 class="projects--project__title">Видео</h2>
				<div class="projects__list">
					<?if($arResult["PROPERTIES"]["VIDEO"]["VALUE"]):?> 
						<a class="cases__slider-item swiper-slide" data-video='{"source": [{"src":"<?echo CFile::GetPath($arResult["PROPERTIES"]["VIDEO"]["VALUE"]);?>", "type":"video/mp4"}], "tracks": [], "attributes": {"preload": false, "controls": true, "playsinline": true}}' data-poster="<?=CFile::GetPath($arResult["PROPERTIES"]["VIDEO_FON"]["VALUE"]);?>" data-modal-gallery="el-gallery">
					<?else:?> 
						<a class="cases__slider-item swiper-slide" data-src="<?echo $arResult["PROPERTIES"]["VIDEO_URL"]["VALUE"];?>" data-modal-gallery="el-gallery">
					<?endif;?>
					<? if($arResult["PROPERTIES"]["VIDEO_FON"]["VALUE"]):?>
						<img class="cases__bg" src="<?=CFile::GetPath($arResult["PROPERTIES"]["VIDEO_FON"]["VALUE"]);?>" alt="background">
					<?else:?>
					  <div class="cases__bg"></div>
					<?endif;?>
					<div class="cases__slider-item-wrp">
					  <div class="cases__top"></div>
					  <div class="cases__bot">
						<div class="cases__name"></div>
						<span class="btn__play-video">
						  <img src="<?= SITE_TEMPLATE_PATH ?>/assets/icons/play.svg" alt="play">
						</span>
					  </div>
					</div>
				  </a>
				</div>
			  </div>
			</section>
		<?endif;?>

        <section class="read-more" data-scroll-section data-scroll-id="read-more">
          <div class="container">
            <div class="read-more__head">
              <h2 class="title__h2 read-more__title">
                Читайте также
              </h2>
			  <a class="btn__big-gray read-more__btn" href="/press-center/">
                Смотреть все
              </a>
            </div>
            <div class="read-more__content read-more__slider" data-modal-gallery="gallery">
              <div class="swiper-wrapper">

					<?$APPLICATION->IncludeComponent(
                        "bitrix:news.list", "list_press_slider",
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
                            "IBLOCK_ID" => "2",
                            "IBLOCK_TYPE" => "press",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "INCLUDE_SUBSECTIONS" => "Y",
                            "MESSAGE_404" => "",
                            "NEWS_COUNT" => "9",
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
                            "PROPERTY_CODE" => array(0 => "STYLE",1 => "TAGS_LIST",2 => "VIDEO"),
                            "SET_BROWSER_TITLE" => "N",
                            "SET_LAST_MODIFIED" => "N",
                            "SET_META_DESCRIPTION" => "N",
                            "SET_META_KEYWORDS" => "N",
                            "SET_STATUS_404" => "N",
                            "SET_TITLE" => "N",
                            "SHOW_404" => "N",
                            "SORT_BY1" => "RAND",
                            "SORT_BY2" => "",
                            "SORT_ORDER1" => "RAND",
                            "SORT_ORDER2" => "",
                            "STRICT_SECTION_CHECK" => "N"
                        )
                    );?>

              </div>
              <div class="read-more-slider__controls">
                <div class="slick-prev slick-arrow">
                </div>
                <div class="swiper-pagination">
                </div>
                <div class="slick-next slick-arrow">
                </div>
              </div>
            </div>
            <a class="btn__big-gray read-more__btn--mobile" href="/press-center/">
              Смотреть все
            </a>
          </div>
        </section>
      </div>
