<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
    use Bitrix\Main\Localization\Loc;

    Loc::loadMessages(__FILE__);
    echo Loc::getMessage("T_IBLOCK_DESC_NEWS");
   var_dump($arResult);