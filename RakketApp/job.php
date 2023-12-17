<?php session_start();
include "db.php";

if(isset($_POST["delete"])){
  $id = $_POST['id'];
  $email=$_SESSION['email'];
  connection();
  $sql = "DELETE FROM save_job WHERE USERID = '$id'";
  $query = mysqli_query($conn, $sql);
  echo "<script>alert('Done$id');</script>";
  echo"<script>window.location.href='job.php'</script>";
}





if(isset($_POST['addJobs'])){
          $role = $_POST['role'];
          $worktime = $_POST['worktime'];
          $address = $_POST['address'];
          $company = $_POST['company'];
          $qualification = $_POST['qualification'];
          $requirements = $_POST['requirements'];
          $description = $_POST['description'];
          connection();
          $email = $_SESSION['email'];
          $data = "INSERT INTO job_info (Role, WT, Address, EmployerName, Requirements, Qualification, Job_desc, Email) 
          VALUES ('$role', '$worktime', '$address', '$company', '$requirements', '$qualification', '$description', '$email')";
      
          $query = mysqli_query($conn, $data);
          if($query){
              echo"<script>alert('success');'</script>";
              echo"<script>window.location.href='EMHome.php'</script>";
          }else{
              echo"<script>alert('fail');'</script>";
          }
      }
      
      
      
      if(isset($_POST["deleteJob"])){
        $id = $_POST['id'];
        connection();
        $sql = "DELETE FROM hire WHERE id = '$id'";
        $query = mysqli_query($conn, $sql);
        if($query){
                echo"<script>alert('Done');'</script>";
        echo"<script>window.location.href='JSAlert.php'</script>";
        }
      }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <div class="container-fluid">
  <a href="JobseekerHome.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4"><h1 >RAKKET</h1></span>
      </a>
  
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>

    <!-- <div class="nav-bar">
        <img src="img-resource/Raket.png" id="logo">
        <div class="separator">
            <h4 id="login-btn" onclick="login()">Logout</h4>
            <h4 id="login-btn" onclick="login()">Logout</h4>
            <h4 id="login-btn" onclick="login()">Logout</h4>
            <span></span>
            <img src="img-resource/menu.png" id="menu_icon" onclick="">
        </div>
    </div>
 -->
    <div class="Profile-container">
        <div class="side-menu">
            <div class="pro-card">
                <h4>My Account</h4>
                <a href="JobseekerHome.php"><h2>Home</h2></a>
                <a href="./JSCreateProfile.php">
                    <h2>Profile </h2>
                </a>
                <a href="job.php">
                    <h2>Alert</h2>
                </a>
                <a href="JSSaveJobs.php">
                    <h2>Jobs</h2>
                </a>
           

            </div>

        </div>

        <div class="create-prof">
            <div class="job-container">
                <div class="job-list-container">
                <h1 id="hii">Interested Employers:</h1>
               <?php  connection();
$email=$_SESSION['email'];
$data = "SELECT * FROM hire";
$querys = mysqli_query($conn, $data);

while ($row = mysqli_fetch_array($querys)) { 
          echo "<br> 
          <form class='job-card' action='job.php' method='post'>
          <input type='hidden' name='id' value='$row[0]'>
          <input type='hidden' name='EmployerName' value='$row[2]'> <!-- Assuming $row[2] is the correct index -->
          <h1>$row[3]</h1>
          <h5 id='role'>$row[1]</h5>
          <div id='email'>
              <a href='https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=$row[1]' target='_blank'>
                  <input type='button' id='btn_1' value='Email' name='profile'>
              </a>
              <input type='submit' id='btn_1' value='Remove' name='deleteJob'>
          </div>
          </form>";
      
    
}
?>
                </div>
            </div>
        </div>

    </div>
    <footer>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">

    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/d3js/7.8.5/d3.min.js"></script>
    <script>
        let menus = document.getElementById("form_1");
        let loginChoice = document.getElementById("login_choice");

        function menu() {
            if (menus.style.height === "0px" || menus.style.height === "0%") {
                menus.style.height = "100%";
            } else {
                menus.style.height = "0";
            }
        }

        function login() {
            // Get a reference to the #login-choice element
            var loginChoice = document.getElementById('login-choice');

            if (loginChoice.style.display === "none" || loginChoice.style.display === "") {
                loginChoice.style.display = "flex"; // Show the element
            } else {
                loginChoice.style.display = "none"; // Hide the element
            }
        }

        function logInJobSeeker() {
            window.location.href = "LoginJobSeeker.html";
        }

        function HomeSeeker() {
            window.location.href = "Job.php";
        }
    </script>
