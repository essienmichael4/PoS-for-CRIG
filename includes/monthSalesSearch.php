<?php
    include_once("./db.inc.php");

    $date = date('Y-m'."-01 00:00:00");
    $sql = "SELECT SUM(`productPrice`) as sales FROM `orders` WHERE daybought >= '$date' AND `action` = 'sold';";


    $result = $conn->query($sql);

    $row = mysqli_fetch_assoc($result);

    $sales=number_format($row['sales'],2);
    echo "Gh¢ {$sales}";