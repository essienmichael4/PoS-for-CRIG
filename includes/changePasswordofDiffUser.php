<?php
    include_once("./db.inc.php");
    $newPassword = mysqli_real_escape_string($conn,$_POST["newPassword"]);
    
    $id = mysqli_real_escape_string($conn,$_POST["id"]);

    $hashedpwd = password_hash($newPassword, PASSWORD_DEFAULT);
    $sql = "UPDATE `admin` SET `password` = '$hashedpwd' WHERE `id`= {$id}";

    if(mysqli_query($conn, $sql)){
        echo "Updated";
    }else{
        echo "Failed to update password. Check connection";
    }
    
    
    