</body>
<style>
    .nav-link {
        font-size: 20px;
        font-weight: 700;
        color: #394ec5;
    }

    #logo {
        width: 90px;
        height: 80px;
        margin: 5px;
        margin-left: 50px;

    }

    .side-menu {
        width: 350px;
        height: 100%px;
        margin-left: 125px;
    }

    .create-prof {
        width: 750px;
        height: 100%px;
        margin-left: 80px;
        margin-top: 50px;
    }

    .Profile-container {
        padding: 10px;
        width: 100%;
        height: 750px;
        display: flex;
        flex-direction: row;
    }

    .pro-card {
        height: 600px;
        border: solid 0.1px;
        border-radius: 10px;
    }

    .pro-card h4 {
    
        text-align: center;
        padding: 10px;
        color: rgb(255, 255, 255);
        border-radius: 10px 10px 0px 0px;
        background-color: rgb(145, 145, 145);
    }

    .input-area {
        width: 90%;
        height: 60px;
        border-radius: 5px;
        border: solid 0.5px;
        font-size: 25px;
        padding: 10px;
        padding-left: 15px;
    }

    .form-horizontal label {
        font-size: 25px;
    }

    .create-prof {
        margin-bottom: 25px;
        font-size: 35px;
        color: rgb(255, 42, 0);
    }

    footer {
        height: 400px;
    }

  

    h2 {
        border-bottom: solid 0.5px;
        font-size: 20px;
        padding: 5px;
        margin-left: 20px;
        margin-right: 40px;
        margin-top: 40px;
   
    }

    h2:hover {
        border-bottom: blue solid 3px;
        font-size: 20px;
        padding: 5px;
        margin-left: 20px;
        margin-right: 40px;
        margin-top: 40px;
        color: blue;
    
    }

    .nav-link {
   
        font-size: 18px;
    }

    .form-container {
        margin-top: 10px;
        border-bottom: solid 0.5px;

    }

    a {
        text-decoration: none;
    }

    #form_1 {
        width: auto;
    }

    .job-card {
        width: 80%;
        height: 100%;
        float: right;
        margin-bottom: 30px;
        border-radius: 5px;
        padding: 30px;
        box-shadow: 1px 1px 0px 2px rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        overflow: hidden;

    }

    .job-card:hover {
        box-shadow: 5px 8px 8px 8px rgba(0, 0, 0, 0.2);
    }

    #login p {
        color: #394ec5;
    }

    h3 {
        color: #394ec5;
    }

    h4 {
        color: red;
    }.btn_1{
  width:100px;
    display: table-cell;
word-wrap: break-word;
word-break: break-all;
    height: 45px;
    border-radius: 5px;
    border: solid 2px #FFE477 ;
     background-color:#FFE477;
   
    color: rgb(241, 53, 53);
}#job{
    width: 200px;
}#btn_1{
    background-color: #394ec5;
    color: white;
    font-weight: 700px;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}h3,h4,h5{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    color: black;
}.btn_1{
    background-color:#394ec5;
    color: white;
}.logos{
color: black;

}h4{
    color: black;
}h1{
color: black;
font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}#btn_1{
          font-size: 22px;
          width: 200px;
}
    </style>

</html>