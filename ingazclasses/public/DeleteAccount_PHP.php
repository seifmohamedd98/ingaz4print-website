<?php
// if($_SERVER['REQUEST_METHOD'] =='POST')
// {
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ingaz";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql="DELETE FROM users WHERE ID=".$_GET['id'];

$result = mysqli_query($conn, $sql);

header("Location:DeleteinternalAccount.php");
// }
// else
// {
// 	echo "You cannot enter this page directly";
// }

?>

