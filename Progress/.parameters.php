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
        "PROGRESS" => array(
            "PARENT" => "BASE",
            "NAME" => "Прогресс",
            "TYPE" => "TEXT",
            "DEFAULT" => "50",
            "REFRESH" => "Y",
        ),
        "BACKGROUND_COLOR" => array(
            "PARENT" => "BASE",
            "NAME" => "Цвет прогресса",
            "TYPE" => "LIST",
            "DEFAULT" => "primary",
            "REFRESH" => "Y",
            "VALUES" => array(
                'primary' => 'синий',
                'secondary' => 'тёмно-серый',
                'success' => 'зелёный',
                'danger' => 'красный',
                'warning' => 'ораньжевый',
                'info' => 'голубой',
                'light' => 'светлый',
                'dark' => 'тёмный',
                'muted' => 'серый',
                'white' => 'белый'
            ),
            "REFRESH" => "Y",
        ),
        "TEXT" => array(
            "PARENT" => "BASE",
            "NAME" => "Текст на прогресс баре",
            "TYPE" => "TEXT",
            "DEFAULT" => "",
            "REFRESH" => "Y",
        ),
        "TEXT_COLOR" => array(
            "PARENT" => "BASE",
            "NAME" => "Цвет текста",
            "TYPE" => "LIST",
            "DEFAULT" => "light",
            "REFRESH" => "Y",
            "VALUES" => array(
                'primary' => 'синий',
                'secondary' => 'тёмно-серый',
                'success' => 'зелёный',
                'danger' => 'красный',
                'warning' => 'ораньжевый',
                'info' => 'голубой',
                'light' => 'светлый',
                'dark' => 'тёмный',
                'muted' => 'серый',
                'white' => 'белый'
            ),
            "REFRESH" => "Y",
        ),
		"SHOW_STRIPED" => Array(
			"PARENT" => "BASE",
			"NAME" => 'Показывать полосы',
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N",
			"REFRESH" => "Y",
		),
		"ANIMATE_STRIPED" => Array(
			"PARENT" => "BASE",
			"NAME" => 'Анимировать полосы',
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N",
			"REFRESH" => "Y",
		),
    ),
);