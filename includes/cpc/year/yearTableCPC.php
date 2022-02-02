<?php
    include_once("../../db.inc.php");

    $date = date('Y'."-01-01 00:00:00");
    $sql = "SELECT * FROM `orders` WHERE `daybought` >= '{$date}' && `category` = 'cpc';";
    $output = "";
    $num = 0;
    $orderid = "";

    $result = $conn->query($sql);
    while($order = $result->fetch_assoc()){

        if($orderid != $order["orderid"]){
            $num = $num+1;
        }
        
        $output .='
            <tr>
                <td>'.$num.'</td>
                <td>'.$order["productName"].'</td>
                <td>'.$order["stock"].'</td>
                <td class="tr">'.$order["basePrice"].'.00</td>
                <td class="tr">'.$order["productPrice"].'.00</td>
                <td class="tr">'.$order["totalPrice"].'.00</td>
            </tr>
        ';

        $orderid = $order["orderid"];
    }

    echo $output;