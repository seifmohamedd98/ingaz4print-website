<?php 
	define('__ROOT__', "../app/");
	
	require_once(__ROOT__ . "model/User_php.php");
	require_once(__ROOT__ . "controller/UserController.php");
	
	require_once(__ROOT__ . "model/Categories.php");
	require_once(__ROOT__ . "controller/CategoriesController.php");
	
	require_once(__ROOT__ . "model/Category.php");
	require_once(__ROOT__ . "controller/CategoryController.php");
	
	$model = new User();
	$controller = new UserController($model);
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
				
				if(isset($_POST['submit']))
				{
					$categoryController->insert();
				}
			?>
			
			<div class="EditCategorySampleDiv">
				<form action="" method="POST" class="form-group"  enctype="multipart/form-data">
		
					<label><b>Headline</b></label>
					<input type="text" name="headline" class="form-control" value=""<?php //echo $Headline; ?>>
					<span class = "error"><?php //echo $HeadlineError;?></span>
					
					<br>
					
					<label><b>Description</b></label>
					<input type="text" name="description" class="form-control" value=""<?php //echo $Headline; ?>>
					<span class = "error"><?php //echo $DescriptionError;?></span>
					
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

