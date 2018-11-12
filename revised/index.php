<?php
include 'header.php';
include 'User.php';
Session::Checksession();
$user= new User();
?>
<?php
    $loginmsg=Session::get("loginmsg");
    if(isset($loginmsg)){
    echo $loginmsg;
}
Session::set("loginmsg",NULL);
?>

<div class="card ">
  <div class="card-body mx-auto">
    <h2><span> <strong>Welcome</strong>
    <?php
    $username=Session::get("username");
    if(isset($username)){
      echo $username;
    }

    ?>
</span></h2>
  </div>
</div>
 
   <div class="container">
       <div class="row">
           
               
               <table class="table">
         <thead>
    
          <th scope="col">Serial No</th>
          <th scope="col">Name</th>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <th scope="col">Action</th>
    <?php
  $user=new User();
  $userdata=$user->getUserData();
  if($userdata) {
    $i=0;
    foreach($userdata as $sdata){
   $i++;
    

      
  ?>
    <tr>
       <td><?php echo $i; ?></td>
      <td><?php echo $sdata['name']; ?></td>
      <td><?php echo $sdata['username']; ?></td>
      <td><?php echo $sdata['email'];?></td>
      <td><a class="btn btn-primary" href="Profile.php?id=<?php echo $sdata['id'];?>">View</a></td>
    </tr>
    <?php } }else{?>
      <tr><td><h2>User Data Found</h2></td></tr>
    <?php }?>
    
    
    
    
        </thead>
</table>
               
         
           </div>
       
       </div>
 



<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    
</body>
<!--<th scope="row">1</th>
