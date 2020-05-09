<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ingaz";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql="delete from users where ID =".$_SESSION['ID'];
$result=mysqli_query($conn,$sql);
if($result)
{
	session_destroy();
	header("Location:Home.php");
}
else
{
	echo $sql;
}	
?>