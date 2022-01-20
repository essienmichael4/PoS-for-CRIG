<?php
    include_once("./db.inc.php");

    $sql = 'SELECT * FROM `products` WHERE stock > 0;';
    $output = "";

    $sql1 = 'SELECT * FROM products;';
    $result = $conn->query($sql);
    while($products = $result->fetch_assoc()){
        $output .= '
                <li class="card product">
                <input type="text" class="productId" value="'.
                $products["id"]
                .'" hidden>
                <input type="text" class="productImage" value="'.
                $products["productPic"]
                .'" hidden>
                <div class="productImg">
                <img src="
                '.
                $products["productPic"]
                .'
                " alt="">  
                </div>
                <div class="productSummary">
                    <h2 class="productName">'.
                    $products["productName"]
                    .'</h2>
                    <p class="price">Gh¢ '.
                    $products["productPrice"]
                    .'</p>
                    <i>'.
                    $products["stock"]
                    .' products left</i>
                </div>
            </li>
        ';
    }

    echo $output;