<?php
session_start();
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
<?php //include("C:\\xampp\\htdocs\\newingaz\\app\\view\\Viewbar.php"); 
require_once(__ROOT__ . "view/Viewbar.php");?>
<!-------------------------------------------------------End of Header------------------------------------------------------------------>
<!-------------------------------------------------------Start of Content--------------------------------------------------------------->			
		<div class="container">

			<h1><b>Edit Account :-</b></h1>
			<hr> <br>
			
				<form action='editaccount.php?action=editclientaccount' method='post' >

					<h4><b>Your ID</b></h4><input class="form-control" type='text'  name='id' value="<?php echo $_SESSION['id'];?> " readonly ><br>
					<h4><b>Username</b></h4> <input class="form-control" type='text'  name='username' value="<?php echo $_SESSION['username'];?>"><br>
					<!--<h4><b>Password</b></h4> <input class="form-control" type='password'  name='password'value="<?php echo $_SESSION['password'];?>" id="password" >-->
                    <h4><b>Password</b></h4> <input class="form-control" type='password'  name='password' id="password" placeholder="Password" >
					Show Password <input type="checkbox" onclick="myFunction()">
                    <!-- Start of Show Password -->
                    <script>
                        function myFunction() 
                        {
                            var x = document.getElementById("password");
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
					
					<!--<h4><b>Confirm Password</b></h4><input type="password" value="<?php echo $_SESSION['password'];?>" placeholder="Confirm Password" class="form-control" id="confirmpassword" required >-->
                    <h4><b>Confirm Password</b></h4><input type="password" placeholder="Confirm Password" class="form-control" id="confirmpassword" required >
                    Show Password <input type="checkbox" onclick="myFunction2()"> 
                    <!-- Start of Validation of confirm password & show confirm password-->
                    <script>
                        var password = document.getElementById("password"); 
                        var confirmpassword = document.getElementById("confirmpassword");
                        function validatePassword()
                        {
                            if(password.value != confirmpassword.value) 
                            {
                                confirmpassword.setCustomValidity("Passwords Don't Match");
                            } 
                            else
                            {
                                confirmpassword.setCustomValidity('');
                            }
                        }
                        password.onchange = validatePassword;
                        confirmpassword.onkeyup = validatePassword;
                        function myFunction2() 
                        {
                            var x = document.getElementById("confirmpassword");
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
					<h4><b>First Name</b></h4> <input class="form-control" type='text'  name='Fname'value="<?php echo $_SESSION['Fname'];?>"><br>
					<h4><b>Last Name</b></h4> <input class="form-control" type='text'  name='Lname'value="<?php echo $_SESSION['Lname'];?>"><br>

                    <!-- <br>
                    <label><b>Address</b></label>
                    <input type="text" name="address" value="" class="form-control" required >

                    <br>
                    <label><b>Mobile Number</b></label>
                    <input type="text" name="mobile" value="" class="form-control" id="phonefield" onkeyup="return validatephone(this.value);" required > <br> -->
                    <h4><b>Address</b></h4> <input class="form-control" type='text'  name='address'value="<?php echo $_SESSION['address'];?>"><br>
					<h4><b>Mobile Number</b></h4> <input class="form-control" type='text'  name='mobile'value="<?php echo $_SESSION['mobile'];?>"  id="phonefield" onkeyup="return validatephone(this.value);"><br>
                   
                   <script> 
                    function validatephone(mobile)
                        {
                            mobile = mobile.replace(/[^0-9]/g,'');
                            $("#phonefield").val(mobile);
                            if( mobile == '' || !mobile.match(/^0[0-9]{10}$/) )
                            {
                                $("#phonefield").css({'background':'#FFEDEF' , 'border':'solid 1px red'});
                                return false;
                            }
                            else
                            {
                                $("#phonefield").css({'background':'#99FF99' , 'border':'solid 1px #99FF99'});
                                return true;	
                            }
                        }
                    </script>

					<input class='btn btn-warning' type='submit' value='Edit' name='Submit' style="color:black;">
				</form>
		</div>	



    <!-- Start of Recaptcha Code -->
        <!-- <div class="form_container">
            <form action="#" id="my_captcha_form">
                <div class="g-recaptcha" data-sitekey="6LfrFKQUAAAAAMzFobDZ7ZWy982lDxeps8cd1I2i" ></div>
                <p>
                    <button type="submit" >Submit</button>
                </p>
            </form>
        </div>

        <script>
            document.getElementById("my_captcha_form").addEventListener("submit",function(evt)
            {
                var response = grecaptcha.getResponse();
                if(response.length == 0) 
                { 
                    //reCaptcha not verified
                    alert("please verify you are humann!"); 
                    evt.preventDefault();
                    return false;
                }
            });
        </script> -->
        <?php
        // $curlx = curl_init();

        // curl_setopt($curlx, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        // curl_setopt($curlx, CURLOPT_HEADER, 0);
        // curl_setopt($curlx, CURLOPT_RETURNTRANSFER, 1); 
        // curl_setopt($curlx, CURLOPT_POST, 1);

        // $post_data = 
        // [
        //     'secret' => 'ajsdkjhaskdjahskjdhakjhdkjsah', //<--- your reCaptcha secret key
        //     'response' => $_POST['g-recaptcha-response']
        // ];

        // curl_setopt($curlx, CURLOPT_POSTFIELDS, $post_data);

        // $resp = json_decode(curl_exec($curlx));

        // curl_close($curlx);

        // if ($resp->success) 
        // {
        //     //success!
        // } else 
        // {
        //     // failed
        //     echo "error";
        //     exit;
        // }
        ?>
        <!-- End of Recaptcha Code -->
		<!-------------------------------------------------------End of Content----------------------------------------------------------------->
		
		<!-------------------------------------------------------Start of Footer---------------------------------------------------------------->
		<?php include "footer.php"; ?>
		<!-------------------------------------------------------End of Footer------------------------------------------------------------------>
	</body>
</html>

