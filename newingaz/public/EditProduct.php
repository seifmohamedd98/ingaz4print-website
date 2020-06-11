<?php
session_start();
  define('__ROOT__', "../app/");
  require_once(__ROOT__ . "model/Product.php");
  require_once(__ROOT__ . "controller/ProductController.php");
  require_once(__ROOT__ . "view/ViewTables.php");

  $model = new Product();
  $controller = new ProductsController($model);
  $view = new ViewTable($controller, $model);

$id=$_GET['id'];
foreach($model->getproducts() as $product)
{
    if($product->getid() == $id)
    {
        $id = $product->getid();
        // $paper_type = $product->getpaper_type();
        $description = $product->getdescription();
        $price = $product->getprice();
        // $name_category = $product->getname_category();
    }
}
?>

<!DOCTYPE html>

<head>
<title>Edit Certain Product | INGAZ</title>
  <link rel = "icon" href ="images/logo2.jpg" type = "image/x-icon"> 

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- links of bootstrap 3 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<!-------------------------------------------------------Start of Header---------------------------------------------------------------->
<?php //include("C:\\xampp\\htdocs\\newingaz\\app\\view\\Viewbar.php"); 
require_once(__ROOT__ . "view/Viewbar.php");
?>

<!-------------------------------------------------------End of Header------------------------------------------------------------------>

<!-------------------------------------------------------Start of Content---------------------------------------------------------------> 
<div class="container">
    <h1><b>Edit Product :-</b></h1>
    <hr> <br>


    <form action="showproducts.php?action=Editproductcontroller" method = "post" >

    <table width='80%' class="table table-hover">
        <thead> <!-- deh 3ashan may3mlsh hover 3alehom -->
            <tr class="info"> 
                <th>ID</th>  
                <!-- <th>Paper Type</th> -->
                <th>Description</th>
                <th>Price</th>
                <th>Action</th>
                <!-- <th>In Category</th> -->
            </tr>
        </thead>
            <tr>
                <td><?php echo $id;?></td> 
                <td><input type="text"  id="description" placeholder="Enter New Description" name="description" value="<?php echo $description;?>"></td>
                <td><input type="text"  id="price" placeholder="Enter New Price" name="price" value="<?php echo $price;?>"></td>
                <td><button type="submit" class="btn btn-default">Edit</button></td> 
            </tr>
            <td><input type="hidden" name="id" id="id" value='<?php echo $id;?>'>
    </table>
    </form>


</div>


<!-------------------------------------------------------End of Content----------------------------------------------------------------->

<!-------------------------------------------------------Start of Footer---------------------------------------------------------------->
<?php include "footer.php"; ?>
<!-------------------------------------------------------End of Footer------------------------------------------------------------------>
</body>
</html>

