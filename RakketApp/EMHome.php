
<?php  session_start(); 
include "db.php";
if(isset($_POST['save'])){
 $id = $_POST['id'];
 $email=$_SESSION['email'];
 connection();
 $save ="INSERT INTO save_job(EMAIL,USERID) VALUES ('$email','$id')";
 $query =mysqli_query($conn, $save);
 echo"<script>window.location.href='JobseekerHome.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>HOME</title>
</head>

<body>
<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4"><h1 >RAKKET</h1></span>
      </a>

      <ul class="nav nav-pills">
      <li class="nav-item">
          <a class="nav-link"  href="EMHire.php"><img src="img-resource/briefcase.png" id="logos">Jobs </a>
        </li>
        <li class="nav-item">
        <a class="nav-link"  href="EMAlert.php"><img src="img-resource/bell.png" id="logos">Alert</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="EMHome.php"><img src="img-resource/employee.png" id="logos">Hire</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" onclick="logout()"><img src="img-resource/logout.png" id="logos">Logout </a>
        </li>
      </ul>
    </header>

    <div class="login-choice">
        <form id="form_1" class="form-container" action="EMHome.php" method="post">
            <label for="input_1">What</label>
            <input type="text" id="input_1" name='jobName' placeholder="Job title, keyword">
            <br>
            <label for="input_1">Where</label>
            <input type="text" id="input_1" name='jcity'placeholder="City, District, State">
            <br>
            <input type="submit" id="btn_1" value="Search jobs">
        </form>
    </div>


    <div class="job-container">
        <div class="job-list-container">
          
        <?php 
if(isset($_POST['role'])){
connection();
$jcity = $_POST['jcity'];
$jName = $_POST['jobName'];
$data = "SELECT * FROM promote_user WHERE TRIM(Skill) = TRIM('$jName') AND TRIM(City) = TRIM('$jcity')";
$query = mysqli_query($conn, $data);
while ($row = mysqli_fetch_array($query)) {
    echo "<br> <form class='job-card' action='EMHome.php' method='post'>
    <div class='save-container'  >
    </div>
    <input type='hidden' name='id' value='$row[0]'>
    <h3 id='role'>Role:  $row[3]</h3>
    <h4 id='EmployerName'>Name:   $row[1]</h4>
    <h5>$row[5],$row[6],$row[7]</h5><br><br>
    <p id=''>$row[8]</p>
    <br>
    <input type='submit'  class='btn_1' value='View' name='submit'>
     </form> ";
}
}else{
connection();
$data = "SELECT * FROM  promote_user";
$query = mysqli_query($conn, $data);
while ($row = mysqli_fetch_array($query)) {
    echo "<br> <form class='job-card' action='EMHome.php' method='post'>
    <div class='save-container'  >
    </div>
    <input type='hidden' name='id' value='$row[0]'>
    <h3 id='role'>Role:  $row[3]</h3>
    <h4 id='EmployerName'>Name:   $row[1]</h4>
    <h5>$row[5],$row[6],$row[7]</h5><br><br>
    <p id=''>$row[8]</p>
    <br>
    <input type='submit'  class='btn_1' value='View' name='submit'>
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
$data = "SELECT * FROM promote_user WHERE id = $id";
$query = mysqli_query($conn, $data);
while ($row = mysqli_fetch_array($query)) {
echo "
<br> <form  id='job-desc' action='EMAlert.php' method='post'>
<input type='hidden' name='id' value='$row[0]'>
<input type='hidden' name='employeremail' value='$row[9]'>
<h2 id='role'>Role:$row[3]</h2>
<h3 id=''>Name:$row[1]</h3>
<h5>$row[5],$row[6],$row[7]</h5>
<br>
<br>
<input type='submit' id='btn_1' value='Hire' name='hire'>
<a href='https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=$row[9]' target='_blank'><input type='submit' class='btn_1' value='View Profile' name='profile'></a>
<a href='https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=$row[9]' target='_blank'><input type='button' class='btn_1' value='Email' name='save'></a>
<br><br> 
<div class='job-detail-wrapper'>
<div class='job-detail-card'>
<br><br> 
<h4>Skills:<h5>$row[6]</h5></h4>
<br><br>
<h4>Description:<h5>$row[8]</h5></h4>
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>


function logout() {
    var x = confirm("Are you sure you want to log out");
    if (x) {
        // If the user confirms, call a PHP script to end the session and redirect
        window.location.href = "logout.php";
    }
}






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


        function Hire() {
       
            window.location.href = "EMHire.php";
            
        }
       
        var card = document.querySelectorAll("rd");
        var role = document.getElementById("role").innerHTML;
        var roleDesc =document.getElementById("role-desc");
        $(document).ready(function() {
      // Add a click event listener to the image with ID 'save'
      $('#save').click(function() {
        var saveImage = $(this);

        if (saveImage.attr('src').endsWith('unsave.png')) {
          saveImage.attr('src', 'img-resource/save.png');
        } else {
          saveImage.attr('src', 'img-resource/unsave.png');
        }
      });
    });
  </script>
  

    </script>

    <script src="./function.js">

    </script>
</body>
<style>
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
    margin-left: 20px;
    width: 400px;
    height: 250px;
    position:fixed;
    border-radius: 5px;
    box-shadow: 0px 1px 2px  rgba(0, 0, 0, 0.2);
    background-color: whitesmoke;
}#login p{
    color: #394ec5;
}h3{
    color: #394ec5;
}h4{
    color:red;
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
}#save{
    width: 30px;
    height: 30px;
    float: right;

}.save-container{
    width: 100%;
    padding: 10px;
}#save_btn{
  background-color: transparent;
  border: transparent;
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
}#btn_1,.btn_1{
  background-color: #394ec5;
    color: white;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}h1,h2,h3,h4,h5,h6{
  color: black;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}p{
  height: 70px;
  overflow: hidden;
}
</style>


</html>