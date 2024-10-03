<?php
use Bitrix\Main\Error;
use Bitrix\Main\Errorable;
use Bitrix\Main\ErrorCollection;
use Bitrix\Main\Engine\Contract\Controllerable;
use Lib\DataManager;
use Bitrix\Iblock\PropertyEnumerationTable;
use Bitrix\Iblock\Iblock;
use Bitrix\Iblock\IblockTable;
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

class InteractiveMap extends \CBitrixComponent implements Controllerable, Errorable
{

    protected ErrorCollection $errorCollection;

    public function onPrepareComponentParams($arParams)
    {
        $this->errorCollection = new ErrorCollection();
        return $arParams;
    }

    public function executeComponent()
    {
        $this->arResult = $this->getData();
        $this->includeComponentTemplate();
    }

    public function getErrors(): array
    {
        return $this->errorCollection->toArray();
    }

    public function getErrorByCode($code): Error
    {
        return $this->errorCollection->getErrorByCode($code);
    }

    public function configureActions()
    {
        return [
            'sendFormMap' => [
                'prefilters' => [],
            ],
        ];
    }

    private function getData()
    {
        $rs = CIBlockElement::GetList(
			["SORT" => "ASC"],
			['IBLOCK_ID' => 23, 'ACTIVE' => 'Y'],
			false, false,
			['ID', 'NAME', 'PROPERTY_COUNT', 'PROPERTY_CAPACITY', 'PROPERTY_STATUS', 'PROPERTY_CATEGORY', 'PROPERTY_MAP_POSITION', 'PROPERTY_COUNTRY']
		);
        $newdata = [];
        $result_array = [];
		while ($dataArray = $rs->GetNext()) {
            $property_enums = CIBlockPropertyEnum::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_ID"=>23, "CODE"=>"MAP_POSITION", "ID"=>$dataArray['PROPERTY_MAP_POSITION_ENUM_ID']));
            while($enum_fields = $property_enums->GetNext()) {$PROPERTY_MAP_POSITION_XML_ID=$enum_fields["XML_ID"];}
			$newdata = [
              'name' => $dataArray['NAME'],
              'count' => $dataArray['PROPERTY_COUNT_VALUE'],
              'capacity' => $dataArray['PROPERTY_CAPACITY_VALUE'],
              'status' => $dataArray['PROPERTY_STATUS_VALUE'],
              'category' => $dataArray['PROPERTY_CATEGORY_VALUE'],
              'mapPosition' => $PROPERTY_MAP_POSITION_XML_ID,
              'country' => $dataArray['PROPERTY_COUNTRY_VALUE']
            ];
            $result_array[] = $newdata;
		};

        $arResult = [];

        $arResult = $result_array;

        $counts = [];
        foreach ($arResult as $item) {
            $mapPosition = $item["mapPosition"];
            if (!isset($counts[$mapPosition])) {
                $counts[$mapPosition] = 0;
            }
            $counts[$mapPosition]++;
        }

        $arProp = \CIBlockProperty::GetList([], [
            'IBLOCK_ID' => 23,
            'CODE' => 'MAP_POSITION',
        ])->Fetch();

        $oblasts = [];
        foreach ($arResult as &$item) {
            $mapPosition = $item["mapPosition"];
            $item["countPos"] = $counts[$mapPosition];

            $arEnum = CIBlockPropertyEnum::GetList(
                [],
                [
                    'XML_ID' => $item['mapPosition'],
                    'PROPERTY_ID' => $arProp['ID']
                ]
            )->Fetch();

            $oblasts[$arEnum['VALUE']][] = $item;
        }

        $arResult['oblasts'] = $oblasts;

        return $arResult;
    }

    public function sendFormMapAction(string $mapPosition = '')
    {
        if (CModule::IncludeModule("iblock")){
            $rss = CIBlockElement::GetList(
                ["SORT" => "ASC"],
                ['IBLOCK_ID' => 23, 'ACTIVE' => 'Y'],
                false, false,
                ['ID', 'NAME', 'PROPERTY_COUNT', 'PROPERTY_CAPACITY', 'PROPERTY_STATUS', 'PROPERTY_CATEGORY', 'PROPERTY_MAP_POSITION', 'PROPERTY_COUNTRY']
            );
            $newdataRequest = [];
            $result_array_Request = [];
            while ($dataArray = $rss->GetNext()) {
                $property_enums = CIBlockPropertyEnum::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_ID"=>23, "CODE"=>"MAP_POSITION", "ID"=>$dataArray['PROPERTY_MAP_POSITION_ENUM_ID']));
                while($enum_fields = $property_enums->GetNext()) {$PROPERTY_MAP_POSITION_XML_ID=$enum_fields["XML_ID"];}
                if ($PROPERTY_MAP_POSITION_XML_ID == $mapPosition):
                    $newdataRequest = [
                    'name' => $dataArray['NAME'],
                    'count' => $dataArray['PROPERTY_COUNT_VALUE'],
                    'capacity' => $dataArray['PROPERTY_CAPACITY_VALUE'],
                    'status' => $dataArray['PROPERTY_STATUS_VALUE'],
                    'category' => $dataArray['PROPERTY_CATEGORY_VALUE'],
                    'mapPosition' => $PROPERTY_MAP_POSITION_XML_ID,
                    'country' => $dataArray['PROPERTY_COUNTRY_VALUE']
                    ];
                    $result_array_Request[] = $newdataRequest;
                endif;
            };
        };
        $arResult['list'] = $result_array_Request;

        if (empty($arResult['list'])){
            return $_REQUEST;
        }

        $arProp = \CIBlockProperty::GetList([], [
            'IBLOCK_ID' => 23,
            'CODE' => 'MAP_POSITION',
        ])->Fetch();

        $arEnum = CIBlockPropertyEnum::GetList(
            [],
            [
                'XML_ID' => $mapPosition,
                'PROPERTY_ID' => $arProp['ID']
            ]
        )->Fetch();

        if ($arEnum) {
            $arResult['title'] = $arEnum['VALUE'];
        } else {
            $arResult['title'] = '';
        }

        return $arResult;
    }

}