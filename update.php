<?php
$statusMsg ="";

$servername = "localhost";
$username = "root";
$password = "";
$database = "visionlibrary";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST["updateSactive"]) &&$_POST["updateSactive"]!=''){
    
    $newusername=$_POST["oldusername"];
    $stActive=$_POST["updateSactive"];
    
    $sql = "UPDATE `students` SET `active` = '$stActive' WHERE `username` = '$newusername';";
    $result = mysqli_query($conn, $sql);
    //header("location:/LibraryManagement/studDetails.php");

}
if(isset($_POST["updateSname"])&&$_POST["updateSname"]!=''){
            // $target_dir = "uploads/";
            // echo '<pre>';
            // //print_r($_FILES["studentphoto"]);
            // echo '</pre>';
            // $target_file = $target_dir . basename($_FILES["updatestudentphoto"]["name"]);
            // $uploadOk = 1;
            // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
            // if (file_exists($target_file)) {
            //     echo "Sorry, file already exists.";
            //     $uploadOk = 0;
            //   }
              
            //   // Check file size
            //   if ($_FILES["studentphoto"]["size"] > 500000) {
            //     echo "Sorry, your file is too large.";
            //     $uploadOk = 0;
            //   }
              
            //   // Allow certain file formats
            //   if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            //   && $imageFileType != "gif" ) {
            //     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            //     $uploadOk = 0;
            //   }
              
            //   // Check if $uploadOk is set to 0 by an error
            //   if ($uploadOk == 0) {
            //     echo "Sorry, your file was not uploaded.";
            //   // if everything is ok, try to upload file
            //   } else {
            //     if (move_uploaded_file($_FILES["studentphoto"]["tmp_name"], $target_file)) {
            //       echo "The file ". htmlspecialchars( basename( $_FILES["studentphoto"]["name"])). " has been uploaded.";
            //     } else {
            //       echo "Sorry, there was an error uploading your file.";
            //     }
            //   }
           
              
              // store to database
              $newusername=$_POST["oldusername"];
              $stName=$_POST["updateSname"];
            //   $stUname=$_POST["updateSname"];
            //   $stAge=$_POST["updateSage"];
            //   $stAddress=$_POST["updateSaddress"];
            //   $stPhone=$_POST["updateSphone"];
            //   $stPhoto=$target_file;
            //   $stEmail=$_POST["updateSemail"];
            //  // $orgDate = $_POST["newSdate"]; 
            //   $originalDate = $_POST['updateSdate'];
            //   $newDate = date("d-m-Y", strtotime($originalDate));
              
              
              $sql = "UPDATE `students` SET `name` = '$stName' WHERE `username` = '$newusername';";
              $result = mysqli_query($conn, $sql);
              //
        
}
if(isset($_POST["updateSage"])&&$_POST["updateSage"]!=''){
    
      $newusername=$_POST["oldusername"];
      $stAge=$_POST["updateSage"];
      
      $sql = "UPDATE `students` SET `age` = '$stAge' WHERE `username` = '$newusername';";
      $result = mysqli_query($conn, $sql);
      //header("location:/LibraryManagement/studDetails.php");

}
if(isset($_POST["updateSaddress"]) &&$_POST["updateSaddress"]!=''){
    
    $newusername=$_POST["oldusername"];
    $stAddress=$_POST["updateSaddress"];
    
    $sql = "UPDATE `students` SET `address` = '$stAddress' WHERE `username` = '$newusername';";
    $result = mysqli_query($conn, $sql);
    //header("location:/LibraryManagement/studDetails.php");

}
if(isset($_POST["updateSphone"])&&$_POST["updateSphone"]!=''){
    
    $newusername=$_POST["oldusername"];
    $stPhone=$_POST["updateSphone"];
    
    $sql = "UPDATE `students` SET `phone` = '$stPhone' WHERE `username` = '$newusername';";
    $result = mysqli_query($conn, $sql);
    //header("location:/LibraryManagement/studDetails.php");

}
if(isset($_POST["updateSemail"])&&$_POST["updateSemail"]!=''){
    
    $newusername=$_POST["oldusername"];
    $stEmail=$_POST["updateSemail"];
    
    $sql = "UPDATE `students` SET `email` = '$stEmail' WHERE `username` = '$newusername';";
    $result = mysqli_query($conn, $sql);
    //header("location:/LibraryManagement/studDetails.php");

}
if(isset($_POST["updateSdate"])&&$_POST["updateSdate"]!=''){
    
    $newusername=$_POST["oldusername"];
    //$stAddress=$_POST["updateSaddress"];
    $originalDate = $_POST['updateSdate'];
    $newDate = date("Y-m-d", strtotime($originalDate));
    
    $sql = "UPDATE `students` SET `next date` = '$newDate' WHERE `username` = '$newusername';";
    $result = mysqli_query($conn, $sql);
    //header("location:/LibraryManagement/studDetails.php");

}
header("location:/LibraryManagement/studDetails.php");
?>