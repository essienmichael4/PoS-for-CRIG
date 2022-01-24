<?php

include_once("./db.inc.php");
// $output = "";

$num = 0;
$date = date('Y-m-d');
$sql = "SELECT `orderid` FROM `orders` WHERE daybought = '$date'";
$id = "";

// var_dump()
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
// var_dump($result);
// echo $result;

// $row = mysqli_fetch_assoc($result);

// echo $row['orders'];
// echo $date;