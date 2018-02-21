<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registracija</title>
</head>
<body>
   
   <form action="" method="post">
       <label for="user">Username</label>
       <input type="text" name="username" id="user"> </br> </br>
	   <label for="pass">Password</label>
       <input type="password" name="password" id="pass"> </br> </br>
	   <label for="ime">Ime I Prezime</label>
       <input type="text" name="imeprezime" id="ime"> </br> </br>
	   <label for="mail">Email</label>
       <input type="email" name="email" id="mail"> </br> </br>
	   <label for="dob">Datum Rodzenja</label>
       <input type="text" name="dob" id="dob"> </br> </br>
	   <label for="adresa">Adresa</label>
       <input type="text" name="adresa" id="adresa"> </br>  </br> 
       <input type="submit" name="submit">
       
       
   </form>
    
</body>
</html>

<?php 
include('connect.php');
      if(isset($_POST['submit'])){

				$ime=$_POST['imeprezime'];
				$adr=$_POST['adresa'];
				$usr=$_POST['username'];
				$dob=$_POST['dob'];
				$pass=$_POST['password'];
				$eml=$_POST['email'];
				$query1=mysql_query("insert into korisnici (imeprezime, dob, email, username, adresa, password,role) values('$ime','$dob','$eml','$usr','$adr','$pass','user')");
			
				if($query1){
					      echo "Upisan";
					}else{
						echo"There has been an error";
					}
					
}

?>
