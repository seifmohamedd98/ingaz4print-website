<?php 
define('__ROOT__', "../app/");

//include('app_logic.php');


require_once(__ROOT__ . "model\user_php.php");
require_once(__ROOT__ . "controller\UserController.php");


$model = new user();
$controller = new UserController($model);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Password Reset | INGAZ</title>
    <link rel = "icon" href ="images/logo2.jpg" type = "image/x-icon"> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- links of bootstrap 3 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 	
    <style>
        .reset-form
        {
            width: 50%;
            margin: 30px auto;
            padding: 10px;
        }
 
    </style>
</head>
<body>
<!------------------------------------------------Start of Header and nav bar------------------------------------------------------>
    <?php
        require_once(__ROOT__ . "view/ViewBar.php");
    ?>  
<!-------------------------------------------------End of Header and nav bar------------------------------------------------------->
	<form class="reset-form" action="home.php?action=passreset" method="post">
   
        <h1><b>Reset Password :-</b></h1>
        <hr>

            <h4><b>Your Email address</b></h4>
			<input type="email" name="email" class="form-control" placeholder="E-mail" required>
            <br>
			<button type="submit" name="reset-password" class='btn btn-warning' style=" color:black; font-size:20px;">Submit</button>
            <hr>

	</form>
<!-----------------------------------------------------Start of Footer------------------------------------------------------------->
    <?php include "footer.php";?>
<!------------------------------------------------------End of Footer-------------------------------------------------------------->
</body>
</html>