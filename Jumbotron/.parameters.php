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
        "BACKGROUND_COLOR" => array(
            "PARENT" => "BASE",
            "NAME" => "Цвет фона",
            "TYPE" => "LIST",
            "DEFAULT" => "muted",
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
		"SHOW_TITLE" => Array(
			"PARENT" => "BASE",
			"NAME" => 'Показывать тайтл',
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "Y",
			"REFRESH" => "Y",
		),
        "TEXT_TITLE" => array(
            "PARENT" => "BASE",
            "NAME" => "Текст тайтла",
            "TYPE" => "TEXT",
            "DEFAULT" => "Lorem ipsum",
            "REFRESH" => "Y",
        ),
        "TITLE_COLOR" => array(
            "PARENT" => "BASE",
            "NAME" => "Цвет текста тайтла",
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
		"SHOW_FIRST_TEXT" => Array(
			"PARENT" => "BASE",
			"NAME" => 'Показывать первый текст',
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "Y",
			"REFRESH" => "Y",
		),
        "FIRST_TEXT_COLOR" => array(
            "PARENT" => "BASE",
            "NAME" => "Цвет первого текста",
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
        "FIRST_TEXT" => array(
            "PARENT" => "BASE",
            "NAME" => "Первый текст",
            "TYPE" => "TEXT",
            "DEFAULT" => "Lorem ipsum",
            "REFRESH" => "Y",
        ),
		"SHOW_HR" => Array(
			"PARENT" => "BASE",
			"NAME" => 'Показывать разделительную линию',
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "Y",
			"REFRESH" => "Y",
		),
        "HR_COLOR" => array(
            "PARENT" => "BASE",
            "NAME" => "Цвет разделительной линии",
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
		"SHOW_SECOND_TEXT" => Array(
			"PARENT" => "BASE",
			"NAME" => 'Показывать второй текст',
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "Y",
			"REFRESH" => "Y",
		),
        "SECOND_TEXT_COLOR" => array(
            "PARENT" => "BASE",
            "NAME" => "Цвет второго текста",
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
        "SECOND_TEXT" => array(
            "PARENT" => "BASE",
            "NAME" => "Второй текст",
            "TYPE" => "TEXT",
            "DEFAULT" => "Lorem ipsum",
            "REFRESH" => "Y",
        ),
		"SHOW_FIRST_BTN" => Array(
			"PARENT" => "BASE",
			"NAME" => 'Показывать первую кнопку',
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "Y",
			"REFRESH" => "Y",
		),
        "FIRST_BTN_COLOR" => array(
            "PARENT" => "BASE",
            "NAME" => "Цвет первой кнопки",
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
        "FIRST_BTN_TEXT_COLOR" => array(
            "PARENT" => "BASE",
            "NAME" => "Цвет текста первой кнопки",
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
        "FIRST_BTN_TEXT" => array(
            "PARENT" => "BASE",
            "NAME" => "Текст первой кнопки",
            "TYPE" => "TEXT",
            "DEFAULT" => "button #1",
            "REFRESH" => "Y",
        ),
        "FIRST_BTN_HREF" => array(
            "PARENT" => "BASE",
            "NAME" => "Ссылка первой кнопки",
            "TYPE" => "TEXT",
            "DEFAULT" => "/first",
            "REFRESH" => "Y",
        ),
		"SHOW_SECOND_BTN" => Array(
			"PARENT" => "BASE",
			"NAME" => 'Показывать вторую кнопку',
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "Y",
			"REFRESH" => "Y",
		),
        "SECOND_BTN_COLOR" => array(
            "PARENT" => "BASE",
            "NAME" => "Цвет второй кнопки",
            "TYPE" => "LIST",
            "DEFAULT" => "info",
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
        "SECOND_BTN_TEXT_COLOR" => array(
            "PARENT" => "BASE",
            "NAME" => "Цвет текста второй кнопки",
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
        "SECOND_BTN_TEXT" => array(
            "PARENT" => "BASE",
            "NAME" => "Текст второй кнопки",
            "TYPE" => "TEXT",
            "DEFAULT" => "button #2",
            "REFRESH" => "Y",
        ),
        "SECOND_BTN_HREF" => array(
            "PARENT" => "BASE",
            "NAME" => "Ссылка второй кнопки",
            "TYPE" => "TEXT",
            "DEFAULT" => "/second",
            "REFRESH" => "Y",
        ),
		"SHOW_THID_BTN" => Array(
			"PARENT" => "BASE",
			"NAME" => 'Показывать третью кнопку',
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "Y",
			"REFRESH" => "Y",
		),
        "THID_BTN_COLOR" => array(
            "PARENT" => "BASE",
            "NAME" => "Цвет третий кнопки",
            "TYPE" => "LIST",
            "DEFAULT" => "success",
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
        "THID_BTN_TEXT_COLOR" => array(
            "PARENT" => "BASE",
            "NAME" => "Цвет текста третий кнопки",
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
        "THID_BTN_TEXT" => array(
            "PARENT" => "BASE",
            "NAME" => "Текст третий кнопки",
            "TYPE" => "TEXT",
            "DEFAULT" => "button #3",
            "REFRESH" => "Y",
        ),
        "THID_BTN_HREF" => array(
            "PARENT" => "BASE",
            "NAME" => "Ссылка третий кнопки",
            "TYPE" => "TEXT",
            "DEFAULT" => "/thid",
            "REFRESH" => "Y",
        ),
    ),
);