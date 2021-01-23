<?php
session_start();
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/user_php.php");
require_once(__ROOT__ . "controller/UserController.php");
$model = new User();
$controller = new UserController($model);

  

if (isset($_GET['action']) && !empty($_GET['action'])) 
{
  $controller->{$_GET['action']}();
}

?>
<!DOCTYPE HTML>

<html>

<head>
  <title>Delete Account | INGAZ</title>
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
    <?php require_once(__ROOT__ . "view/Viewbar.php"); ?>

    <!-------------------------------------------------------End of Header------------------------------------------------------------------>
    
	<!-------------------------------------------------------Start of Content--------------------------------------------------------------->   

        <div class="container">
        
          <h1><b>Delete Account :-</b></h1>
          <hr> <br>
          <script>
            function getResult() 
            {
                debugger;
                if($("#term").val() != '')
                {
            jQuery.ajax(
            {
                url: "backend-search.php",
                data:'term='+$("#term").val(),
                type: "POST",
                success:function(data2)
                {
                    $("#result").html(data2);
                    $("#result").show();
                }
            });
                }
                else{
                    $("#result").hide();
                }
            }
        </script>
            <div class="nav" id="searchid">
            <input type="search" placeholder="Search for internal account by username..." class="form-control" id="term" name="term" onkeyup="getResult()" />
            </div>
            <div id="result"></div>
             
            <table width='80%' class="table table-hover">
                <thead> <!-- deh 3ashan may3mlsh hover 3alehom -->
                    <tr class="info">   
                        <th>E-mail</th>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Address</th>
                        <th>Mobile Number</th>
                        <th>Birthday</th>
                        <th>Gender</th>       
                        <th>Action</th>
                    </tr>
                </thead>
                <?php   
                $table = $model->getUsers();
                foreach($table as $user)
                {
                    echo "<tr>";
                    echo "<td>".$user->getemail()."</td>";
                    echo "<td>".$user->getusername()."</td>";
                    
                    echo "<td>".$user->getFname()."</td>";
                    echo "<td>".$user->getLname()."</td>";

                    echo "<td>".$user->getaddress()."</td>";
                    echo "<td>".$user->getmobile()."</td>";

                    echo "<td>".$user->getbirthday()."</td>";
                    echo "<td>".$user->getgender()."</td>";
                    echo "<td><a href=\"DeleteinternalAccount.php?action=Deleteinternal&id=".$user->getid()."\" onClick=\"return confirm('Are you sure you want to delete this Account?')\">Delete</a></td>";		
                    echo"</tr>";
                   
                }
                ?>
            </table>
            <hr>
            <a href="CreateAccount.php">Click Here to create Account For Internal users</a><br/>
        </div>


    <!-------------------------------------------------------End of Content----------------------------------------------------------------->

    <!-------------------------------------------------------Start of Footer---------------------------------------------------------------->
    <?php include "footer.php"; ?>
    <!-------------------------------------------------------End of Footer------------------------------------------------------------------>
</body>

</html>