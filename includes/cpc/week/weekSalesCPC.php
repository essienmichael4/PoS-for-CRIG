<?php
    include_once("../../db.inc.php");

    $date = date('Y');
    $sql = "SELECT SUM(`productPrice`) as sales FROM `orders` WHERE `daybought` >= (Select date(curdate() - interval weekday(curdate()) day)) && `category` = 'cpc';";


    $result = $conn->query($sql);

    $row = mysqli_fetch_assoc($result);

    echo "Gh¢ {$row['sales']}.00";