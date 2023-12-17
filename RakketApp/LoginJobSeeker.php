<?php   session_start(); include "db.php";
  if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    connection();
    if( !$email == ''){
    $checkData ="SELECT * FROM user_info";
    $validation = false;
    $query = mysqli_query($conn,$checkData);
    while($row = mysqli_fetch_array($query)){
        if($row['EMAIL'] == $email && $row['PASSWORD'] == $password){
           $validation =true;
           $_SESSION['email'] = $row['EMAIL']; 
           break;
        }
    }

    if($validation){
        $_SESSION['email'] = $row['EMAIL']; 
        $data = $_SESSION['email'];
            echo"<script>alert('Welcome');</script>";
            echo"<script>window.location.href='JobseekerHome.php'</script>";
    }else{
        echo"<script>alert('Account does not exist');</script>";
        echo"<script>window.location.href='LoginJobSeeker.php'</script>";
    }

  }else{
    echo"<script>alert('Empty Form');</script>";
    echo"<script>window.location.href='LoginJobSeeker.php'</script>";
  }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="style.2.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <div class="container-fluid">
 

  <a href='index.php'><h1>RAKKET</h1></a> 

  </div>
</nav>

    <div class="login-choice">
        <form id="form_1" class="form-container" action="LoginJobSeeker.php" method="post">
    <h1 style="margin-bottom:10px;">Jobseeker log in</h1>
            <input type="email" id="input_1" name="email" placeholder="Enter your email" >
            <br>
            <input type="password" id="input_1" name="password"  placeholder="Enter password">
            <br>
            <input type="submit" id="btn_2" name="submit" value="log in">
            <input type="button" id="btn_2" value="Search jobs" onclick="home()">
            <h4 style="text-align: center; font-size: 15px;">Already have an account?<a href="createJobseekerAccount.php">Sign up</a></h4>
           </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
   

</script>
<script>
    function home() {
            window.location.href = "index.php";
        }
</script>
</body>
<style>*{
  font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif ;
}
    html, body {
        margin: 0;
  padding: 0;
    }
    .nav-bars{
width: 100%;
height: 60px;
background-color: bisque;
align-items: center;
margin: 0%;
display: flex;
justify-content: center;
}#logos{
    width: 100px;
    margin: auto;
}.cont{
   width: 100%;
    text-align: center;
}#form_1{
    width: 750px;
}.container-fluid{
   display: flex;
   justify-content: center
}h1{
  font-size: 85px;
  color: #394ec5;
  font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif ;
}#btn_1,#btn_2{
  background-color: #394ec5;
  color: white;
  font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif ;
  font-size: 24px;
  font-weight: 700px;

}a{
  text-decoration: none;
}
</style>

</html>