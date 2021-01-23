<?php
session_start();
define('__ROOT__', '../app/');		

require_once(__ROOT__ . 'model/User_php.php');
require_once(__ROOT__ . 'controller/UserController.php');
require_once(__ROOT__ . 'db\Dbh.php');

$_SESSION['invoice']=$_SESSION['username'];

$model = new User();
$controller = new UserController($model);
$dbh = new Dbh();

$sql="SELECT * FROM order_details WHERE access ='".$_SESSION['username']."';";

$result=$dbh->query($sql);

if($result!=false)
{
	while($row=$dbh->fetchRow($result))
	{
		if(isset($_POST["delete".$row['id']]))
		{
			$sql2="DELETE FROM order_details WHERE id = ".$row['id'].";";
			$result2=$dbh->query($sql2);
		}
		
		else if(isset($_POST["checkout".$row['id']]))
		{
			$sql2="UPDATE order_details SET order_status = 1, order_date = '".date('Y-m-d h:i:s')."' WHERE id = ".$row['id'].";";
			$result2=$dbh->query($sql2);
			header("Location: orderhistory.php");
		}
		else if(isset($_POST["invoice".$row['id']]))
		{
			$_SESSION['invoice']=$_SESSION['username'];
			$_SESSION['invoiceID']=$row['id'];
			header("Location: invoice.php");
		}
		else if(isset($_POST["checkoutAll"]))
		{
			
			$sql2="UPDATE order_details SET order_status=1, order_date = '".date('Y-m-d h:i:s')."' WHERE access ='".$_SESSION['username']."' AND order_status <> 1;";
			$result2=$dbh->query($sql2);
			header("Location: orderhistory.php");
		}
		else if(isset($_POST['invoice']) && $row['order_status']==0)
		{
			$_SESSION['invoicePage']="cart";
			header("Location: invoice.php");
		}
		else if(isset($_POST['invoice']) && $row['order_status']==1)
		{
			echo "<script> alert('No invoice available.'); </script>";
		}
	}
}

require_once(__ROOT__ . 'view/Viewbar.php');







?>


<html>
<head>
	<title>Cart | INAGZ</title>
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
		<h1><b>Your Cart :-</b></h1>
		<style>
		td, tr, img  { padding: 0px; margin: 0px; border: none; }
		table { border-collapse: collapse; }
		</style>
		<?php

			if(isset($_SESSION['username']))
			{
				/*$user=new User($_SESSION['username'],$_SESSION['password']);
				$user->getCart()->fillArray();
				

				$user->getCart()->getSize();*/
				
				$sql="SELECT * FROM order_details WHERE access = '".$_SESSION['username']."' AND order_status = 0;";
				$result=$dbh->query($sql);
				if(mysqli_num_rows($result)==0)
				{
					echo "<h1> Nothing to show here</h1> <br>";
				}
				else
				{
					echo "<form action='' method='post' class='need-validated' enctype='multipart/form-data'>
					<table class='table table-condensed' cellspacing='0' cellpadding='0'class='table table-condensed' cellspacing='0' cellpadding='0'>";
					echo "<tr>
							<th width='15%'>Design</th>
							<th width='15%'>Details</th>
							<th width='15%'>Description</th>
							<th width='10%'>Cost</th>
							<th width='20%' colspan='3'>Action</th>
							
						</tr>
						
					";
					if($result!=false)
					{

						while($row=$dbh->fetchRow($result))
						{
							
							$desc="";
							if(!empty($row['description']))
							{
								$desc=$row['description'];
							}
							else
							{
								$desc="None";
							}
							echo "
								<tr>
									<td rowspan='8'><img src='data:image/jpg;base64,".base64_encode($row['design'])."' height=256 width=256 /> </td>
									<td> <b>Order ID: ".$row['id']."</b></td>
									
									<td rowspan='7'>".$desc."</td>
									<td> 1 Paper Cost: <b>".$row['paper_cost']." EG</b></td>
									";

				
										echo"
										<td rowspan='7'><button type='submit' style='float:right;' class='glyphicon glyphicon-trash btn-lg btn-danger' onClick=\"return confirm('Are you sure you want to remove this item from the cart?')\" name='delete".$row['id']."'></button></td>
										<td rowspan='1'><button style='width:140px; height:50px; font-size:25px; float:right;' class='btn btn-warning' name='invoice".$row['id']."'><span class='glyphicon glyphicon-list-alt'></span>Invoice</button> </td>

										<td rowspan='1'><button style='width:150px; height:50px; font-size:25px; float:right;' class='btn btn-success' onClick=\"return confirm('Are you sure you proceed to checkout with this item?')\" name='checkout".$row['id']."'><span class='glyphicon glyphicon-shopping-cart'></span>Checkout</button> </td>
										";
									

									
								
								echo"</tr>

								<tr>
									<td> Product Category: ".$row['category']."</td>
								</tr>
								<tr>
									<td> Product Quantity: ".$row['quantity']."</td>
									
								</tr>
								<tr>
									<td> Paper Quantity: ".$row['paper_quantity']."</td>
									<td> Product Cost: <b>".$row['cost']." EG</b></td>
									
								</tr>
								<tr>
									<td> Paper Size: ".$row['papersize']."</td>
									
								</tr>
								<tr>
									<td> Printed Sides: ".$row['printedsides']."</td>
									
																	

								</tr>
								<tr>
									<td> Finish: ".$row['finish']."</td>
									<td> Total Cost: <b>".$row['total_cost']." EG</b></td>
									
								</tr>
								<tr>
									<td> Printed Weight: ".$row['paperweight']."</td>
								</tr>
								

								<!--<td rowspan='1'><button type='submit' class='glyphicon glyphicon-pencil btn-lg' name='edit'></button></td>-->

								
							";
							/*echo "
								<tr>
									<td rowspan='6'><img src='data:image/jpg;base64,".base64_encode($row['design'])."' height=256 width=256 /> </td>
									<td> Product Quantity: ".$row['quantity']."</td>
									<td rowspan='6'>".$desc."</td>
									<td> 1 Paper Cost: ".$row['paper_cost']." EG</td>
									<td rowspan='6' colspan='0'><button type='submit' class='glyphicon glyphicon-trash btn-lg btn-danger' name='".$row['id']."'></button></td>
									
								</tr>


								<tr>
									<td> Paper Quantity: ".$row['paper_quantity']."</td>
									<td> Product Cost: ".$row['cost']." EG</td>
									
									
								</tr>
								<tr>
									<td> Paper Size: ".$row['papersize']."</td>
									<td> Total Cost: ".$row['total_cost']." EG</td>
									
								</tr>
								<tr>
									<td> Printed Sides: ".$row['printedsides']."</td>
									
								</tr>
								<tr>
									<td> Finish: ".$row['finish']."</td>
									
								</tr>
								<tr>
									<td> Printed Weight: ".$row['paperweight']."</td>
								</tr>
							
								
								<!--<td rowspan='1'><button type='submit' class='glyphicon glyphicon-pencil btn-lg' name='edit'></button></td>-->

								
							";*/
						echo "<br>";	
						}
						
						echo '</table> 
						<hr><button style="width:230px; height:50px; font-size:25px; float:right;" class="btn btn-success" onClick=\'return confirm("Are you sure you want to proceed to checkout with all items in your cart?")\' name="checkoutAll"><span class="glyphicon glyphicon-shopping-cart"></span> Checkout All</button>
						<button style="width:230px; height:50px; font-size:25px; float:right; margin-right:10px;" class="btn btn-warning" name="invoice"><span class="glyphicon glyphicon-list-alt"></span> All Invoices</button>
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