<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

		<?= $arResult["FORM_HEADER"] ?>

              <div class="a-form__header">
                <span class="a-form__subtitle">Ждем ваше резюме</span>
                <h2 class="a-form__title"><?= $arResult["FORM_TITLE"] ?></h2>
              </div>

              <div class="a-form__block-inputs a-form__block-inputs--download">

                <?=$arResult['funcGetInputHtml']($arResult["QUESTIONS"]['NAME'], $arResult['arrVALUES'])?>

                <?=$arResult['funcGetInputHtml']($arResult["QUESTIONS"]['COMENT'], $arResult['arrVALUES'])?>

                <div class="a-form__block-inputs-inner">

                  <?=$arResult['funcGetInputHtml']($arResult["QUESTIONS"]['PHONE'], $arResult['arrVALUES'])?>

				  <?=$arResult['funcGetInputHtml']($arResult["QUESTIONS"]['EMAIL'], $arResult['arrVALUES'])?>

                </div>

                <?=$arResult['funcGetInputHtml']($arResult["QUESTIONS"]['FILE'], $arResult['arrVALUES'])?>

				<?=$arResult['funcGetInputHtml']($arResult["QUESTIONS"]['REF'], $arResult['arrVALUES'])?>
				<?=$arResult['funcGetInputHtml']($arResult["QUESTIONS"]['TITLE'], $arResult['arrVALUES'])?>

              </div>

			  <input type="hidden" name="web_form_submit" value="Y">
              <button class="a-form__btn-submit btn-reset" type="submit">
                <span><?=$arResult["arForm"]["BUTTON"]?></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                  <path d="M19.5 5.5L5.5 19.5" stroke="#4B23EB" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M19.5 15.77V5.5H9.23" stroke="#4B23EB" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
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
              <span>Откликнуться еще раз</span>
            </a>

      <?= $arResult["FORM_FOOTER"]?>

        <script>
          ajaxForm(document.querySelector('<?=$arParams['PARENT_CLASS']?>   form[name="<?=$arResult['arForm']['SID']?>"]'), '<?=$templateFolder?>/ajax.php');
          document.querySelector("<?=$arParams['PARENT_CLASS']?>   form[name='" + "<?=$arResult['arForm']['SID']?>" + "'] input[placeholder='REF']").value = location.href;
		  document.querySelector("<?=$arParams['PARENT_CLASS']?>   form[name='" + "<?=$arResult['arForm']['SID']?>" + "'] input[placeholder='TITLE']").value = document.title;

			let parentForm06 = document.querySelector("<?=$arParams['PARENT_CLASS']?>   form[name='" + "<?=$arResult['arForm']['SID']?>" + "']");
			parentForm06.querySelector('.modal__btn-repeat').addEventListener('click', function () {
				parentForm06.querySelector('.a-form__block-inputs').style.display = '';
				parentForm06.querySelector('.a-form__btn-submit').style.display = '';
				parentForm06.querySelector('.a-form__privacy-policy').style.display = '';
				let inputs = parentForm06.querySelectorAll('.input__field');
				inputs.forEach(function(element) {
                  element.value = '';
                });
				parentForm06.querySelector('.success-msg').innerHTML = "";
				parentForm06.querySelector('.modal__btn-repeat').style.display = 'none';
			});
		  const newInput6 = document.createElement('div');
		  newInput6.style.display = 'none'; 
          newInput6.innerHTML = '<input type="text" name="anti" value="" style="visability:hidden; height: 0; width: 0; padding: 0; border:none;"/>';
          document.querySelector("<?=$arParams['PARENT_CLASS']?>   form[name='" + "<?=$arResult['arForm']['SID']?>").appendChild(newInput6);
        </script>
