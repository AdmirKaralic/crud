<?php
include("session.php");
if($login_role=='user'){
 header('location:user.php');
}
if($login_role=='moderator'){
 header('location:moderator.php');
}
?>
<html>
<title>Welcome to nesto</title>
<head> 
<!--<link rel="stylesheet" href="style.css" type="text/css"/>-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin-top:10px;">



<div class="jumbotron" style="padding:20px;">
<h1 class="display-4 text-center">Welcome To <?php echo $login_role;?> Page</h1>
 <hr class="my-4">
<div class="container">
<p class="lead">User name is: <strong style="text-transform:uppercase;"><?php echo $login_session;?></strong> and Your Role is :<strong style="text-transform:uppercase;"><?php echo $login_role;?></strong></p>
<a class="btn btn-outline-primary btn-xs" role="button" id="logout" href="logout.php">Logout</a>
<a class="btn btn-outline-primary btn-xs" style="float:right;" role="button"  href="add.php">Add New User</a>
</div>
</div>
<div class="col-lg-12 col-xs-12 text-center">
<?php
if($login_role=='admin'){
 $sql="SELECT id, username, imeprezime, email, dob, adresa from korisnici where not id=$login_id order by id";
$upit1=mysql_query($sql);
?>
<div class="alert alert-secondary" role="alert">
  <h3>Lista korisnika iz baze </h3>
</div>

<div class="row">
  <?php
while($upit2=mysql_fetch_assoc($upit1))
{
  ?>
  
  <div class="col-md-4">
    <div style="border:1px solid #000;margin:6px -8px; box-sizing: border-box; padding: 5px;">
         <h3><small>Id: <?php echo $upit2['id'];?> </small> - <?php echo $upit2['imeprezime'];?></h3>
    <hr class="my-4">
    <p><strong>Username: </strong> <?php echo $upit2['username'];?></p>
    <p><strong>Email: </strong> <?php echo $upit2['email'];?></p>
    <p><strong>Address: </strong> <?php echo $upit2['adresa'];?></p>
    <p><strong>Date of Birth: </strong> <?php echo $upit2['dob'];?></p>
    
         <button type="button" style="float: left;" class="btn btn-secondary btn-warning btn-xs"><a href="edit.php?id=<?php echo $upit2['id']?>">Update</a></button>
         <button type="button" style="float: right;" class="btn btn-secondary btn-danger btn-xs"><a href="edit.php?id=<?php echo $upit2['id']?>">Delete</a></button>
         <div class="clearFix"></div>
  </div>
</div>
   <?php
}
}else{
  header('location: index.php');
}

?>

  </div>

</div>
</div>
			