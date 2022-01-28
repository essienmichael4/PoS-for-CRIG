<?php
    include_once("./db.inc.php");

    $firstname = mysqli_real_escape_string($conn,$_POST["firstname"]);
    $lastname = mysqli_real_escape_string($conn,$_POST["lastname"]);
    $username = mysqli_real_escape_string($conn,$_POST["username"]);
    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $usertype = mysqli_real_escape_string($conn,$_POST["usertype"]);
    $id = mysqli_real_escape_string($conn,$_POST["id"]);


    $sql = "SELECT * FROM `admin` WHERE `id` = $id;";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    if($firstname == $row["firstname"] || empty($firstname)){
        $firstname = $row["firstname"];
    }

    if($lastname == $row["lastname"] || empty($lastname)){
        $lastname = $row["lastname"];
    }

    if($username == $row["username"] || empty($username)){
        $username == $row["username"];
    }

    if($email == $row["email"] || empty($email)){
        $email = $row["email"];
    }

    if($usertype == $row["usertype"]){
        $usertype = $row["usertype"];
    }
    
    $sql = "UPDATE `admin` SET `firstname` = '$firstname', `lastname` = '$lastname'
    , `email` = '$email', `username` = '$username',`usertype` = '$usertype' WHERE `id`= {$id}";

    if(mysqli_query($conn, $sql)){
        echo "Updated";
    }else{
        echo "Failed to update user. Check connection";
    }
    
