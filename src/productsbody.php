<section class="mainArea">
            <header>
                <h3>Products</h3>
                <div class="userid"></div>
                <div class="userdetails">
                    <p><?=$_SESSION["username"]?></p>
                    <a href="?pgname=edituser">edit user</a>
                    <form action="../includes/logout.php"><button type="submit">logout</button></form>
                </div>
            </header>
            <div class="container">
                <div class="header">
                    <div class="totalSales">
                        <h4>Today's Sales</h4>
                        <p class="sales">Gh¢ 00.00</p>
                    </div>
                    
                    <div class="totalItems">
                        <h4>Today's Orders</h4>
                        <p class="orders">0</p>
                    </div>

                    <div class="numberSales active">

                    </div>
                    
                </div>

                <?php
                    include_once("../includes/db.inc.php");

                    $sql = 'SELECT * FROM `products` WHERE stock > 0;';
                    // $sql1 = 'SELECT * FROM products;';
                    $result = $conn->query($sql);
                ?>

                <ul class="products">

                    <?php
                        while($products = $result->fetch_assoc()){
                    ?>
                        <li class="card product">
                            <input type="text" class="productId" value="<?=$products["id"]?>" hidden>
                            <input type="text" class="productImage" value="<?=$products["productPic"]?>" hidden>
                            <div class="productImg">
                            <img src="../assets/<?=$products["productPic"]?>" alt="">  
                            </div>
                            <div class="productSummary">
                                <h2 class="productName"><?=$products["productName"]?></h2>
                                <p class="price">Gh¢ <span class="priceValue"><?=$products["productPrice"]?></span></p>
                                <i><span class="productStock"><?=$products["stock"]?></span> products left</i>
                            </div>
                        </li>
                    <?php
                        }
                    ?>

                </ul>
            </div>

            
        </section>
        <aside class="cart">
            <div class="cartHeader">
                <h2>Cart</h2>
            </div>
            <ul class="cartBody">

            </ul>
            <div class="cartFooter">
                <input type="text" class="user" value="<?= $_SESSION["username"]?>" hidden>
                <h2 class="total">No products in cart.</h2>
                <button class="makeOrder">order</button>
            </div>
            
        </aside>
        </main>

        <script src="../js/todaysSales.js"></script>
        <script src="../js/productutilities.js"></script>
        <script src="../js/products.js"></script>
        <script src="../js/utilities.js"></script>