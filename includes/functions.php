<?php

    function loginUser($username, $password, $conn){
        

        $sql = "SELECT * FROM `admin` WHERE username = '$username' AND password = '$password'; ";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);

            if($password == $row['password']){
                session_start();
                $_SESSION["username"] = $row['username'];
                $_SESSION["firstname"] = $row['firstname'];
                $_SESSION["lastname"] = $row['surname'];
                // $_SESSION["email"] = $row['email'];
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