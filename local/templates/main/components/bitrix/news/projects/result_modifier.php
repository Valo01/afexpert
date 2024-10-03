<?php
use Bitrix\Main\Loader;

$rs = CIblockElement::GetList(
	["SORT" => "ASC"],
	['IBLOCK_ID' => '3', 'ACTIVE' => 'Y'],
	['PROPERTY_INDUSTRY'],
	false,
	['ID', 'NAME', 'PROPERTY_INDUSTRY']
);

while ($ar = $rs->GetNext()) { 
    $arResult['INDUSTRY'][] = $ar['PROPERTY_INDUSTRY_VALUE'];
}

$rss = CIblockElement::GetList(
	["NAME" => "DESC"],
	['IBLOCK_ID' => '3', 'ACTIVE' => 'Y'],
	['PROPERTY_YEAR'],
	false,
	['ID', 'NAME', 'PROPERTY_YEAR']
);

while ($arr = $rss->GetNext()) { 
    $arResult['YEAR'][] = (int)$arr['PROPERTY_YEAR_VALUE'];
	$arResult['YEAR'] = array_unique($arResult['YEAR']);
	rsort($arResult['YEAR']);
}
?>