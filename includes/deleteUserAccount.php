<?php
    session_start();
    include_once("./db.inc.php");

    $password = mysqli_real_escape_string($conn,$_POST["password"]);
    $sid = mysqli_real_escape_string($conn,$_POST["sid"]);
    $uid = mysqli_real_escape_string($conn,$_POST["uid"]);

    $sql = "SELECT * FROM `admin` WHERE `id` = $sid;";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
    $name = $row['firstname']." ".$row['lastname'];


    if(password_verify($password, $row['password']) == "true" || $password == $row['password']){
        $sql1 = "SELECT * FROM `admin` WHERE `id` = $uid;";
        $newresult = mysqli_query($conn, $sql1);
        $newrow = mysqli_fetch_assoc($newresult);
        $fullname = $newrow['firstname']." ".$newrow['lastname'];
        $username = $newrow["username"];
        $id = $newrow['id'];

        $sql2 = "INSERT INTO `deletedusers`(`name`, `username`, `uid`, `deletedby`) 
        VALUES('$fullname', '$username', $id, '$name')";

        if(mysqli_query($conn, $sql2)){
            $sql3 = "DELETE FROM `admin` WHERE `id` = $uid;";
            if(mysqli_query($conn, $sql3)){
                if($sid == $uid){
                    session_unset();
                    session_destroy();
                    header("Location: ../index.php");
                    exit();
                }else{
                    header("Location: ../src/mainbody.php?pgname=users");
                    exit();
                }
            }else{
                header("Location: ../src/mainbody.php?pgname=users&userid=".$uid."error=sql3error");
                exit();
            }
        }else{
            header("Location: ../src/mainbody.php?pgname=users&userid=".$uid."error=sql2error");
            exit();
        }
    }else{
        header("Location: ../src/mainbody.php?pgname=users&userid=".$uid."error=pwderror");
        exit();
    }