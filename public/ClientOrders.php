<?php
session_start();
$_SESSION['invoice']=$_SESSION['username'];

define('__ROOT__', '../app/');		

require_once(__ROOT__ . 'model/User_php.php');
require_once(__ROOT__ . 'controller/UserController.php');
require_once(__ROOT__ . 'db\Dbh.php');

$dbh = new Dbh();

$sql="SELECT *, order_details.id as orderID, users.id as userID FROM order_details JOIN users ON order_details.access = users.username 
			
WHERE users.access='user' AND order_details.order_status=1;";

$result=$dbh->query($sql);

while($row=mysqli_fetch_array($result))
{
	if(isset($_POST["invoice".$row['orderID']]))
	{
		$_SESSION['invoice']=$row['username'];
		$_SESSION['invoiceID']=$row['orderID'];
		header("Location: invoice.php");
	}
	else if(isset($_POST["approve".$row['orderID']]))
	{
		$sql2="UPDATE order_details SET approval = 1 WHERE id=".$row['orderID'].";";
		$result2=$dbh->query($sql2);
	}
	else if(isset($_POST["deny".$row['orderID']]))
	{
		echo "HELOOOOOOO";
		$sql2="UPDATE order_details SET approval = 0 WHERE id=".$row['orderID'].";";
		$result2=$dbh->query($sql2);
	}
	else if(isset($_POST["delete".$row['orderID']]))
	{
		$sql2="DELETE FROM order_details WHERE id=".$row['orderID'].";";
		$result2=$dbh->query($sql2);
	}
}



$model = new User();
$controller = new UserController($model);



require_once(__ROOT__ . 'view/Viewbar.php');




?>


<html>
<head>
	<title>Client Orders | INAGZ</title>
	<link rel = 'icon' href ='images/logo2.jpg' type = 'image/x-icon'> 
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>

	<!-- links of bootstrap 3 -->
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script>

	
</head>

<body>
	<!-------------------------------------------------------Start of Content--------------------------------------------------------------->			

		<h1><b>Client Orders :-</b></h1>
		<style>
		td, tr, img  { padding: 0px; margin: 0px; border: none; }
		table { border-collapse: collapse; }
		</style>
		
		<?php

			$sql3="SELECT *, order_details.id as orderID, users.id as userID FROM order_details JOIN users ON order_details.access = users.username 
			
			WHERE users.access='user' AND order_details.order_status=1 AND order_details.delivery_status=0;";  
			
			//GROUP BY order_details.access;";
			// order_details.access, order_details.id as orderID, users.id as userID,
			$result3=$dbh->query($sql3);
			echo "
			<form action='' method='post'>
				<table class='table' cellspacing='0' cellpadding='0'>
						<thead>
							<tr>   
								<th width='5%'>Client ID</th> 
								<th width='5%'>Order ID</th> 
								<th width='15%'>Order Details</th> 
								<th width='10%'>Client Username</th>
								<th width='15%'>Client E-Mail</th>
								<th width='10%'>First Name</th>
								<th width='10%'>Last Name</th>
								<th width='10%'>Phone Number</th>
								<th>Invoice</th>
								<th>Order Approval</th>
								<th>Order Deletion</th>
							</tr>
						</thead>
			";
			if($result3!=false)
			{
				while($row3=mysqli_fetch_array($result3))
				{
					echo "
						<tr>   
							<td>".$row3['userID']."</td> 
							<td>".$row3['orderID']."</td>
							<td>".$row3['category'].". Quantity: ".$row3['quantity']."</td>
							<td>".$row3['username']."</td>
							<td>".$row3['email']."</td>
							<td>".$row3['Fname']."</td>
							<td>".$row3['Lname']."</td>
							<td>+".$row3['mobile']."</td>
							<td><button type='submit' class='btn btn-success' name='invoice".$row3['orderID']."'>View Invoice</button></td>";
							
							if($row3['approval']==0)
							{
								echo"<td><button type='submit' class='btn btn-success' name='approve".$row3['orderID']."'>Approve Order</button></td>";
							}
							else
							{
								echo"<td><button type='submit' class='btn btn-danger' name='deny".$row3['orderID']."'>Deny Order</button></td>";
							}
							echo"<td><button  type='submit' class='btn btn-warning' name='delete".$row3['orderID']."'>Delete Order</button></td>";
							echo"</tr>";
						
				}
			}

			echo "</table>
			</form>
			"

	






		?>



	<!-------------------------------------------------------End of Content----------------------------------------------------------------->
	
	<!-------------------------------------------------------Start of Footer---------------------------------------------------------------->
	<?php include 'footer.php'; ?>
	<!-------------------------------------------------------End of Footer------------------------------------------------------------------>
</body>
</html>