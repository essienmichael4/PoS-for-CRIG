    <?php
        include_once("../includes/db.inc.php");
        $id = $_GET["id"];

        $sql = "SELECT * FROM `products` WHERE id='$id'";
        $result= mysqli_query($conn, $sql);
        $product = mysqli_fetch_assoc($result);
    ?>
    
    <section class="editPage">
        <div class="productcontainer">
            <header>
                <h2>Edit Product</h2>
            </header>

            <li class="edit-products">
                <div class="img">
                    <img src="../assets/<?= $product["productPic"] ?>" alt="">
                </div>
                        
                <div class="productSummary">
                    <h4><?= $product["productName"] ?></h4>
                    <p>Gh¢ <?= $product["productPrice"] ?></p>
                    <h2>.</h2>
                    <p><?= $product["stock"] ?> products</p>
                </div>
            </li>
        </div>
        <form action="../includes/editProducts.php" method="POST" class="editContainer" enctype="multipart/form-data">
            <div class="innerContainer">
                <input type="text" name="user" value="<?= $_SESSION["username"] ?>" hidden>
                <input type="text" name="pid" value="<?= $product["id"] ?>" hidden>
                <input type="text" name="pname" value="<?= $product["productName"] ?>" hidden>
                <input type="text" name="pPrice" value="<?= $product["productPrice"] ?>" hidden>
                <input type="text" name="ppic" value="<?= $product["productPic"] ?>" hidden>
                <input type="text" name="pStock" value="<?= $product["stock"] ?>" hidden>
                <input type="text" name="pcategory" value="<?= $product["category"] ?>" hidden>
                <label for="">Product Name</label>
                    <input type="text" name="name" value="<?= $product["productName"] ?>">

                    <div>
                        <div>
                            <label for="">Action Performed on Stock</label>
                            <select name="action">
                                <option>None</option>
                                <option value="Add">add</option>
                                <option value="Sub">subtract</option>
                            </select>
                        </div>

                        <div>
                            <label for="">Change category</label>
                            <select name="category">
                                <option>None</option>
                                <option value="crig">CRIG Product</option>
                                <option value="cpc">CPC Product</option>
                            </select>
                        </div>
                    </div>
                    

                    
                    

                    <div>
                        <div>
                            <label for="">Product Price</label>
                            <input type="number" name="price" value="<?= $product["productPrice"] ?>">
                        </div>
                        
                        <div>
                            <label for="">Product Stock</label>
                            <input type="number" name="stock">
                        </div>
                    </div>
                    
                    
                    <label for="">Product Image</label>
                    <input type="file" name="productPic">

                    <div class="btn">
                        <a href="?pgname=inventory">Cancel</a>

                        <button type="submit" name="editProduct">Save Changes</button>
                    </div>
            </div>
        </form>
    </section>
</main>