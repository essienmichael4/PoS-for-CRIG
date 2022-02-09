<?php
    include_once("../../db.inc.php");

    $date = date('Y'."-01-01 00:00:00");
    $sql = "SELECT SUM(`stock`) as items FROM `orders` WHERE daybought >= '{$date}' AND `category` = 'cpc' AND `action` = 'sold';";


    $result = $conn->query($sql);

    $row = mysqli_fetch_assoc($result);

    echo "{$row['items']}";