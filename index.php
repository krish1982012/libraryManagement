<?php
$inv=false;
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
    

    $u=$_POST["username"];
    $Sql = "SELECT * FROM `admindetails` WHERE username ='$u';";
    $result = mysqli_query($conn, $Sql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        $row = mysqli_fetch_assoc($result);
        $pass=password_verify($_POST["password"], $row["password"]);
        if($row["username"]==$_POST["username"] && $pass){
            header("Location: /LibraryManagement/home.php");
            
            exit();
        }
       // header("Location: /LibraryManagement/index.php");
        $inv = true;
        //header("Location: /LibraryManagement/index.php");

    //  $inv = true;
    //  header("Location: /LibraryManagement/index.php");
    }
   else {
    $inv = true;
    //header("Location: /LibraryManagement/index.php");
    }
    
 
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

    <title>Library Login</title>
</head>

<body>
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
                        <a class="nav-link active" aria-current="page" href="index.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="home.php">Students</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link disabled" href="payments.php">Payments</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    
    <?php
       if($inv==true){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Incorrent username or password.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
       }
    ?>
    <div class="container d-flex justify-content-center align-items-center border  "
        style="height:300px;width:400px;margin-top:100px;">
        <form action='/LibraryManagement/index.php' method="post">
            <h3>Admin LogIn</h3>
            <div class="mb-3">
                <label for="username" class="form-label">User name</label>
                <input type="text" name="username" class="form-control" id="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>

            <button type="submit" class="btn btn-primary">Log In</button>
        </form>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>