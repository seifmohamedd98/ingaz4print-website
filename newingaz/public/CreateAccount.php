<?php
// session_start();
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "ingaz";


// $conn = new mysqli($servername, $username, $password, $dbname);

// $emailError="";
// $userError="";
// $passError="";
// $FnameError="";
// $LNameError="";
// $bdayError="";
// $email="";
// $user="";
// $pass="";
// $name_F="";
// $name_L="";
// $birthday="";
// $flag=true;


// if(isset($_POST['submit']))
// { 
//     if (empty($_POST["email"]))
//     {
//     $emailError = "*Email is required";
//     $flag=false;
//     } 
//     else
//     {
//     $email=$_POST['email'];
//     }

//     if (empty($_POST["username"]))
//     {
//     $userError="*Username is Required";
//     $flag=false;
//     } 
//     else
//     {
//     $user=$_POST['username'];
//     }

//     if (empty($_POST["password"])) 
//     {
//     $passError="*Passsword is required";
//     $flag=false;
//     } 
//     else
//     {
//     $pass=$_POST['password'];
//     }

//     if (empty($_POST["Fname"]))
//     {
//     $FnameError="*First Name is required";
//     $flag=false;
//     }
//     else
//     {
//     $name_F=$_POST['Fname'];
//     }


//     if (empty($_POST["Lname"])) 
//     {
//     $LNameError="*Last name is required";
//     $flag=false;
//     }
//     else
//     {
//     $name_L=$_POST['Lname'];
//     }


//     if (empty($_POST["bday"])) 
//     {
//     $bdayError="*Birthday is required";
//     $flag=false;
//     }
//     else
//     {
//     $birthday=$_POST['bday'];
//     }

//     if($flag==true)
//     {
//       $sql="insert into users(email,username,password,Fname,Lname,bday,gender,access) values('".$_POST['email']."','".$_POST["username"]."','".$_POST["password"]."','".$_POST["Fname"]."','".$_POST["Lname"]."','".$_POST["bday"]."','".$_POST["gender"]."','internal')";
//       $sql2 = "SELECT id, email, username FROM reader WHERE email ='" . $_POST['email'] . "' or username='" . $_POST['username'] ."'";
//       $result2=mysqli_query($conn,$sql2);
//       //echo $sql;
//       $result=mysqli_query($conn,$sql);
//       if($result2)
//       {
//           while($row = mysqli_fetch_array($result2))
//           {
            
//               if($row['email']==$_POST['email'])
//               {
//                 echo "<script>alert('Email Already Taken');</script>";
//               }
//               if($row['username']==$_POST['username'])
//               {
//                 echo "<script>alert('Username Already Taken');</script>";
//               }
              
//           }
          
//       }
//       if($result)
//       {
//         header("Location:CreateAccount.php");
//       }
//     }
// }
define('__ROOT__', "../app/");
 require_once(__ROOT__ . "model\admin_php.php");
  require_once(__ROOT__ . "controller\AdminController.php");

//require_once("C:\\xampp\\htdocs\\ingazclasses\\app\\model\\admin_php.php");
//require_once("C:\\xampp\\htdocs\\ingazclasses\\app\\controller\\AdminController.php");

//require_once(__ROOT__ . "view/bar.php");

$model = new admin();
$controller = new AdminController($model);

if (isset($_GET['action']) && !empty($_GET['action']))
{
  $controller->{$_GET['action']}();
}
?>
<!DOCTYPE HTML>

<html>

<head>
  <title>Create Account | INAGZ</title>
  <link rel = "icon" href ="images/logo2.jpg" type = "image/x-icon"> 

    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  

		<!-- links of bootstrap 3 -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
      .error
      {
        color:#FF0000;
      }
    </style>

</head>

<body>
		<!-------------------------------------------------------Start of Header---------------------------------------------------------------->
		<?php 
			//include("C:\\xampp\\htdocs\\ingazclasses\\app\\view\\Viewbar.php"); 
			require_once(__ROOT__ . "view\Viewbar.php");
		?>
    <!-------------------------------------------------------End of Header------------------------------------------------------------------>
    
		<!-------------------------------------------------------Start of Content--------------------------------------------------------------->   
        <div class="container">

          <h1><b>Create Account :-</b></h1>
          <hr> <br>
            <form action="CreateAccount.php?action=addinternalaccount" method="post" class="signinform">
                <div class="form-group">

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
                    <input type="submit" value="Create Internal Account" class="w3-button w3-block w3-section w3-padding" style="background-color:#ffc60b; color:black; font-size:20px;" name="submit" />
                </div>
            </form>
        </div>


		<!-------------------------------------------------------End of Content----------------------------------------------------------------->

		<!-------------------------------------------------------Start of Footer---------------------------------------------------------------->
    <?php include "footer.php"; ?>
		<!-------------------------------------------------------End of Footer------------------------------------------------------------------>
</body>

</html>