<?php
	/*define('__ROOT__', "../app/");
	require_once(__ROOT__ . "model/Model.php");
	require_once(__ROOT__ . "model/Category.php");*/
	//require_once(__ROOT__ . "model/Model.php");

	require_once("Model.php");
	require_once("Category.php");
	
class Categories extends Model {
    private $categories;
  function __construct() {
      $this->fillArray();
  }

  function fillArray() {
    $this->categories = array();
    $this->db = $this->connect();
    $result = $this->readCategories();
    while ($row = $result->fetch_assoc()) 
	{
		$category=new Category();
		$category->initialize($row["name"],$row['name'].".php");
		array_push($this->categories, $category);
    }
    
  }

  function getCategories() {
    return $this->categories;
  }

  function readCategories(){
    $sql = "SELECT * FROM category;";
    
    $result = $this->db->query($sql);
    if ($result->num_rows > 0){
        return $result;
    }
    else {
        return false;
    }
  }
  
	function getCategory($categoryName)
	{
		$categoryName=$this->db->getConn()->real_escape_string($categoryName);
		
		foreach($this->categories as $category)
		{
			if($category->getName()==$categoryName)
			{
				return $category;
			}
		}
	}
  
  	function insertCategory($categoryName)
	{
		$categoryName=$this->db->getConn()->real_escape_string($categoryName);
		$sql="SELECT * FROM category WHERE name = '$categoryName';";
		//$file=fopen($_SERVER['DOCUMENT_ROOT']."/ingazclasses/public/".$filePath,"w");
		
		$filePath=$categoryName.".php";
		$result = $this->db->query($sql);
		
		
		$flag = false;
		
		//$num=mysqli_num_rows($result);
		
		//for($i=0;$i<$num;$i++)
		while($row=$this->db->fetchRow($result))
		{
			if($categoryName==$row['name'])
			{
				echo "<b>Error. Category '".$categoryName."' already exists.</b>";
				$flag=true;
			}
		}
		//echo $this->db->getConn()->error;
		if($flag==false)
		{
			$sql2="INSERT INTO category (name) VALUES ('".$categoryName."');";
			if($result = $this->db->query($sql2)==true)
			{
				$this->fillArray();
				//echo "Record inserted successfully.";
				echo "<script>alert('Record inserted successfully.');</script>";
			}
			else
			{
				echo "<p style='color: #FF0000;'>ERROR. Make sure to delete '$categoryName' samples and products to continue. (Foreign Key Warning)</p>";
				echo $this->db->getConn()->error;
			}


			//echo "<meta http-equiv='refresh' content='0'>";
			
		}
	}
	
	function deleteCategory($categoryName)
	{
		
		$sql = "DELETE FROM product WHERE name_category = '".$categoryName."';";
		$result=$this->db->query($sql);
		
		$sql2 = "DELETE FROM category_samples WHERE category_name = '".$categoryName."';";
		$result2=$this->db->query($sql2);
		

		$sql3 = "DELETE FROM category WHERE name = '".$categoryName."';";
		$result3 = $this->db->query($sql3);
		if(!is_bool($result))
		{
			if(mysqli_num_rows($result) > 0)
			{
				//echo "Records deleted successfully.";
				echo "<script>alert('Records deleted successfully.');</script>";
				$this->fillArray();
				//echo "<meta http-equiv='refresh' content='0'>";
			}
			else
			{
				//echo "Record doesn't exist, or has already been deleted.";
				echo "<script>alert('Record doesn't exist, or has already been deleted.');</script>";
			}
		}



	}
	
	function editCategory($categoryName,$newCategoryName)
	{
		$categoryName = $this->db->getConn()->real_escape_string($categoryName);
		$newCategoryName = $this->db->getConn()->real_escape_string($newCategoryName);
		
		if($categoryName==$newCategoryName)
		{
			//echo "Error. Can't choose the same category name.";
			echo "<script>alert('Error. Can't choose the same category name.');</script>";
		}
		
		$flag=false;
		
		$sql="SELECT * FROM category;";
		$result = $this->db->query($sql);
		$row=$this->db->fetchRow($result);
		
		while($row=$this->db->fetchRow($result))
		{
			if($newCategoryName==$row['name'])
			{
				//echo "<b>Error. Category '".$newCategoryName."' already exists.</b>";
				echo "<script>alert('Error. Category '".$newCategoryName."' already exists.');</script>";
				$flag=true;
			}
		}
		
		
		if($flag==false)
		{
			$sql2="UPDATE category SET name='$newCategoryName' WHERE name='$categoryName' and NOT (name = '$newCategoryName');";
			if($this->db->query($sql2) === true)
			{
				//echo "Record edited successfully.";
				echo "<script>alert('Record edited successfully.');</script>";
				$this->fillArray();
				//echo "<meta http-equiv='refresh' content='0'>";
				
			}
			else
			{
				echo "<p style='color: #FF0000;'>* Error. Make sure to delete '$categoryName' samples and products to continue. (Foreign Key Warning)</p>";
				//echo "ERROR: Could not able to execute $sql. ";
			}
		}
	}
	



}

