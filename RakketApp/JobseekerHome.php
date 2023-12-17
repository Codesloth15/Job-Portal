
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

if(isset($_POST["delete"])){
  $id = $_POST['id'];
  connection();
  $sql = "DELETE FROM save_job WHERE USERID = '$id'";
  $query = mysqli_query($conn, $sql);
  echo "<script>alert('Done$id');</script>";
  echo"<script>window.location.href='JSSaveJobs.php'</script>";
}
?>
<?php 
if(isset($_POST['apply'])){
    $username = $_POST['username'];
    $email=$_SESSION['email'];
    $id = $_POST['id'];
    $job = $_POST['job'];
    $employeeEmail = $_POST['employeeEmail'];
    connection();
    $newData = "INSERT INTO alert(Employer_Email,Employee_Email,Employee_Id,job,username) VALUES ('$email', '$employeeEmail','$id','$job','$username')";
    $checkData ="SELECT * FROM employer";
    $validation =mysqli_query($conn,$newData);
    if($validation){
        echo"<script>alert('Success');</script>";
        echo"<script>window.location.href='JobseekerHome.php'</script>";
    }else{
        echo"<script>alert('account already exist');</script>";
        echo"<script>window.location.href='JobseekerHome.php'</script>";
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


    <div class="login-choice">
        <form id="form_1" class="form-container" action="JobseekerHome.php" method="post">
            <label for="input_1">What</label>
            <input type="text" id="input_1" name='jobName'placeholder="Job title"  required">
            <br>
            <label for="input_1">Where</label>
            <input type="text" id="input_1"  name='location' placeholder="City" required>
            <br>
            <input type="submit" id="btn_1" value="Search jobs" name="searchjob">
        </form>
    </div>
    <div class="job-container">
        <div class="job-list-container">
          
        <?php 

connection();
if(isset($_POST['searchjob'])){
    $jName = $_POST['jobName'];
    $data = "SELECT * FROM job_info WHERE TRIM(Role) = trim('$jName')";
$query = mysqli_query($conn, $data);
while ($row = mysqli_fetch_array($query)) {
    echo "<br> <form class='job-card' action='JobseekerHome.php' method='post'>
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
    echo "<br> <form class='job-card' action='JobseekerHome.php' method='post'>
    <input type='hidden' name='id' value='$row[0]'>
    <input type='hidden' name='email' value='$row[7]'>
    <input type='hidden' name='worktype' value='$row[2]'>
    <h3 id='role'>Role:   $row[1]</h3>
    <h4 id=''>Company:   $row[4]</h4>
    <h5 id=''>Location:   $row[3]</h5>
    <p id='descrip'>$row[8]</p>
    <input type='submit' id='btn_1' value='View' name='submit'>
     </form> ";
}
}

?>  
        </div>
      

        <div class="job-desc-container">
       
        <?php 
if(isset($_POST['submit'])) {
$id = $_POST['id'];
$email=$_SESSION['email'];
connection();
$data = "SELECT * FROM job_info WHERE id = $id";
$namedata = "SELECT * FROM user_info WHERE EMAIL = '$email'";

$querys = mysqli_query($conn, $namedata);
$nameof;
$query = mysqli_query($conn, $data);
while ($row = mysqli_fetch_array($querys)) {
    $nameof=$row[2].' '.$row[1];

}

while ($row = mysqli_fetch_array($query)) {
echo "
<br> <form  id='job-desc' action='JobseekerHome.php' method='post'>
<input type='hidden' name='id' value='$row[0]'>
<input type='hidden' name='employeeEmail' value='$row[7]'>
<input type='hidden' name='username' value='$nameof'>
<input type='hidden' name='job'  value='$row[1]'>
<h3 id='role' value='$row[1]'>$row[1]</h3>
<h4 id=''>$row[4]</h4>
<h5 id=''>$row[3]</h5>
<br>
<br>
<input type='submit' id='btn_1' value='Apply' name='apply'>
<input type='submit' class='btn_1' value='Save' name='save'>
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
<style>*{
        font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
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
    margin-left: 20px;
    width: 400px;
    height: 250px;
    position:fixed;
    border-radius: 5px;
    box-shadow: 0px 1px 2px  rgba(0, 0, 0, 0.2);
    background-color: whitesmoke;
}#login p{
    color: #394ec5;
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
    font-weight: 700;
    border: solid 2px #FFE477 ;
    background-color:  #394ec5;;
    color:white
}#btn_1{
  background-color:  #394ec5;;
    color:white;
    font-weight: 700;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif

}h3{
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}#descrip{
    height: 45px;
    overflow: hidden;
}

</style>


</html>