<?php
function task1()
{
    $file = file_get_contents('data.xml');
    $xml = new SimpleXMLElement($file);
    //print_r($xml->to->__toString());
    //var_dump($xml);
    echo $xml->attributes()->PurchaseOrderNumber->__toString();
    echo $xml->attributes()->OrderDate->__toString() . PHP_EOL;

    echo $xml->Address->attributes()->Type->__toString();
    echo $xml->Address->Name->__toString() . PHP_EOL;

    echo $xml->Address[1]->Name->__toString() . PHP_EOL;


}