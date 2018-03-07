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
        echo $value->Name . $value->Street . $value->City ;
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



