<?php
    include_once("./db.inc.php");

    $date = date('Y-m');
    $sql = "SELECT SUM(`stock`) as items FROM `orders` WHERE daybought >= (Select date(curdate() - interval weekday(curdate()) day)) && `category` = 'cpc';";


    $result = $conn->query($sql);

    $row = mysqli_fetch_assoc($result);

    echo "{$row['items']}";