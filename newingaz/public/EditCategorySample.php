<?php 
	session_start();
	define('__ROOT__', "../app/");
	
	require_once(__ROOT__ . "model/User_php.php");
	require_once(__ROOT__ . "controller/UserController.php");
	
	require_once(__ROOT__ . "model/Categories.php");
	require_once(__ROOT__ . "controller/CategoriesController.php");
	
	require_once(__ROOT__ . "model/Category.php");
	require_once(__ROOT__ . "controller/CategoryController.php");
	
	require_once(__ROOT__ . 'db\Dbh.php');
	
	$model = new User();
	$controller = new UserController($model);
	$dbh=new Dbh();
	require_once(__ROOT__ . "view/Viewbar.php");
	
	
?>


<html>
	<head>
		<title>Edit Category Samples | INAGZ</title>
		
		<link rel = "icon" href ="images/logo2.jpg" type = "image/x-icon"> 
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- links of bootstrap 3 -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

		<style>
			.error {color: #FF0000;}
		</style>
	</head>

	<body>
		<!-------------------------------------------------------Start of Content--------------------------------------------------------------->			
		<div class="container">
			<h1><b>Edit Category Samples :-</b></h1>
			<?php
				//Views Category form
				require_once(__ROOT__ . "view/ViewCategory.php"); 
				$categoriesModel=new Categories();
				
				$categoriesController=new CategoriesController($categoriesModel);
				$viewCategories = new ViewCategory($categoriesController, $categoriesModel);
				
				$categoryModel=new Category();
				$categoryController=new CategoryController($categoryModel);
				
				
				
				$flag = true;
				
				$HeadlineError='';
				$DescriptionError='';
				
				$headline='';
				$description='';
				
				if(isset($_POST['submit']))
				{
					$headline=mysqli_real_escape_string($dbh->getConn(),$_POST['headline']);
					$description=mysqli_real_escape_string($dbh->getConn(),$_POST['description']);
					
					
					//Headline Validation
					if(empty($headline))
					{
						$HeadlineError = '* Headline can not be empty';
						$flag=false;
					}
					else if(is_numeric($headline))
					{
						$HeadlineError = '* Headline can not be a number';
						$flag=false;
					}
					else if(strlen($headline)>250)
					{
						$HeadlineError = '* Headline can not exceed 250 characters';
						$flag=false;
					}
					
					
					//Description Validation
					if(empty($description))
					{
						$DescriptionError = '* Description can not be empty';
						$flag=false;
					}
					else if(is_numeric($description))
					{
						$DescriptionError = '* Description can not be a number';
						$flag=false;
					}
					else if(strlen($description)>250)
					{
						$DescriptionError = '* Description can not exceed 250 characters';
						$flag=false;
					}

					
					
					if($flag==true)
					{
						$categoryController->insert();
					}
				}

			?>
			
			<div class="EditCategorySampleDiv">
				<form action="" method="POST" class="form-group"  enctype="multipart/form-data">
		
					<label><b>Headline</b></label>
					<input type="text" name="headline" class="form-control" value=""<?php //echo $Headline; ?>>
					<span class = "error"><?php echo $HeadlineError;?></span>
					
					<br>
					
					<label><b>Description</b></label>
					<input type="text" name="description" class="form-control" value=""<?php //echo $Headline; ?>>
					<span class = "error"><?php echo $DescriptionError;?></span>
					
					<br>
					
					<label><b>Thumbnail</b></label>
					<input type="file" name="image" accept=".jpg" required>
					
					<br>
					
					<label><b>Category Name</b></label>
					<?php echo $viewCategories->categorySelect(); ?>
					
					<br>
					
					<input type="submit" value="Add Category Sample" name="submit" class="btn btn-success">
				</form>
			</div>
			
			<br><br>
        </div>
		
		<!-------------------------------------------------------End of Content----------------------------------------------------------------->
		
		<!-------------------------------------------------------Start of Footer---------------------------------------------------------------->
		<?php include "footer.php"; ?>
		<!-------------------------------------------------------End of Footer------------------------------------------------------------------>
	</body>
</html>

