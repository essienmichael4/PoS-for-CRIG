<?php
    include_once("../../db.inc.php");

    $sql = "SELECT * FROM `orders` WHERE `daybought` >= (Select date(curdate() - interval weekday(curdate()) day)) && `category` = 'cpc';";
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
                <td class="tr">'.$order["basePrice"].'</td>
                <td class="tr">'.$order["productPrice"].'</td>
                <td class="tr">'.$order["totalPrice"].'</td>
                <td>'.$order["action"].'</td>
            </tr>
            ';
        }else{
            $output .='
            <tr>
                <td>'.$num.'</td>
                <td>'.$order["productName"].'</td>
                <td>'.$order["stock"].'</td>
                <td class="tr">'.$order["basePrice"].'</td>
                <td class="tr">'.$order["productPrice"].'</td>
                <td class="tr"></td>
                <td>'.$order["action"].'</td>
            </tr>
        ';
        }   

        $orderid = $order["orderid"];
    }

    echo $output;

    // select date(curdate() - interval weekday(curdate()) day)