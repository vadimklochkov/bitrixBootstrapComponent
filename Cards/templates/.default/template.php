<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<div class="row">

<?foreach ($arResult as $item): ?>
  <div class="col-<?=$arParams['COL']?><?if($arParams['COL_SM_TOGGLE']=='Y'){?> col-sm-<?=$arParams['COL_SM']?><?}?><?if($arParams['COL_MD_TOGGLE']=='Y'){?> col-md-<?=$arParams['COL_MD']?><?}?><?if($arParams['COL_LG_TOGGLE']=='Y'){?> col-lg-<?=$arParams['COL_LG']?><?}?><?if($arParams['COL_XL_TOGGLE']=='Y'){?> col-xl-<?=$arParams['COL_XL']?><?}?> mb-3">
    <div class="card bg-<?=$arParams['COLOR_BG']?>" style="width: 18rem;">
      <img class="card-img-top" src="<?=$item['img']?>" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title text-<?=$arParams['COLOR_TEXT']?>"><?=$item['NAME']?></h5>
        <p class="card-text text-<?=$arParams['COLOR_TEXT']?>"><?=$item['PREVIEW_TEXT']?></p>
      </div>
    </div>
  </div>
<?endforeach;?>
</div>