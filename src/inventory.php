<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRIG - Buy Products</title>

    <script src="https://kit.fontawesome.com/92a1905d17.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap');
    </style> 
    <link rel="stylesheet" href="../css/main.css">
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
</head>
<body>

    <main>
        <aside class="menu">
            <h1>CRIG - BUY PRODUCT</h1>

            <nav>
                <ul>
                    <li class=""><a href="./home.php" class="linkItem"><i class="fas fa-tachometer-alt"></i><span>Home</span></a></li>
                    <li><a href="./dashboard.php" class="linkItem"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li><a href="./inventory.php" class="linkItem active"><i class="fas fa-tachometer-alt"></i><span>Inventory</span></a></li>
                </ul>
            </nav>

        </aside>

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
                <form action="">
                    <label for="">Product Name</label>
                    <input type="text" placeholder="Example">

                    <div>
                        <div>
                            <label for="">Product Price</label>
                            <input type="number" placeholder="1">
                        </div>
                        
                        <div>
                            <label for="">Product Stock</label>
                            <input type="number" placeholder="1">
                        </div>
                    </div>
                    
                    
                    <label for="">Product Image</label>
                    <input type="file">
                    <button>Add Product</button>
                </form>
            </div>
        </section>
    </main>


    
    <script src="../js/util.js"></script>
</body>
</html>