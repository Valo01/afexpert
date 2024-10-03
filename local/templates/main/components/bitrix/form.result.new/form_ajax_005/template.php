<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

		<?= $arResult["FORM_HEADER"] ?>

              <div class="a-form__header">
                <span class="a-form__subtitle">Закажите автоматизацию 4.0</span>
                <h2 class="a-form__title"><?= $arResult["FORM_TITLE"] ?></h2>
              </div>
              <div class="a-form__block-inputs">

				<?=$arResult['funcGetInputHtml']($arResult["QUESTIONS"]['NAME'], $arResult['arrVALUES'])?>

				<?=$arResult['funcGetInputHtml']($arResult["QUESTIONS"]['PHONE'], $arResult['arrVALUES'])?>

				<?=$arResult['funcGetInputHtml']($arResult["QUESTIONS"]['REF'], $arResult['arrVALUES'])?>
				<?=$arResult['funcGetInputHtml']($arResult["QUESTIONS"]['TITLE'], $arResult['arrVALUES'])?>

              </div>

			  <input type="hidden" name="web_form_submit" value="Y">
              <button class="a-form__btn-submit btn-reset" type="submit">
                <span><?=$arResult["arForm"]["BUTTON"]?></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path d="M20.7741 15.0281L16.3453 13.0434C16.1447 12.9575 15.9257 12.9229 15.7083 12.9429C15.4909 12.9628 15.282 13.0367 15.1003 13.1578C15.0819 13.1696 15.0643 13.1828 15.0478 13.1972L12.7331 15.1659C12.7091 15.179 12.6824 15.1863 12.655 15.1873C12.6277 15.1883 12.6005 15.1829 12.5756 15.1716C11.0878 14.4534 9.54657 12.9216 8.82564 11.4544C8.81363 11.4299 8.80739 11.4029 8.80739 11.3756C8.80739 11.3483 8.81363 11.3214 8.82564 11.2969L10.8009 8.95312C10.8151 8.93578 10.8283 8.91762 10.8403 8.89874C10.9598 8.7164 11.0319 8.50719 11.0502 8.29C11.0685 8.0728 11.0325 7.85446 10.9453 7.65468L8.9747 3.23343C8.86279 2.97244 8.66925 2.75478 8.42313 2.61313C8.17701 2.47147 7.89159 2.41346 7.6097 2.44781C6.3846 2.60886 5.26006 3.2105 4.44622 4.14027C3.63238 5.07005 3.18494 6.26435 3.18751 7.49999C3.18751 14.8406 9.15939 20.8125 16.5 20.8125C17.7356 20.8149 18.9298 20.3673 19.8595 19.5536C20.7893 18.7398 21.3909 17.6153 21.5522 16.3903C21.5865 16.1097 21.5292 15.8256 21.389 15.5802C21.2488 15.3347 21.0332 15.1411 20.7741 15.0281ZM16.5 19.6875C9.78001 19.6875 4.31251 14.22 4.31251 7.49999C4.30938 6.53805 4.65658 5.60787 5.28924 4.88325C5.9219 4.15863 6.79675 3.68914 7.75032 3.56249H7.77189C7.80967 3.5632 7.84635 3.5753 7.87713 3.59722C7.90791 3.61913 7.93136 3.64984 7.94439 3.68531L9.92251 8.10187C9.93379 8.12642 9.93963 8.15313 9.93963 8.18015C9.93963 8.20717 9.93379 8.23387 9.92251 8.25843L7.94345 10.6078C7.92868 10.6246 7.91521 10.6424 7.90314 10.6612C7.7793 10.8503 7.70637 11.0681 7.69143 11.2936C7.67648 11.5191 7.72002 11.7447 7.81782 11.9484C8.64939 13.6509 10.365 15.3534 12.0863 16.185C12.2912 16.2823 12.5178 16.3247 12.7441 16.3083C12.9703 16.2919 13.1885 16.2171 13.3772 16.0912C13.395 16.0791 13.4128 16.0659 13.4297 16.0519L15.7434 14.0831C15.7663 14.0708 15.7915 14.0636 15.8174 14.062C15.8433 14.0604 15.8692 14.0644 15.8934 14.0737L20.3231 16.0584C20.3593 16.0738 20.3897 16.1002 20.4101 16.1339C20.4305 16.1675 20.4397 16.2067 20.4366 16.2459C20.3106 17.1999 19.8415 18.0754 19.1171 18.7088C18.3926 19.3422 17.4623 19.6901 16.5 19.6875Z" fill="#4B23EB" />
                </svg>
              </button>

              <div class="a-form__privacy-policy">
                <div class="checkbox   checkbox--privacy-policy">
                  <label class="checkbox__label">
                    <input class="checkbox__input" type="checkbox" name="" value="" required>
                    <span class="checkbox__text">Cогласен с условиями <a href="/privacy-policy/" target="_blank"> политики конфиденциальности сайта</a></span>
                    <span class="checkbox__decore"></span>
                    <span class="checkbox__message">Это поле обязательно для заполнения</span>
                  </label>
                </div>
              </div>

			<div class="modal__after-sending">
				<div class="error-msg modal__after-sending-text"></div>
                <div class="success-msg"></div>
            </div>

			<a class="a-form__btn-submit modal__btn-repeat btn-reset">
              <span>Отправить еще раз</span>
            </a>

      <?= $arResult["FORM_FOOTER"]?>

        <script>
          ajaxForm(document.querySelector('<?=$arParams['PARENT_CLASS']?>   form[name="<?=$arResult['arForm']['SID']?>"]'), '<?=$templateFolder?>/ajax.php');
          document.querySelector("<?=$arParams['PARENT_CLASS']?>   form[name='" + "<?=$arResult['arForm']['SID']?>" + "'] input[placeholder='REF']").value = location.href;
		  document.querySelector("<?=$arParams['PARENT_CLASS']?>   form[name='" + "<?=$arResult['arForm']['SID']?>" + "'] input[placeholder='TITLE']").value = document.title;

			let parentForm05 = document.querySelector("<?=$arParams['PARENT_CLASS']?>   form[name='" + "<?=$arResult['arForm']['SID']?>" + "']");
			parentForm05.querySelector('.modal__btn-repeat').addEventListener('click', function () {
				parentForm05.querySelector('.a-form__block-inputs').style.display = '';
				parentForm05.querySelector('.a-form__btn-submit').style.display = '';
				parentForm05.querySelector('.a-form__privacy-policy').style.display = '';
				let inputs = parentForm05.querySelectorAll('.input__field');
				inputs.forEach(function(element) {
                  element.value = '';
                });
				parentForm05.querySelector('.success-msg').innerHTML = "";
				parentForm05.querySelector('.modal__btn-repeat').style.display = 'none';
			});
		  const newInput5 = document.createElement('div');
		  newInput5.style.display = 'none'; 
          newInput5.innerHTML = '<input type="text" name="anti" value="" style="visability:hidden; height: 0; width: 0; padding: 0; border:none;"/>';
          document.querySelector("<?=$arParams['PARENT_CLASS']?>   form[name='" + "<?=$arResult['arForm']['SID']?>").appendChild(newInput5);
        </script>
