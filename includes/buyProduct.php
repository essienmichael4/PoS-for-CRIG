<?php

    include_once("./db.inc.php");
    $user= $_POST['user'];
    $products = json_decode($_POST['cart'], true);
    $totalCost= $_POST['totalPrice'];
    $orderid = uniqid("", true);
    
    foreach ($products as $product) {
        $sql = "SELECT * FROM `products` WHERE `id` = {$product['id']};";

        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);
        $newStock = (int)$row["stock"] - (int)$product['count'];
        $category = $row['category'];

        $pPrice = $row['productPrice'] * (float)$product['count'];
        $baseprice = $row['productPrice'];

        $sql1 = "INSERT INTO `orders`(`orderid`, `productId`, `productName`, `productPrice`, `stock`,
         `totalPrice`, `basePrice`, `user`, `category`) VALUES('{$orderid}', {$product['id']}, '{$product['name']}',
         {$pPrice}, {$product['count']}, {$totalCost}, {$baseprice}, '{$user}', '{$category}');";

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