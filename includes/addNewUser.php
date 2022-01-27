<?php
    include_once("./db.inc.php");

    $firstname = mysqli_real_escape_string($conn,$_POST["firstname"]);
    $lastname = mysqli_real_escape_string($conn,$_POST["lastname"]);
    $username = mysqli_real_escape_string($conn,$_POST["username"]);
    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $usertype = mysqli_real_escape_string($conn,$_POST["usertype"]);
    $pwd = mysqli_real_escape_string($conn,$_POST["password"]);

    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM `admin` WHERE `email` = '{$email}' OR `username` = '{$username}';";

    $result = mysqli_query($conn, $sql);

    if($row = mysqli_fetch_assoc($result)){
        echo "Username or Email already taken";
    }else{
        $sql = "INSERT INTO `admin`(`firstname`, `lastname`, `email`, `username`,`usertype`, `password`) 
        VALUES('$firstname','$lastname','$email', '$username', '$usertype', '$hashedpwd')";

        if(mysqli_query($conn, $sql)){
            echo "Successful";
        }else{
            echo "Failed to add user. Check connection";
        }
    }

    

