<?php
//require_once(__ROOT__ . "model/Model.php");
require_once("Model.php");
require_once("CategorySample.php");

class Category extends Model
{
	protected $name;
	protected $filePath;
	protected $categorySamples=array();
	
	function __construct() 
	{
		//$this->name=$name;
		//$this->filePath=$filePath;
		$this->fillArray();
		$this->db = $this->connect();
	}


	function setName($name) 
	{
		return $this->name = $name;
	}
  
	function getName() 
	{
		return $this->name;
	}
	
	function setFilePath($filePath) 
	{
		return $this->filePath = $filePath;
	}
  
	function getFilePath() 
	{
		return $this->filePath;
	}
	
	function initialize($name,$filePath)
	{
		
		$this->name=$name;
		$this->filePath=$filePath;
		
		//if(!file_exists($filePath))
		//{
			
		//}
		
		/*
			//require_once(__ROOT__ . 'model/Categories.php');
			//require_once(__ROOT__ . 'controller/CategoriesController.php');
			require_once(__ROOT__ . 'model/User_php.php');
			require_once(__ROOT__ . 'controller/UserController.php');
			$model = new User();
			$controller = new UserController($model);
			
			//$model=new Categories();
			//$controller=new CategoriesController($model);
		*/
		
		$str=
		"<?php
			\$_SESSION['category']='".$name."';
			define('__ROOT__', '../app/');		
			require_once(__ROOT__ . 'model/User_php.php');
			require_once(__ROOT__ . 'controller/UserController.php');
			
			require_once(__ROOT__ . 'model/Category.php');
			require_once(__ROOT__ . 'model/Categories.php');
			require_once(__ROOT__ . 'view/ViewCategory.php');
			require_once(__ROOT__ . 'controller/CategoryController.php');
			require_once(__ROOT__ . 'controller/CategoriesController.php');
			
			\$model = new User();
			\$controller = new UserController(\$model);
			
			\$categoriesModel=new Categories();
			\$categoryModel=\$categoriesModel->getCategory(\$_SESSION['category']);
			
			\$categoryController=new CategoryController(\$categoryModel);
			\$viewCategory=new ViewCategory(\$categoryController,\$categoryModel);
			require_once(__ROOT__ . 'view/Viewbar.php');

		?>


		<html>
			<head>
				<title>".$name." | INAGZ</title>
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
				<div class='container'>

					<h1><b>".$name." :-</b></h1>
					<hr> <br>
					<?php
						echo \$viewCategory->viewCategorySamples();
					?>
					

				</div>

				<!-------------------------------------------------------End of Content----------------------------------------------------------------->
				
				<!-------------------------------------------------------Start of Footer---------------------------------------------------------------->
				<?php include 'footer.php'; ?>
				<!-------------------------------------------------------End of Footer------------------------------------------------------------------>
			</body>
		</html>";
		
		//if(!file_exists($filePath))
		//{
			$file=fopen($_SERVER['DOCUMENT_ROOT']."/newingaz/public/".$filePath,"w");
			fwrite($file,$str);
			fclose($file);
		//}
	}
	
	
	/*function addSample($id,$headline,$description,$image,$categoryName)
	{
		$sample=new CategorySample($id,$headline,$description,$image,$categoryName);
		
		array_push($this->categorySamples,$sample);
	}*/
	
	function fillArray() 
	{
		$this->db = $this->connect();
		$result = $this->readCategorySamples();
		if ($result != false)
		{
			while ($row = $result->fetch_assoc()) 
			{
				array_push($this->categorySamples, new CategorySample($row["id"],$row["headline"],$row["description"],$row["image"],$row['category_name']));
			}
		}
	}
	
	  function getCategorySamples() {
    return $this->categorySamples;
  }
    
	function readCategorySamples()
	{
		$sql = "SELECT * FROM category_samples;";
		
		$result = $this->db->query($sql);
		if ($result != false)
		{
			return $result;
		}
		else 
		{
			return false;
		}
	}
	
	
	function insertCategorySample($headline,$description,$image,$categoryName)
	{
		$headline=$this->db->getConn()->real_escape_string($headline);
		$description=$this->db->getConn()->real_escape_string($description);
		
		$sql="SELECT * FROM category_samples WHERE headline = '".$headline."' AND description = '".$description."';";
		//$sql="SELECT * FROM category_samples;";	
				
		$result = $this->db->query($sql);
		if(!$result->num_rows>0)
		{
			//$sample=new CategorySample($id,$headline,$description,$image,$categoryName);
			//array_push($this->categorySamples,$sample);
			
			$sql2="INSERT INTO category_samples (headline, description, image, category_name) VALUES ('".$headline."','".$description."','".$image."','".$categoryName."');";
			$result = $this->db->query($sql2);
						
			echo mysqli_error($this->db->getConn());

			$this->fillArray();
			echo "Record inserted successfully.";
			//echo "<meta http-equiv='refresh' content='0'>";
		
		}
		else
		{
			echo "Error. This sample already exists.";
		}
	}
	
	function deleteCategorySample($id)
	{
		$sql="DELETE FROM category_samples WHERE id='$id';";
		
		if($this->db->query($sql) === true)
		{
			echo "Record deleted successfully.";
			$this->fillArray();
			echo "<meta http-equiv='refresh' content='0'>";
		}
		else
		{
			echo "ERROR. Category sample doesn't exist.";
		}
	}
	
	function editCategorySample($id,$headline,$description,$image,$categoryName)
	{
		$sql="UPDATE category_samples SET headline='$headline', description='$description', image='$image', category_name='categoryName';";
		
		if($this->db->query($sql) === true)
		{
			echo "Record edited successfully.";
			$this->fillArray();
			echo "<meta http-equiv='refresh' content='0'>";
			
		}
		else
		{
			echo "ERROR: Could not able to execute $sql. ";
		}
	}
	

}

?>