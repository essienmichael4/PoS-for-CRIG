<?php
    include_once("./db.inc.php");

    $date = date('Y-m-d');
    $sql = "SELECT SUM(`stock`) as items FROM `orders` WHERE daybought >= '{$date}';";


    $result = $conn->query($sql);

    $row = mysqli_fetch_assoc($result);

    echo "{$row['items']}";