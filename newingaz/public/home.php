<?php
session_start();
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/user_php.php");
require_once(__ROOT__ . "model/client_php.php");
require_once(__ROOT__ . "controller/UserController.php");
require_once(__ROOT__ . "controller/ClientController.php");


//$date = date('Format String', time());

//date_timestamp_get($date);

//$date=new DateTime();

//echo $date->getTimestamp();





$model = new User();
echo $model->getusername();
// $model2 = new client();
$controller = new UserController($model);
// $controller2  = new ControllerClient($model2);


//phpinfo();



require_once(__ROOT__ . "model/ProductModel.php");
require_once(__ROOT__ . "model/Paper.php");
/*
$paper=new Paper("A5 (210 x 148 mm)","Matte","Single","135 gsm");
$product = new ProductModel(0, "Flyer",$paper,100,200);

if($paper == null)
{
	echo "<h1>Paper is null</h1>";
}
if($product == null)
{
	echo "<h1>Product is null</h1>";
}
if($model->getCart() == null)
{
	echo "<h1>Cart is null</h1>";
}

$paper->setPrice(0);
$product->setPrice(0);
$product->setTotalPrice(0);

$model->addToCart($product);
*/

if (isset($_GET['action']) && !empty($_GET['action'])) 
{
  $controller->{$_GET['action']}();
}
// else if (isset($_GET['action']) && !empty($_GET['action'])) 
// {
//   $controller2->{$_GET['action']}();
// }

?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Home</title>
        <link rel = "icon" href ="images/logo2.jpg" type = "image/x-icon"> 
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- links of bootstrap 3 -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>     
        <style>
        .slider 
        {
            position: relative;
            text-align: center;
            color: white;
            width:80%;
            margin-left:170px;
            margin-bottom:50px;
            margin-top:110px;
        }
        .welcomediv
        {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-family:Arial Black;
            font-size:100px;
            color:white;
            background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
            border: 3px solid #f1f1f1;
            z-index: 1;
        }
        .welcome_p
        {
            position: absolute;
            top: 90%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-family:Arial Black;
            font-size:30px;
            color:#ffc60b;
            z-index: 1;
        }
        .mySlides
        {
            display:none;
            height:600px;
            filter: blur(5px);
            width:100%;
        }   
        .item
        {
            display:none;
            height:600px;
            filter: blur(5px);
            width:100%;
        }
        .img-responsive
        {
            max-height:220px;
        }
      </style>
    </head>
    
    <body>		
<!------------------------------------------------Start of Header and nav bar------------------------------------------------------>
<?php
	require_once(__ROOT__ . "view/ViewBar.php");
?>  
<!-------------------------------------------------End of Header and nav bar------------------------------------------------------->

<!-------------------------------------------------------Start of SlideShow--------------------------------------------------------->
    <div class="slideshow">
        <div class="slider">
            <div class="welcomediv">Welcome TO INGAZ 4 Print</div>
            <p class="welcome_p">Online Printing Service</p>

            <!-- <img class="mySlides" src="images/1.jpg">
            <img class="mySlides" src="images/2.jpg">
            <img class="mySlides" src="images/3.jpg"> -->

            <div class="carousel-inner">
                <img src="images/1.jpg" alt="Flyer" class="item">
                <img src="images/2.jpg" alt="Notebook" class="item" >
                <img src="images/3.jpg" alt="Bussines Card"  class="item">
            </div>

        </div>
    </div>

    <!-- <script>
    var myIndex = 0;
    carousel();
    function carousel()
    {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length)
        {
            myIndex = 1
        }
        x[myIndex-1].style.display = "block";
        setTimeout(carousel, 2000);

    }
    </script> -->
    <script>
        var myIndex = 0;
        carousel();
        function carousel()
        {
        var i;
        var x = document.getElementsByClassName("item");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length)
        {
            myIndex = 1
        }
        x[myIndex-1].style.display = "block";
        setTimeout(carousel, 2000);

        }
    </script>
<!-------------------------------------------------------End of SlideShow---------------------------------------------------------->

            <div class="container">    
                <div class="row">

                    <div class="col-sm-4">
                        <div class="panel panel-warning">
                            <div class="panel-heading">Fyer</div>
                            <div class="panel-body"><img src="images/flyer1.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
                            <div class="panel-footer">Normal Flyer Design</div>
                        </div>
                    </div>

                    <div class="col-sm-4"> 
                        <div class="panel panel-warning">
                            <div class="panel-heading">Notebook</div>
                            <div class="panel-body"><img src="images/notebook2.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
                            <div class="panel-footer">WATCHING YOU Notebook Design</div>
                        </div>
                    </div>

                    <div class="col-sm-4"> 
                        <div class="panel panel-warning">
                            <div class="panel-heading">Business Card</div>
                            <div class="panel-body"><img src="images/business3.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
                            <div class="panel-footer">Business Card for XEE Media</div>
                        </div>
                    </div>

                </div>
            </div>

            <br>

            <div class="container">    
                <div class="row">

                    <div class="col-sm-4">
                        <div class="panel panel-warning">
                            <div class="panel-heading">Business Card</div>
                            <div class="panel-body"><img src="images/business2.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
                            <div class="panel-footer">Business Card Design</div>
                        </div>
                    </div>

                    <div class="col-sm-4"> 
                        <div class="panel panel-warning">
                            <div class="panel-heading">Flyer</div>
                            <div class="panel-body"><img src="images/flyer3.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
                            <div class="panel-footer">Flyer Design for a travel company</div>
                        </div>
                    </div>

                    <div class="col-sm-4"> 
                        <div class="panel panel-warning">
                            <div class="panel-heading">Notebook</div>
                            <div class="panel-body"><img src="images/notebook5.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
                            <div class="panel-footer">Blue Cover Notebook Design</div>
                        </div>
                    </div>

                </div>

                <?php 
				if(isset($_SESSION['access']))
				{
					if ($_SESSION['access']=="user")
					{
						include "feedback.php";
					}
				}
                ?>
            </div>

            <br><br>
        <!-----------------------------------------------------Start of Footer------------------------------------------------------------->
        
            <?php include "footer.php";?>
        <!------------------------------------------------------End of Footer-------------------------------------------------------------->
    </body>
</html>