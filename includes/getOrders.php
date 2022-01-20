<?php
    include_once("./db.inc.php");

    $date = date('Y-m-d');
    $sql = "SELECT * FROM `orders` WHERE daybought = '$date';";
    $output = "";

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
                            <form>
                            <input type="text" class="productId" value="'.
                            $products["id"]
                            .'" hidden>
                            <input type="text" class="productImage" value="'.
                            $products["productPic"]
                            .'" hidden>
                            <button>edit</button>
                            </form>
                            <button>delete</button>
                        </div>
                    </li>';
    }

    echo $output;