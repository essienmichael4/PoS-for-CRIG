<?php
    include_once("../db.inc.php");
    $firstdate = $_POST["firstday"];
    $seconddate = $_POST["secondday"];
    $category = $_POST["category"];

    if(empty($firstdate)){
        $firstdate = $seconddate." 00:00:00";
    }

    if(empty($seconddate)){
        $seconddate = $firstdate." 23:59:59";
    }else{
        $seconddate = $seconddate." 23:59:59";
    }

    $sql = "";

    if($category == "all"){
        $sql = "SELECT * FROM `orders` WHERE daybought BETWEEN '{$firstdate}' AND
        '{$seconddate}';";
    }else{
        $sql = "SELECT * FROM `orders` WHERE daybought BETWEEN '{$firstdate}' AND
        '{$seconddate}' && `category` = '{$category}';";
    }

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