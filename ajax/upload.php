<?php
 include_once "../dbconnect.php";
 if(isset($_FILES['file'])){
      $errors= ''; 
      $file_name = $_FILES['file']['name'];
      $file_size =$_FILES['file']['size'];
      $file_tmp =$_FILES['file']['tmp_name'];
      $file_type=$_FILES['file']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
      
      $extensions= array("pdf");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors="extension not allowed, please choose a pdf file.";
      }
      
      if($file_size > 20971520){
         $errors='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"../upload/".$file_name);
        mysqli_query($con,"INSERT INTO `billing`(`id`, `user_id`, `type`, `path`) 
        VALUES (NULL,'".$_POST['user_id']."','".$_POST['type']."','".$file_name."')")or die("Eror");
      
          echo "success";
      }else{
         echo ($errors);
      }
      
   }
?>