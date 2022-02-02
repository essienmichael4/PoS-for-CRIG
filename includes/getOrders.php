<?php
    include_once("./db.inc.php");

    $date = date('Y-m-d')." 00:00:00";
    $sql = "SELECT * FROM `orders` WHERE `daybought` >= '{$date}';";
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
            </tr>
        ';
        }   

        $orderid = $order["orderid"];
    }

    echo $output;