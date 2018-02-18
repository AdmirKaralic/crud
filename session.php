<?php
include("connect.php");
session_start();
$user_check=$_SESSION['login_user'];
 
$sql="SELECT*FROM korisnici WHERE username='$user_check'";
$result=mysql_query($sql);
$row=mysql_fetch_assoc($result);
$login_session=$row['username'];
$login_id=$row['id'];
$login_role=$row['role'];
if(!isset($login_session)){
 mysql_close;
 header('location:index.php');
}
?>