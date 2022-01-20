<?php

    require("./init.php");

    $controller = "home";
    if(isset($_GET['page_name'])){
        $controller = $_GET['page_name'];
        $controller = strtolower($controller);
    }

    if(file_exists("./src/".$controller.".php")){
        require("./src/".$controller.".php");
    }else{
        echo "page not found";
    }
