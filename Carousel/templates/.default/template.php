<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<div id="<?=$arParams['ID_BLOCK']?>" class="carousel slide" style="
                height: <?=$arParams['HEIGHT']?>;
                width: <?=$arParams['WIDTH']?>;
                " data-ride="carousel">
    <?if($arParams['SHOW_INDICATION']=='Y') {?>
    <ol class="carousel-indicators">
    <?$idBlock=0;
    $i=1;
    foreach ($arResult as $item): ?>
    
        <li data-target="#<?=$arParams['ID_BLOCK']?>" data-slide-to="<?=$idBlock?>" class="<?if ($i==1) {?>active<? $i=0;}?> ml-1 mr-1"></li>
    
    <?
    $idBlock=$idBlock+1;
    endforeach;?>
    </ol>
    <?}?>
  <div class="carousel-inner">

    <?$i=1;?>
    <?foreach ($arResult as $item): ?>
    <div style="background-image: url('<?=$item['img']?>'); 
                height: <?=$arParams['HEIGHT']?>;
                width: <?=$arParams['WIDTH']?>;
                background-size: <?=$arParams['TYPE_BG']?>;
                background-repeat: no-repeat;
    " class="carousel-item <?if ($i==1) {?>active<?}?>">        
    <!-- <img class="d-block w-100" height="<?=$arParams['HEIGHT']?>" width="<?=$arParams['WIDTH']?>" src="<?=CFile::GetPath($item['PREVIEW_PICTURE'])?>" alt="First slide"> -->

        <div class="carousel-caption d-none d-md-block">
            <?if($arParams['SHOW_H5']=='Y'){?><h5 class="text-light"><?=$item['NAME']?></h5><?}?>
            <?if($arParams['SHOW_P']=='Y'){?><p><?=$item['PREVIEW_TEXT']?></p><?}?>
        </div>
    </div>
    <?$i=0;?>
    <?endforeach;?>
  </div>
  <a class="carousel-control-prev" href="#<?=$arParams['ID_BLOCK']?>" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#<?=$arParams['ID_BLOCK']?>" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
