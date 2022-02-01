<?php

include_once("./db.inc.php");

$num = 0;
$date = date('Y-m-d');
$sql = "SELECT `orderid` FROM `orders` WHERE daybought >= '$date' && `category` = 'cpc'";
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
