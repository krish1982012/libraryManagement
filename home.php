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

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["newusername"])){
        $nu=$_POST["newusername"];
        $existSql = "SELECT * FROM `admindetails` WHERE username ='$nu';";
        $result = mysqli_query($conn, $existSql);
        $numExistRows = mysqli_num_rows($result);
        if($numExistRows > 0){
        // $exists = true;
        $dupusername=true;
        }
       else {
            $pass=password_hash($_POST["newusername"], PASSWORD_DEFAULT);
            $nn=$_POST["newname"];
            $nu=$_POST["newusername"];
            $np=$_POST["newphone"];
            $na=$_POST["newaddress"];
            $sql = "INSERT INTO `admindetails` ( `name`, `username`,`password`,`phone`,`address`) VALUES ('$nn','$nu','$pass','$np','$na')";
            $result = mysqli_query($conn, $sql);
            $adminadded=true;

            //alert('1234');
        }
        
        // $num = mysqli_num_rows($result);
        // if($num==1){

        // }
    }
    

    // $sql = "SELECT * FROM admindetails";
    // $result = mysqli_query($conn, $sql);
    
    // while($row = mysqli_fetch_assoc($result)){
    //     if($row["username"]==$_POST["username"] && $row["password"]==$_POST["password"]){
    //         header("Location: /LibraryManagement/home.php");
    //         exit();
    //     }
    // }
    // header("Location: /LibraryManagement/index.php?incorr=true");
 
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Home</title>
</head>

