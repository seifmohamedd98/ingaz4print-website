<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ingaz";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if(isset($_POST['Submit']))
{ 

	if($_POST["username"] != $_SESSION['username'] || $_POST["password"] != $_SESSION['password']  || $_POST["Fname"] != $_SESSION['Fname'] || $_POST["Lname"] != $_SESSION['Lname'])
	{

		$sql = "update users set username='".$_POST["username"]."', password='".$_POST["password"]."', Fname='".$_POST["Fname"]."' , Lname='".$_POST["Lname"]."' where id=".$_SESSION["ID"];
		$sql2 = "SELECT id, username FROM users WHERE username='" . $_POST['username'] ."'";
		$result2=mysqli_query($conn,$sql2);
		$result=mysqli_query($conn,$sql);
		if($result2)
		{
			while($row = mysqli_fetch_array($result2))
			{

				if($row['username']==$_POST['username'])
				{
				  echo "<script>alert('Username Already Taken');</script>";
				}
				
			}
			
		}
		if($result)			
		{
			$_SESSION["username"]=$_POST["username"];
			$_SESSION["password"]=$_POST["password"];
			$_SESSION["Fname"]=$_POST["Fname"];
			$_SESSION["Lname"]=$_POST["Lname"];
			header("Location:editacc.php");
		}

	}
}
?>
<html>
	<head>
		<title>Edit Account | INAGZ</title>
		<link rel = "icon" href ="images/logo2.jpg" type = "image/x-icon"> 
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- links of bootstrap 3 -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

		
	</head>

	<body>
		
		<!-------------------------------------------------------Start of Header---------------------------------------------------------------->
		<?php include "header.php";?>
		<!-------------------------------------------------------End of Header------------------------------------------------------------------>

		<!-------------------------------------------------------Start of Content--------------------------------------------------------------->			
		<div class="container">

			<h1><b>Edit Account :-</b></h1>
			<hr> <br>
			
				<form action='' method='post' >
					<?php
					$user = $_SESSION['username'];
					$xpass=$_SESSION['password'];
					$firstn = $_SESSION['Fname'];
					$lastn=$_SESSION['Lname'];
					?>
					<h4><b>Username</b></h4> <input class="form-control" type='text' value = <?php echo $user ?> name='username'><br>
					<h4><b>Password</b></h4> <input class="form-control" type='password' value = <?php echo $xpass ?> name='password'><br>
					<h4><b>First Name</b></h4> <input class="form-control" type='text' value = <?php echo $firstn ?> name='Fname'><br>
					<h4><b>Last Name</b></h4> <input class="form-control" type='text' value = <?php echo $lastn ?> name='Lname'><br>

					<input class='btn btn-warning' type='submit' value='Edit' name='Submit' style="color:black;">
				</form>

		</div>	
		<!-------------------------------------------------------End of Content----------------------------------------------------------------->
		
		<!-------------------------------------------------------Start of Footer---------------------------------------------------------------->
		<?php include "footer.php"; ?>
		<!-------------------------------------------------------End of Footer------------------------------------------------------------------>
	</body>
</html>

