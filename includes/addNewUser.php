<?php

    echo $firstname = $_POST["firstname"];
    echo $lastname = $_POST["lastname"];
    echo $username = $_POST["username"];
    echo $email = $_POST["email"];
    echo $usertype = $_POST["usertype"];
    echo $pwd = $_POST["password"];
    // $pwd2 = $_POST["passwordRep"];

    echo $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);