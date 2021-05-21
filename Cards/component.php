<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Loader;
    
if(!Loader::includeModule("iblock"))
{
    return;
}

$arSelect = Array("ID", "NAME", "PREVIEW_PICTURE", "PREVIEW_TEXT", "DETAIL_TEXT", "DETAIL_PAGE_URL", "DATE_ACTIVE_FROM", "DATE_ACTIVE_TO", "CODE", "PROPERTY_".$arParams["PROPERTY_CODE"]);
$arFilter = Array("IBLOCK_ID" => IntVal($arParams["IBLOCK_ID"]), "ACTIVE"=>"Y", "PROPERTY_".$arParams["PROPERTY_CODE"]."_VALUE" => 'Да');
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

$i=0;
while($arFields = $res->GetNext())
{
    $arResult[$i] = $arFields;    
    $arResult[$i]['img'] = CFile::GetPath($arFields['PREVIEW_PICTURE']);
    $i++;
}

$this->includeComponentTemplate();
?>
