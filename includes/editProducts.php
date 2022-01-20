<?php
    if(isset($_POST["editProduct"])){
        include_once("./db.inc.php");

        $user = mysqli_real_escape_string($conn,$_POST["user"]);
        $pPrice = (float)mysqli_real_escape_string($conn, $_POST["pPrice"]);
        $pStock = (int)mysqli_real_escape_string($conn, $_POST["pStock"]);
        $pname = mysqli_real_escape_string($conn,$_POST["pname"]);
        $ppic = (float)mysqli_real_escape_string($conn, $_POST["ppic"]);
        $pid = (int)mysqli_real_escape_string($conn, $_POST["pid"]);

        $name = mysqli_real_escape_string($conn,$_POST["name"]);
        $price = (float)mysqli_real_escape_string($conn, $_POST["price"]);
        $stock = (int)mysqli_real_escape_string($conn, $_POST["stock"]);
        
        $productPic = $_FILES["productPic"];
        // $category = mysqli_real_escape_string($conn, $_GET["category"]);

        if(empty($name)||empty($price)){
            header("location: ../src/mainbody.php?pgname=inventorybody&error=nullInput");
        }

        if(!empty($productPic)){
            $ppicName = $productPic['name'];
            $ppicTempName = $productPic['tmp_name'];
            $ppicSize = $productPic['size'];
            $ppicError = $productPic['error'];

            $ppicExt = explode('.', $ppicName);
            $ppicActExt = strtolower(end($ppicExt));

            $allowedExt = array('jpg', 'jpeg', 'png');
            echo $ppicActExt;
            if(in_array($ppicActExt, $allowedExt)){
                if($ppicError === 0){
                    if($ppicSize < 5000000){
                        $ppicNewName = $name.".".$ppicActExt;
                        $fileDes = '../assets/'.$ppicNewName;

                        $sql = "INSERT INTO `products`(`productName`, `productPrice`, `stock`, `productPic`) 
                        VALUES('$name',$price,$stock, '$ppicNewName')";

                        if(mysqli_query($conn, $sql)){
                            move_uploaded_file($ppicTempName, $fileDes);
                            header("location:  ../src/mainbody.php?pgname=inventorybody&success=success");
                        }else{
                            header("location:  ../src/mainbody.php?pgname=inventorybody&error=error");
                        }
                    }else {
                        header("Location: ../src/mainbody.php?pgname=inventorybody&error=fileTooBig");
                        exit();
                    }
                }else {
                    header("Location: ../src/mainbody.php?pgname=inventorybody&success=errorOccured");
                    exit();   
                }
            }else {
                header("Location: ../src/mainbody.php?pgname=inventorybody&success=typeNotAllowed");
                exit();
            }
        }


        $sql = "INSERT INTO `products`(`productName`, `productPrice`, `stock`) 
        VALUES('$name',$price,$stock)";

        if(mysqli_query($conn, $sql)){
            header("location:  ../src/mainbody.php?pgname=inventorybody&success=success");
        }else{
            header("location:  ../src/mainbody.php?pgname=inventorybody&error=error");
        }

        // echo $productPic;
        

    }else{
        header("location: ../src/mainbody.php?pgname=inventorybody");
    }