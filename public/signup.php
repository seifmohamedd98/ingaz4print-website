<?php

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "ingaz";
// $conn = new mysqli($servername, $username, $password, $dbname);
// 	if(isset($_POST['submit']))
// 	{ 
	
//             $sql="insert into users(email,username,password,Fname,Lname,bday,gender,access) values('".$_POST['email']."','".$_POST["username"]."','".$_POST["password"]."','".$_POST["Fname"]."','".$_POST["Lname"]."','".$_POST["bday"]."','".$_POST["gender"]."','user')";
//             $sql2 = "SELECT id, email, username FROM users WHERE email ='" . $_POST['email'] . "' or username='" . $_POST['username'] ."'";
//             //echo $sql2;
//             $result2=mysqli_query($conn,$sql2);
//             $result=mysqli_query($conn,$sql);
//             if($result2)
//             {
//                 while($row = mysqli_fetch_array($result2))
//                 {
                    
//                     if($row['email']==$_POST['email'])
//                     {
//                         echo "<script>alert('Email Already Taken');</script>";
//                     }
//                     if($row['username']==$_POST['username'])
//                     {
//                         echo "<script>alert('Username Already Taken');</script>";
//                     }
                    
//                 }
//             }
		
//     }

// if(empty($_SESSION['ID']))
// {

//define('__ROOT__', "../app/");

//require_once("C:\\xampp\\htdocs\\ingazclasses\\app\\model\\user_php.php");
//require_once("C:\\xampp\\htdocs\\ingazclasses\\app\\controller\\UserController.php");

require_once(__ROOT__ . "model\user_php.php");
require_once(__ROOT__ . "controller\UserController.php");

//require_once(__ROOT__ . "view/bar.php");

$model = new user();
$controller = new UserController($model);
//$view = new Bar($controller, $model);

?>
<li>
    <a href='#' onclick="document.getElementById('id02').style.display='block'"><span class="glyphicon glyphicon-user"></span> Sign up</a>

    <div id="id02" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

            <div class="w3-center"><br>
                <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
            </div>

            <form action="home.php?action=signupController" method="post" class="w3-container">
                <div class="w3-section">

                    <label><b>Email</b></label>
                    <input type="email" name="email" placeholder="Enter E-mail" class="form-control" required>

                    <br>
                    <label><b>Username</b></label>
                    <input type="text" name="username" placeholder="Username" class="form-control" required>
                    
                    <br>
                    <label><b>Password</b></label>
                    <input type="password" name="password" placeholder="Password" class="form-control" id="password" required >
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

                    <br>
                    <label><b>Confirm Password</b></label>
                    <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control" id="confirmpassword" required >
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

                    <br>
                    <label><b>First Name</b></label>
                    <input type="text" name="Fname" placeholder="First Name" class="form-control"required >
                    
                    <br>
                    <label><b>Last Name</b></label>
                    <input type="text" name="Lname" placeholder="Last Name" class="form-control" required >

                    <br>
                    <label><b>Address</b></label>
                    <input type="text" name="address" placeholder="Address" class="form-control" required >

                    <br>
                    <label><b>Mobile Number</b></label>
                    <input type="text" name="mobile" placeholder="Example 01234567899 Must Contain 11 number" class="form-control" id="phonefield" onkeyup="return validatephone(this.value);" required >  
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
                    
                    <br>
                    <label><b>Birthday</b></label>
                    <input type="date" name="bday" class="form-control" required >
                
                    <br>
                    <label><b>Gender</b></label>
                    <br>
                    <label class="radio-inline">
                    <input type="radio" name="gender" value="male" checked > Male
                    </label>

                    <label class="radio-inline">
                    <input type="radio" name="gender" value="female"> Female            
                    </label>
                    
                    <br>
                    <input type="submit" value="Sign Up" class="w3-button w3-block w3-section w3-padding" style="background-color:#ffc60b; color:black; font-size:20px;" name="submit" />
                </div>
            </form>

            <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                <input type="button" value="Cancel" onclick="document.getElementById('id02').style.display='none'" class="btn" style="background-color:black; color:#ffc60b;">
                
            </div>
            

        </div>
    </div>
</li>
<?php
//}
?>