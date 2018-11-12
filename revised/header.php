<?php
$filepath=realpath(dirname(__FILE__));
include_once $filepath.'/Session.php';
//Session::init();
//echo $filepath;
//include 'Session.php';
//include_once(dirname(__FILE__) . '/Session.php'); 
Session::init();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN REGISTER SYTEM WITH PHP</title>
     <link rel="stylesheet" href="inc/bootstrap.min.css">
     
     <link rel="stylesheet" href="inc/style.css">
</head>
<?php
if(isset($_GET['action']) &&  $_GET['action']=="logout"){
   Session::destroy();
}
?>
<body>
<div class="container">
          <div class="row">
          <div class="card mx-auto">
                <div class="card-body ">
                <h2><strong>Login Register System with PHP and PDO</strong></span></h2>
                </div>
                </div>

       </div>
   </div>

<div class="nav-menu">
            <nav class="navbar navbar-expand-md navbar-dark">
                <div class="container">
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
                    <div class="navbar-collapse collapse" id="navbarResponsive">
                        
                            
                            <ul class="navbar-nav mx-auto">
                            <?php
                            $id=Session::get("id");
                            $userlogin=Session::get("login");
                            if($userlogin==true){
                                ?>
                            <li class="nav-item"><a class="nav-link" href="Profile.php?id=<?php echo $id;?>">Profile</a></li> 
                            <li class="nav-item">
                                <a class="nav-link" href="?action=logout">LogOut</a>
                            </li>
                            <?php }else { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="Login.php">LogIn</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Register.php">Register</a>
                            </li>
                            <?php }?>

                           
                           
                        </ul>
                        
                        </div>
                        </div>
                    </nav>
                    </div>
                

   <script

 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>

    
</body>
