<?php
    $id = $_POST["oid"];
    $user = $_POST["user"];
    include_once("./db.inc.php");
    $sold = "sold";
    $date = date('Y-m-d h:i:s');
    
    $sql = "SELECT * FROM `orders` WHERE `id` = {$id}";
    $result = mysqli_query($conn, $sql);
    $order = mysqli_fetch_assoc($result);
    $oid = $order["orderid"];
    $totalPrice = $order["totalPrice"];
    $price = $order["productPrice"];
    $price = $order["productPrice"];
    $stock = $order["stock"];

    $tprice = 0;

    $pid = $order["productId"];
    $sql3 = "SELECT `stock` FROM `products` WHERE `id` = {$pid}";
    $result1 = mysqli_query($conn, $sql3);
    $pStock = mysqli_fetch_assoc($result1);
    
    $newStock = $pStock["stock"] - $stock;

    $sql4 = "UPDATE `products` SET `stock` = {$newStock} WHERE `id` = '{$pid}'";
    if(mysqli_query($conn, $sql4)){
        $newPrice = $totalPrice + $price;

        echo $sql1 = "UPDATE `orders`SET `totalPrice` = '$newPrice' WHERE `orderid` = '{$oid}'";
        if(mysqli_query($conn, $sql1)){
            echo $sql2 = "UPDATE `orders`SET `action` = '$sold', `totalPrice` = $newPrice,`timeReturned` = '$date',
            `user`= '{$user}' WHERE `id` = $id AND `orderid`='{$oid}' ";
            if(mysqli_query($conn, $sql2)){
                echo "done";
            }
        }
    }