<?php

include_once("./db.inc.php");
// $output = "";

$date = date('Y-m-d');
$sql = "SELECT SUM(`totalPrice`) as sales FROM `orders` WHERE daybought = '$date';";

// echo $date;
$result = $conn->query($sql);

$row = mysqli_fetch_assoc($result);

echo $row['sales'];
// echo $date;