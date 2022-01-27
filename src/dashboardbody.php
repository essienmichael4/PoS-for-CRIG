<section class="dashboard">
            <header>
                <h3>Dashboard</h3>

                <div class="userid"></div>
                <div class="userdetails">
                    <p><?=$_SESSION["username"]?></p>
                    <a href="?pgname=edituser&userid=<?=$_SESSION["uid"]?>">edit user</a>
                    <form action="../includes/logout.php"><button type="submit">logout</button></form>
                </div>
            </header>

            <div class="filterbtns">
                <button class="today">Today</button>
                <button class="week">This Week</button>
                <button class="month">This Month</button>
                <button class="year">This Year</button>
                <button class="items">Products</button>
                <button class="users">Users</button>
            </div>
            

            <div class="headerContainer">
                <div>
                    <h4>Today's Sales</h4>
                    <i class="fas fa-dollar-sign"></i>  
                    <p class="sales"></p>
                </div>
                <div>
                    <h4>Today's Orders</h4>
                    <i class="fas fa-sort-amount-up-alt"></i>
                    <p class="order"></p>
                </div>
                <div>
                    <h4>Items Bought</h4>
                    <i class="fas fa-cart-plus"></i>
                    <p class="item"></p>
                </div>
                <div>
                    <h4>Items Left</h4>
                    <i class="fas fa-cart-plus"></i>
                    <p class="itemLeft"></p>
                </div>
            </div>

            
            <div class="orders">
                <table>
                    <thead>
                        <tr>
                            <th>Order No.</th>
                            <th>Product Name</th>
                            <th>Number of Items</th>
                            <th>Price of Item Gh¢</th>
                            <th>Price Gh¢</th>
                            <th>Total Price Gh¢</th>
                        </tr>
                    </thead>
                    <tbody class="ordersList">
                        
                    </tbody>
                    
                </table>
            </div>
        </section>

        </main>

        <script src="../js/todaySales.js"></script>
        <script src="../js/getTodaysOrders.js"></script>
        <script src="../js/utilities.js"></script>

        <script src="../js/todaySearches.js"></script>        
        <script src="../js/weekSearches.js"></script>        
        <script src="../js/monthSearches.js"></script>
        <script src="../js/yearSearches.js"></script>
        
        