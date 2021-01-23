<?php
require_once(__ROOT__ . "model/Model.php");
require_once("Paper.php");
class Product extends Model
{
	private $id;
	private $paper_type;
	private $description;
	private $price;
	private $name_category; 
	
	function __construct($paper_type="",$description="",$price="",$name_category="") 
	{
		//$this->id=$id;
		$this->paper_type=$paper_type;
		$this->description=$description;
		$this->price=$price;
		$this->name_category=$name_category;
	}
	
    public function setid($id)
    {
      return $this->id=$id;   
    }
    public function getid()
    {
      return $this->id;   
    }

	public function setpaper_type($paper_type)
    {
      return $this->paper_type=$paper_type;   
    }
    public function getpaper_type()
    {
      return $this->paper_type;   
	}

	function setdescription($description) 
	{
		return $this->description = $description;
	}
	function getdescription() 
	{
		return $this->description;
	}


	function setprice($price) 
	{
		return $this->price = $price;
	}
	function getprice() 
	{
		return $this->price;
	}

	function setname_category($name_category) 
	{
		return $this->name_category = $name_category;
	}
	function getname_category() 
	{
		return $this->name_category;
	}

	function getproducts()
	{
		$sql = "SELECT *FROM product";

		$dbh = new Dbh();

		$result = $dbh->query($sql);

		$products = array();
		while($row=mysqli_fetch_assoc($result))
		{
			$product = new Product();
			$product->setid($row['id']);
			$product->setpaper_type($row['paper_type']);
			$product->setdescription($row['description']);
			$product->setprice($row['price']);
			$product->setname_category($row['name_category']);
			$products[] = $product;
		}
		return $products;
	}
    function addproduct($paper_type,$description,$price,$name_category)
	{
		
		/*$paper_type=$_POST['paper_type'];
		$description=$_POST['description'];
		$price = $_POST['price'];
		$name_category=$_POST['categorySelect'];*/
		
		$dbh = new Dbh();
		
		if($name_category=="all")
		{
			$sql="SELECT * FROM category;";
			$result = $dbh->query($sql);
			
			//$categories=array();
			
			while($row=mysqli_fetch_assoc($result))
			{
				//array_push($categories,$row['name']);
				$sql2="INSERT into  product(paper_type , description , price , name_category) Values('$paper_type','$description','$price','".$row['name']."');";
				if($dbh->query($sql2) == true)
				{
					echo "Product Added Successfully into ".$row['name'].". <br>";
				}
				else
				{
					echo "ERROR: Could not able to execute $sql2. " . $conn->error;
				}   
			}
		}
		else
		{


			$sql = "INSERT into  product(paper_type , description , price , name_category) Values('$paper_type','$description','$price','$name_category');";
			//echo $sql;
			
			if($dbh->query($sql) == true)
			{
				echo "Product Added Successfully into ".$name_category.".";
				//header("Location:AddProduct.php");
			}
			else
			{
				echo "ERROR: Could not able to execute $sql. " . $conn->error;
			}   
		}
	}
	
	function editproduct($id,$description,$price)
	{
			$id=$_POST['id'];
			// $paper_type=$_POST['paper_type'];
			$description=$_POST['description'];
			$price = $_POST['price'];
			// $name_category=$_POST['name_category'];
		
			$sql = "UPDATE product SET description = '$description', price ='$price' WHERE id=$id";
				
			$dbh = new dbh();

			if($dbh->query($sql) == true)
			{
				//echo "updated successfully.";
				echo "<script>alert('updated successfully.');</script>";
			}
			else
			{
			    echo "ERROR: Could not able to execute $sql. " . $conn->error;
			}
			
	  }

	  function deleteproduct($id)
	  {
		// $id=getid();
		$sql="DELETE FROM product WHERE id='$id';";
		$dbh = new dbh();
		$result = $dbh->query($sql);
		if($dbh->query($sql) === true)
		{
			//echo "Product Deleted Successfully.";
			echo "<script>alert('Product Deleted Successfully.');</script>";
		} 
		else
		{
			echo "ERROR: Could not able to execute $sql. " . $conn->error;
		}
	  }




	
}
?>