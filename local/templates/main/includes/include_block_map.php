<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if (CModule::IncludeModule("iblock")){
	$strcontacts = CIBlockElement::GetList(
    [], ['IBLOCK_ID' => 22],
    false, false,
    ['ID', 'NAME', 'PROPERTY_ADRESS', 'PROPERTY_PHONE', 'PROPERTY_EMAIL', 'PROPERTY_MAP']
	);
} ?>

	<section class="map" id="section_map" data-scroll-section data-scroll-id="<?=$arParams["BLOCK_SCROLL"]?>">
          <div id="cityShop">
            <h4>
              Наши адреса
            </h4>
            <div id="cities">
            </div>
            <div id="shops">
            </div>
          </div>
          <div id="map" style="width: 100%; height: 660px">
          </div>
	</section>

<script>
	document.addEventListener('DOMContentLoaded', function(){
		var shopList_page = [
		  <?$index=0; while ($contres = $strcontacts->GetNext()):?>
			{'position': '<?=$contres["NAME"];?>',
			'shops': [{
			  'coordinates': [<?=$contres["PROPERTY_MAP_VALUE"];?>],
			  'name': '<?=$contres["PROPERTY_ADRESS_VALUE"];?>',
			  'tel': '<?=$contres["PROPERTY_PHONE_VALUE"];?>',
			  'email': '<?=$contres["PROPERTY_EMAIL_VALUE"];?>'
			  }]
			}
			<?$length=count($contres); $index++; if($length!=$index){echo',';};?>
		  <?endwhile;?>
		   ];
		sessionStorage.setItem("import_map", JSON.stringify(shopList_page));
		const eventmap = new StorageEvent('storage', {key: 'import_map'});
		window.dispatchEvent(eventmap);
	});
</script>
