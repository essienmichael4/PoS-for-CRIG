<?php
    include_once("../db.inc.php");
    $firstdate = $_POST["firstday"];
    $seconddate = $_POST["secondday"];
    $category = $_POST["category"];

    if(empty($firstdate)){
        $firstdate = $seconddate." 00:00:00";
    }

    if(empty($seconddate)){
        $seconddate = $firstdate." 23:59:59";
    }else{
        $seconddate = $seconddate." 23:59:59";
    }

    $sql = "";

    if($category == "all"){
        $sql = "SELECT SUM(`stock`) as items FROM `orders` WHERE daybought BETWEEN '{$firstdate}' AND
        '{$seconddate}';";
    }else{
        $sql = "SELECT SUM(`stock`) as items FROM `orders` WHERE daybought BETWEEN '{$firstdate}' AND
        '{$seconddate}' && `category` = '{$category}';";
    }
    
    $result = $conn->query($sql);

    $row = mysqli_fetch_assoc($result);

    echo "{$row['items']}";