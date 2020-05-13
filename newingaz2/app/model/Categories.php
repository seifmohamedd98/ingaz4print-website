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
		
		$sql="SELECT * FROM category;";
		//$file=fopen($_SERVER['DOCUMENT_ROOT']."/ingazclasses/public/".$filePath,"w");
		
		$filePath=$categoryName.".php";
		$result = $this->db->query($sql);
		$categoryName=$this->db->getConn()->real_escape_string($categoryName);
		
		$flag = false;
		
		$row=$this->db->fetchRow($result);
		$num=mysqli_num_rows($result);
		
		for($i=0;$i<$num;$i++)
		{
			
			if($categoryName==$row['name'])
			{
				echo "<b>Error. Category '".$categoryName."' already exists.</b>";
				$flag=true;
			}
			$row=$this->db->fetchRow($result);
		}
		
		if($flag==false)
		{
			
			
			$sql2="INSERT INTO category (name) VALUES ('$categoryName');";
			$result = $this->db->query($sql2);
			$this->fillArray();
			echo "Record inserted successfully.";
			//echo "<meta http-equiv='refresh' content='0'>";
			
		}
	}
	
	function deleteCategory($categoryName)
	{
		$sql="DELETE FROM category WHERE name='$categoryName';";
		if($this->db->query($sql) === true)
		{
			echo "Record deleted successfully.";
			$this->fillArray();
			//echo "<meta http-equiv='refresh' content='0'>";
		}
		else
		{
			echo "ERROR. Category '".$categoryName."' doesn't exist.";
		}
	}
	
	function editCategory($categoryName,$newCategoryName)
	{
		if($categoryName==$newCategoryName)
		{
			echo "Error. Can't choose the same category name.";
		}
		$sql="UPDATE category SET name='$newCategoryName' WHERE name='$categoryName' and NOT (name = '$newCategoryName');";
		if($this->db->query($sql) === true)
		{
			echo "Record edited successfully.";
			$this->fillArray();
			//echo "<meta http-equiv='refresh' content='0'>";
			
		}
		else
		{
			echo "Error. Category '".$categoryName."' already exists.";
			//echo "ERROR: Could not able to execute $sql. ";
		}
	}
	



}

