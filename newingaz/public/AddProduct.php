<?php 
	define('__ROOT__', "../app/");
	
	// require_once(__ROOT__ . "model/User_php.php");
	// require_once(__ROOT__ . "controller/UserController.php");
	// $model = new User();
	// $controller = new UserController($model);
	
	require_once(__ROOT__ . "model/Categories.php");
	require_once(__ROOT__ . "controller/CategoriesController.php");

	require_once(__ROOT__ . "view/Viewbar.php");
	require_once(__ROOT__ . "view/ViewCategory.php");
	
	require_once(__ROOT__ . "model/Product.php");
	require_once(__ROOT__ . "controller/ProductController.php");


	$categoryModel=new Categories();
	$categoriesController=new CategoriesController($categoryModel);
	$viewCategory=new ViewCategory($categoriesController,$categoryModel);

	$modelproduct= new Product();
	$productcontroller= new ProductsController($modelproduct);

	if (isset($_GET['action']) && !empty($_GET['action']))
	{
		$productcontroller->{$_GET['action']}();
	}
?>


<html>
	<head>
		<title>Add Product | INAGZ</title>
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
			<div class="row">
				<div class="col-sm-6">
                    <img src="images/2.jpg" alt="Flyer.jpg" style="max-width:100%; max-height:100%;" >
                </div>
				
			<div class="col-sm-5">
				 <form action="AddProduct.php?action=Addproductcontroller" method="post" class="need-validated">

						<label><b>Paper Type</b></label>
                        <select name="paper_type" class="form-control">
                            <option value="size">Paper Size</option>
                            <option value="weight">Paper Weight</option>
                        </select>

                        <br>
                        
                        <label><b>Description</b></label>
						<input type="text" placeholder="Value of paper type that you picked" class="form-control" name="description">

                        <br>
						
						<label><b>Price</b></label>
                        <input type="text" placeholder="Enter price" class="form-control" name="price">

						<br>
						
						<label><b>Category</b></label>
						<?php
							echo"<select class='form-control form-control-lg' name='name_category'>";
							echo"<option value=".$viewCategory->categorySelect()."</option>";
							echo"</select>";

							//echo $viewCategory->categorySelect();
						?>

						<br>
						
                        <center><button type="submit" class="btn btn-primary" name="submit">Add Product</button></center>
				</form>
			</div>
			
			<br><br>
        </div>
	</div>
		
		<!-------------------------------------------------------End of Content----------------------------------------------------------------->
		
		<!-------------------------------------------------------Start of Footer---------------------------------------------------------------->
		<?php include "footer.php"; ?>
		<!-------------------------------------------------------End of Footer------------------------------------------------------------------>
	</body>
</html>

