<?php
    include_once("../../db.inc.php");

    $date = date('Y-m');
    $sql = "SELECT SUM(`stock`) as items FROM `orders` WHERE daybought >= (Select date(curdate() - interval weekday(curdate()) day)) AND `category` = 'crig' AND `action` = 'sold;";

    $result = $conn->query($sql);

    $row = mysqli_fetch_assoc($result);

    echo "{$row['items']}";