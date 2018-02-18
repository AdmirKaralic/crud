<?php
include("session.php");
if($login_role=='user'){
 header('location:user.php');
}
?>
<html>
<body>
<?php
if ($login_role=='admin'||$login_role=='moderator'){
if(isset($_GET['id']))
{
$id=$_GET['id'];
if(isset($_POST['submit']))
{
$ime=$_POST['imeprezime'];
$adr=$_POST['adresa'];
$usr=$_POST['username'];
$dob=$_POST['dob'];
$eml=$_POST['email'];
$role=$_POST['role'];
$query3=mysql_query("update korisnici set imeprezime='$ime', adresa='$adr', dob='$dob', username='$usr', email='$eml',role='$role' where id='$id'");
if($query3)
{
header('location:admin.php');
}
}
$sql="select * from korisnici where id='$id'";
$upit1=mysql_query($sql);
$query2=mysql_fetch_array($upit1);
?>
<h1> Editovanje Korisnika </h1>
<div class="div">
<form method="post" action="">
Ime i Prezime:<input type="text" name="imeprezime" value="<?php echo $query2['imeprezime']; ?>" /><br />
Adresa:<input type="text" name="adresa" value="<?php echo $query2['adresa']; ?>" /><br />
Username:<input type="text" name="username" value="<?php echo $query2['username']; ?>" /><br />
Datum Rodzenja:<input type="date" name="dob" value="<?php echo $query2['dob']; ?>" /><br />
Email:<input type="email" name="email" value="<?php echo $query2['email']; ?>" /><br />
Vrsta:<input type="text" name="role" value="<?php echo $query2['role']; ?>" />
<br />
<input type="submit" name="submit" value="update" class="btn" />
</form>
</div>
<?php
}
}else{
	header('location:index.php');
}
?>
</body>
</html>
<?php
ob_end_flush(); 
?>