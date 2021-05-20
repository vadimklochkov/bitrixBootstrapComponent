<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<div class="jumbotron bg-<?=$arParams['BACKGROUND_COLOR']?>">
  <?if($arParams['SHOW_TITLE']=='Y'){?><h1 class="display-4 text-<?=$arParams['TITLE_COLOR']?>"><?=$arParams['TEXT_TITLE']?></h1><?}?>
  <?if($arParams['SHOW_FIRST_TEXT']=='Y'){?><p class="lead text-<?=$arParams['FIRST_TEXT_COLOR']?>"><?=$arParams['FIRST_TEXT']?></p><?}?>
  <?if($arParams['SHOW_HR']=='Y'){?><hr class="my-4 bg-<?=$arParams['HR_COLOR']?>"><?}?>
  <?if($arParams['SHOW_SECOND_TEXT']=='Y'){?><p class="text-<?=$arParams['SECOND_TEXT_COLOR']?>"><?=$arParams['SECOND_TEXT']?></p><?}?>
  <p class="lead">
  <?if($arParams['SHOW_FIRST_BTN']=='Y'){?><a class="btn btn-lg btn-<?=$arParams['FIRST_BTN_COLOR']?> text-<?=$arParams['FIRST_BTN_TEXT_COLOR']?>" href="<?=$arParams['FIRST_BTN_HREF']?>"><?=$arParams['FIRST_BTN_TEXT']?></a><?}?>
  <?if($arParams['SHOW_SECOND_BTN']=='Y'){?><a class="btn btn-lg btn-<?=$arParams['SECOND_BTN_COLOR']?> text-<?=$arParams['SECOND_BTN_TEXT_COLOR']?>" href="<?=$arParams['SECOND_BTN_HREF']?>"><?=$arParams['SECOND_BTN_TEXT']?></a><?}?>
  <?if($arParams['SHOW_THID_BTN']=='Y'){?><a class="btn btn-lg btn-<?=$arParams['THID_BTN_COLOR']?> text-<?=$arParams['THID_BTN_TEXT_COLOR']?>" href="<?=$arParams['THID_BTN_HREF']?>"><?=$arParams['THID_BTN_TEXT']?></a><?}?>
  </p>
</div>
