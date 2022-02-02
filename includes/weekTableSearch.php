<?php
    include_once("./db.inc.php");

    $sql = "SELECT * FROM `orders` WHERE `daybought` >= (Select date(curdate() - interval weekday(curdate()) day));";
    $output = "";
    $num = 0;
    $orderid = "";

    $result = $conn->query($sql);
    while($order = $result->fetch_assoc()){

        if($orderid != $order["orderid"]){
            $num = $num+1;
        }
        
        if($orderid != $order["orderid"]){
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
        }else{
            $output .='
            <tr>
                <td>'.$num.'</td>
                <td>'.$order["productName"].'</td>
                <td>'.$order["stock"].'</td>
                <td class="tr">'.$order["basePrice"].'.00</td>
                <td class="tr">'.$order["productPrice"].'.00</td>
                <td class="tr"></td>
            </tr>
        ';
        }   

        $orderid = $order["orderid"];
    }

    echo $output;

    // select date(curdate() - interval weekday(curdate()) day)