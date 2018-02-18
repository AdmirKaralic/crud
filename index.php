<?php
session_start();
if(isset($_SESSION['login_user'])){
 if($_SESSION['role']=='admin'){
 header('location:admin.php');
 }
 if($_SESSION['role']=='user'){
  header('location:user.php');
 }
 if($_SESSION['role']=='moderator'){
  header('location:moderator.php');
 }
}
 
?>
<html>
<title>Welcome to nesto</title>
<head> 
<!--<link rel="stylesheet" href="style.css" type="text/css"/>-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
<div class="col-lg-8 offset-lg-2">
<h2>PHP MySQL Admin,User and Moderator Multirole Login,Logout With SESSION</h2>

<form  method="POST" action="">
<div class="form-group">
<label>UserName:</label><br/>
<input class="form-control" type="text" name="username"/><br/>
<label>PassWord:</label><br/>
<input class="form-control" type="password" name="password"/><br/>
<input type="submit" name="submit" value="LogIn"/>
</div>
</form>
</div>
</div>



<?php
include("connect.php");
if(isset($_POST['submit'])){
 $username=$_POST['username'];
 $password=$_POST['password'];
 //Protect MySQL Injection
 $username=stripcslashes($username);
 $username=mysql_real_escape_string($username);
 $username=htmlspecialchars($username);
  
 $password=stripcslashes($password);
 $password=mysql_real_escape_string($password);
 $password=htmlspecialchars($password);
 //Run Query to Database
 $sql="SELECT*FROM korisnici WHERE username='$username' AND password='$password'";
 $result=mysql_query($sql);
 //Counting Numbers of MySQL row [if user Found row must be 1]
 $row=mysql_num_rows($result);
 //Fetching User Informaiton from Database
 $userinfo=mysql_fetch_assoc($result);
 $role=$userinfo['role'];
  
 if($row==1){
  //Initilizing SESSION with Differents user Role
  $_SESSION['login_user']=$username;
  $_SESSION['role']=$role;
  if($role=='admin'){
    
    
  header('location:admin.php');
  }
  if($role=='user'){
    
  header('location:user.php');
  }
  if($role=='moderator'){
  header('location:moderator.php');
  }
   
   
 }else{
  echo "No User Found by Given Information";
 }
  
}
 
?>