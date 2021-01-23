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
		//$this->fillArray();
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
			session_start();
			\$_SESSION['category']='".$name."';
			define('__ROOT__', '../app/');		
			require_once(__ROOT__ . 'model/User_php.php');
			require_once(__ROOT__ . 'controller/UserController.php');
			require_once(__ROOT__ . 'db\Dbh.php');
			
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
			
			\$categoryController->delete();

			

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
		

			//$file=fopen($_SERVER['DOCUMENT_ROOT']."/newingaz/public/".$name.".php","w");
			$file=fopen(dirname(dirname(dirname(__FILE__)))."\\public\\".$name.".php","w");
			fwrite($file,$str);
			fclose($file);
			$this->fillArray();
			
			
			
			//Category Maker Page (Form)
			
			/*$strSize1="<h3><b>Paper Size</b></h3>
            <select name='papersize' class='form-control'>";
                        
						
			$strSize2= "</select>";*/
			
			
			$str2=
			"
			
				<?php
				session_start();
				\$_SESSION['category']='".$name."';
				define('__ROOT__', '../app/');		
				
				require_once(__ROOT__ . 'model/User_php.php');
				require_once(__ROOT__ . 'controller/UserController.php');
				require_once(__ROOT__ . 'db\Dbh.php');
				
				require_once(__ROOT__ . 'model/Category.php');
				require_once(__ROOT__ . 'model/Categories.php');
				require_once(__ROOT__ . 'view/ViewCategory.php');
				require_once(__ROOT__ . 'controller/CategoryController.php');
				
				require_once(__ROOT__ . 'model/ProductModel.php');
				require_once(__ROOT__ . 'model/Paper.php');
				
				\$model = new User();
				\$controller = new UserController(\$model);
				\$dbh = new Dbh();
				
				
				
				\$categoriesModel=new Categories();
				\$categoryModel=\$categoriesModel->getCategory(\$_SESSION['category']);
				
				\$categoryController=new CategoryController(\$categoryModel);
				\$viewCategory=new ViewCategory(\$categoryController,\$categoryModel);
				
				require_once(__ROOT__ . 'view/Viewbar.php');
				
				//if(!empty(\$_FILES['image']['tmp_name']) && file_exists(\$_FILES['image']['tmp_name']) && isset(\$_POST['addToCart'])) 
								
				\$designError = '';
				\$quantityError = '';
				\$paperQuantityError = '';
				\$descriptionError = '';
				
				\$designValue = \$quantityValue = \$paperQuantityValue = \$descriptionValue = '';
			
				\$flag=true;
				if(isset(\$_POST['addToCart']) || isset(\$_POST['cost']) || isset(\$_POST['proceed']) )
				{
					
					\$paperSize=\$_POST['papersize'];
					\$printedSide=\$_POST['printedsides'];
					\$paperFinish=\$_POST['paperfinish'];
					\$paperWeight=\$_POST['paperweight'];
					
										
					if(!empty(\$_FILES['image']['tmp_name']) && file_exists(\$_FILES['image']['tmp_name']))
					{						
						\$design=mysqli_real_escape_string(\$dbh->getConn(),file_get_contents(\$_FILES['image']['tmp_name']));
					}
					else
					{
						//\$imageContent = file_get_contents('__ROOT__' . 'uploads/no-image.jpg');
						//file_put_contents(\$design, \$imageContent);
						\$design='';
					}
					\$quantity=\$_POST['quantity'];
					\$paperQuantity=\$_POST['paperQuantity'];
					\$description=mysqli_real_escape_string(\$dbh->getConn(),\$_POST['description']);
					
					
					if ( !empty(\$_SERVER['CONTENT_LENGTH']) && empty(\$_FILES) && empty(\$_POST) )
					{
						\$designError='The uploaded file was too large. You must upload a file smaller than ' . ini_get('upload_max_filesize');
						\$flag=false;
					}
					

					if(empty(\$_POST['quantity']))
					{
						\$quantityError = '* Quantity can not be empty';
						\$flag=false;
					}
					else if(!is_numeric(\$quantity))
					{
						\$quantityError = '* Quantity must be a number';
						\$flag=false;
					}
					else if(\$quantity <= 0)
					{
						\$quantityError = '* Quantity must greater than 0';
						\$flag=false;
					}
					else if(\$quantity >100000)
					{
						\$quantityError = '* Quantity can not exceed 100,000 products';
						\$flag=false;
					}
					else
					{
						\$quantityValue = \$quantity; 
					}
					
					
					

					if(empty(\$_POST['paperQuantity']))
					{
						\$paperQuantityError = '* Paper Quantity can not be empty';
						\$flag=false;
					}
					else if(!is_numeric(\$paperQuantity))
					{
						\$paperQuantityError = '* Paper Quantity must be a number';
						\$flag=false;
					}
					else if(\$paperQuantity <= 0)
					{
						\$paperQuantityError = '* Paper Quantity must greater than 0';
						\$flag=false;
					}
					else if(\$paperQuantity >1000)
					{
						\$paperQuantityError = '* Paper Quantity can not exceed 1000 papers';
						\$flag=false;
					}
					else
					{
						\$paperQuantityValue = \$paperQuantity; 
					}
					
					

					if(is_numeric(\$description))
					{
						\$descriptionError = '* Description can not be a number';
						\$flag=false;
					}
					else if(strlen(\$description > 2000))
					{
						\$descriptionError = '* Description can not exceed 2000 characters';
						\$flag=false;
					}
					else
					{
						\$descriptionValue=\$description;
					}

					
					
					if(\$flag == true)
					{
					
						\$paper = new Paper(\$paperSize,\$paperFinish,\$printedSide,\$paperWeight);
						
						
						\$printedSidePrice = 1;
						if(\$printedSide=='Double Sided')
						{
							\$printedSidePrice=2;
						}
						else
						{
							\$printedSidePrice=1;
						}
						
						\$paperSizePrice = \$paper->getPriceOfType(\$paperSize,\$_SESSION['category']);
						\$paperFinishPrice = \$paper->getPriceOfType(\$paperFinish,\$_SESSION['category']);
						\$paperWeightPrice = \$paper->getPriceOfType(\$paperWeight,\$_SESSION['category']);
						
						\$paperPrice= \$printedSidePrice * (\$paperSizePrice + \$paperFinishPrice + \$paperWeightPrice);
						\$paper->setPrice(\$paperPrice);
						
						
						/*echo \$paperSizePrice.'<br>';
						echo \$printedSidePrice.'<br>';
						echo \$paperFinishPrice.'<br>';
						echo \$paperWeightPrice.'<br>';*/
						
						
						\$product = new ProductModel(\$paper,\$quantity,\$paperQuantity,\$design,\$description);
						\$product->setCategory(\$_SESSION['category']);
						
						\$productPrice = \$paperPrice;
						if(\$paperQuantity > 1)
						{
							\$productPrice = (\$paperPrice * \$paperQuantity) + 20;
						}
						else
						{
							\$productPrice = \$paperPrice;
						}
						
						\$totalProductPrice = \$quantity * \$productPrice * 0.95; 
					
						\$product->setPrice(\$productPrice);
						\$product->setTotalPrice(\$totalProductPrice);
						
						

						if(isset(\$_POST['addToCart']) && \$flag == true)
						{
							\$model->addToCart(\$product);
						}
					}

					
				}

				
				
				


			?>
			
			
			<html>
				<head>
					<title>".$name." Maker | INAGZ</title>
					<link rel = 'icon' href ='images/logo2.jpg' type = 'image/x-icon'> 
					<meta charset='UTF-8'>
					<meta name='viewport' content='width=device-width, initial-scale=1.0'>

					<!-- links of bootstrap 3 -->
					<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
					<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
					<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script>
					<style>
						.error {color: #FF0000;}
					</style>
					
				</head>

				<body>
					<!-------------------------------------------------------Start of Content--------------------------------------------------------------->			
					<div class='container'>
						<h1><b>".$name." Maker :-</b></h1>
						<hr> <br>
						






                    <form action='' method='post' class='need-validated' enctype='multipart/form-data'>

                        <h3><b>Quantity</b></h3>
                        <input type='text' placeholder='Enter quantity of product' class='form-control' name='quantity' value = <?php echo \$quantityValue; ?>>
						<span class = 'error'><?php echo \$quantityError;?></span>
						
						
						<h3><b>Paper quantity</b></h3>
                        <input type='text' placeholder='Enter quantity of paper if one product contain more than one paper else make it one' class='form-control' name='paperQuantity' value = <?php echo \$paperQuantityValue; ?> >
						<span class = 'error'><?php echo \$paperQuantityError;?></span>
						
						
						<!--

                        <h3><b>Paper size</b></h3>
                        <select name='papersize' class='form-control'>
                            <option value='A5'>A5 (210 x 148 mm)</option>
                            <option  value='A4'>A4 (297 x 210 mm)</option>
                            <option value='A3'>A3 (420 x 297 mm)</option>
                            <option value='A2'>A2 (594 x 420 mm)</option>
                        </select>
						
						-->
						
						<?php
							echo \$viewCategory->categorySelectType('size');
							
							echo \$viewCategory->categorySelectType('finish');
						?>
						
						<h3><b>Design (Image)</b></h3>
                        <!--  <input type='file' accept='.jpg' name='design'>  -->
						<input type='file' name='image' accept='.jpg' required>
						<span class = 'error'><?php echo \$designError;?></span>								
                        
                        <h3><b>Printed sides</b></h3>
                        <select name='printedsides' class='form-control'>
							<option value='Single Sided'>Single Sided</option>
                            <option value='Double Sided'>Double Sided</option>
                        </select>

                       <!-- 
					   
					   <h3><b>Paper weight</b></h3>
                        <select name='paperweight' class='form-control'>
                            <option value='130'>130 gsm</option>
                            <option value='170'>170 gsm</option>
                            <option value='200'>200 gsm</option>
                            <option value='250'>250 gsm</option>
                            <option value='300'>300 gsm</option>
                        </select> 
						
						-->
						<?php
							echo \$viewCategory->categorySelectType('weight');
						?>
                        
                        <h3><b>Description (Optional)</b></h3>
                        <textarea style='width:100%; height:300px;' name='description' placeholder='Optional'><?php echo \$descriptionValue; ?></textarea>
                        <span class = 'error'><?php echo \$descriptionError;?></span>

						<br>

						<button type='submit' style='width:230px; height:50px; font-size:25px; float:right;' class='btn btn-primary' name='addToCart'>Add to Cart</button>
                        
						<?php
							if (isset(\$_POST['cost']) && \$flag == true)
							{
								echo '<b>Paper Price:</b> '.\$paperPrice.' EG. <b>Product Price:</b> '.\$productPrice.' EG. <b>Total Product Price:</b> '.\$totalProductPrice.' EG.';
							}
						?>

					</form>
					<br> <br>









					</div>

					<!-------------------------------------------------------End of Content----------------------------------------------------------------->
					
					<!-------------------------------------------------------Start of Footer---------------------------------------------------------------->
					<?php include 'footer.php'; ?>
					<!-------------------------------------------------------End of Footer------------------------------------------------------------------>
				</body>
			</html>";
			
			$file2=fopen($_SERVER['DOCUMENT_ROOT']."/newingaz/public/".$name." Maker.php","w");
			fwrite($file2,$str2);
			fclose($file2);
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
	
	function getCategorySamples() 
	{
		return $this->categorySamples;
	}
    
	function readCategorySamples()
	{
		$sql = "SELECT * FROM category_samples WHERE category_name = '".$this->name."';";
		
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
		
		$sql="SELECT * FROM category_samples WHERE headline = '".$headline."' AND description = '".$description."' AND category_name ='".$categoryName."';";
		//$sql="SELECT * FROM category_samples;";	
				
		$result = $this->db->query($sql);
		if(!$result->num_rows>0)
		{
			//$sample=new CategorySample($id,$headline,$description,$image,$categoryName);
			//array_push($this->categorySamples,$sample);
			
			$sql2="INSERT INTO category_samples (headline, description, image, category_name) VALUES ('".$headline."','".$description."','".$image."','".$categoryName."');";
			$result = $this->db->query($sql2);
			if($result==false)
			{
				echo mysqli_error($this->db->getConn());
			}
			else
			{
				$this->fillArray();
				echo "<b>Record inserted successfully.</b>";
			}
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
			echo "<b>Record deleted successfully.</b>";
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