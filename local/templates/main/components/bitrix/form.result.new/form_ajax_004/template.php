<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

        <?= $arResult["FORM_HEADER"] ?>

          <button class="hystmodal__close btn-reset" type="button" data-hystclose>
            <span class="modal__close-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                <path d="M25 7L7 25" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M25 25L7 7" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </span>
          </button>

          <div class="modal__wrap-content">
			<h2 class="modal__title"><?= $arResult["FORM_TITLE"] ?></h2>
            <div class="modal__wrap-fields">

				<?=$arResult['funcGetInputHtml']($arResult["QUESTIONS"]['NAME'], $arResult['arrVALUES'])?>

				<?=$arResult['funcGetInputHtml']($arResult["QUESTIONS"]['COMENT'], $arResult['arrVALUES'])?>

              <div class="modal__inner-fields">

				<?=$arResult['funcGetInputHtml']($arResult["QUESTIONS"]['PHONE'], $arResult['arrVALUES'])?>

				<?=$arResult['funcGetInputHtml']($arResult["QUESTIONS"]['EMAIL'], $arResult['arrVALUES'])?>

              </div>

				<?=$arResult['funcGetInputHtml']($arResult["QUESTIONS"]['FILE'], $arResult['arrVALUES'])?>

            </div>

            <div class="modal__after-sending">
				<div class="error-msg modal__after-sending-text"></div>
                <div class="success-msg"></div>
            </div>

          </div>

			<?=$arResult['funcGetInputHtml']($arResult["QUESTIONS"]['REF'], $arResult['arrVALUES'])?>
			<?=$arResult['funcGetInputHtml']($arResult["QUESTIONS"]['TITLE'], $arResult['arrVALUES'])?>

			<input type="hidden" name="web_form_submit" value="Y">

          <div class="modal__wrap-btn">
            <button class="a-form__btn-submit modal__btn-submit btn-reset" type="submit">
              <span><?=$arResult["arForm"]["BUTTON"]?></span>
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                <path d="M19.75 5.5L5.75 19.5" stroke="#4B23EB" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M19.75 15.77V5.5H9.48" stroke="#4B23EB" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </button>

            <div class="checkbox   checkbox--privacy-policy">
              <label class="checkbox__label">
                <input class="checkbox__input" type="checkbox" name="" value="" required>
                <span class="checkbox__text">Cогласен с условиями <a href="/privacy-policy/" target="_blank"> политики конфиденциальности сайта</a></span>
                <span class="checkbox__decore">
                </span>
                <span class="checkbox__message">Это поле обязательно для заполнения</span>
              </label>
            </div>

            <a class="a-form__btn-submit modal__btn-repeat btn-reset">
              <span>Откликнуться еще раз</span>
            </a>
          </div>

      <?= $arResult["FORM_FOOTER"]?>

        <script>
          ajaxForm(document.querySelector('<?=$arParams['PARENT_CLASS']?>   form[name="<?=$arResult['arForm']['SID']?>"]'), '<?=$templateFolder?>/ajax.php');
          document.querySelector("<?=$arParams['PARENT_CLASS']?>   form[name='" + "<?=$arResult['arForm']['SID']?>" + "'] input[placeholder='REF']").value = location.href;
		  document.querySelector("<?=$arParams['PARENT_CLASS']?>   form[name='" + "<?=$arResult['arForm']['SID']?>" + "'] input[placeholder='TITLE']").value = document.title;

			let parentForm04 = document.querySelector("<?=$arParams['PARENT_CLASS']?>   form[name='" + "<?=$arResult['arForm']['SID']?>" + "']");
			parentForm04.querySelector('.modal__btn-repeat').addEventListener('click', function () {
				parentForm04.querySelector('.modal__wrap-fields').style.display = '';
				parentForm04.querySelector('.modal__btn-submit').style.display = '';
				parentForm04.querySelector('.checkbox--privacy-policy').style.display = '';
				let inputs = parentForm04.querySelectorAll('.input__field');
				inputs.forEach(function(element) {
                  element.value = '';
                });
				parentForm04.querySelector('.success-msg').innerHTML = "";
				parentForm04.querySelector('.modal__btn-repeat').style.display = 'none';
			});
		  const newInput4 = document.createElement('div');
		  newInput4.style.display = 'none'; 
          newInput4.innerHTML = '<input type="text" name="anti" value="" style="visability:hidden; height: 0; width: 0; padding: 0; border:none;"/>';
          document.querySelector("<?=$arParams['PARENT_CLASS']?>   form[name='" + "<?=$arResult['arForm']['SID']?>").appendChild(newInput4);
        </script>
