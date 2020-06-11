<?php 
define('__ROOT__', "../app/");
//include('app_logic.php');
require_once(__ROOT__ . "model\user_php.php");
require_once(__ROOT__ . "controller\UserController.php");


$model = new user();
$controller = new UserController($model);

if (isset($_GET['action']) && !empty($_GET['action']))
{
  $controller->{$_GET['action']}();
}

// if(isset($_GET['token']))
// {
//     $token = $_GET['token'];
//     resetpassword($token);
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>New Password | INGAZ</title>
    <link rel = "icon" href ="images/logo2.jpg" type = "image/x-icon"> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- links of bootstrap 3 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
    <style>
        .newpassword-form
        {
            width: 50%;
            margin: 70px auto;
            background: white;
            padding: 10px;
            border-radius: 3px;
        }
        .msg
        {
            margin: 5px auto;
            border-radius: 5px;
            border: 1px solid red;
            background: pink;
            text-align: left;
            color: brown;
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
	<form class="newpassword-form" action="home.php?action=chnagepassword" method="post">
        <h1><b>Reset Your New Password :-</b></h1>
        <hr> <br>

            <h4><b>New password</b></h4>
			<input type="password" name="password" placeholder="Enter Your New Password Here" class="form-control" id="pass" required>
            Show Password <input type="checkbox" onclick="myFunction3()"> 
            <!-- Start of Show Password -->
            <script>
                function myFunction3() 
                {
                    var x = document.getElementById("pass");
                    if (x.type === "password")
                    {
                        x.type = "text";
                    } 
                    else 
                    {
                        x.type = "password";
                    }
                }
            </script>
            <!-- End of Show Password -->

            <br>
            <h4><b>Confirm Password</b></h4>
            <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control" id="confirmpass" required >
            Show Password <input type="checkbox" onclick="myFunction4()"> 
            <!-- Start of Validation of confirm password & show confirm password-->
            <script>
                var pass = document.getElementById("pass"); 
                var confirmpass = document.getElementById("confirmpass");
                function validatePassword2()
                {
                    if(pass.value != confirmpass.value) 
                    {
                        confirmpass.setCustomValidity("Passwords Don't Match");
                    } 
                    else
                    {
                        confirmpass.setCustomValidity('');
                    }
                }
                pass.onchange = validatePassword2;
                confirmpass.onkeyup = validatePassword2;
                function myFunction4() 
                {
                    var x = document.getElementById("confirmpass");
                    if (x.type === "password")
                    {
                        x.type = "text";
                    } 
                    else 
                    {
                        x.type = "password";
                    }
                }
            </script>
            <!-- End of Validation of confirm password & show confirm password -->

            <h4><b>Your Token Number That You Received in Your mail</b></h4>
            <input type="text" name="token" class="form-control"><br>
            


			<button type="submit" name="new_password" class='btn btn-warning' style=" color:black; font-size:20px;">Submit</button>
	
	</form>
<!-----------------------------------------------------Start of Footer------------------------------------------------------------->
    <?php include "footer.php";?>
<!------------------------------------------------------End of Footer-------------------------------------------------------------->
</body>
</html>