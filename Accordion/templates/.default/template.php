<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<div class="accordion" id="acord<?=$arParams['NUMB_ACRD']?>">

  <?$i=$arParams['NUMB_ACRD'];?>
  <?foreach ($arResult as $item): ?>
  <div class="card">
    <div class="card-header pt-0" id="heading<?=$i?>">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse<?=$i?>" aria-expanded="false" aria-controls="collapseOne">
        <?=$item['NAME']?>
        </button>
      </h2>
    </div>

    <div id="collapse<?=$i?>" class="collapse" aria-labelledby="headingOne" data-parent="#acord<?=$arParams['NUMB_ACRD']?>">
      <div class="card-body">
      <?=$item['PREVIEW_TEXT']?>
      </div>
    </div>
  </div>
  <?$i++;?>
  <?endforeach;?>
</div>
