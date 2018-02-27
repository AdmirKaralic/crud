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
<div class="container">



<div class="jumbotron">
<h1 class="display-4 text-center">Welcome To <?php echo $login_role;?> Page</h1>
 <hr class="my-4">
<div class="container">
<p class="lead">User name is: <strong><?php echo $login_session;?></strong> and Your Role is :<strong><?php echo $login_role;?></strong></p>
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
<h3>Lista korisnika iz baze </h3>
 <hr class="my-4">
 <div class="table-responsive">
<table class="table table-striped">
  <thead>
    <tr>
	  <th scope="col">Id</th>
      <th scope="col">Ime i Prezime</th>
      <th scope="col">Adresa</th>
      <th scope="col">Username</th>
	  <th scope="col">Email</th>
      <th scope="col">Datum Rodzenja</th>
	  <th scope="col">Update</th>
	  <th scope="col">Delete</th>
    </tr>
  </thead>
<tbody>
<?php
while($upit2=mysql_fetch_assoc($upit1))
{
	?>
    <tr>
	  <td><?php echo $upit2['id'];?></td>
      <td><?php echo $upit2['imeprezime'];?></td>
      <td><?php echo $upit2['adresa'];?></td>
      <td><?php echo $upit2['username'];?></td>
      <td><?php echo $upit2['email'];?></td>
	  <td><?php echo $upit2['dob'];?></td>
	  <td><a class="btn btn-warning btn-xs" role="button" href="edit.php?id=<?php echo $upit2['id']?>">Update</a></td>
	  <td><a class="btn btn-danger btn-xs" role="button"  href="delete.php?id=<?php echo $upit2['id']?>">Delete</a></td>
    </tr>
	
<?php
}
}else{
	header('location: index.php');
}

?>
</tbody>
</table>
</div>
</div>
</div>
			