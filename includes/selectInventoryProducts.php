<?php
    include_once("./db.inc.php");

    $sql = 'SELECT * FROM `products`;';
    // $output = '<li class="add-new-product">
    // <i class="fas fa-plus"></i>
    // <h4>Add new product</h4>
    // </li>';

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
                            
                            <button>delete</button>
                        </div>
                    </li>';
    }

    echo $output;