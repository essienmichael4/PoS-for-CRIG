<?php

    function loginUser($username, $password, $conn){

        $sql = "SELECT * FROM `admin` WHERE username = '$username'; ";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);

            $pwdVerify = password_verify($password, $row['password']);

            if($password == $row['password'] || $pwdVerify == "true"){
                session_start();
                $_SESSION["username"] = $row['username'];
                $_SESSION["firstname"] = $row['firstname'];
                $_SESSION["lastname"] = $row['lastname'];
                $_SESSION["email"] = $row['email'];
                $_SESSION["usertype"] = $row['usertype'];
                $_SESSION["uid"] = $row['id'];
                header("location: ../src/mainbody.php?pgname=productsbody");
            }else{
                header("location: ../index.php?success=wrongpwd");
            }
        }else{
            header("location: ../index.php?success=userNotExist");
        }
    }

    function show($data){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }