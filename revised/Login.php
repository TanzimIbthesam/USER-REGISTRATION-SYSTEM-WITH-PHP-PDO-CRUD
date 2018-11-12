<?php
include 'header.php';
include  'User.php';
Session::LogInsession();

?>
<?php
$user= new User;
if($_SERVER['REQUEST_METHOD']=='POST'  && isset($_POST['login'])){
    $userLog=$user->userLogin($_POST);
}
?>
<div class="card ">
  <div class="card-body mx-auto">
    <h2>User Login</h2>
  </div>
</div>
<?php
if(isset($userLog)){
   echo $userLog;
}
?>

<div class="container">
<div class="row">
<form method="POST"class="mx-auto">
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>
  
  <button type="submit"name="login" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
