<?php
	require_once(__ROOT__ . "model/Model.php");
	require_once("Product.php");
	require_once("Paper.php");


	class Cart extends Model
	{
		protected $productArray;
		
		function getSize()
		{
			foreach($this->productArray as $product)
			{
				echo $product->getPaper()->getSize();
			}
		}
		
		function __construct()
		{
			$this->productArray=array();
			$this->db = $this->connect();
		}

		function addToCart($product)
		{
			array_push($this->productArray,$product);
			
			$paper=$product->getPaper();
			$sql="INSERT INTO order_details (category,quantity,paper_quantity,papersize,printedsides,finish,paperweight,design,description,paper_cost,cost,access) VALUES ('".$product->getCategory()."',".$product->getQuantity().",".$product->getPaperQuantity().",'".$paper->getSize()."','".$paper->getSide()."','".$paper->getFinish()."','".$paper->getWeight()."','".$product->getDesign()."','".$product->getDescription()."',".$paper->getPrice().",".$product->getPrice().",'".$_SESSION['username']."');";                                                                                                                 
			
			//$sql="INSERT INTO order_details (category,quantity,paper_quantity,papersize,printedsides,finish,paperweight,design,description,paper_cost,cost,total_cost,access,cart_date) VALUES ('".$product->getCategory()."',".$product->getQuantity().",".$product->getPaperQuantity().",'".$paper->getSize()."','".$paper->getSide()."','".$paper->getFinish()."','".$paper->getWeight()."','".$product->getDesign()."','".$product->getDescription()."',".$paper->getPrice().",".$product->getPrice().",".$product->getTotalPrice().",'".$_SESSION['username']."','".date('Y-m-d h:i:s')."');";                                                                                                                 
			//$sql="INSERT INTO order_details (quantity, paper_quantity, papersize, printedsides, finish, paperweight, description, paper_cost, cost, total_cost,  access) VALUES ('$product->getQuantity()','$product->getPaperQuantity()','$paper->getSize()','$paper->getSide()','$paper->getFinish()','$paper->getWeight()','$product->getDescription()','$paper->getPrice()','$product->getPrice()','$product->getTotalPrice()','$_SESSION['username']');";                                                                                                           
			
			
			//$dbh = new Dbh();
			//$result = $dbh->query($sql);
			
			if($this->db->query($sql) == true)
			//if($result==true)
			{
				//echo "Product Added Successfully into Cart <br>";
				echo "<script>alert('Product Added Successfully into Cart');</script>";
				$this->fillArray();
			}
			else
			{
				//echo "ERROR: Could not able to execute $sql";
				echo "<br> ".$this->db->getConn()->error.";";
			} 
			
		}
		
		
		function fillArray() 
		{
			$this->productArray = array();
			$this->db = $this->connect();
			$result = $this->readProductArray();
			if ($result!=false)
			{
				while ($row = $result->fetch_assoc()) 
				{
					$paper=new Paper($row['papersize'], $row['finish'], $row['printedsides'], $row['paperweight']);
					$product=new ProductModel($row['id'], $row['description'], $paper, $row['quantity'], $row['paper_quantity'], $row['design']);
					array_push($this->productArray, $product);
				}
			}
		}

		function readProductArray()
		{
			$sql = "SELECT * FROM order_details WHERE access = ".$_SESSION['username'].";";

			$result = $this->db->query($sql);
			if ($result!=false)
			{
				return $result;
			}
			else 
			{
				return false;
			}
		}
		
		
		
		
	}
	

?>