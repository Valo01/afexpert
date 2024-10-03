<?php
use Bitrix\Main\Loader;

$rs = CIblockElement::GetList(
	["SORT" => "ASC"],
	['IBLOCK_ID' => '1', 'ACTIVE' => 'Y'],
	['PROPERTY_EXP'],
	false,
	['ID', 'NAME', 'PROPERTY_EXP']
);

while ($ar = $rs->GetNext()) { 
    $arResult['EXP'][] = $ar['PROPERTY_EXP_VALUE'];
}

$rss = CIblockElement::GetList(
	["SORT" => "ASC"],
	['IBLOCK_ID' => '1', 'ACTIVE' => 'Y'],
	['PROPERTY_JOB'],
	false,
	['ID', 'NAME', 'PROPERTY_JOB']
);

while ($arr = $rss->GetNext()) { 
    $arResult['JOB'][] = $arr['PROPERTY_JOB_VALUE'];
}

$ros = CIblockElement::GetList(
	["SORT" => "ASC"],
	['IBLOCK_ID' => '1', 'ACTIVE' => 'Y'],
	['PROPERTY_SPEC'],
	false,
	['ID', 'NAME', 'PROPERTY_SPEC']
);

while ($aro = $ros->GetNext()) { 
    $arResult['SPEC'][] = $aro['PROPERTY_SPEC_VALUE'];
}
?>