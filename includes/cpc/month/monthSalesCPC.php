<?php
    include_once("../../db.inc.php");

    $date = date('Y-m'."-01 00:00:00");
    $sql = "SELECT SUM(`productPrice`) as sales FROM `orders` WHERE daybought >= '$date' && `category` = 'cpc';";


    $result = $conn->query($sql);

    $row = mysqli_fetch_assoc($result);

    echo "Gh¢ {$row['sales']}.00";