<?php
include("session.php");
if($login_role=='admin'){
 header('location:admin.php');
}
if($login_role=='user'){
 header('location:user.php');
}
?>
<h1>Wellcome to <?php echo $login_role;?> Page</h1>
<link rel="stylesheet" href="style.css" type="text/css"/>
<div id="profile">
<h2>User name is: <?php echo $login_session;?> and Your Role is :<?php echo $login_role;?></h2>
<div id="logout"><a href="logout.php">Please Click To Logout</a></div>
</div>
<?php
if($login_role=='moderator'){
$sql="SELECT id, username, imeprezime, email, dob, adresa from korisnici ";
$upit1=mysql_query($sql);
echo "<h1>Lista korisnika iz baze </h1>";
echo "<div class='tabla'>";
echo "<table><tr><td>Ime i Prezime</td><td>Adresa</td><td>Username</td><td>Email</td><td>Datum Rodzenja</td><td></td><td></td>";
while($upit2=mysql_fetch_assoc($upit1))
{
echo "<tr><td>".$upit2['imeprezime']."</td>";
echo "<td>".$upit2['adresa']."</td>";
echo "<td>".$upit2['username']."</td>";
echo "<td>".$upit2['email']."</td>";
echo "<td>".$upit2['dob']."</td>";
echo "<td><a href='edit.php?id=".$upit2['id']."'>Edit</a></td>";
}
}else{
	header('location: index.php');
}
?>