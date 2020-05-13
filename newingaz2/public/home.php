<?php
session_start();
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/user_php.php");
require_once(__ROOT__ . "model/client_php.php");
require_once(__ROOT__ . "controller/UserController.php");
require_once(__ROOT__ . "controller/ClientController.php");
$model = new User();
// $model2 = new client();
$controller = new UserController($model);
// $controller2  = new ControllerClient($model2);

  

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
            <img class="mySlides" src="images/1.jpg">
            <img class="mySlides" src="images/2.jpg">
            <img class="mySlides" src="images/3.jpg">
        </div>
    </div>

    <script>
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
    </script>
<!-------------------------------------------------------End of SlideShow---------------------------------------------------------->

            <div class="container">    
                <div class="row">

                    <div class="col-sm-4">
                        <div class="panel panel-warning">
                            <div class="panel-heading">New</div>
                            <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                            <div class="panel-footer">Flyer</div>
                        </div>
                    </div>

                    <div class="col-sm-4"> 
                        <div class="panel panel-warning">
                            <div class="panel-heading">New</div>
                            <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                            <div class="panel-footer">Flyer</div>
                        </div>
                    </div>

                    <div class="col-sm-4"> 
                        <div class="panel panel-warning">
                            <div class="panel-heading">New</div>
                            <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                            <div class="panel-footer">Flyer</div>
                        </div>
                    </div>

                </div>
            </div>

            <br>

            <div class="container">    
                <div class="row">

                    <div class="col-sm-4">
                        <div class="panel panel-warning">
                            <div class="panel-heading">New</div>
                            <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                            <div class="panel-footer">Notebook</div>
                        </div>
                    </div>

                    <div class="col-sm-4"> 
                        <div class="panel panel-warning">
                            <div class="panel-heading">New</div>
                            <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                            <div class="panel-footer">Business Card</div>
                        </div>
                    </div>

                    <div class="col-sm-4"> 
                        <div class="panel panel-warning">
                            <div class="panel-heading">New</div>
                            <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                            <div class="panel-footer">Business Card</div>
                        </div>
                    </div>

                </div>
                <?php include "feedback.php";?>
            </div>

            <br><br>
        <!-----------------------------------------------------Start of Footer------------------------------------------------------------->
            <?php include "footer.php";?>
        <!------------------------------------------------------End of Footer-------------------------------------------------------------->
    </body>
</html>