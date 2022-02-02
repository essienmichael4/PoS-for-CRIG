<?php
    include_once("../db.inc.php");
    $num = 0;
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
        $sql = "SELECT `orderid` FROM `orders` WHERE daybought BETWEEN '{$firstdate}' AND
        '{$seconddate}';";
    }else{
        $sql = "SELECT `orderid` FROM `orders` WHERE daybought BETWEEN '{$firstdate}' AND
        '{$seconddate}' && `category` = '{$category}';";
    }

    // $sql = "SELECT `orderid` FROM `orders` WHERE daybought >= '$date' && `category` = 'crig'";
    $id = "";

    $result = $conn->query($sql);

    while($row = mysqli_fetch_assoc($result)){
        if($row["orderid"] == $id){
            $num = $num;
        }else{
            $num = $num + 1;
        }

        $id = $row["orderid"];
    }

    echo $num;