<?php
$statusMsg ="";
$dupusername=false;
$adminadded=false;
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

if(isset($_POST["newSname"])){
            $target_dir = "uploads/";
            echo '<pre>';
            //print_r($_FILES["studentphoto"]);
            echo '</pre>';
            $target_file = $target_dir . basename($_FILES["studentphoto"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
              }
              
              // Check file size
              if ($_FILES["studentphoto"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
              }
              
              // Allow certain file formats
              if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
              && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
              }
              
              // Check if $uploadOk is set to 0 by an error
              if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
              // if everything is ok, try to upload file
              } else {
                if (move_uploaded_file($_FILES["studentphoto"]["tmp_name"], $target_file)) {
                  echo "The file ". htmlspecialchars( basename( $_FILES["studentphoto"]["name"])). " has been uploaded.";
                } else {
                  echo "Sorry, there was an error uploading your file.";
                }
              }
           
              
              // store to database
              $stActive=$_POST['newSactive'];
              $stName=$_POST["newSname"];
              $stUname=$_POST["newSname"];
              $stGender=$_POST["gender"];
              $stAge=$_POST["newSage"];
              $stAddress=$_POST["newSaddress"];
              $stPhone=$_POST["newSphone"];
              $stPhoto=$target_file;
              $stEmail=$_POST["newSemail"];
             // $orgDate = $_POST["newSdate"]; 
              $originalDate = $_POST['newSdate'];
              $newDate = date("Y-m-d", strtotime($originalDate));
              // SQL query $sql = "SELECT * FROM checkdate WHERE DATE(createdat) = '$newDate'"; 
              //$stDate= date("d/m/Y", strtotime($orgDate)); 
              $sql = "INSERT INTO `students` ( `active`,`name`, `username`,`gender`,`age`,`address`,`phone`,`photo`,`email`,`next date`) VALUES ('$stActive','$stName','$stUname','$stGender','$stAge','$stAddress','$stPhone','$stPhoto','$stEmail','$newDate')";
              $result = mysqli_query($conn, $sql);

              $sql = "SELECT * FROM students WHERE `phone`='$stPhone'";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($result);
             // echo $row['id'];
              $newusername= $stUname.'_'. $row["id"];
              $sql = "UPDATE `students` SET `username` = '$newusername' WHERE `phone` = '$stPhone';";
              $result = mysqli_query($conn, $sql);
              header("location:/LibraryManagement/studDetails.php");
        
    }

?>