<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registracija</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
   <div class="container">
    <hr>
   <h1 class="text-center"> Registration </h1> </br>
   <hr>

   <form action="" method="post">
   <div class="form-row text-center">
   <div class="form-group col-lg-6">
       <label for="user">Username</label>
       <input  class="form-control form-control-sm" type="text" name="username" id="user"> 
	   
	   </div>
	   <div class="form-group col-lg-6">
	   <label for="pass">Password</label>
       <input class="form-control form-control-sm" type="password" name="password" id="pass"> 
	   
	   </div>
	   </div>
	   <div class="form-row text-center">
	   <div class="form-group col-lg-6">
	   <label for="ime">Ime I Prezime</label>
       <input class="form-control form-control-sm" type="text" name="imeprezime" id="ime">
	   
	   </div>
	   <div class="form-group col-lg-6">
	   <label for="mail">Email</label>
       <input class="form-control form-control-sm" type="email" name="email" id="mail"> 
	   </div>
	   
	   </div>
	   <div class="form-row text-center">
	        <div class="form-group col-lg-6">
	          <label for="dob">Datum Rodzenja</label>
              <input class="form-control form-control-sm" type="date" name="dob" id="dob">
	        </div>
	  
	   <div class="form-group col-lg-6">
	   <label for="adresa">Adresa</label>
       <input class="form-control form-control-sm" type="text" name="adresa" id="adresa">
	   
	   </div>
	  
       </div>
	   <div class="text-center">
	    <button type="submit" class="btn btn-primary">Register</button>
		</div>
	   </form> <!-- end of form -->

    </div> <!-- end of container-->
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
					      header("location:index.php");
					}else{
						echo"There has been an error";
					}
					
}

?>
