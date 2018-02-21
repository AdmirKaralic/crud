<?php 
$host="localhost";//Host Name
$username="root"; //MySQL username. root is Default.
$password="mysql"; //MySQL Password
$dbname="baza"; //Your Database Name
//Connecting To The Server
$conn = mysql_connect("$host","$username","$password")or die("Failed To Connect");
//Selecting Database
mysql_select_db("$dbname")or die("Failed to select database");
?>