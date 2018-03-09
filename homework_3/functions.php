<?php
function task1()
{
    $file = file_get_contents('data.xml');
    $xml = new SimpleXMLElement($file);
    //print_r($xml->to->__toString());
    //var_dump($xml);

    ?>
    <table border="1">
        <caption>PurchaseOrderNumber: <?php echo $xml->attributes()->PurchaseOrderNumber->__toString(); ?></caption>
        <caption>OrderDate: <?php echo $xml->attributes()->OrderDate->__toString() . PHP_EOL; ?></caption>
        <tr>
            <th>PartNumber</th>
            <th>ProductName</th>
            <th>Quantity</th>
            <th>USPrice</th>
            <th>ShipDate</th>
            <th>Comment</th>
        </tr>

        <?php
        echo "<tr>";
        foreach ($xml->Items as $key => $value) {
            foreach ($value as $keys => $values) {
                echo "<td>" . $values->attributes()->PartNumber . "</td>";
                echo "<td>" . $values->ProductName . "</td>";
                echo "<td>" . $values->Quantity . "</td>";
                echo "<td>" . $values->USPrice . "</td>";
                echo "<td>" . $values->ShipDate . "</td>";
                echo "<td>" . $values->Comment . "</td>";
                echo "</tr>";
            }

        }

        ?>

    </table>

    <h4>Adress</h4>
    <?php
    foreach ($xml->Address as $key => $value) {
        echo "<p><b>" . $value->attributes()->Type . ": </b>";
        echo $value->Name . $value->Street . $value->City;
        echo $value->State . $value->Zip . $value->Country . "</p>";
    }

    echo "<h4>DeliveryNotes</h4>";
    echo $xml->DeliveryNotes->__toString();


}


//    echo $xml->attributes()->PurchaseOrderNumber->__toString();
//    echo $xml->attributes()->OrderDate->__toString() . PHP_EOL;


//    echo $xml->Address->attributes()->Type->__toString() . PHP_EOL;
//    echo $xml->Address->Name->__toString() . PHP_EOL;
//    echo $xml->Address->Street->__toString() . PHP_EOL;
//    echo $xml->Address->City->__toString() . PHP_EOL;
//    echo $xml->Address->State->__toString() . PHP_EOL;
//    echo $xml->Address->Zip->__toString() . PHP_EOL;
//    echo $xml->Address->Country->__toString() . PHP_EOL;
//
//    echo $xml->DeliveryNotes->__toString() . PHP_EOL;
//
//    echo $xml->Address[1]->attributes()->Type->__toString() . PHP_EOL;
//    echo $xml->Address[1]->Name->__toString() . PHP_EOL;
//    echo $xml->Address[1]->Street->__toString() . PHP_EOL;
//    echo $xml->Address[1]->City->__toString() . PHP_EOL;
//    echo $xml->Address[1]->State->__toString() . PHP_EOL;
//    echo $xml->Address[1]->Zip->__toString() . PHP_EOL;
//    echo $xml->Address[1]->Country->__toString() . PHP_EOL;
//
//    echo PHP_EOL;
//
//    echo $xml->Items->Item->attributes()->PartNumber->__toString() . PHP_EOL;
//    echo $xml->Items->Item->ProductName->__toString() . PHP_EOL;
//    echo $xml->Items->Item->Quantity->__toString() . PHP_EOL;
//    echo $xml->Items->Item->USPrice->__toString() . PHP_EOL;
//    echo $xml->Items->Item->Comment->__toString() . PHP_EOL;
//
//    echo PHP_EOL;
//
//    echo $xml->Items->Item->attributes()->PartNumber->__toString() . PHP_EOL;
//    echo $xml->Items->Item->ProductName->__toString() . PHP_EOL;
//    echo $xml->Items->Item->Quantity->__toString() . PHP_EOL;
//    echo $xml->Items->Item->USPrice->__toString() . PHP_EOL;
//    echo $xml->Items->Item->ShipDate->__toString() . PHP_EOL;

function task2()
{
    $product = ["ProductName" => "Lawnmower", "Quantity" => 1, "USPrice" => 148.95];
    $data = ["Name" => "Ellen Adams", "Street" => "123 Maple Street", "Product" => $product];
    $encoded = json_encode($data, JSON_UNESCAPED_UNICODE);
    file_put_contents('output.json', $encoded);

    $data2 = file_get_contents('output.json');
    $decoded = json_decode($data2, true);

    switch (random_int(1, 3)) {
        case 1:
            $decoded["Product"]["USPrice"] += random_int(3, 20);
            $decoded["Product"]["Quantity"] += random_int(1, 4);
            break;
        case 2:
            $decoded["Name"] = "Tai Yee";
            break;
        default:
            echo "Данные не изменились!";
    }

    $encoded = json_encode($decoded, JSON_UNESCAPED_UNICODE);
    file_put_contents('output2.json', $encoded);

    $arr = file_get_contents('output.json');
    $arr2 = file_get_contents('output2.json');

    $arrDecoded = json_decode($arr, true);
    $arr2Decoded = json_decode($arr2, true);


    foreach ($arrDecoded as $value => $key) {
        if ($arr2Decoded[$value] != $arrDecoded[$value]) {
            if (is_array($arr2Decoded[$value])) {
                foreach ($arrDecoded[$value] as $val => $key2) {
                    if ($arr2Decoded[$value][$val] != $arrDecoded[$value][$val]) {
                        echo $val . " => " . $arr2Decoded[$value][$val] . PHP_EOL;
                    }
                }
            } else {
                echo $value . " => " . $arr2Decoded[$value];
            }
        }
    }

}

function task3()
{
    $csvPath = 'numbers.csv';
    $data = [];
    for ($i = 0; $i < 50; $i++) {
        $data[$i] = random_int(1, 100);
    }
    $fp = fopen($csvPath, 'w');

    fputcsv($fp, $data, ",");
    fclose($fp);

    $csvFile = fopen($csvPath, 'r');
    if ($csvFile) {
        $res = array();
        while (($csvData = fgetcsv($csvFile, filesize($csvPath), ',')) !== false) {
            $res[] = $csvData;
        }
        //print_r($res);
        $summa = 0;
        foreach ($res as $val) {
            foreach ($val as $numb) {
                if ($numb % 2 === 0) {
                    $summa += $numb;
                }
            }
        }
        echo "Сумма четных чисел: " . $summa;
    }
}

function task4()
{

    $data = file_get_contents('https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json');
    $dataDecoded = json_decode($data, true);

    // print_r($dataDecoded['query']['pages']['15580374']);
    if (array_key_exists('pageid', $dataDecoded['query']['pages']['15580374'])) {
        echo "pageid: " . $dataDecoded['query']['pages']['15580374']['pageid'] . PHP_EOL;
        echo "Title: " . $dataDecoded['query']['pages']['15580374']['title'];
    }
}