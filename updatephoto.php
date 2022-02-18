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
if(true){
    $target_dir = "uploads/";
    
    $target_file = $target_dir . basename($_FILES["updatephoto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }
      
      // Check file size
      if ($_FILES["updatephoto"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
      }
      
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
      }
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["updatephoto"]["tmp_name"], $target_file)) {
          echo "The file ". htmlspecialchars( basename( $_FILES["updatephoto"]["name"])). " has been uploaded.";
        } else {
          echo "Sorry, there was an error uploading your file.";
        }
      }
   
      
      // store to database
      $newusername=$_POST["oldusername"];
     // $stName=$_POST["updateSname"];
    //   $stUname=$_POST["updateSname"];
    //   $stAge=$_POST["updateSage"];
    //   $stAddress=$_POST["updateSaddress"];
    //   $stPhone=$_POST["updateSphone"];
         $stPhoto=$target_file;
    //   $stEmail=$_POST["updateSemail"];
    //  // $orgDate = $_POST["newSdate"]; 
    //   $originalDate = $_POST['updateSdate'];
    //   $newDate = date("d-m-Y", strtotime($originalDate));
      
      
      $sql = "UPDATE `students` SET `photo` = '$stPhoto' WHERE `username` = '$newusername';";
      $result = mysqli_query($conn, $sql);
      //

}
header("location:/LibraryManagement/studDetails.php");
?>