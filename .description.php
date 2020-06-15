<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
    use \Bitrix\Main\Localization\Loc;
$arComponentDescription = array(
	"NAME" => "Курсы валют.",
	"DESCRIPTION" => "отображения текущего курса валют.",
    "CACHE_PATH" => "Y",
	"SORT" => 40,
	"PATH" => array(
		"ID" => "additional",
		"CHILD" => array(
			"ID" => "additional",
			"NAME" => GetMessage("T_IBLOCK_DESC_CAT"),
			"SORT" => 20,
		)
	),
);

?>