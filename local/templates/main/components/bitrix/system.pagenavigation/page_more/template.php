<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die(); ?>

	<?if($arResult["NavPageCount"] > 1):?>
	    <?if ($arResult["NavPageNomer"]+1 <= $arResult["nEndPage"]):?>

	        <?
	        $plus = $arResult["NavPageNomer"]+1;
	        $url = $arResult["sUrlPathParams"] . "PAGEN_".$arResult["NavNum"]."=".$plus;
	        ?>

			<div class="pagination load_more_too_<? echo $arResult['NavNum']?>">
				<div class="container">
					<div class="pagination__list">
					  <a class="button btn__big-gray" onclick="PAGENTOO<? echo $arResult['NavNum']?>();" data-url="<?=$url?>">Показать еще
						<svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none"><path d="M11.5 11V5H13.5V11H19.5V13H13.5V19H11.5V13H5.5V11H11.5Z" fill="#4B23EB"></path></svg>
					  </a>
					</div>
				</div>
			</div>

	    <? endif ?>
<? endif ?>

<script type="text/javascript">
function PAGENTOO<? echo $arResult["NavNum"]?>(){
	var targetContainer = document.querySelector('.loadmore_wrap_too_<? echo $arResult["NavNum"]?>'); //  Контейнер, в котором хранятся элементы closest(".loadmore_wrap_too")
            url =  document.querySelector('.load_more_too_<? echo $arResult["NavNum"]?> .button').getAttribute('data-url'); //  URL, из которого будем брать элементы
			//Удаляем старую навигацию
			document.querySelector('.load_more_too_<? echo $arResult["NavNum"]?>').remove();
			let loading = document.createElement('div');
			loading.className = "pagination loading_more_too_<? echo $arResult["NavNum"]?>";
			loading.innerHTML = '<div class="container"><div class="pagination__list"><span class="button btn__big-gray">Загрузка</span></div></div>';
			targetContainer.append(loading);
        if (url !== undefined) {
			const request = new XMLHttpRequest();
			request.open('GET', url);
			request.responseType = "document";
			request.setRequestHeader('Content-Type', 'text/html');
			request.addEventListener("readystatechange", () => {
				if (request.readyState === 4 && request.status === 200) {
					//Удаляем навигацию загрузки
					document.querySelector('.loading_more_too_<? echo $arResult["NavNum"]?>').remove();
					var data = request.responseXML;
					var group = data.querySelector('.loadmore_wrap_too_<? echo $arResult["NavNum"]?>');
					var elements = group.querySelectorAll(".loadmore_item_too"); //  Ищем элементы
					for(var i=0; i<elements.length; i++) //  Добавляем посты в конец контейнера
					{
					  targetContainer.append(elements[i]);
					}
					var pagination = data.querySelector(".load_more_too_<? echo $arResult["NavNum"]?>"); //  Ищем навигацию
					if (pagination != null) 
					  targetContainer.append(pagination); //  добавляем навигацию следом
				}
			});
			request.send();
    	}
}
</script>
