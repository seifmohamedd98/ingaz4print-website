<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ingaz";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT `id` , `email`, `username`, `password`, `Fname`, `Lname`, `bday`, `gender`, `access` FROM `users` WHERE access='internal'";


$result=mysqli_query($conn,$sql);


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
		<?php include "header.php";?>
    <!-------------------------------------------------------End of Header------------------------------------------------------------------>
    
	<!-------------------------------------------------------Start of Content--------------------------------------------------------------->   

        <div class="container">
        
          <h1><b>Delete Account :-</b></h1>
          <hr> <br>

            <table width='80%' class="table table-hover">
                <thead> <!-- deh 3ashan may3mlsh hover 3alehom -->
                    <tr class="info">   
                        <th>E-mail</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Birthday</th>
                        <th>Gender</th>
                        <th>Account Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php   
                    while($row = mysqli_fetch_array($result))
                    {
               
                    echo "<tr>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['username']."</td>";
                    echo "<td>".$row['password']."</td>";
                    echo "<td>".$row['Fname']."</td>";
                    echo "<td>".$row['Lname']."</td>";
                    echo "<td>".$row['bday']."</td>";
                    echo "<td>".$row['gender']."</td>";
                    echo "<td>".$row['access']."</td>";
                    echo "<td><a href=\"DeleteAccount_PHP.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete this Account?')\">Delete</a></td>";		

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