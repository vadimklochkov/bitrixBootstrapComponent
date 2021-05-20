<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock"))
    return;

$arTypesEx = CIBlockParameters::GetIBlockTypes(array("-"=>" "));

$arIBlocks=array();
$db_iblock = CIBlock::GetList(array("SORT"=>"ASC"), array("TYPE" => ($arCurrentValues["IBLOCK_TYPE"]!="-"?$arCurrentValues["IBLOCK_TYPE"]:"")));
while($arRes = $db_iblock->Fetch())
    $arIBlocks[$arRes["ID"]] = "[".$arRes["ID"]."] ".$arRes["NAME"];

$arProperty_LNS = array();
$rsProp = CIBlockProperty::GetList(array("sort"=>"asc", "name"=>"asc"), array("ACTIVE"=>"Y", "IBLOCK_ID"=>($arCurrentValues["IBLOCK_ID"])));
while ($arr=$rsProp->Fetch())
{
    $arProperty[$arr["CODE"]] = "[".$arr["CODE"]."] ".$arr["NAME"];
    if (in_array($arr["PROPERTY_TYPE"], array("L", "N", "S")))
    {
        $arProperty_LNS[$arr["CODE"]] = "[".$arr["CODE"]."] ".$arr["NAME"];
    }
}

$arComponentParameters = array(
    "PARAMETERS" => array(
        "ID_BLOCK" => array(
            "PARENT" => "BASE",
            "NAME" => "ИД слайдера",
            "TYPE" => "TEXT",
            "DEFAULT" => "SliderNumb",
            "REFRESH" => "Y",
        ),
        "IBLOCK_TYPE" => array(
            "PARENT" => "BASE",
            "NAME" => "Тип инфоблока",
            "TYPE" => "LIST",
            "VALUES" => $arTypesEx,
            "DEFAULT" => "news",
            "REFRESH" => "Y",
        ),
        "IBLOCK_ID" => array(
            "PARENT" => "BASE",
            "NAME" => "Инфобок",
            "TYPE" => "LIST",
            "VALUES" => $arIBlocks,
            "DEFAULT" => '={$_REQUEST["ID"]}',
            "ADDITIONAL_VALUES" => "Y",
            "REFRESH" => "Y",
        ),
        "PROPERTY_CODE" => array(
            "PARENT" => "DATA_SOURCE",
            "NAME" => "Укажите свойство по которому будет фильтроваться товары для слайдера",
            "TYPE" => "LIST",
            "MULTIPLE" => "N",
            "VALUES" => $arProperty_LNS,
            "ADDITIONAL_VALUES" => "Y",
        ),
        "HEIGHT" => array(
            "PARENT" => "BASE",
            "NAME" => "Height (можно использовать px, %)",
            "TYPE" => "TEXT",
            "DEFAULT" => "500px",
            "REFRESH" => "Y",
        ),
        "WIDTH" => array(
            "PARENT" => "BASE",
            "NAME" => "Width (можно использовать px, %)",
            "TYPE" => "TEXT",
            "DEFAULT" => "100%",
            "REFRESH" => "Y",
        ),
        "TYPE_BG" => array(
            "PARENT" => "BASE",
            "NAME" => "Тип отображения картинки",
            "TYPE" => "LIST",
            "DEFAULT" => "contain",
            "REFRESH" => "Y",
            "VALUES" => array(
                'contain' => 'contain',
                'cover' => 'cover'
            ),
            "REFRESH" => "Y",
        ),
		"SHOW_H5" => Array(
			"PARENT" => "BASE",
			"NAME" => 'Показывать название слайда',
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "Y",
			"REFRESH" => "Y",
		),
		"SHOW_P" => Array(
			"PARENT" => "BASE",
			"NAME" => 'Показывать описание слайда',
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "Y",
			"REFRESH" => "Y",
		),
		"SHOW_INDICATION" => Array(
			"PARENT" => "BASE",
			"NAME" => 'Показывать индикацию текущего слайда',
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "Y",
			"REFRESH" => "Y",
		),
    ),
);