    <section class="inventory flex">
            <div class="inventory-items">
                <header>
                <!-- <i class="fas fa-bars menuicon"></i> -->
                    <h2>Inventory Management</h2>
                    <div class="userid"></div>
                    <div class="userdetails">
                        <p><?=$_SESSION["username"]?></p>
                        <a href="?pgname=edituser&userid=<?=$_SESSION["uid"]?>">edit user</a>
                        <form action="../includes/logout.php"><button type="submit">logout</button></form>
                    </div>
                </header>
                <ul class="productsList">
                    <li class="add-new-product">
                        <i class="fas fa-plus"></i>
                        <h4>Add new product</h4>
                    </li>
                    
                    
                </ul>
            </div>
            <div class="add-inventory">
                <div class="header">
                    <h2>Product Information</h2>
                    <i class="fas fa-times closeProduct"></i>
                </div>
                <form action="../includes/addproducts.php" method="POST" enctype="multipart/form-data">
                    <label for="">Product Name</label>
                    <input type="text" placeholder="Example" name="name">

                    <div>
                        <div>
                            <label for="">Product Price</label>
                            <input type="text" name="price" placeholder="1">
                        </div>
                        
                        <div>
                            <label for="">Product Stock</label>
                            <input type="number" name="stock" placeholder="1">
                        </div>
                    </div>
                    
                    <label for="">Category</label>
                    <select name="category" id="category">
                        <option value="crig">CRIG Product</option>
                        <option value="cpc">CPC Product</option>
                    </select>
                    
                    <label for="">Product Image</label>
                    <input type="file" name="productPic">
                    <button type="submit" name="setProduct">Add Product</button>
                </form>
            </div>
        </section>

        </main>

        <script src="../js/getInventoryProducts.js"></script>
        <script src="../js/util.js"></script>
        <script src="../js/utilities.js"></script>
        
