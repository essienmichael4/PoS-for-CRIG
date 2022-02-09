<?php
    include_once("../../db.inc.php");

    $date = date('Y-m-d')." 00:00:00";
    $sql = "SELECT * FROM `orders` WHERE `daybought` >= '{$date}' AND `category` = 'crig';";
    $output = "";
    $num = 0;
    $orderid = "";

    $result = $conn->query($sql);
    while($order = $result->fetch_assoc()){

        if($orderid != $order["orderid"]){
            $num = $num+1;
        }
        
        if($orderid != $order["orderid"]){
            if($order["action"] == "sold"){
                $btn = '<button class="return" onclick="handleReturned('.$order["id"].')">Returned</button>';
            }else{
                $btn = '<button class="sold" onclick="handleSold('.$order["id"].')">Sold</button>';
            }
            $output .='
            <tr>
                <td>'.$num.'</td>
                <td>'.$order["productName"].'</td>
                <td>'.$order["stock"].'</td>
                <td class="tr">'.$order["basePrice"].'</td>
                <td class="tr">'.$order["productPrice"].'</td>
                <td class="tr">'.$order["totalPrice"].'</td>
                <td class="tr">
                    <div>
                        <input type="text" name="id" value="'.$order["id"].'" hidden />'.$btn.'
                    <div>
                </td>
            </tr>
            ';
        }else{
            if($order["action"] == "sold"){
                $btn = '<button class="return" onclick="handleReturned('.$order["id"].')">Returned</button>';
            }else{
                $btn = '<button class="sold" onclick="handleSold('.$order["id"].')">Sold</button>';
            }
            $output .='
            <tr>
                <td>'.$num.'</td>
                <td>'.$order["productName"].'</td>
                <td>'.$order["stock"].'</td>
                <td class="tr">'.$order["basePrice"].'</td>
                <td class="tr">'.$order["productPrice"].'</td>
                <td class="tr"></td>
                <td class="tr">
                    <div>
                        <input type="text" name="id" value="'.$order["id"].'" hidden />'.$btn.'
                    <div>
                </td>
            </tr>
        ';
        }   

        $orderid = $order["orderid"];
    }

    echo $output;