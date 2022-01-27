<?php
    include("./db.inc.php");
    include("functions.php");
 
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pwd = mysqli_real_escape_string($conn, $_POST['password']);
    $result;

    if(!empty($username)|| !empty($pwd)){
        echo $username;
        echo $pwd;
        loginUser($username, $pwd, $conn);
        // echo $result["id"];
    }else{
        // header("Location: ../index.php?error=loginError");
        echo "not working";
    }




    