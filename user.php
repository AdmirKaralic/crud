<?php
include("connect.php");
include("session.php");
 
//Redirect to Admin page
if($login_role=='admin'){
 header('location:admin.php');
}
//Redirect To Moderator Page
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
<div class="row justify-content-lg-center">
<h1>Welcome To <?php echo $login_role;?> Page</h1>
<div class="col-lg-8">
<div class="jumbotron">
<div id="profile">
<h2>User name is: <?php echo $login_session;?> and Your Role is :<?php echo $login_role;?></h2>
<button class="btn btn-default btn-sm" id="logout"><a href="logout.php">Please Click To Logout</a></button>
</div>
</div>
<?php
if($login_role=='user'){
$sql="SELECT id, username, imeprezime, email, dob, adresa from korisnici ";
$upit1=mysql_query($sql);
?>
<h3>Lista korisnika iz baze </h3>
<div class="tabla">
<table class="table table-striped">
  <thead>
    <tr>
	  <th scope="col">Id</th>
      <th scope="col">Ime i Prezime</th>
      <th scope="col">Adresa</th>
      <th scope="col">Username</th>
	  <th scope="col">Email</th>
      <th scope="col">Datum Rodzenja</th>
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
</div>