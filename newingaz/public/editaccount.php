<?php
  define('__ROOT__', "../app/");
  require_once(__ROOT__ . "model/client_php.php");
  require_once(__ROOT__ . "controller/ClientController.php");

  $model = new client();
  $controller = new ControllerClient($model);

	if (isset($_GET['action']) && !empty($_GET['action']))
	{
		$controller->{$_GET['action']}();
	}
// $userid=$_GET['id'];
// echo $uname;
// foreach($model->getUsers() as $user)
// {
//     if($user->getid() == $userid)
//     {
// 		$userid = $user->getid();
// 		//$email = $user->getemail();
// 		$username = $user ->getusername();
// 		$password = $user->getpassword();
//         $Fname = $user->getFname();
// 		$Lname = $user->getLname();
//     }
// }
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
<?php include("C:\\xampp\\htdocs\\newingaz\\app\\view\\Viewbar.php"); ?>
<!-------------------------------------------------------End of Header------------------------------------------------------------------>
<!-------------------------------------------------------Start of Content--------------------------------------------------------------->			
		<div class="container">

			<h1><b>Edit Account :-</b></h1>
			<hr> <br>
			
				<form action='editaccount.php?action=editclientaccount' method='post' >

					<h4><b>Your ID</b></h4><input class="form-control" type='text'  name='id' value="<?php echo $_SESSION['id'];?> " readonly ><br>
					<h4><b>Username</b></h4> <input class="form-control" type='text'  name='username' value="<?php echo $_SESSION['username'];?>"><br>
					<h4><b>Password</b></h4> <input class="form-control" type='password'  name='password'value="<?php echo $_SESSION['password'];?>"><br>
					<h4><b>First Name</b></h4> <input class="form-control" type='text'  name='Fname'value="<?php echo $_SESSION['Fname'];?>"><br>
					<h4><b>Last Name</b></h4> <input class="form-control" type='text'  name='Lname'value="<?php echo $_SESSION['Lname'];?>"><br>

					<input class='btn btn-warning' type='submit' value='Edit' name='Submit' style="color:black;">
				</form>

		</div>	
		<!-------------------------------------------------------End of Content----------------------------------------------------------------->
		
		<!-------------------------------------------------------Start of Footer---------------------------------------------------------------->
		<?php include "footer.php"; ?>
		<!-------------------------------------------------------End of Footer------------------------------------------------------------------>
	</body>
</html>

