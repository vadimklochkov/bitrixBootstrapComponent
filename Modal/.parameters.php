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
        "NUMB_ACRD" => array(
            "PARENT" => "BASE",
            "NAME" => "ИД модального алерта (цифрой)",
            "TYPE" => "TEXT",
            "DEFAULT" => "1000",
            "REFRESH" => "Y",
        ),
        "COLOR_BASE_BTN" => array(
            "PARENT" => "BASE",
            "NAME" => "Цвет основной кнопки",
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
        "TEXT_BASE_BTN" => array(
            "PARENT" => "BASE",
            "NAME" => "Текст на основной кнопки",
            "TYPE" => "TEXT",
            "DEFAULT" => "Click",
            "REFRESH" => "Y",
        ),
        "TEXT_TITLE" => array(
            "PARENT" => "BASE",
            "NAME" => "Текст тайтла",
            "TYPE" => "TEXT",
            "DEFAULT" => "Title text",
            "REFRESH" => "Y",
        ),
        "DOP_TITLE" => array(
            "PARENT" => "BASE",
            "NAME" => "Текст справа от тайтла",
            "TYPE" => "TEXT",
            "DEFAULT" => "Text",
            "REFRESH" => "Y",
        ),
        "TEXT" => array(
            "PARENT" => "BASE",
            "NAME" => "Текст алерта",
            "TYPE" => "TEXT",
            "DEFAULT" => "Text lorem ipsum",
            "REFRESH" => "Y",
        ),
		"SHOW_CLOSE_BTN" => Array(
			"PARENT" => "BASE",
			"NAME" => 'Показывать кнопку закрытия',
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "Y",
			"REFRESH" => "Y",
		),
        "COLOR_CLOSE_BTN" => array(
            "PARENT" => "BASE",
            "NAME" => "Цвет кнопки закрытия",
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
        "TEXT_CLOSE_BTN" => array(
            "PARENT" => "BASE",
            "NAME" => "Текст кнопки закрытия",
            "TYPE" => "TEXT",
            "DEFAULT" => "Close",
            "REFRESH" => "Y",
        ),
		"SHOW_DOP_BTN" => Array(
			"PARENT" => "BASE",
			"NAME" => 'Показывать дополнительную кнопку ',
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N",
			"REFRESH" => "Y",
		),
        "COLOR_DOP_BTN" => array(
            "PARENT" => "BASE",
            "NAME" => "Цвет дополнительной кнопки ",
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
        "TEXT_DOP_BTN" => array(
            "PARENT" => "BASE",
            "NAME" => "Текст дополнительной кнопки",
            "TYPE" => "TEXT",
            "DEFAULT" => "Save",
            "REFRESH" => "Y",
        ),
    ),
);