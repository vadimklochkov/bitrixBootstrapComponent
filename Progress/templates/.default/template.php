<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<div class="progress">
  <div class="progress-bar<?if($arParams['SHOW_STRIPED']=='Y'){?> progress-bar-striped<?} if($arParams['ANIMATE_STRIPED']=='Y'){?> progress-bar-animated<?}?> bg-<?=$arParams['BACKGROUND_COLOR']?> text-<?=$arParams['TEXT_COLOR']?>" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?=$arParams['PROGRESS']?>%"><?=$arParams['TEXT']?></div>
</div>