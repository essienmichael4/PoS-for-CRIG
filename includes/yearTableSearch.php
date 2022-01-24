<?php
    include_once("./db.inc.php");

    $date = date('Y');
    $sql = "SELECT * FROM `orders` WHERE `daybought` = '{$date}';";
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
                <td class="tr">'.$order["stock"].'</td>
                <td class="tr">'.$order["basePrice"].'.00</td>
                <td class="tr">'.$order["productPrice"].'.00</td>
                <td class="tr">'.$order["totalPrice"].'.00</td>
            </tr>
        ';

        $orderid = $order["orderid"];
    }

    echo $output;