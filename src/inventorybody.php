    <section class="inventory flex">
            <div class="inventory-items">
                <header>
                <i class="fas fa-bars menuicon"></i>
                    <h2>Inventory Management</h2>
                </header>
                <ul class="productsList">
                    <li class="add-new-product">
                        <i class="fas fa-plus"></i>
                        <h4>Add new product</h4>
                    </li>
                    <li class="existing-products">
                        <div class="img">

                        </div>
                        
                        <div class="productSummary">
                            <h4>Add new product</h4>
                            <p>Gh¢ 1500.00</p>
                            <h2>.</h2>
                            <p>200 products</p>
                        </div>

                        <div class="btn">
                            <button>edit</button>
                            <button>delete</button>
                        </div>
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
                            <input type="number" name="price" placeholder="1">
                        </div>
                        
                        <div>
                            <label for="">Product Stock</label>
                            <input type="number" name="stock" placeholder="1">
                        </div>
                    </div>
                    
                    
                    <label for="">Product Image</label>
                    <input type="file" name="productPic">
                    <button type="submit" name="setProduct">Add Product</button>
                </form>
            </div>
        </section>

        </main>

        <script src="../js/util.js"></script>
        <script src="../js/getInventoryProducts.js"></script>
