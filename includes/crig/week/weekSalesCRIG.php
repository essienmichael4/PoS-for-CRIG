<?php
    include_once("../../db.inc.php");

    $date = date('Y');
    $sql = "SELECT SUM(`productPrice`) as sales FROM `orders` WHERE `daybought` >= (Select date(curdate() - interval weekday(curdate()) day)) && `category` = 'crig';";

    $result = $conn->query($sql);

    $row = mysqli_fetch_assoc($result);

    $sales=number_format($row['sales'],2);
    echo "Gh¢ {$sales}";