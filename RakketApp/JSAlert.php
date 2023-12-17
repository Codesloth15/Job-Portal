
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
    <title>HOME</title>
</head>

<body>
<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4"><h1 >RAKKET</h1></span>
      </a>

      <ul class="nav nav-pills">
      <li class="nav-item"> <a class="nav-link"  href="./JSCreateProfile.php"><img src="img-resource/user .png" id="logos">Profile  </a>     </li>
      <li class="nav-item">       <a class="nav-link"  href="job.php"><img src="img-resource/bell.png" id="logos">Alert  </a>    </li>
      <li class="nav-item">          <a class="nav-link" href="JSPromote.php"><img src="img-resource/approved.png" id="logos">Promote</a>    </li>
        <li class="nav-item">        <a class="nav-link" onclick="logOutJobSeeker()"><img src="img-resource/logout.png" id="logos">Logout </a></li>
        <li class="nav-item"><a href="#" class="nav-link">......</a></li>
      </ul>
    </header>



      <div id='container-con'>

   
    <div class="container">
    <h1 id="hii">Interested Employers:</h1>
               <?php  connection();
$email=$_SESSION['email'];
$data = "SELECT * FROM hire";
$querys = mysqli_query($conn, $data);

while ($row = mysqli_fetch_array($querys)) { 
          echo "<br> 
          <form class='job-card' action='JSAlert.php' method='post'>
          <input type='hidden' name='id' value='$row[0]'>
          <input type='hidden' name='EmployerName' value='$row[2]'> <!-- Assuming $row[2] is the correct index -->
          <h1>$row[3]</h1>
          <h5 id='role'>$row[1]</h5>
          <div id='email'>
              <a href='https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=$row[1]' target='_blank'>
                  <input type='button' class='btn_1' value='Email' name='profile'>
              </a>
              <input type='submit' class='btn_1' value='Remove' name='deleteJob'>
          </div>
          </form>";
      
    
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


        function logOutJobSeeker() {
            var Confirm = confirm("Are you sure you want to log out?");
            if(Confirm){
            window.location.href = "index.php";
            }
        }
       
        var card = document.querySelectorAll("job-card");
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
        width: 90%;
        height: 450px;
        margin: auto;
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
}   body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            height: 700px;
            margin: 0 auto;
            padding: 20px;
            overflow: scroll;
            border: 1px solid #ccc;
            background-color:white;
            border-radius: 10px;
            color: #394ec5;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        select {
            height: 40px;
        }
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }#btn_1{
            background-color: #394ec5;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: white;
        }.btn_1{
            background-color: #394ec5;
            color: white;
        }.job-card{
            height: 240px;
            
        }#container-con{
            margin-left: 100px;
            width: 90%;
            height: 1200px;
            display: flex;
            flex-direction: row;
            height: 90%;
        }#container{
            margin-top: 40px;
           width: 100%;
           margin-left: 50px;
           text-align: center;
           padding: 20px;
           height: 600px;
           box-shadow: 0px 1px 2px  rgba(0, 0, 0, 0.2);
           justify-content: center;
        }#pr{
    width: 120px;
    height: 120px;
}#Service{
    font-size: 25;
}#btn_3{
    margin: 10px;
    width: 130px;
    height: 40px;
    border-radius: 5px;
    background-color: #394ec5;
    color: white;
}h3,p,h4,h5{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    color: black;
}#email{
    display: flex;
    justify-content: center;
    flex-direction: row;
}#bio{
   text-align: center;
}#ps{
    width: 25px;
    height: 25px;
    margin-left: 5px;
    margin-right: 3px;
}h1{
          font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
          color: black;
}#email{
          margin-top: 20px;
}a{
          margin-right: 20px;
          color: white;
}#hii{
         color: #394ec5;
}
</style>


</html>