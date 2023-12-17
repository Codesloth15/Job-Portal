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
    <a class="navbar-brand" href="JobseekerHome.php"><img src="img-resource/Raket.png" id="logo"></a>
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
    <div class="login-choice">
        <form id="form_1" class="form-container" action="#" method="post">
            <label for="input_1">What</label>
            <input type="text" id="input_1" placeholder="Job title, keyword">
            <br>
            <label for="input_1">Where</label>
            <input type="text" id="input_1" placeholder="City, District, State">
            <br>
            <input type="submit" id="btn_1" value="Search jobs">
        </form>
    </div>
    <div class="Profile-container">
        <div class="side-menu">
            <div class="pro-card">
             <h4 >My Account</h4>
            <a href="./JSCreateProfile.php"><h2>Profile </h2></a> 
            <a href="#"><h2>Alert</h2></a>  
            <a href="JSSaveJobs.php"><h2>Jobs</h2></a>
            <a href="JSSettings.php"><h2 >Settings</h2></a> 
            <a href="JSDelete.php"><h2>Delete Account</h2></a> 

            </div>
         
        </div>
    
        <div class="create-prof">
            <h1>Edit settings</h1>
            <form class="form-horizontal">
                <label for="first-name">Email</label>
                <br>
                <input type="text" id="first-name" class="input-area" autocomplete="off" >
                <br>
                <br>
                <label for="first-name" >Password</label>
                <br>
                <input type="text" id="first-name" class="input-area" autocomplete="off">
                <br>
                <br>
                <label for="first-name" >Current Password</label>
                <br>
                <input type="text" id="first-name" class="input-area" >
                <br>
                <br>
                <br>
                <input type="submit" id="submit" class="btn btn-primary">
                <a href="./JobseekerHome.php">
                    <input type="button" id="submit" value="cancel" class="btn btn-primary">
                </a>
            </form>
           
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
      .nav-link{
            font-size: 20px;
            font-weight: 700;
            color: #394ec5;
        }#logo{
            width: 90px;
            height: 80px;
            margin: 5px;
            margin-left: 50px;
    
        }.side-menu{
            width: 350px;
            height: 100%px;
            margin-left: 125px;
        }.create-prof{
            width: 750px;
            height: 100%px;
            margin-left: 80px;
            margin-top: 50px;
        }.Profile-container{
            padding: 10px;
            width:100%;
             height: 750px;
            display: flex;
            flex-direction: row;
        }.pro-card{
            height: 600px;
            border: solid 0.1px;
            border-radius: 10px;
        }.pro-card h4{
     
            text-align: center;
            padding: 10px;
            color: rgb(255, 255, 255);
            border-radius: 10px 10px 0px 0px;
            background-color: rgb(145, 145, 145);
        }.input-area{
            width: 90%;
            height: 60px;
            border-radius: 5px;
            border: solid 0.5px;
            font-size: 25px;
            padding: 10px;
            padding-left:15px ;
        }.form-horizontal label{
            font-size: 25px;
        }.create-prof h1{
            margin-bottom: 25px;
            font-size: 35px;
            color: rgb(255, 42, 0);
        }footer{
        height: 400px;
        }h2{
           border-bottom: solid 0.5px;
           font-size: 20px;
           padding: 5px;
           margin-left: 20px;
           margin-right: 40px;
           margin-top: 40px;
        
        }h2:hover{
            border-bottom: blue solid 3px;
           font-size: 20px;
           padding: 5px;
           margin-left: 20px;
           margin-right: 40px;
           margin-top: 40px;
           color: blue;
         
        } .nav-link{
     
            font-size: 18px;
        }   .form-container{
        margin-top: 10px;
        border-bottom: solid 0.5px;

    }a{
        text-decoration: none;
    }#form_1{
width: auto;
}
    </style>
 



</html>