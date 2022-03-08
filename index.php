<!-- Login view of the web app -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRIG-Buy Products</title>
    <link rel="shortcut icon" href="./assets/favicon.png" type="image/png">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap');
    </style> 
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header class="flex">
        <img src="./assets/logo.jpg" alt="">
        <h1>CRIG - BUY PRODUCT SHOP</h1>
    </header>
    <main class="flex">
        <form class="login-form flex" action="./includes/login.php" method="POST">
            <header class="flex">
                Log in
            </header>
            <?php
            // Error handling for wrong username and password
                if(isset($_GET["error"])){
                    if($_GET["error"] == "userNotExist"){
                        echo '<p class="active">User does not Exist</p>';
                    }else if($_GET["error"] == "wrongpwd"){
                        echo '<p class="active">Wrong Passsword</p>';
                    }
                }else{
                    echo '<p></p>';
                }

                // Return of username if it exists
                if(isset($_GET["user"])){
                    echo '<input type="text" name="username" placeholder="Username" value="'.$_GET["user"].'">';
                }else{
                    echo '<input type="text" name="username" placeholder="Username">';
                }
            ?>
           
            <input type="password" name="password" placeholder="Password">

            <button name="loginbtn" class="loginbtn">log in</button>
        </form>
    </main>
    <footer>

    </footer>

    <!-- <script src="./js/main.js"></script> -->
</body>
</html>