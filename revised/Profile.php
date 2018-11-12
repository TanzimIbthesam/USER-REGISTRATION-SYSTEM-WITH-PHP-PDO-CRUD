<?php
include 'header.php';
include 'User.php';
Session::Checksession();

?>
<?php
if(isset($_GET['id'])){
    $userid =(int)$_GET['id'];
}
$user=new User();
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])){
   $updateuser= $user->updateUserData($userid,$_POST);
}
?>
<div class="card ">
<span><a href="index.php">Go Back</a></span>
  <div class="card-body mx-auto">
  
    <h2>Update Profile</h2>
   
  </div>
</div>
<div class="container">
<div class="row">
<?php
if(isset($updateuser)){
    echo $updateuser;
}
?>
<?php $userdata=$user->getUserByid($userid);
if($userdata){ 
 ?>
<form action=""method="POST"class="mx-auto">
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name"  placeholder="Enter Your Name" value="<?php echo $userdata->name;?>"/>

</div>
<div class="form-group">
    <label for="username">UserName</label>
    <input type="text" class="form-control" id="username" name="username"  placeholder="Enter Your UserName" value="<?php echo $userdata->username;?>">

</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" name="email"  placeholder="Enter Your Email"value="<?php echo $userdata->email;?>">

</div>
<button type="submit"name="update" class="btn btn-primary">Update</button>


<?php } ?>





</form>
<!--
<//?php } ?>
<//?php
/*
$sesId=Session::get("id");
if($sesId==$userid){ 
?>
-->
