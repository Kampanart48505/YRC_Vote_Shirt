<?php
    include("../connect/connect.php");
    if(isset($_POST['submit'])){
     
        $c_number = $_POST['c_number'];

        
        $temp = explode('.',$_FILES['c_pic']['name']);
        $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $uploadDir = "../uploads/"; 
        $fileName = substr( str_shuffle( $chars ), 0, 5 ). '.'.end($temp) ;
        $uploadFilePath = $uploadDir.$fileName; 
        move_uploaded_file($_FILES['c_pic']['tmp_name'], $uploadFilePath);

        $sql = "INSERT INTO `candidate` (`c_id`, `c_number`, `c_name`, `c_pic`) 
        VALUES (NULL, '$c_number', '0', '".$fileName."')";
        $result = mysqli_query($conn,$sql);
        

        if($result){
            header("location:../add_shirt.php?status=successinsert");
        }else{
            header("location:../add_shirt.php?status=errorinsert");
        }
    }

?>