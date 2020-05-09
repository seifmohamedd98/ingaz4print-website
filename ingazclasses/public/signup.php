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
require_once("C:\\xampp\\htdocs\\ingazclasses\\app\\model\\user_php.php");
require_once("C:\\xampp\\htdocs\\ingazclasses\\app\\controller\\UserController.php");
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
                    <input type="password" name="password" placeholder="Password" class="form-control" required >

                    <br>
                    <label><b>First Name</b></label>
                    <input type="text" name="Fname" placeholder="First Name" class="form-control"required >
                    
                    <br>
                    <label><b>Last Name</b></label>
                    <input type="text" name="Lname" placeholder="Last Name" class="form-control" required >
                    
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