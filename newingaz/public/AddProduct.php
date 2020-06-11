<?php 
session_start();
	define('__ROOT__', "../app/");
	require_once(__ROOT__ . 'db\Dbh.php');
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

	$dbh=new Dbh();
	
	$flag=true;
	$descriptionError='';
	$priceError='';
	
	if (isset($_GET['action']) && !empty($_GET['action']))
	{
		$description=mysqli_real_escape_string($dbh->getConn(),$_POST['description']);
		$price=$_POST['price'];
		
		//Description Validation
		if(empty($description))
		{
			$descriptionError = '* Description can not be empty';
			$flag=false;
		}
		else if(is_numeric($description))
		{
			$descriptionError = '* Description can not be a number';
			$flag=false;
		}
		else if(strlen($description) > 250)
		{
			$descriptionError = '* Description can not exceed 250 characters';
			$flag=false;
		}
		
		//Price Validation
		if(empty($price))
		{
			$priceError = '* Price can not be empty';
			$flag=false;
		}
		else if(!is_numeric($price))
		{
			$priceError = '* Price must be a number';
			$flag=false;
		}
		else if($price < 0)
		{
			$priceError = '* Price can not be less than 0 EG';
			$flag=false;
		}
		else if($price > 1000)
		{
			$priceError = '* Price can not exceed 1000 EG';
			$flag=false;
		}
		if($flag==true && isset($_POST['randcheck']))
		{
			if($_POST['randcheck']==$_SESSION['rand'])
			{
				$productcontroller->{$_GET['action']}();
			}
		}

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

		<style>
			.error {color: #FF0000;}
		</style>
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
							<option value="finish">Paper Finish</option>
                        </select>

                        <br>
                        
                        <label><b>Description</b></label>
						<input type="text" placeholder="Value of paper type that you picked" class="form-control" name="description">
						<span class = 'error'><?php echo $descriptionError;?></span>
                        <br>
						
						<label><b>Price</b></label>
                        <input type="text" placeholder="Enter price" class="form-control" name="price">
						<span class = 'error'><?php echo $priceError;?></span>
						<br>
						
						<label><b>Category</b></label>
						<?php
							/*echo"<select class='form-control form-control-lg' name='name_category'>";
							echo"<option value=".$viewCategory->categorySelect()."</option>";
							echo"</select>";*/

							echo $viewCategory->allCategorySelect();
							$rand=rand();
							$_SESSION['rand']=$rand;

						?>
						<input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />

						<br>
						
                        <center><button type="submit" class="btn btn-primary" name="submit">Add Product</button></center>
				</form>
			</div>

			<br><br>
        </div>
	</div>
	<br>
		<!-------------------------------------------------------End of Content----------------------------------------------------------------->
		
		<!-------------------------------------------------------Start of Footer---------------------------------------------------------------->
		<?php include "footer.php"; ?>
		<!-------------------------------------------------------End of Footer------------------------------------------------------------------>
	</body>
</html>

