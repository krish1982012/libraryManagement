<?php

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

    <title>Payee students</title>
    <link rel="stylesheet" href="studDet.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script>$(document).ready(function () {
            $('#example').DataTable();
        });</script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
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
                        <a class="nav-link" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  " href="studDetails.php">Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  active" href="payeestudents.php">Payee Students</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="index.php">Logout</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="detailcontainer" >
               
                <div id="modalphoto" class="border py-3 shadow p-3"></div>
                <div id="modalname"></div>
                <div id="modalusername"></div>
                <div id="modalactive"></div>
                <div id="modalgender"></div>
                <div id="modaladdress"></div>
                <div id="modalphone"></div>
                <div id="modalemail"></div>
                <div id="modalnextdate"></div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <div class="container  my-2">
        <table id="example" class="display compact hover " style="width:90%">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Active</th>
                <th>Name</th>
                <th>User Name</th>
                <th>Sex</th>
                <th>Age</th>
                <th>Addres</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Due Date</th>
                <th>photo</th>
                <th>View</th>
            </tr>

        </thead>
        <tbody>
            <?php
      $sql = "SELECT * FROM students";
      $result = mysqli_query($conn, $sql);
      $ind=1;
      
      while($row = mysqli_fetch_assoc($result) ){

        $current_date = date('Y-m-d');
        $send_date = date("Y-m-d", strtotime($row['next date']));
        if(strtotime($current_date) > strtotime($send_date) &&  $row["active"]=="yes"){
            echo '<tr>
                <td>'.$ind.'</td>
                <td>'. $row["active"].'</td>
                <td>'. $row["name"].'</td>
                <td>'.$row["username"].'</td>
                <td>'.$row["gender"].'</td>
                <td>'.$row["age"].'</td>
                <td>'.$row["address"].'</td>
                <td>'.$row["phone"].'</td>
                <td>'.$row["email"].'</td>
                <td>'.$row["next date"].'</td>
                <td ><img src='.$row["photo"].' id="singleimg" style="width:30px;" alt="ph"></td>
                <td><button class=" viewstud btn btn-primary">view</button></td>
                
                </tr>';
                
           
            $ind=$ind+1;
        }
           
      }

      ?>

        </tbody>
        <tfoot>
            <tr>
            <th>S.No</th>
                <th>Active</th>
                <th>Name</th>
                <th>User Name</th>
                <th>Sex</th>
                <th>Age</th>
                <th>Addres</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Due Date</th>
                <th>photo</th>
                <th>View</th>

            </tr>
        </tfoot>
    </table>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script>
        st = document.getElementsByClassName('viewstud');
        Array.from(st).forEach(element => {
            element.addEventListener('click', (e) => {

                tr = e.target.parentNode.parentNode;
                console.log(tr);
                document.getElementById('modalphoto').innerHTML = tr.getElementsByTagName("td")[10].innerHTML;
                document.getElementById('singleimg').style.width = "150px";
                
                document.getElementById('modalname').innerHTML ='<strong>Name : '+ tr.getElementsByTagName("td")[2].innerHTML+' </strong>';
                document.getElementById('modalusername').innerHTML ="<strong>Username :  </strong>"+ tr.getElementsByTagName("td")[3].innerHTML;
                document.getElementById('modalgender').innerHTML ="<strong>Gender :  </strong>"+ tr.getElementsByTagName("td")[4].innerHTML;
                
                document.getElementById('modalactive').innerHTML ="<strong>Active :  </strong>"+ tr.getElementsByTagName("td")[1].innerHTML;
                document.getElementById('modaladdress').innerHTML ="<strong>Address :  </strong>"+ tr.getElementsByTagName("td")[6].innerHTML;
                document.getElementById('modalphone').innerHTML ="<strong>Phone Number :  </strong>"+ tr.getElementsByTagName("td")[7].innerHTML;
                document.getElementById('modalemail').innerHTML ="<strong>Email id. :  </strong>"+ tr.getElementsByTagName("td")[8].innerHTML;
                document.getElementById('modalnextdate').innerHTML ="<strong>Due date :  </strong>"+ tr.getElementsByTagName("td")[9].innerHTML;
                //   title = tr.getElementsByTagName("td")[1].innerHTML;
                //   description = tr.getElementsByTagName("td")[2].innerHTML;
                //   document.getElementById('edittitle').value = title;
                //   document.getElementById('oldtitle').value = title;
                //   document.getElementById('editdescription').value = description;
                //   document.getElementById('hiddensno').value = e.target.id;
                //document.getElementById('hiddensno').value=tr.getElementsByTagName("td")[0].innerHTML;

                $('#detailModal').modal('toggle');
                // localStorage.setItem('titleToUpdate', tr.getElementsByTagName("td")[1].innerHTML);
            });
        });
    </script>
   
</body>

</html>