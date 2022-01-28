<?php
    include_once("./db.inc.php");

    $oldPassword = mysqli_real_escape_string($conn,$_POST["oldPassword"]);
    $newPassword = mysqli_real_escape_string($conn,$_POST["newPassword"]);
    
    $id = mysqli_real_escape_string($conn,$_POST["id"]);


    $sql = "SELECT * FROM `admin` WHERE `id` = $id;";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    if(password_verify($oldPassword, $row['password']) == "true"){
        $hashedpwd = password_hash($newPassword, PASSWORD_DEFAULT);
        $sql = "UPDATE `admin` SET `password` = '$hashedpwd' WHERE `id`= {$id}";

        if(mysqli_query($conn, $sql)){
            echo "Updated";
        }else{
            echo "Failed to update password. Check connection";
        }
    }else{
        echo "Old Password Is Incorrect";
    }
    
    
    
