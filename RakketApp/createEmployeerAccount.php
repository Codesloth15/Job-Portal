<?php include "db.php"; 

if(isset($_POST['submit'])){
    $companyname = $_POST['companyname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    connection();
    $newData = "INSERT INTO employer(EMAIL,PASSWORD,companyname) VALUES ('$email', '$password','$companyname')";
    $checkData ="SELECT * FROM employer";
    $validation = true;
    $query = mysqli_query($conn,$checkData);
    while($row = mysqli_fetch_array($query)){
        if($row['EMAIL'] == $email){
           $validation =false;
           break;
        }
    }

    if($validation){
        mysqli_query($conn,$newData);
        echo"<script>alert('Success');</script>";
        echo"<script>window.location.href='LoginEmployeer.php'</script>";
    }else{
        echo"<script>alert('account already exist');</script>";
        echo"<script>window.location.href='createEmployeerAccount.php'</script>";
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
        <form id="form_1" class="form-container" action="createEmployeerAccount.php" method="post">
    <h2 style="margin-bottom:10px;">Create an account as a Employer</h2>
          <input type="text" id="input_1" name="companyname" placeholder="Enter your name or (company/org)" required>
            <br>
            <input type="text" id="input_1" name="email" placeholder="Enter your email" required>
            <br>
            <input type="password" id="input_1"name="password" placeholder="Enter password" required>
            <br>
            <input type="submit" id="btn_2" name="submit" value="Create account">
            <h4 style="text-align: center; font-size: 15px;">Dont have na account?<a href="LoginEmployeer.php" >Sign in</a></h4>
           </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">

</script>
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
justify-content: center;
}#logos{
    width: 100px;
}.cont{
   width: 100%;
    text-align: center;
}#form_1{
    width: 750px;
}h1{
    margin: auto;
    text-align: center;
    margin-top: 90px;
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
</body>

</html>