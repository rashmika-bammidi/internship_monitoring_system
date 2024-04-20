<?php
$servername="localhost";
$username="root";
$password=""; 
$dbname="registration_form";

$connection=mysqli_connect($servername,$username,$password,$dbname);

if($connection)
{
	// echo "Connection success";
}
else
{
	echo "Connection fail".mysqli_connect_error();
}
?>

