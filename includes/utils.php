<?php
$picStatus = 1;

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
                    $ppicNewName = $pid.".".$ppicActExt;
                    $fileDes = '../productProfile/'.$ppicNewName;
                    
                    move_uploaded_file($ppicTempName, $fileDes);
                }else {
                    header("Location: ../index.php?success=fileTooBig");
                    exit();
                }
            }else {
                header("Location: ../index.php?success=errorOccured");
                exit();
                
            }
        }else {
            header("Location: ../index.php?success=typeNotAllowed");
            exit();
        }

        header("Location: ../index.php?success=picAdded");
        exit();