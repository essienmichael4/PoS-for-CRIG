<section class="dashboard">
            <header>
            <!-- <i class="fas fa-bars menuicon"></i> -->
                <h3>Dashboard</h3>

                <div class="userid"></div>
                <div class="userdetails">
                    <p><?=$_SESSION["username"]?></p>
                    <a href="?pgname=edituser">edit user</a>
                    <form action="../includes/logout.php"><button type="submit">logout</button></form>
                </div>
            </header>

            <div class="filterbtns">
                <button class="day">Today</button>
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
                    <p class="sales">Gh¢ 300,000.00</p>
                </div>
                <div>
                    <h4>Today's Orders</h4>
                    <i class="fas fa-sort-amount-up-alt"></i>
                    <p class="order">0</p>
                </div>
                <div>
                    <h4>Items Bought</h4>
                    <i class="fas fa-cart-plus"></i>
                    <p class="order">0</p>
                </div>
                <div>
                    <h4>Items Left</h4>
                    <i class="fas fa-cart-plus"></i>
                    <p class="order">0</p>
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

        <script src="../js/getTodaysOrders.js"></script>
        <script src="../js/utilities.js"></script>