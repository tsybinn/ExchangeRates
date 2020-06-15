<?php
    if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
    //  ** агент для парсинга xml, включается раз в сутки и обновляет файл arСourseValute.txt   */
    //        function udateFileXmlValutes()
    //        {
    //            $xml = file_get_contents('http://www.cbr.ru/scripts/XML_daily.asp');
    //            $data = serialize($xml); // PHP формат сохраняемого значения.
    //            $path = $_SERVER["DOCUMENT_ROOT"] . "/local/components/myComponents/ExchangeRates.list/file/arСourseValute.txt";
    //            file_put_contents($path, $data);
    //            return "udateFileXmlValutes();";
    //        }
    //** проверка на актуальный кеш */
    if($this->StartResultCache(false, ($arParams["CACHE_GROUPS"]==="N"? false: $USER->GetGroups()))) {

        //** читаем файл с xml arСourseValute.txt   */
        if ($xml = unserialize(file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/local/components/myComponents/ExchangeRates.list/file/arСourseValute.txt"))) {
            $xml = new SimpleXMLElement($xml); // создаем обьект
            // var_dump($xml)
            $i = 0; // нужно что бы вытоащить  ID
            $arСourseValute = []; // массив для готовых значений
            //записываем в  массив елементы
            foreach ($xml as $Item) {
                if ($arr = in_array($Item["ID"], $arParams["VALUTE_NAME"])) {//происходит поиск по ключам в массиве
                    //echo $Item["ID"];
                    $arСourseValute[] = (array)$Item;
                }
            }
        }
        //** создаем дату и записываем все в arResult */
        $arResult["DATE"] = date("D.M.Y");;
        $arResult["ITEMS"] = $arСourseValute;
        $this->IncludeComponentTemplate();
    }
    ?>
