<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<nav class="navbar navbar-expand-lg navbar-<?=$arParams['NAV_COLOR']?> bg-<?=$arParams['NAV_BG']?>">
  <a class="navbar-brand" href="<?=$arParams['MAIN_LINK']?>"><?=$arParams['MAIN_TEXT']?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <?foreach ($arResult as $item): ?>
      <li class="nav-item">
        <a class="nav-link" href="<?=$item['PREVIEW_TEXT']?>"><?=$item['NAME']?> </a>
      </li>
    <?endforeach;?>
    </ul>
    <?if($arParams['TOGGLE_SEARCH']=='Y'){?>
    <form class="form-inline my-2 my-lg-0" target="<?=$arParams['HREF_SEARCH']?>" method="<?=$arParams['METHOD_SEARCH']?>">
      <input class="form-control mr-sm-2" type="search" placeholder="<?=$arParams['TEXT_SEARCH']?>" aria-label="<?=$arParams['TEXT_SEARCH']?>">
      <button class="btn btn-outline-<?=$arParams['COLOR_BTN']?> my-2 my-sm-0" type="submit"><?=$arParams['TEXT_BTN']?></button>
    </form>
    <?}?>
  </div>
</nav>