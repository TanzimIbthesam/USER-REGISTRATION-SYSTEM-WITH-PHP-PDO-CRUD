<?php
include 'header.php';
include 'User.php';

?>
<?php
$user= new User;
if($_SERVER['REQUEST_METHOD']=='POST'  && isset($_POST['register'])){
    $userReg=$user->userRegistration($_POST);
}


?>
<div class="card ">
  <div class="card-body mx-auto">
    <h2>User Registration</h2>
  </div>
</div>
<?php
if(isset($userReg)){
   echo $userReg;
}

?>
<div class="container">
<div class="row">
<form action=""method="POST"class="mx-auto">
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control"name="name" id="name"  placeholder="Enter Your Name">

</div>
<div class="form-group">
    <label for="username">UserName</label>
    <input type="text" class="form-control"name="username" id="username"  placeholder="Enter Your UserName">

</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" name="email" id="email"  placeholder="Enter Your Email">

</div>
<div class="form-group">
    <label for="username">Password</label>
    <input type="password" class="form-control" name="password" id="password"  placeholder="Enter Your Password">

</div>
<button type="submit"name="register" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
