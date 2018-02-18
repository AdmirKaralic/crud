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
<body>
<h1> Dodavanje novog Korisnika</h1>
<style>

input[type=text],[type=password],[type=date],[type=email]{
	width:100%;
}
#btn{
	width:100px;
	margin:10px auto;
	text-align: center;
	display:block;
}
.div{
	width:600px;
	height:auto;
	margin:100px auto;
	padding:5px;
	border:1px solid #000;
	
}
form{
	padding:10px;
}
h1{
	text-align:center;
}



</style>
<?php
if($login_role=='admin'){
include('connect.php');
      if(isset($_POST['submit'])){

				$ime=$_POST['imeprezime'];
				$adr=$_POST['adresa'];
				$usr=$_POST['username'];
				$dob=$_POST['dob'];
				$pass=$_POST['password'];
				$eml=$_POST['email'];
				$query1=mysql_query("insert into korisnici (imeprezime, dob, email, username, adresa, password) values('$ime','$dob','$eml','$usr','$adr','$pass')");
			
				if($query1){
					header("location:index.php");
					}else{
						echo"There has been an error";
					}
					}
}else{
	header('location:index.php');
}
?>
<div class="div">
<form method="POST" action="">
Ime i Prezime: <input type="text" name="imeprezime"><br>
Adresa: <input type="text" name="adresa"><br>
Username: <input type="text" name="username"><br>
Datum Rodzenja: <input type="date" name="dob"><br>
Email: <input type="email" name="email"><br>
Password: <input type="password" name="password"><br>
<br>
<input type="submit" name="submit" id="btn">

</form>
</div>
</body>
</html>
<?php
ob_end_flush();
?>