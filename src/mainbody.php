<?php

    require("header.php");

    $controller = "productsbody";
    if(isset($_GET['pgname'])){
        $controller = $_GET['pgname'];
        $controller = strtolower($controller);
    }else if(!isset($_GET['pgname'])){
        $controller = "productsbody";
        $controller = strtolower($controller);
    }

    if(file_exists("./".$controller.".php")){
        require("./".$controller.".php");
    }

    require("footer.php");
?>