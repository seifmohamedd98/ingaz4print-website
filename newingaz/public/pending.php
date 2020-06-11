<?php 
define('__ROOT__', "../app/");
//include('app_logic.php');
// require_once(__ROOT__ . "model\user_php.php");
// require_once(__ROOT__ . "controller\UserController.php");


// $model = new user();
// $controller = new UserController($model);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Pending | INGAZ</title>
    <link rel = "icon" href ="images/logo2.jpg" type = "image/x-icon"> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- links of bootstrap 3 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 	
</head>
<body>
<!------------------------------------------------Start of Header and nav bar------------------------------------------------------>
    <?php
        require_once(__ROOT__ . "view/ViewBar.php");
    ?>  
<!-------------------------------------------------End of Header and nav bar------------------------------------------------------->
	<form class="pending-form" action="#" method="GET" style="text-align: center;">
	    <h1><b>Pending :-</b></h1>
        <hr style=" width: 50%; margin: 20px auto; padding: 10px;">
		<p> We sent an email to  <b><?php echo $_GET['email'] ?></b> to help you recover your account.</p>

	    <p>Please login into your email account and click on the link we sent to reset your password.</p>

		<p><a href="home.php">Click Here to go Home Page</a></p>

	</form>
<!-----------------------------------------------------Start of Footer------------------------------------------------------------->
    <?php include "footer.php";?>
<!------------------------------------------------------End of Footer-------------------------------------------------------------->
</body>
</html>