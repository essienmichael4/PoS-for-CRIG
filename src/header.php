<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRIG - Buy Products</title>

    <!-- <script src="https://kit.fontawesome.com/92a1905d17.js" crossorigin="anonymous"></script> -->
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap');
    </style> 

    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="shortcut icon" href="../assets/favicon.png" type="image/png">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>

    <main>
        <aside class="menu">
            <div class="logo">
                <img src="../assets/logo.jpg" alt="">
                <h1>BUY PRODUCT Shop</h1>
            </div>

            <nav>
                <ul>
                    <?php
                        if($_GET['pgname']=="products"){
                            echo '<li class=""><a href="?pgname=products" class="linkItem active"><i class="fas fa-home"></i><span>Home</span></a></li>';
                        }else{
                            echo '<li class=""><a href="?pgname=products" class="linkItem"><i class="fas fa-home"></i><span>Home</span></a></li>';
                        }
                        if($_GET['pgname']=="dashboard"){
                            echo '<li><a href="?pgname=dashboard" class="linkItem active"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>';
                        }else{
                            echo '<li><a href="?pgname=dashboard" class="linkItem"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>';
                        }

                        if($_SESSION["usertype"]=="admin" || $_SESSION["usertype"]=="superadmin"){
                            if($_GET['pgname']=="inventory" || $_GET['pgname']=="edit" || $_GET['pgname']=="delete"){
                                echo '<li><a href="?pgname=inventory" class="linkItem active"><i class="fas fa-tasks"></i><span>Inventory</span></a></li>';
                            }else{
                                echo '<li><a href="?pgname=inventory" class="linkItem"><i class="fas fa-tasks"></i><span>Inventory</span></a></li>';
                            }

                            if($_GET['pgname']=="users" || $_GET['pgname']=="edituser"){
                                echo '<li><a href="?pgname=users" class="linkItem active"><i class="fas fa-users"></i><span>Users</span></a></li>';
                            }else{
                                echo '<li><a href="?pgname=users" class="linkItem"><i class="fas fa-users"></i><span>Users</span></a></li>';
                            }
                        }

                        if($_SESSION["usertype"]=="superadmin"){
                            if($_GET['pgname']=="analytics"){
                                echo '<li><a href="?pgname=analytics" class="linkItem active"><i class="fas fa-tachometer-alt"></i><span>Analytics</span></a></li>';
                            }else{
                                echo '<li><a href="?pgname=analytics" class="linkItem"><i class="fas fa-tachometer-alt"></i><span>Analytics</span></a></li>';
                            }
                            // echo '<li><a href="?pgname=analytics" class="linkItem active"><i class="fas fa-tachometer-alt"></i><span>Analytics</span></a></li>';
                        }
                        
                        
                    ?>
                </ul>
            </nav>

        </aside>