<body style="background-color: rgb(190, 228, 228);">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand " href="#" style="font-family:monospace;margin-right:50px;">Vision Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="studDetails.php">Students</a>
                    </li>

                    
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="index.php">Logout</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <?php
     if($dupusername==true){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Username already exists, Try with different username
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
     }
  ?>

    <?php
     if($adminadded==true){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        New admin credential added successully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
     }
  ?>
    <div class="btn-group  d-flex jusyify-content-between" role="group" aria-label="Button group with nested dropdown"
        style="font-family:monospace;">
        <!-- <button type="button" class="btn btn-secondary active">Student Infor</button> -->
        <button type="button" class="btn btn-secondary active" id="newaddmission">New Admission</button>
        <button type="button" class="btn btn-secondary " id="updatedet">Update Details</button>
        <button type="button" class="btn btn-secondary" id="addadmin">Add Admin</button>
        <button type="button" class="btn btn-secondary" id="payfee">Pay Fee</button>
        <button type="button" class="btn btn-secondary" id="photoupdate">Update Photo</button>
        <script>
            document.getElementById("photoupdate").addEventListener('click', function () {
                document.getElementById("newadminform").style.display = "none";
                document.getElementById("updatephotoform").style.display = "block";
                document.getElementById("newadmissionform").style.display = "none";
                document.getElementById("newupdateform").style.display = "none";
                document.getElementById("newpayfeeform").style.display = "none";
                var element = document.getElementById("newaddmission");
                element.classList.remove("active");
                element = document.getElementById("updatedet");
                element.classList.remove("active");
                element = document.getElementById("addadmin");
                element.classList.remove("active");
                element = document.getElementById("payfee");
                element.classList.remove("active");
                element = document.getElementById("photoupdate");
                element.classList.add("active");
                
            })
            document.getElementById("addadmin").addEventListener('click', function () {
                document.getElementById("newadminform").style.display = "block";
                document.getElementById("updatephotoform").style.display = "none";
                document.getElementById("newadmissionform").style.display = "none";
                document.getElementById("newupdateform").style.display = "none";
                document.getElementById("newpayfeeform").style.display = "none";
                var element = document.getElementById("newaddmission");
                element.classList.remove("active");
                 element = document.getElementById("updatedet");
                element.classList.remove("active");
                 element = document.getElementById("payfee");
                element.classList.remove("active");
                 element = document.getElementById("photoupdate");
                element.classList.remove("active");
                 element = document.getElementById("addadmin");
                element.classList.add("active");
            })

            document.getElementById("updatedet").addEventListener('click', function () {
                document.getElementById("newadminform").style.display = "none";
                document.getElementById("updatephotoform").style.display = "none";
                document.getElementById("newadmissionform").style.display = "none";
                document.getElementById("newupdateform").style.display = "block";
                document.getElementById("newpayfeeform").style.display = "none";

                var element = document.getElementById("newaddmission");
                element.classList.remove("active");
                element = document.getElementById("addadmin");
                element.classList.remove("active");
                element = document.getElementById("payfee");
                element.classList.remove("active");
                element = document.getElementById("photoupdate");
                element.classList.remove("active");
                element = document.getElementById("updatedet");
                element.classList.add("active");
            })

            document.getElementById("newaddmission").addEventListener('click', function () {
                document.getElementById("newadminform").style.display = "none";
                document.getElementById("updatephotoform").style.display = "none";
                document.getElementById("newadmissionform").style.display = "block";
                document.getElementById("newupdateform").style.display = "none";
                document.getElementById("newpayfeeform").style.display = "none";
                var element = document.getElementById("updatedet");
                element.classList.remove("active");
                element = document.getElementById("addadmin");
                element.classList.remove("active");
                element = document.getElementById("payfee");
                element.classList.remove("active");
                element = document.getElementById("photoupdate");
                element.classList.remove("active");
                element = document.getElementById("newaddmission");
                element.classList.add("active");
            })

            document.getElementById("payfee").addEventListener('click', function () {
                document.getElementById("newadminform").style.display = "none";
                document.getElementById("updatephotoform").style.display = "none";
                document.getElementById("newadmissionform").style.display = "none";
                document.getElementById("newupdateform").style.display = "none";
                document.getElementById("newpayfeeform").style.display = "block";
                var element = document.getElementById("newaddmission");
                element.classList.remove("active");
                element = document.getElementById("updatedet");
                element.classList.remove("active");
                element = document.getElementById("addadmin");
                element.classList.remove("active");
                element = document.getElementById("photoupdate");
                element.classList.remove("active");
                element = document.getElementById("payfee");
                element.classList.add("active");
            })
        </script>
    </div>
    <div class="container  justify-content-center align-items-center border py-3 shadow p-3 mb-5 bg-body rounded"
        id="newpayfeeform" style="width:80vw;margin:20px auto;display:none; ">
        <form action='/LibraryManagement/payfee.php' method="post" enctype="multipart/form-data">
            <h4 style="font-family:monospace;">Update next date of fee payment</h4>
            <div class="mb-3" style="width:70vw;">
                <label for="oldusername1" class="form-label" >Username</label>
                <input type="text" name="oldusername1" class="form-control" id="oldusername1">
            </div>

            <!-- <input type="hidden" name="hid" id="hid" > -->
            <div class="mb-3" style="width:70vw;">
                <label for="updateFeedate" class="form-label">Next date of payment</label>
                <input type="date" name="updateFeedate" class="form-control" id="updateFeedate">
            </div>
            

            <button type="submit" class="btn btn-primary px-4">Update Photo</button>
        </form>

    </div>
    <div class="container  justify-content-center align-items-center border py-3 shadow p-3 mb-5 bg-body rounded"
        id="updatephotoform" style="width:80vw;margin:20px auto;display:none; ">
        <form action='/LibraryManagement/updatephoto.php' method="post" enctype="multipart/form-data">
            <h4 style="font-family:monospace;">Update Photo of existing student</h4>
            <div class="mb-3" style="width:70vw;">
                <label for="oldusername" class="form-label" >Old username</label>
                <input type="text" name="oldusername" class="form-control" id="oldusername">
            </div>

            <!-- <input type="hidden" name="hid" id="hid" > -->

            <div class="mb-3" style="width:70vw;">
                <label for="updatephoto" class="form-label">Upload new Photo</label>
                <input type="file" name="updatephoto" class="form-control" id="updatephoto">
            </div>

            <button type="submit" class="btn btn-primary px-4">Update Photo</button>
        </form>

    </div>
    </div>
    <div class="container  justify-content-center align-items-center border py-3 shadow p-3 mb-5 bg-body rounded"
        id="newupdateform" style="width:80vw;margin:20px auto;display:none; ">
        <form action='/LibraryManagement/update.php' method="post" enctype="multipart/form-data">
            <h4 style="font-family:monospace;">Update details of existing student</h4>
            <div class="mb-3" style="width:70vw;">
                <label for="oldusername" class="form-label">Enter old username</label>
                <input type="text" name="oldusername" class="form-control" id="oldusername">
            </div>
            <div class="mb-3" style="width:70vw;">
                <label for="updateSactive" class="form-label">active student or not?</label>
                <input type="text" name="updateSactive" class="form-control" id="updateSactive">
            </div>
            <div class="mb-3" style="width:70vw;">
                <label for="updateSname" class="form-label">Name</label>
                <input type="text" name="updateSname" class="form-control" id="updateSname">
            </div>
            <div class="mb-3" style="width:70vw;">
                <label for="updateSage" class="form-label">Age</label>
                <input type="text" name="updateSage" class="form-control" id="updateSage">
            </div>
            <div class="mb-3" style="width:70vw;">
                <label for="updateSaddress" class="form-label">Address</label>
                <input type="text" name="updateSaddress" class="form-control" id="updateSaddress">
            </div>

            <div class="mb-3">
                <label for="updateSphone" class="form-label">Phone Number</label>
                <input type="text" name="updateSphone" class="form-control" id="updateSphone">
            </div>
            <div class="mb-3" style="width:70vw;">
                <label for="updateSemail" class="form-label">Email</label>
                <input type="text" name="updateSemail" class="form-control" id="updateSemail">
            </div>
            <!-- <input type="hidden" name="hid" id="hid" > -->


            <div class="mb-3" style="width:70vw;">
                <label for="updateSdate" class="form-label">Next date of payment</label>
                <input type="date" name="updateSdate" class="form-control" id="updateSdate">
            </div>
            <button type="submit" class="btn btn-primary px-4">Update Details</button>
        </form>

    </div>
    </div>
    <div class="container  justify-content-center align-items-center border py-3 shadow p-3 mb-5 bg-body rounded"
        id="newadmissionform" style="width:80vw;margin:20px auto;">
        <form action='/LibraryManagement/uploads.php' method="post" enctype="multipart/form-data">
            <h4 style="font-family:monospace;">Add new Student</h4>
            <div class="mb-3" style="width:70vw;">
                <label for="newSactive" class="form-label">active</label>
                <input type="text" name="newSactive" class="form-control" id="newSactive">
            </div>
            <div class="mb-3" style="width:70vw;">
                <label for="newSname" class="form-label">name</label>
                <input type="text" name="newSname" class="form-control" id="newSname">
            </div>
            <div class="mb-3" style="width:70vw;">
                <label for="newSage" class="form-label">age</label>
                <input type="text" name="newSage" class="form-control" id="newSage">
            </div>
            <div class="mb-3" style="width:70vw;">
                <input type="radio" id="male" name="gender" value="male">
                <label for="male">male</label>
                <input type="radio" id="female" name="gender" value="female">
                <label for="female">female</label><br>
            </div>
            <div class="mb-3" style="width:70vw;">
                <label for="newSaddress" class="form-label">address</label>
                <input type="text" name="newSaddress" class="form-control" id="newSaddress">
            </div>

            <div class="mb-3">
                <label for="newSphone" class="form-label">Phone Number</label>
                <input type="text" name="newSphone" class="form-control" id="newSphone">
            </div>
            <div class="mb-3" style="width:70vw;">
                <label for="newSemail" class="form-label">Email</label>
                <input type="text" name="newSemail" class="form-control" id="newSemail">
            </div>
            <div class="mb-3" style="width:70vw;">
                <label for="photo" class="form-label">Upload Photo</label>
                <input type="file" name="studentphoto" class="form-control" id="photo">
            </div>
            <div class="mb-3" style="width:70vw;">
                <label for="newSdate" class="form-label">Email</label>
                <input type="date" name="newSdate" class="form-control" id="newSdate">
            </div>
            <button type="submit" class="btn btn-primary px-4">Add Student</button>
        </form>

    </div>
    <div class="container  justify-content-center align-items-center border   py-3 shadow p-3 mb-5 bg-body rounded"
        id="newadminform" style="width:80vw;margin:20px auto;display:none;">
        <form action='/LibraryManagement/home.php' method="post">
            <h4 style="font-family:monospace;">Add new Admin</h4>
            <div class="mb-3" style="width:70vw;">
                <label for="newname" class="form-label">name</label>
                <input type="text" name="newname" class="form-control" id="newname">
            </div>
            <div class="mb-3" style="width:70vw;">
                <label for="newusername" class="form-label">User name</label>
                <input type="text" name="newusername" class="form-control" id="newusername">
            </div>
            <div class="mb-3" style="width:70vw;">
                <label for="newphone" class="form-label">phone</label>
                <input type="text" name="newphone" class="form-control" id="newphone">
            </div>
            <div class="mb-3" style="width:70vw;">
                <label for="newaddress" class="form-label">address</label>
                <input type="text" name="newaddress" class="form-control" id="newaddress">
            </div>

            <div class="mb-3">
                <label for="newpassword" class="form-label">Password</label>
                <input type="text" name="newpassword" class="form-control" id="newpassword">
            </div>
            <button type="submit" class="btn btn-primary px-4" >Add Admin</button>
        </form>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>