<?php
session_start();
$_SESSION['invoice']=$_SESSION['username'];
define('__ROOT__', '../app/');		

require_once(__ROOT__ . 'model/User_php.php');
require_once(__ROOT__ . 'controller/UserController.php');
require_once(__ROOT__ . 'db\Dbh.php');



$model = new User();
$controller = new UserController($model);
$dbh = new Dbh();





$sql="SELECT * FROM order_details WHERE access = '".$_SESSION['username']."' AND order_status = 1;";
$result=$dbh->query($sql);

if($result!=false)
{
	while($row=$dbh->fetchRow($result))
	{

		if(isset($_POST['invoice']))
		{
			if(isset($_SESSION['invoiceID']))
			{
				$_SESSION['invoiceID']=null;
			}
			$_SESSION['invoicePage']="clientOrders";
			header("Location: invoice.php");
		}
		else if(isset($_POST["invoice".$row['id']]))
		{
			$_SESSION['invoice']=$row['access'];
			$_SESSION['invoiceID']=$row['id'];
			header("Location: invoice.php");
		}
	}
}
require_once(__ROOT__ . 'view/Viewbar.php');
?>


<html>
<head>
	<title>orderhistory | INAGZ</title>
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
		<h1><b>Your  Order History :-</b></h1>
		<style>
		td, tr, img  { padding: 0px; margin: 0px; border: none; }
		table { border-collapse: collapse; }
		</style>
		<?php

			if(isset($_SESSION['username']))
			{
		
				
				$sql2="SELECT * FROM order_details WHERE access = '".$_SESSION['username']."' AND order_status = 1;";
				$result2=$dbh->query($sql2);
				if(mysqli_num_rows($result2)==0)
				{
					echo "<h1> Nothing to show here</h1> <br>";
				}
				else
				{
					echo "<form action='' method='post' class='need-validated' enctype='multipart/form-data'>
					<table class='table' cellspacing='0' cellpadding='0'class='table table-condensed' cellspacing='0' cellpadding='0'>";
					echo "<tr>
							<th width='15%'>Design</th>
							<th width='25%'>Details</th>
							<th width='20%'>Description</th>
							<th width='15%'>Cost</th>
							<th width='15%'>Order Status</th>
							<th width='10%'>Invoice</th>
						</tr>
						
					";
					if($result2!=false)
					{
						$count=0;
						while($row2=$dbh->fetchRow($result2))
						{
							$count++;
							$desc="";
							if(!empty($row2['description']))
							{
								$desc=$row2['description'];
							}
							else
							{
								$desc="None";
							}
							echo "
								<tr>
									<td rowspan='8'><img src='data:image/jpg;base64,".base64_encode($row2['design'])."' height=256 width=256 /> </td>
									<td> <b>Order ID: ".$row2['id']."</b></td>
									<td rowspan='7'>".$desc."</td>
									
									<td> 1 Paper Cost: <b>".$row2['paper_cost']." EG</b></td>

								";
								
								if($row2['delivery_status']==0)
								{
									echo"<td> <b>Your order is in progress.</b></td>";
								}
								else
								{
									echo"<td> <b>Your order has been delivered.</b></td>";
								}
								
								echo "<td rowspan='7'><button style='width:150px; height:50px; font-size:25px; float:right;' class='btn btn-warning' name='invoice".$row2['id']."'><span class='glyphicon glyphicon-list-alt'></span>Invoice</button> </td>";
									

	
									

									
								
								echo"</tr>


								<tr>
									<td> Product Category: ".$row2['category']."</td>
									
								</tr>
								<tr>
									<td> Product Quantity: ".$row2['quantity']."</td>
									<td> Product Cost: <b>".$row2['cost']." EG</b></td>
									<td> Order Date: <b>".$row2['order_date']."</b></td>
								</tr>
								<tr>
									<td> Paper Quantity: ".$row2['paper_quantity']."</td>

									
								</tr>
								<tr>
									<td> Paper Size: ".$row2['papersize']."</td>
									
								</tr>
								<tr>
									<td> Printed Sides: ".$row2['printedsides']."</td>
									<td> Total Cost: <b>".$row2['total_cost']." EG</b></td>";
									
								if($row2['delivery_status']==1 && $row2['delivery_date']!="0000-00-00 00:00:00")
								{
									echo"<td>Delivery Date: <b>".$row2['delivery_date']."</b></td>";
								}
								else
								{
									echo"<td> Delivery Date: <b>7 days from Order Date.</b></td>";
								}


									
								echo"
								</tr>
								<tr>
									<td> Finish: ".$row2['finish']."</td>
									
									
								</tr>
								<tr>
									<td> Printed Weight: ".$row2['paperweight']."</td>
								</tr>
								

								<!--<td rowspan='1'><button type='submit' class='glyphicon glyphicon-pencil btn-lg' name='edit'></button></td>-->

							";
					
						echo "<br>";	
						}
						
						echo '</table>';
						if($count!=0)
						{
							echo'<button style="width:230px; height:50px; font-size:25px; float:right; margin-right:10px;" class="btn btn-warning" name="invoice"><span class="glyphicon glyphicon-list-alt"></span> All Invoices</button>';
						}
						echo'
						<br> <br> <br>
						</form>';
						
					}
			}
			}





		?>




	<!-------------------------------------------------------End of Content----------------------------------------------------------------->
	
	<!-------------------------------------------------------Start of Footer---------------------------------------------------------------->
	<?php include 'footer.php'; ?>
	<!-------------------------------------------------------End of Footer------------------------------------------------------------------>
</body>
</html>