<?php
use Bitrix\Main\Loader;

$rs = CIblockElement::GetList(
	["SORT" => "ASC"],
	['IBLOCK_ID' => '4', 'ACTIVE' => 'Y'],
	['PROPERTY_AREAS'],
	false,
	['ID', 'NAME', 'PROPERTY_AREAS']
);

while ($ar = $rs->GetNext()) { 
    $arResult['AREAS'][] = $ar['PROPERTY_AREAS_VALUE'];
	$arResult['AREAS'] = array_unique($arResult['AREAS']);
	rsort($arResult['AREAS']);
}

$rss = CIblockElement::GetList(
	["SORT" => "ASC"],
	['IBLOCK_ID' => '4', 'ACTIVE' => 'Y'],
	['PROPERTY_TECHNOLOGY'],
	false,
	['ID', 'NAME', 'PROPERTY_TECHNOLOGY']
);

while ($arr = $rss->GetNext()) { 
    $arResult['TECHNOLOGY'][] = $arr['PROPERTY_TECHNOLOGY_VALUE'];
	$arResult['TECHNOLOGY'] = array_unique($arResult['TECHNOLOGY']);
	rsort($arResult['TECHNOLOGY']);
}
?>