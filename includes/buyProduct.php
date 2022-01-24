<?php

    include_once("./db.inc.php");
    echo $user= $_POST['user'];
    $products = json_decode($_POST['cart'], true);
    echo $totalCost= $_POST['totalPrice'];
    echo $orderid = uniqid("", true);
    
    foreach ($products as $product) {
        // var_dump($product);
        // echo $product["name"];
        $sql = "SELECT `stock` FROM `products` WHERE `id` = {$product['id']};";

        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);
        $newStock = (int)$row["stock"] - (int)$product['count'];

        $pPrice = $product['basePrice'] * $product['count'];

        echo $sql1 = "INSERT INTO `orders`(`orderid`, `productId`, `productName`, `productPrice`, `stock`,
         `totalPrice`, `basePrice`, `user`) VALUES('{$orderid}', {$product['id']}, '{$product['name']}',
         {$pPrice}, {$product['count']}, {$totalCost}, {$product['basePrice']}, '{$user}');";

        if(mysqli_query($conn, $sql1)){
            $sql2 = "UPDATE `products` SET `stock` = {$newStock} WHERE `id` = {$product['id']};";
            if(mysqli_query($conn, $sql2)){
                echo "Order made succesfully";
            }else{
                echo "mysql 2 error";
            }
        }else{
            echo "order not successful";
        }
    }