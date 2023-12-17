
<?php session_start(); 
 include "db.php";

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
     <h2 >RAKKET</h2>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a  class="nav-link active" onclick="login()">Login</a></li>
        <li class="nav-item"><a href="#" class="nav-link">......</a></li>
      </ul>
    </header>
    <div class="login-choice" id="login" >
            <br>
            <p>Are you a jobseeker or an employer</p>
            <input type="submit" id="btn_1" onclick="logInJobSeeker()"  value="Jobseeker">
            <br>
            <input type="submit" id="btn_1" onclick="logInEmployeer()"  value="Employer"> 
    </div>

    
    <div class="login-choice">
        <form id="form_1" class="form-container" action="#" method="post">
            <label for="input_1">What</label>
            <input type="text" id="input_1" name='jobName'placeholder="Job title" required>
            <br>
            <label for="input_1">Where</label>
            <input type="text" id="input_1"  name='location' placeholder="City"  required>
            <br>
            <input type="submit" id="btn_1" name='searchjob'value="Search jobs">
           </form>
    </div>
    <div class="job-container">
        <div class="job-list-container">
           
        <?php 

connection();
if(isset($_POST['searchjob'])){
    $jName = $_POST['jobName'];
    $location = $_POST['location'];
    $data = "SELECT * FROM job_info WHERE TRIM(Role) = '" . trim($jName) . "' AND TRIM(Address) = '" . trim($location) . "'";

$query = mysqli_query($conn, $data);
while ($row = mysqli_fetch_array($query)) {
    echo "<br> <form class='job-card' action='index.php' method='post'>
    <input type='hidden' name='id' value='$row[0]'>
    <h3 id='role'>$row[1]</h3>
    <h4 id=''>$row[4]</h4>
    <h5 id=''>$row[3]</h5>
    <p id='descrip'>$row[8]</p>
    <input type='submit' id='btn_1' value='view' name='submit'>
     </form> ";
}

}else{
    $data = "SELECT * FROM job_info";
    $query = mysqli_query($conn, $data);
    while ($row = mysqli_fetch_array($query)) {
    echo "<br> <form class='job-card' action='index.php' method='post'>
    <input type='hidden' name='id' value='$row[0]'>
    <input type='hidden' name='email' value='$row[7]'>
    <input type='hidden' name='worktype' value='$row[2]'>
    <h3 id='role'>$row[1]</h3>
    <h4 id=''>$row[4]</h4>
    <h5 id=''>$row[3]</h5>
    <p id='descrip'>$row[8]</p>
    <input type='submit' id='btn_1' value='view' name='submit'>
     </form> ";
}

}

?>      
 </div>
        

        <div class="job-desc-container">
          
       <?php 
if(isset($_POST['submit'])) {
$id = $_POST['id'];

connection();
$data = "SELECT * FROM job_info WHERE id = $id";
$query = mysqli_query($conn, $data);
while ($row = mysqli_fetch_array($query)) {
echo "
<br> <form  id='job-desc'>
<input type='hidden' name='' value='$row[0]'>
<h3 id='role'>$row[1]</h3>
<h4 id=''>$row[4]</h4>
<h5 id=''>$row[3]</h5>
<br>
<br>
<input type='button' id='btn_1' value='Apply' name='submit' onclick='login()'>

<br><br> 
<div class='job-detail-wrapper'>
<div class='job-detail-card'>
<br><br> 
<h4>Work type:<h5>$row[2]</h5></h4>
<br> 
<h4>Qualifications:<h5>$row[6]</h5></h4>
<br><br>
<h4>Responsibilities:<h5>$row[8]</h5></h4>
</div>
</div>
</form> 
";
}
}

?>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">

    </script>
    

</body>
<style>*,h3{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}
    .job-container {
        margin: auto;
        width: 95%;
        height: 100%;
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        padding: 20px;
    }

    .job-list-container,
    .job-desc-container {
        width: 100%;
        height: 100%;
        margin: 10px;
        margin-top: 70px;
        align-items: center;
    }

    .job-card {
        width: 80%;
        height: 100%;
        float: right;
        margin-bottom: 30px;
        border-radius: 5px;
        padding: 30px;
        box-shadow: 1px 1px 0px 2px rgba(0,0,0,0.2)  ; 
        transition: 0.3s;
        overflow: hidden;
  
    }.job-card:hover{
        box-shadow: 5px 8px 8px 8px  rgba(0,0,0,0.2) ; 
    }

    .job-desc-container {
        height:500px;
        position: sticky;
        top: 0;
        padding: 20px;
        /* Adjust this value to set the scroll point */
    }.job-list-container{
        padding: 20px;
    }
    .job-desc-card{
        width: 90%;
        height: 90%;
        background-color:white;
        border: #394ec5 solid 1px;
        padding: 10px;
        border-radius: 5px;
    }.nav-link{
        font-size: 20px;
        font-weight: 700;
        color: #394ec5;
    }#logos{
        width: 25px;
        height: 25px;
        margin: 5px;

    }a{
        text-decoration: none;
       
}.login-choice{
    padding-bottom: 50px;
    -moz-box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
    -webkit-box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
    box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
}#form_1{
width: auto;
}#login{
    display: none;
    margin-left: 20px;
    width: 400px;
    height: 250px;
    position:fixed;
    border-radius: 5px;
    box-shadow: 0px 1px 2px  rgba(0, 0, 0, 0.2);
    background-color: whitesmoke;
}.job-detail-card{
   width:100%;
    height: 100%;
    margin-top: 20px;
    border-top: solid 1px;
    padding: 10px;
    word-break: break-word;
    overflow: scroll;
}#job-desc {
  width: 100%;
  height: 850px;
  float: right;
  margin-bottom: 30px;
  border-radius: 5px;
  padding: 30px;
  box-shadow: 1px 1px 0px 2px rgba(0, 0, 0, 0.2);
  transition: 0.3s;
  padding-bottom: 50px;
  position: -webkit-sticky;
  top: 20px; /* Adjust the top value according to your layout */
} .job-desc-container {
        width: 100%;
        height: 100%;
        margin: 10px;
        align-items: center;

    }.job-detail-card::-webkit-scrollbar {
  display: none;
}.job-detail-wrapper{
    width:100%;
    height: 550px;
    padding: 10px;
    word-break: break-word;
    overflow: scroll;
}.job-detail-wrapper::-webkit-scrollbar {
  display: none;
}p{
    color: black;
}#btn_1{
    background-color: #394ec5;
    color: white;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}#descrip{
    height: 45px;
    overflow: hidden;
}

</style>
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
            var loginChoice = document.getElementById('login');

            if (loginChoice.style.display === "none" || loginChoice.style.display === "") {
                loginChoice.style.display = "flex"; // Show the element
            } else {
                loginChoice.style.display = "none"; // Hide the element
            }
        }

        function logInJobSeeker() {
            window.location.href = "LoginJobSeeker.php";
        }
        function logInEmployeer() {
            window.location.href = "LoginEmployeer.php";
        }

     
    </script>

</html>