<?php
include("session.php");
if($login_role=='user'){
 header('location:user.php');
}
if($login_role=='moderator'){
 header('location:moderator.php');
}

if ($login_role=='admin'){
			if(isset($_GET['id']))
			{
			$id=$_GET['id'];
			$query1=mysql_query("delete from korisnici where id='$id'");
			if($query1)
			{
			header('location:admin.php');
			}
}
}
?>