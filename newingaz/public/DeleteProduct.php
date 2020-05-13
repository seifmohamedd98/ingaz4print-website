<?php
  define('__ROOT__', "../app/");
  require_once(__ROOT__ . "model/Product.php");
  require_once(__ROOT__ . "controller/ProductController.php");
  $model = new Product();
  $controller = new ProductsController($model);

  if (isset($_GET['action']) && !empty($_GET['action'])) 
  {
    $controller->{$_GET['action']}();
  }
?>
<!DOCTYPE HTML>

<html>

<head>
  <title>Delete Product | INGAZ</title>
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
        
          <h1><b>Delete Product :-</b></h1>
          <hr> <br>

            <table width='80%' class="table table-hover">
                <thead> <!-- deh 3ashan may3mlsh hover 3alehom -->
                    <tr class="info"> 
                        <th>ID</th>  
                        <th>Paper Type</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>In Category</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <?php   
                $model = new Product();
                $table = $model->getproducts();
                foreach($table as $product)
                {
                    echo '<tr>'; 
                    echo '<td>'. $product->getid()               ."</td>";
                    echo '<td>'. $product->getpaper_type()       ."</td>";
                    echo '<td>'. $product->getdescription()      ."</td>";
                    echo '<td>'. $product->getprice()            ."</td>";
                    echo '<td>'. $product->getname_category()    ."</td>";
                    echo '<td><a href="DeleteProduct.php?action=Deleteproductcontroller&id='.$product->getid().'">Delete Product</a></td> ';
                    echo '</tr>';
                }
                ?>
            </table>
            <hr>
        </div>


    <!-------------------------------------------------------End of Content----------------------------------------------------------------->

    <!-------------------------------------------------------Start of Footer---------------------------------------------------------------->
    <?php include "footer.php"; ?>
    <!-------------------------------------------------------End of Footer------------------------------------------------------------------>
</body>

</html>