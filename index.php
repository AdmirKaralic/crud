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
<title>Welcome</title>
<head> 
<!--<link rel="stylesheet" href="style.css" type="text/css"/>-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin-top:50px;">
    <div class="col-md-12">
    <div class="modal-dialog" style="margin-bottom:0">
        <div class="modal-content" style="padding:5px;">
                    <div class="panel-heading">
                        <h1 class="panel-title text-center">Sign In</h1></br>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="submit" class="btn btn-sm btn-success">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
    </div>
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