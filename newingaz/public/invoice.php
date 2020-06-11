<?php
session_start();
require('fpdf17/fpdf.php');
define('__ROOT__', '../app/');
require_once(__ROOT__ . 'db\Dbh.php');

//db connection
/*
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'invoicedb');

//get invoices data
$query = mysqli_query($con,"select * from invoice
	inner join clients using(clientID)
	where
	invoiceID = '".$_GET['invoiceID']."'");
$invoice = mysqli_fetch_array($query);

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm
*/
$dbh = new Dbh();
if(isset($_SESSION['invoiceID']))
{
	if(!empty($_SESSION['invoiceID']))
	{
		$sql="SELECT * FROM order_details WHERE access ='".$_SESSION['invoice']."' AND id = ".$_SESSION['invoiceID'].";";
	}
}
else if(isset($_SESSION['invoicePage']))
{
	if($_SESSION['invoicePage']=="cart")
	{
		$sql="SELECT * FROM order_details WHERE access ='".$_SESSION['invoice']."' AND order_status=0;";
	}
	else if($_SESSION['invoicePage']=="clientOrders")
	{
		$sql="SELECT * FROM order_details WHERE access ='".$_SESSION['invoice']."' AND order_status=1;";
	}
}
$sql2="SELECT * FROM users WHERE username ='".$_SESSION['invoice']."';";



$result=$dbh->query($sql);
$result2=$dbh->query($sql2);
$row2=mysqli_fetch_array($result2);

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

$image1 = "images/logo.png";

$pdf->Image($image1, 65, 0, 60);

$pdf->setFillColor(89,230,230); 


//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130	,5,'INGAZ for Print',0,0);
$pdf->Cell(59	,5,'INVOICE',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130	,5,'[Ahmed Fakhry st.]',0,0);
$pdf->Cell(59	,5,'',0,1);//end of line

$pdf->Cell(130	,5,'[Cairo, Egypt, 12334]',0,0);
$pdf->Cell(25	,5,'Customer ID: ',0,0);
$pdf->Cell(34	,5,$row2['id'],0,1);//end of line

$pdf->Cell(130	,5,'Phone [+12345678]',0,1);


$pdf->Cell(130	,5,'Fax [+12345678]',0,1);


//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//billing address
$pdf->Cell(100	,5,'Bill to:',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,"Username: ".$row2['username'],0,1);

//$pdf->Cell(10	,5,'',0,0);
//$pdf->Cell(90	,5,'Company',0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,"Address: ".$row2['address'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,"Phone: +0".$row2['mobile'],0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(125	,5,'Description',1,0);
$pdf->Cell(41	,5,'Dates',1,0);
$pdf->Cell(24	,5,'Amount',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

//items
/*
$query = mysqli_query($con,"select * from item where invoiceID = '".$invoice['invoiceID']."'");
$tax = 0; //total tax

*/
$amount = 0; //total amount
//display the items
while($row = mysqli_fetch_array($result)){
	$pdf->Cell(125	,5,"Order ID: ".$row['id'].". Prodcut Type: ".$row['category'],'RL',0);
	
	//add thousand separator using number_format function
	$pdf->Cell(41	,5,"Order Date: ",'RLT',0);
	$pdf->Cell(24	,5,$row['total_cost'],1,1,'R');//end of line
	
	$pdf->Cell(125	,5,$row['printedsides'].", ".$row['finish'].", ".$row['papersize'].", ".$row['paperweight'],'RL',0);
	//if($row['delivery_date!=']
	if($row['order_date']!="0000-00-00 00:00:00" && $row['order_status']!=0)
	{
		$pdf->Cell(41	,5,$row['order_date'],'RL',0);
	}
	else
	{
		$pdf->Cell(41	,5,"Not yet ordered",'RL',0);
	}
	$pdf->Cell(24	,5,"",'RL',1,'R');
	
	if(empty($row['description']))
	{
		$pdf->Cell(125	,5,"Description: None",'RL',0);
		$pdf->Cell(41	,5,"Delivery Date: ",'RLT',0);
		$pdf->Cell(24	,5,"",'RL',1,'R');
	}
	else
	{
		$pdf->Cell(125	,5,"Description: ".$row['description'],1,0);
		$pdf->Cell(41	,5,"Delivery Date: ",'RL',0);
		$pdf->Cell(24	,5,"",'RL',1,'R');
	}
	
	if($row['approval']==0)
	{
		$pdf->Cell(125	,5,"Order Status: Not Accepted",'RLB',0);
		if($row['delivery_date']!="0000-00-00 00:00:00" && $row['delivery_status']!=0)
		{
			$pdf->Cell(41	,5,$row['delivery_date'],'RL',0);
		}
		else
		{
			$pdf->Cell(41	,5,"7 days from order.",'RL',0);
		}
		$pdf->Cell(24	,5,"",'RL',1,'R');
	}
	else
	{
		$pdf->Cell(125	,5,"Order Status: Accepted",'RLB',0);
		if($row['delivery_date']!="0000-00-00 00:00:00" && $row['delivery_status']!=0)
		{
			$pdf->Cell(41	,5,$row['delivery_date'],'RL',0);
		}
		else
		{
			$pdf->Cell(41	,5,"7 days from order.",'RL',0);
		}
		$pdf->Cell(24	,5,"",'RL',1,'R');
		$amount += $row['total_cost'];
	}
	//accumulate tax and amount
	
}

/*
	$pdf->Cell(125	,5,$row['printedsides'].",".$row['finish'].",".$row['papersize'].",".$row['category'],1,0);
	
	//add thousand separator using number_format function
	$pdf->Cell(41	,5,$row['order_date'],1,0);
	$pdf->Cell(24	,5,number_format($row['total_cost']),1,1,'R');//end of line
	
	$pdf->Cell(125	,5,"Order Accepted",1,0);
	$pdf->Cell(41	,5,"",1,0);
	$pdf->Cell(24	,5,"",1,1,'R');
	
	$pdf->Cell(125	,5,"Order Accepted",1,0);
	$pdf->Cell(41	,5,"",1,0);
	$pdf->Cell(24	,5,"",1,1,'R');
	//accumulate tax and amount
	$amount += $row['total_cost'];
*/

//summary


$pdf->Cell(125	,5,'',0,0);
$pdf->Cell(41	,5,'Total Due',1,0);
$pdf->Cell(4	,5,'$',1,0);
$pdf->Cell(20	,5,$amount,1,1,'R');//end of line





















$pdf->Output();

?>
