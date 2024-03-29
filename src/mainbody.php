<?php
// Start of user session
    session_start();

    // Checking if user session is available, if not routes you back to the login page on line 7
    if(!$_SESSION["uid"]){
        header("location: ../index.php");
    }else{
        // Routing of the web application after sucessful login
        require("header.php");// gets header file

        // Setting of initial page name
        $controller = "products";

        // Checks if the page name is set, if not sets it.
        if(isset($_GET['pgname'])){
            $controller = $_GET['pgname'];
            $controller = strtolower($controller);
        }else if(!isset($_GET['pgname'])){
            $controller = "products";
            $controller = strtolower($controller);
        }

        //Checks if file exists and routes to the veiw
        if(file_exists("./".$controller.".php")){
            require("./".$controller.".php");
        }

        require("footer.php");// gets footer file
    }
?>