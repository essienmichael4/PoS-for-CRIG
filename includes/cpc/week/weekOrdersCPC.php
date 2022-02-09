<?php
    include_once("../../db.inc.php");

    $num = 0;
    $date = date('Y');
    $sql = "SELECT `orderid` FROM `orders` WHERE `daybought` >= (Select date(curdate() - interval weekday(curdate()) day)) AND `category` = 'cpc' AND `action` = 'sold'";
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