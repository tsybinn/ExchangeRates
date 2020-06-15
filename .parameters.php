<?
    if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
    use Bitrix\Main\Localization\Loc;

    Loc::loadMessages(__FILE__);
    //** читаем файл с xml arСourseValute.txt   */
   if($xml = unserialize(file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/bitrix/php_interface/include/arСourseValute.txt"))) {
       $xml = new SimpleXMLElement($xml); // создаем обьект
    $i = 0;// нужно что бы вытащить  ID
    $arValuteElm = [];
    //записываем в  массив имя и код
    foreach ($xml as $Item) {
        $arValuteElm[(string)$xml->Valute[$i]["ID"]] = (string)$Item->Name;
        // var_dump((string)$Item->Name);  //выведет 'Коля', 'Вася', 'Петя'
        $i++;
    }
   // var_dump($arValuteElm);
   }
    $arComponentParameters = array(
        "GROUPS" => array(),
        "PARAMETERS" => array(
            "VALUTE_NAME" => array(
                "PARENT" => "BASE",
                "NAME" =>   Loc::getMessage("T_IBLOCK_DESC_NEWS"),
                "TYPE" => "LIST",
                "VALUES" => $arValuteElm,
                "MULTIPLE" => "Y",
                "REFRESH" => "Y",
                "SIZE" => 11
            ),

            "CACHE_TIME" => array("DEFAULT" => 180),
            "CACHE_GROUPS" => array(
                "PARENT" => "CACHE_SETTINGS",
                "NAME" => GetMessage("CP_BPR_CACHE_GROUPS"),
                "TYPE" => "CHECKBOX",
                "DEFAULT" => "Y",
            ),
        ),
    );
?>
