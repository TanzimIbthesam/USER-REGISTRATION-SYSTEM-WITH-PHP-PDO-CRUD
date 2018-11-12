<?php
include_once 'Session.php';
include 'Database.php';

class User{
    
    private $db;
    public function __construct(){
        $this->db=new Database;
    }
    public function userRegistration($data){
        $name= $data['name'];
        $username= $data['username'];
        $email= $data['email'];
        $password= md5($data['password']);

        $chk_email=$this->emailCheck($email);

        if ($name=="" OR $username=="" OR $email =="" OR $password ==""){
            $msg="<div class='alert alert-danger' role='alert'>
            Please fill out the required fields
          </div>";
          return $msg;
        }
        if(strlen($username)<3){
            $msg="<div class='alert alert-danger' role='alert'>
           Your username is too short;
          </div>";
          return $msg;
        } elseif (preg_match('/[^a-z0-9_-]+/i', $username)){
            $msg="<div class='alert alert-danger'role='alert'>
            <strong>ERROR</strong>Username must only contain alphanumerical,dashes and underscores
          </div>";
        }
        if(filter_var($email,FILTER_VALIDATE_EMAIL)===false){
            $msg="<div class='alert alert-danger'role='alert'>
            <strong>ERROR</strong>Email address is not valid
          </div>";
          return $msg;
        }
        if($chk_email == true){
            $msg="<div class='alert alert-danger'role='alert'>
            <strong>ERROR</strong>Email address already exists
          </div>";
          return $msg;
        }
        $sql="INSERT INTO student_table(name,username,email,password) VALUES(:name,:username,:email,:password)";
        $query=$this->db->pdo->prepare($sql);
         $query->bindValue(':name',$name);
        $query->bindValue(':username',$username); 
        $query->bindValue(':email',$email);
        $query->bindValue(':password',$password);
        $result=$query->execute();
        if($result){
            
            $msg="<div class='alert alert-primary 'role='alert'>
            <strong>Success</strong>Thank you You have been registered
          </div>";
          return $msg;
        }else{
            $msg="<div class='alert alert-danger'role='alert'>
            <strong>Sorry</strong>You Have not been registered
          </div>";
        }
        
        
    }
    
    public function emailCheck($email){
      $sql="SELECT email from student_table WHERE email=:email";
      $query=$this->db->pdo->prepare($sql);
      $query->bindValue(':email',$email);
      
      $query->execute();
      if($query->rowCount()>0){
          return true;
      }else{
          return false;
      }
    }
    public function getLoginuser($email,$password){
      $sql="SELECT email from student_table WHERE email=:email AND password=:password LIMIT 1";
      $query=$this->db->pdo->prepare($sql);
      $query->bindValue(':email',$email);
      $query->bindValue(':password',$password);
      $query->execute();
      $result=$query->fetch(PDO::FETCH_OBJ);
      return $result;

    }
    public function userLogin($data){
        $email= $data['email'];
        $password= md5($data['password']);
        $chk_email=$this->emailCheck($email);

        if ( $email =="" OR $password ==""){
            $msg="<div class='alert alert-danger' role='alert'>
            Please fill out the required fields
          </div>";
          return $msg;
        }
        if(filter_var($email,FILTER_VALIDATE_EMAIL)===false){
            $msg="<div class='alert alert-danger'role='alert'>
            <strong>ERROR</strong>Email address is not valid
          </div>";
          return $msg;

    }
    if($chk_email === false){
        $msg="<div class='alert alert-danger'role='alert'>
        <strong>ERROR</strong>Email address not correct
      </div>";
      return $msg;
    }
    $result=$this->getLoginuser($email,$password);
    if($result){
        Session::init();
        Session::set("login",true);
        Session::set("id",$result->id);
        Session::set("name",$result->name);
        Session::set("username",$result->username);
        Session::set("loginmsg", "<div class='alert alert-success'role='alert'>
        <strong>SUCCESS</strong>You are logged in
      </div>");
     
      
      header("Location:index.php");

    }else{
        $msg="<div class='alert alert-danger'role='alert'>
            <strong>ERROR</strong>Data not found
          </div>";
          return $msg;
    }

} 
public function getUserData(){
    $sql="SELECT * FROM student_table ORDER BY id DESC";
    $query=$this->db->pdo->prepare($sql);
    $query->execute();
    $result=$query->fetchAll();
    return $result;
}
public function getUserById($id){
    $sql="SELECT * FROM student_table WHERE id = :id LIMIT 1";
    $query=$this->db->pdo->prepare($sql);
    $query->bindValue(':id',$id);
    $query->execute();
    $result=$query->fetch(PDO::FETCH_OBJ);
    return $result;
}
  public function updateUserData($id,$data){
   $name= $data['name'];
   $username= $data['username'];
   $email= $data['email']; 
   if ($name=="" OR $username=="" OR $email==""){
            $msg="<div class='alert alert-danger' role='alert'>
            Please fill out the required fields
          </div>";
          return $msg;
        }
      $sql="UPDATE student_table SET 
      name=:name,
      username=:username,
      email=:email 
      WHERE id=:id";
        $query=$this->db->pdo->prepare($sql);
         $query->bindValue(':name',$name);
        $query->bindValue(':username',$username); 
        $query->bindValue(':email',$email);
        $query->bindValue(':id',$id);
        $result=$query->execute();
        if($result){
            
            $msg="<div class='alert alert-primary 'role='alert'>
            <strong>Success</strong>Your Information has been updated
          </div>";
          return $msg;
        }else{
            $msg="<div class='alert alert-danger'role='alert'>
            <strong>Sorry</strong>Sorry Your information is not updated.Please try again.
          </div>";
          return $msg;
        }
      
    
        
        
  
  
  
  }
  }
?>

          
          

     




