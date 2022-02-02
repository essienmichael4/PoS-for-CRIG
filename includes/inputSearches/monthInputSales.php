<?php
    include_once("../db.inc.php");

    $firstdate = $_POST["firstday"];
    $seconddate = $_POST["secondday"];
    $category = $_POST["category"];
    $sql = "";

    if(empty($seconddate)){
        $seconddate = $firstdate."-31 23:59:59";
    }else{
        $seconddate = $seconddate."-31 23:59:59";
    }

    if(empty($firstdate)){
        $firstdate = $seconddate."-01 00:00:00";
    }else{
        $firstdate = $firstdate."-01 00:00:00";
    }

    if($category == "all"){
        $sql = "SELECT SUM(`productPrice`) as sales FROM `orders` WHERE daybought BETWEEN '{$firstdate}' AND
        '{$seconddate}';";
    }else{
        $sql = "SELECT SUM(`productPrice`) as sales FROM `orders` WHERE daybought BETWEEN '{$firstdate}' AND
        '{$seconddate}' && `category` = '{$category}';";
    }

    // $sql = "SELECT SUM(`productPrice`) as sales FROM `orders` WHERE daybought >= '$date' && `category` = 'crig';";

    $result = $conn->query($sql);

    $row = mysqli_fetch_assoc($result);

    echo "Gh¢ {$row['sales']}.00";