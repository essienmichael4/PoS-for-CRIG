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
</head>
<body>

    <main>
        <aside class="menu">
            <h1>CRIG <span>- BUY PRODUCT </span></h1>
            <!-- <i class="fas fa-bars menuicon"></i> -->

            <nav>
                <ul>
                    <?php
                        if($_GET['pgname']=="productsbody"){
                            echo '<li class=""><a href="?pgname=productsbody" class="linkItem active"><i class="fas fa-home"></i><span>Home</span></a></li>';
                        }else{
                            echo '<li class=""><a href="?pgname=productsbody" class="linkItem"><i class="fas fa-home"></i><span>Home</span></a></li>';
                        }
                        if($_GET['pgname']=="dashboardbody"){
                            echo '<li><a href="?pgname=dashboardbody" class="linkItem active"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>';
                        }else{
                            echo '<li><a href="?pgname=dashboardbody" class="linkItem"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>';
                        }

                        if($_SESSION["usertype"]=="admin" || $_SESSION["usertype"]=="superadmin"){
                            if($_GET['pgname']=="inventorybody" || $_GET['pgname']=="edit"){
                                echo '<li><a href="?pgname=inventorybody" class="linkItem active"><i class="fas fa-tasks"></i><span>Inventory</span></a></li>';
                            }else{
                                echo '<li><a href="?pgname=inventorybody" class="linkItem"><i class="fas fa-tasks"></i><span>Inventory</span></a></li>';
                            }
                        }
                        
                        if($_GET['pgname']=="users" || $_GET['pgname']=="edituser"){
                            echo '<li><a href="?pgname=users" class="linkItem active"><i class="fas fa-tasks"></i><span>Users</span></a></li>';
                        }else{
                            echo '<li><a href="?pgname=users" class="linkItem"><i class="fas fa-tasks"></i><span>Users</span></a></li>';
                        }
                    ?>
                </ul>
            </nav>

        </aside>