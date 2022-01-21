<?php
    if(isset($_POST["editProduct"])){
        include_once("./db.inc.php");

        $user = mysqli_real_escape_string($conn,$_POST["user"]);
        $pPrice = (float)mysqli_real_escape_string($conn, $_POST["pPrice"]);
        $pStock = (int)mysqli_real_escape_string($conn, $_POST["pStock"]);
        $pname = mysqli_real_escape_string($conn,$_POST["pname"]);
        $ppic = mysqli_real_escape_string($conn, $_POST["ppic"]);

        $pid = (int)mysqli_real_escape_string($conn, $_POST["pid"]);
        $action = mysqli_real_escape_string($conn, $_POST["action"]);
        $name = mysqli_real_escape_string($conn,$_POST["name"]);
        $price = (float)mysqli_real_escape_string($conn, $_POST["price"]);
        $stock = (int)mysqli_real_escape_string($conn, $_POST["stock"]);
        $totalStock = 0;
        $ppicTempName = "";
        
        $productPic = $_FILES["productPic"];

        if(empty($name)){
            $name = $pname;
        }
        
        if(empty($price)){
            $price = $pPrice;
        }

        if($name == $pname){
            $name = $pname;
        }
        if($price == $pPrice){
            $price = $pPrice;
        }
        
        if($action == "None" && empty($stock)){
            $stock = 0;
            $totalStock = $pStock;
        }else if($action == "None" && !empty($stock)){
            header("location: ../src/mainbody.php?pgname=edit&id=".$pid."&error=noStocktoAdd");
            exit();
        }else if($action == "Add" && empty($stock)){
            header("location: ../src/mainbody.php?pgname=edit&id=".$pid."&error=noStocktoAdd");
            exit();
        }else if($action == "Add" && !empty($stock)){
            $totalStock = $pStock + $stock;
        }else if($action == "Sub" && empty($stock)){
            header("location: ../src/mainbody.php?pgname=edit&id=".$pid."&error=noStocktoSub");
            exit();
        }else if($action == "Sub" && !empty($stock)){
            $totalStock = $pStock - $stock;
            if($totalStock < 0){
                header("location: ../src/mainbody.php?pgname=edit&id=".$pid."&error=StocktoSubmany");
                exit();
            }
        }

        if(empty($productPic["name"])){
            $productPic = $ppic;
        }else if(!empty($productPic["name"])){


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
                        $productPic = $ppicNewName;                        
                    }else {
                        header("location: ../src/mainbody.php?pgname=edit&id=".$pid."&error=fileTooBig");
                        exit();
                    }
                }else {
                    header("location: ../src/mainbody.php?pgname=edit&id=".$pid."&error=errorOccured");
                    exit();   
                }
            }else {
                header("location: ../src/mainbody.php?pgname=edit&id=".$pid."&error=typeNotAllowed");
                exit();
            }
        }

        if($productPic != $ppic){
            $sql = "INSERT INTO `productedits`(`productName`, `productPrice`, `instock`
            ,`addedstock`, `totalstock`, `action`, `user`) VALUES('$name', $price, 
            $pStock, $stock, $totalStock, '$action', '$user')";
            $fileDes = '../assets/'.$productPic;
            $delfileDes = '../assets/'.$ppic;


            if(mysqli_query($conn, $sql)){
                $sql1 = "UPDATE `products`SET `productName` = '$name', `productPrice`= $price ,
             `stock` = $totalStock, `productPic` = '$productPic' WHERE `id` = $pid";
                if(mysqli_query($conn, $sql1)){
                    if($ppic != "general.png"){
                        unlink('../assets/'.$ppic);
                    }
                    move_uploaded_file($ppicTempName , $fileDes);
                    header("location:  ../src/mainbody.php?pgname=inventorybody&success=success");
                }else{
                    header("location:  ../src/mainbody.php?pgname=edit&id=".$pid."&error=sqlError1");
                    exit();
                }
            }else{
                header("location:  ../src/mainbody.php?pgname=edit&id=".$pid."&error=sqlError2");
                exit();
            }
        }else{
            echo $sql = "INSERT INTO `productedits`(`productName`, `productPrice`, `instock`
            ,`addedstock`, `totalstock`, `action`, `user`) VALUES('$name', $price, 
            $pStock, $stock, $totalStock, '$action', '$user')";

            if(mysqli_query($conn, $sql)){
                $sql1 = "UPDATE `products`SET `productName` = '$name', `productPrice`= $price ,
             `stock` = $totalStock WHERE `id` = $pid";
                if(mysqli_query($conn, $sql1)){
                    header("location:  ../src/mainbody.php?pgname=inventorybody&success=success");
                }else{
                    header("location:  ../src/mainbody.php?pgname=edit&id=".$pid."&error=sqlError3");
                    exit();
                }
            }else{
                header("location:  ../src/mainbody.php?pgname=edit&id=".$pid."&error=sqlError4");
                exit();
            }
        }

    }else{
        header("location: ../src/mainbody.php?pgname=inventorybody");
    }