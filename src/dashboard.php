<!-- Dashboard View -->

<section class="dashboard">
    <input type="text" class="user" value="<?=$_SESSION["username"]?>" hidden>
        <header>
            <h3>Dashboard</h3>

            <!-- Checking if user if admin to reveal this view else hides it -->
            <?php
                if($_SESSION["usertype"]=="admin" || $_SESSION["usertype"]=="superadmin"):
            ?>

            <div class="fulldate active">
                <input type="date" class="firstdate">
                <input type="date" class="seconddate">
                <button class="dateSearch">search</button>
            </div>

            <div class="fullmonth">
                <input type="month" class="firstmonth">
                <input type="month" class="secondmonth">
                <button class="monthSearch">search</button>
            </div>

            <div class="fullyear">
                <input type="year">
                <input type="year">
                <button class="yearSearch">search</button>
            </div>

            <select name="selectCat" id="category">
                <option value="all">All</option>
                <option value="crig">CRIG Products</option>
                <option value="cpc">CPC Products</option>
            </select>

            <div class="searchFilterBtn">
                <div class="toDay active">D</div>
                <div class="toMonth">M</div>
            </div>
            
                <?php
                    endif;
                ?>

                <div class="userid"></div>
                
                <div class="userdetails">
                    <p><?=$_SESSION["username"]?></p>
                    <a href="?pgname=edituser&userid=<?=$_SESSION["uid"]?>">edit user</a>
                    <form action="../includes/logout.php"><button type="submit">logout</button></form>
                </div>
            </header>

            <!-- Filter buttons to search through orders in the data base -->
            <div class="filterbtns">
                <div class="leftbth"></div>
                <button class="today">Today</button>
                <button class="todaycpc">Today CPC</button>
                <button class="todaycrig">Today CRIG</button>

                <!-- Checking if user if admin to reveal this view else hides it -->
                <?php
                    if($_SESSION["usertype"]=="admin" || $_SESSION["usertype"]=="superadmin"):
                ?>
                <button class="week">This Week</button>
                <button class="weekcpc">This Week(CPC)</button>
                <button class="weekcrig">This Week(CRIG)</button>
                <button class="month">This Month</button>
                <button class="monthcrig">This Month(CRIG)</button>
                <button class="monthcpc">This Month(CPC)</button>
                <button class="year">This Year</button>
                <button class="yearcpc">This Year(CPC)</button>
                <button class="yearcrig">This Year(CRIG)</button>
                <div class="rightbtn"></div>

                <?php
                    endif;
                ?>
            </div>
            

            <!-- Cards view for the dashboard -->
            <div class="headerContainer">
                <!-- Total sales Card -->
                <div>
                    <h4 class="salestitle">Today's Sales</h4>
                    <i class="fas fa-dollar-sign"></i>  
                    <p class="sales"></p>
                </div>
                <!-- Total orders Card -->
                <div>
                    <h4 class="orderstitle">Today's Orders</h4>
                    <i class="fas fa-sort-amount-up-alt"></i>
                    <p class="order"></p>
                </div>
                <!-- Total Items bought Card -->
                <div>
                    <h4 class="itemstitle1">Items Bought</h4>
                    <i class="fas fa-cart-plus"></i>
                    <p class="item"></p>
                </div>
                <!-- Total Items Left Card -->
                <div>
                    <h4 class="itemstitle2">Items Left</h4>
                    <i class="fas fa-cart-plus"></i>
                    <p class="itemLeft"></p>
                </div>
            </div>

            <!-- Orders Table View -->
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
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <!-- Orders Body view: Data inserted from database through JAVASCRIPT-->
                    <tbody class="ordersList">
                        
                    </tbody>
                    
                </table>
            </div>
        </section>

        </main>

        <!-- JS Files -->
        <script src="../js/todaySales.js"></script>
        <script src="../js/getTodaysOrders.js"></script>
        <!-- <script src="../js/utilities.js"></script> -->
        
        <script src="../js/todaySearches.js"></script> 
        <script src="../js/todaycpc.js"></script>
        <script src="../js/todaycrig.js"></script>

        <?php
            if($_SESSION["usertype"]=="admin" || $_SESSION["usertype"]=="superadmin"){
        ?>
        <script src="../js/dashboardutilities.js"></script>
               
        <script src="../js/weekSearches.js"></script>        
        <script src="../js/monthSearches.js"></script>
        <script src="../js/yearsearches.js"></script>

            
        <script src="../js/weekcpc.js"></script>        
        <script src="../js/monthcpc.js"></script>
        <script src="../js/yearcpc.js"></script>

             
        <script src="../js/weekcrig.js"></script>        
        <script src="../js/monthcrig.js"></script>
        <script src="../js/yearcrig.js"></script>

        <script src="../js/dayInputSearch.js"></script>        
        <script src="../js/monthInputSearch.js"></script>
        <script src="../js/yearInputSearch.js"></script>
        <?php
            }
        ?>
        
        <script src="../js/utilities.js"></script>