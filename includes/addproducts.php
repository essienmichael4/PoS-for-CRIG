<?php
    if(isset($_POST["setProduct"])){
        include_once("./db.inc.php");
    

        $name = mysqli_real_escape_string($conn,$_POST["name"]);
        $price = (float)mysqli_real_escape_string($conn, $_POST["price"]);
        $stock = (int)mysqli_real_escape_string($conn, $_POST["stock"]);
        $productPic = $_FILES["productPic"];
        $category = mysqli_real_escape_string($conn, $_POST["category"]);

        if(empty($name)||empty($price)||empty($stock)){
            header("location: ../src/mainbody.php?pgname=inventory&error=nullInput");
        }

        if(!empty($productPic)){
            $ppicName = $productPic['name'];
            $ppicTempName = $productPic['tmp_name'];
            $ppicSize = $productPic['size'];
            $ppicError = $productPic['error'];

            $ppicExt = explode('.', $ppicName);
            $ppicActExt = strtolower(end($ppicExt));

            $allowedExt = array('jpg', 'jpeg', 'png');
            
            if(in_array($ppicActExt, $allowedExt)){
                if($ppicError === 0){
                    if($ppicSize < 5000000){
                        $ppicNewName = $name.uniqid('',true).".".$ppicActExt;
                        $fileDes = '../assets/'.$ppicNewName;

                        $sql = "INSERT INTO `products`(`productName`, `productPrice`, `stock`, `productPic`, `category`) 
                        VALUES('$name',$price,$stock, '$ppicNewName', '$category')";

                        if(mysqli_query($conn, $sql)){
                            move_uploaded_file($ppicTempName, $fileDes);
                            header("location:  ../src/mainbody.php?pgname=inventory&success=success");
                        }else{
                            header("location:  ../src/mainbody.php?pgname=inventory&error=error");
                        }
                    }else {
                        header("Location: ../src/mainbody.php?pgname=inventory&error=fileTooBig");
                        exit();
                    }
                }else {
                    header("Location: ../src/mainbody.php?pgname=inventory&success=errorOccured");
                    exit();   
                }
            }else {
                header("Location: ../src/mainbody.php?pgname=inventory&success=typeNotAllowed");
                exit();
            }
        }

        $productPic = "general.png";
        $sql = "INSERT INTO `products`(`productName`, `productPrice`, `stock`, `category`,`productPic`,) 
        VALUES('$name',$price,$stock, '$category', '$productPic')";

        if(mysqli_query($conn, $sql)){
            header("location:  ../src/mainbody.php?pgname=inventory&success=success");
            exit();
        }else{
            header("location:  ../src/mainbody.php?pgname=inventory&error=error");
            exit();
        }

    }else{
        header("location: ../src/mainbody.php?pgname=inventory");
    }