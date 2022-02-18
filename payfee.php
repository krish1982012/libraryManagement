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
if(isset($_POST["updateFeedate"])&&$_POST["updateFeedate"]!=''){
    
    $newusername=$_POST["oldusername1"];
    //$stAddress=$_POST["updateSaddress"];
    $originalDate = $_POST['updateFeedate'];
    $newDate = date("Y-m-d", strtotime($originalDate));
    
    $sql = "UPDATE `students` SET `next date` = '$newDate' WHERE `username` = '$newusername';";
    $result = mysqli_query($conn, $sql);
    //header("location:/LibraryManagement/studDetails.php");

}
header("location:/LibraryManagement/studDetails.php");
?>