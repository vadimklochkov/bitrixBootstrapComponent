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
        "MAIN_TEXT" => array(
            "PARENT" => "BASE",
            "NAME" => "Текст главной ссылки",
            "TYPE" => "TEXT",
            "DEFAULT" => "Название",
            "REFRESH" => "Y",
        ),
        "MAIN_LINK" => array(
            "PARENT" => "BASE",
            "NAME" => "Главная ссылка",
            "TYPE" => "TEXT",
            "DEFAULT" => "link",
            "REFRESH" => "Y",
        ),
        "NAV_COLOR" => array(
            "PARENT" => "BASE",
            "NAME" => "Стиль навбара",
            "TYPE" => "LIST",
            "DEFAULT" => "dark",
            "REFRESH" => "Y",
            "VALUES" => array(
                'light' => 'светлый',
                'dark' => 'тёмный'
            ),
            "REFRESH" => "Y",
        ),
        "NAV_BG" => array(
            "PARENT" => "BASE",
            "NAME" => "Фон навбара",
            "TYPE" => "LIST",
            "DEFAULT" => "white",
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
		"TOGGLE_SEARCH" => Array(
			"PARENT" => "BASE",
			"NAME" => 'Включить поиск',
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N",
			"REFRESH" => "Y",
		),
        "TEXT_SEARCH" => array(
            "PARENT" => "BASE",
            "NAME" => "Текст поиска",
            "TYPE" => "TEXT",
            "DEFAULT" => "Поиск",
            "REFRESH" => "Y",
        ),
        "HREF_SEARCH" => array(
            "PARENT" => "BASE",
            "NAME" => "Ссылка на обработчик поиска",
            "TYPE" => "/find.php",
            "DEFAULT" => "Поиск",
            "REFRESH" => "Y",
        ),
        "METHOD_SEARCH" => array(
            "PARENT" => "BASE",
            "NAME" => "Стиль навбара",
            "TYPE" => "LIST",
            "DEFAULT" => "GET",
            "REFRESH" => "Y",
            "VALUES" => array(
                'POST' => 'POST',
                'GET' => 'GET'
            ),
            "REFRESH" => "Y",
        ),
        "COLOR_BTN" => array(
            "PARENT" => "BASE",
            "NAME" => "Цвет кнопки поиска",
            "TYPE" => "LIST",
            "DEFAULT" => "dark",
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
        "TEXT_BTN" => array(
            "PARENT" => "BASE",
            "NAME" => "Текст кнопки поиска",
            "TYPE" => "TEXT",
            "DEFAULT" => "Поиск",
            "REFRESH" => "Y",
        ),
    ),
);