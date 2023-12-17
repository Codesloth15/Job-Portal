<?php include "db.php"; 


if(isset($_POST['submit'])){
  $Fname = $_POST['Fname'];
  $phone = $_POST['phone'];
  $Lname = $_POST['Lname']; 
  $Service = $_POST['Service'];
  $Bio = $_POST['Bio'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    connection();
    $newData = "INSERT INTO user_info(FIRST_NAME,LAST_NAME,SKILL,BIO,EMAIL,PASSWORD,PH) VALUES ('$Fname','$Lname','$Service','$Bio','$email', '$password','$phone')";
    $checkData ="SELECT * FROM user_info";
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
        echo"<script>window.location.href='LoginJobSeeker.php'</script>";
    }else{
        echo"<script>alert('account already exist');</script>";
        echo"<script>window.location.href='createJobseekerAccount.php'</script>";
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
        <form id="form_1" class="form-container" action="createJobseekerAccount.php" method="post">
    <h1 style="margin-bottom:10px;">Create an account as a jobseeker</h1>
    <div id='info'>
    <input type="text" id="input_1s" name="Fname" placeholder="First Name" required>
            
            <input type="text" id="input_1s"name="Lname" placeholder="Last Name" required>
         
    </div>
    <br>
            <input type="text" id="input_1"name="Service" placeholder="Service" required>
            <br>
            <textarea id="input_1"name="Bio" value="Enter Bio"placeholder='Bio(optional)' name='bio'></textarea>
            <br>
            <input type="email" id="input_1"name="email" placeholder="Enter email" required>
            <br>
            <input type="tel" id="input_1" name="phone" placeholder="Phone number" >
            <br>
            <input type="password" id="input_1"name="password" placeholder="Enter password" required>
            <br>
            <input type="submit" id="btn_2" name="submit" value="Create account">

            <h4 style="text-align: center; font-size: 15px;">Dont have na account?<a href="LoginJobSeeker.php" >Sign in</a></h4>
           </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">

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

}a {
  text-decoration: none;
}#info{
  width: 100%;
  display: flex;
  flex-direction: row;
}#input_1s{
   width: 750px;
    height: 45px;
    padding-left: 10px;
    border-radius: 5px;
    border: solid 1px rgb(111, 111, 111) !important;
}
</style>
</html>