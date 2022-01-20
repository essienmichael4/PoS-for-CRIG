<?php

include_once("./db.inc.php");
// $output = "";

$date = date('Y-m-d');
$sql = "SELECT COUNT(`orderid`) as totalorders FROM `orders` ORDER BY `orderid` WHERE daybought = '$date';";
// $sql = "SELECT SUM(`totalPrice`) as sales FROM `orders` WHERE daybought = '$date';";
// echo $date;
$result = $conn->query($sql);

echo $result;

$row = mysqli_fetch_assoc($result);

echo $row['orders'];
// echo $date;