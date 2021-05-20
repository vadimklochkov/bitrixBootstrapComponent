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
        "COLOR_BG" => array(
            "PARENT" => "BASE",
            "NAME" => "Цвет фона",
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
        "COLOR_TEXT" => array(
            "PARENT" => "BASE",
            "NAME" => "Цвет текста",
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
        "COL" => array(
            "PARENT" => "BASE",
            "NAME" => "Размер 1ной карточки в системе колонок (влияет на количество отображаемых карточек)",
            "TYPE" => "TEXT",
            "DEFAULT" => "6",
            "REFRESH" => "Y",
        ),
		"COL_SM_TOGGLE" => Array(
			"PARENT" => "BASE",
			"NAME" => 'Включить (col-sm-)',
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N",
			"REFRESH" => "Y",
		),
		"COL_SM" => Array(
			"PARENT" => "BASE",
            "NAME" => "Размер 1ной карточки (col-sm-) в системе колонок (влияет на количество отображаемых карточек)",
            "TYPE" => "TEXT",
            "DEFAULT" => "6",
            "REFRESH" => "Y",
		),
		"COL_MD_TOGGLE" => Array(
			"PARENT" => "BASE",
			"NAME" => 'Включить (col-md-)',
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N",
			"REFRESH" => "Y",
		),
		"COL_MD" => Array(
			"PARENT" => "BASE",
            "NAME" => "Размер 1ной карточки (col-md-) в системе колонок (влияет на количество отображаемых карточек)",
            "TYPE" => "TEXT",
            "DEFAULT" => "6",
            "REFRESH" => "Y",
		),
		"COL_LG_TOGGLE" => Array(
			"PARENT" => "BASE",
			"NAME" => 'Включить (col-lg-)',
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N",
			"REFRESH" => "Y",
		),
		"COL_LG" => Array(
			"PARENT" => "BASE",
            "NAME" => "Размер 1ной карточки (col-lg-) в системе колонок (влияет на количество отображаемых карточек)",
            "TYPE" => "TEXT",
            "DEFAULT" => "6",
            "REFRESH" => "Y",
		),
		"COL_XL_TOGGLE" => Array(
			"PARENT" => "BASE",
			"NAME" => 'Включить (col-xl-)',
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N",
			"REFRESH" => "Y",
		),
		"COL_XL" => Array(
			"PARENT" => "BASE",
            "NAME" => "Размер 1ной карточки (col-xl-) в системе колонок (влияет на количество отображаемых карточек)",
            "TYPE" => "TEXT",
            "DEFAULT" => "6",
            "REFRESH" => "Y",
		),
    ),
);