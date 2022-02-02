<?php

    include_once("../../db.inc.php");

    $date = date('Y-m-d');
    $sql = "SELECT SUM(`productPrice`) as sales FROM `orders` WHERE daybought >= '$date' && `category` = 'cpc';";

    $result = $conn->query($sql);

    $row = mysqli_fetch_assoc($result);
    $sales=number_format($row['sales'],2);
    echo "Gh¢ {$sales}";