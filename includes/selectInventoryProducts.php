<?php
    include_once("./db.inc.php");

    $sql = 'SELECT * FROM `products`;';
    $output = "";

    $sql1 = 'SELECT * FROM products;';
    $result = $conn->query($sql);
    while($products = $result->fetch_assoc()){
        $output .='<li class="existing-products">
                    <div class="img">
                    <img src="../assets/'.$products["productPic"].'" alt="">  
                        </div>
                        
                        <div class="productSummary">
                            <h4>'.
                            $products["productName"]
                            .'</h4>
                            <p>Gh¢ '.
                            $products["productPrice"]
                            .'</p>
                            <h2>.</h2>
                            <p>'.
                            $products["stock"]
                            .' products</p>
                        </div>

                        <div class="btn">
                            
                            <a href="?pgname=edit&id='.$products["id"].'">edit</a>
                            <a href="?pgname=delete&id='.$products["id"].'">delete</a>
                        </div>
                    </li>';
    }

    echo $output;