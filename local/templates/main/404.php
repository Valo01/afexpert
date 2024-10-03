<? include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404 Not Found");?>

	<div class="wrapper">
        <section class="page-not-found__section" data-scroll-section data-scroll-id="section0">
          <img class="page-not-found__bg" src="assets/images/bg-404.png" alt="задний фон">
          <div class="container">
            <h1 class="page-not-found__title">Ошибка 404</h1>
            <span class="page-not-found__subtitle">Что-то пошло не так, эта страница в данный момент недоступна или была удалена</span>
            <div class="page-not-found__block-btn">
              <a class="page-not-found__btn-back-home" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none">
                  <path d="M9.57 5.92969L3.5 11.9997L9.57 18.0697" stroke="white" stroke-width="1.5"
                  stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M20.5019 12H3.67188" stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                  stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span>На главную</span>
              </a>
              <a class="page-not-found__btn-catalog" href="#">
                <span>В каталог решений</span>
              </a>
            </div>
          </div>
        </section>
	</div>

<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>