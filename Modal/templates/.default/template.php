<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-<?=$arParams['COLOR_BASE_BTN']?>" data-toggle="modal" data-target="#exampleModal<?=$arParams['NUMB_ACRD']?>">
  <?=$arParams['TEXT_BASE_BTN']?>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?=$arParams['NUMB_ACRD']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?=$arParams['NUMB_ACRD']?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel<?=$arParams['NUMB_ACRD']?>"><?=$arParams['TEXT_TITLE']?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><?=$arParams['DOP_TITLE']?></span>
        </button>
      </div>
      <div class="modal-body">
        <?=$arParams['TEXT']?>
      </div>
      <div class="modal-footer">
        <?if($arParams['SHOW_CLOSE_BTN']=='Y'){?><button type="button" class="btn btn-<?=$arParams['COLOR_CLOSE_BTN']?>" data-dismiss="modal"><?=$arParams['TEXT_CLOSE_BTN']?></button><?}?>
        <?if($arParams['SHOW_DOP_BTN']=='Y'){?><button type="button" class="btn btn-<?=$arParams['COLOR_DOP_BTN']?>"><?=$arParams['TEXT_DOP_BTN']?></button><?}?>
      </div>
    </div>
  </div>
</div>