<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRIG-Buy Products</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap');
    </style> 
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header class="flex">
        <h1>CRIG-BUY PRODUCT</h1>
    </header>
    <main class="flex">
        <form class="login-form flex" action="./includes/login.php" method="POST">
            <header class="flex">
                Log in
            </header>

            <p class="error"></p>
            <div class="box">
                <input type="text" name="username" placeholder="Username">
                <!-- <label>Username</label> -->
            </div>
            <div class="box">
                <input type="text" name="password" placeholder="Password">
                <!-- <label>Password</label> -->
            </div>

            <button name="loginbtn" class="loginbtn">log in</button>
        </form>
    </main>
    <footer>

    </footer>

    <!-- <script src="./js/main.js"></script> -->
</body>
</html>