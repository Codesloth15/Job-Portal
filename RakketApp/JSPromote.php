
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
    $data = "INSERT INTO job_info(Role,WT,Address,EmployerNAme,Requirements,Qualification,Job_desc) VALUES ('$role','$worktime','$address','$company','$qualification','$requirements','$description')";
      
    $query = mysqli_query($conn, $data);
    if($query){
        echo"<script>alert('success');'</script>";
        echo"<script>window.location.href='EMHome.php'</script>";
    }else{
        echo"<script>alert('fail');'</script>";
    }
}


if(isset($_POST['promote'])){
          
          $name = $_POST['name'];
          $age = $_POST['age'];
          $skills = $_POST['skills'];
          $experience = $_POST['experience'];
          $Brgy= $_POST['Brgy'];
          $City = $_POST['City'];
          $Province = $_POST['Province'];
          $description = $_POST['description'];
          connection();
          $emails=$_SESSION['email'];
          $sql = "INSERT INTO promote_user (Full_Name, Age, Skill, Experience, Brgy, City, Province, Descr, Email) VALUES ('$name', '$age', '$skills', '$experience', '$Brgy', '$City', '$Province', '$description','$emails')";
          $querys = mysqli_query($conn, $sql);
          if($querys){
              echo"<script>alert('success');'</script>";
              sleep(5);
              echo"<script>window.location.href='JobseekerHome.php'</script>";
          }else{
              echo"<script>alert('fail');'</script>";
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
          <form action="JSPromote.php" method="post">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required>
        
        <br>
        
        <br>
        <label for="name">Age:</label>
        <input type="text" id="name" name="age" required>

        <br>
        
        <br>
        <label for="skills">Skills:</label>
        <input type="text" id="skills" name="skills" required>

        <br>
        
        <br>
        <label for="experience">Years of Experience:</label>
        <input type="text" id="experience" name="experience" required>

        <br>
        
        <br>
        <label for="location">Location:</label>
        <input type="text" id="location" placeholder=" Brgy." name="Brgy" required>
        <input type="text" id="location"  placeholder=" City." name="City" required>
        <input type="text" id="location"   placeholder=" Province." name="Province" required>

        <br>
        
        <br>
        <label for="description">Brief Description:</label>
        <textarea id="description" name="description" rows="4" required></textarea>

        <button type="submit" name="promote">Submit</button>
    </form>
    </div>

    </div>
    <div id="footer">

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
            var x = confirm("Are you sure you want to log out");
    if (x) {
        // If the user confirms, call a PHP script to end the session and redirect
        window.location.href = "logout.php";
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
            margin: 0 auto;
            padding: 20px;
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
          
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
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
        }.login-choice{
            width: 500px;
            margin: auto;
            padding: 40px;
        }
</style>


</html>