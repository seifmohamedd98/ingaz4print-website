<?php
session_start();
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/user_php.php");
require_once(__ROOT__ . "controller/UserController.php");
$model = new User();
$controller = new UserController($model);

?>
<!DOCTYPE HTML>
<html>
<head>
    
    <title>About us | INGAZ</title>
    <link rel = "icon" href ="images/logo2.jpg" type = "image/x-icon"> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">

    <link rel="stylesheet" href="..\\lib\\css\\animate.css">
    <link rel="stylesheet" href="..\\lib\\css\\owl.carousel.min.css">

    <!-- <link rel="stylesheet" href="..\\lib\\fonts\\ionicons\\css\\ionicons.min.css"> -->
    <link rel="stylesheet" href="..\\lib\\fonts\\fontawesome\\css\\font-awesome.min.css">

    <link rel="stylesheet" href="..\\lib\\fonts\\flaticon\\font\\flaticon.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="..\\lib\\css\\style.css">
    <!-- links of bootstrap 3 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style> 
    #myNavbar a
    {
      color:#ffc60b;
    }
    #myNavbar a:hover
    {
      color:white;
    }
	</style> 
</head>
<body>

<!------------------------------------------------Start of Header and nav bar------------------------------------------------------>
<?php
  // require_once(__ROOT__ . "view/ViewBar.php");
  
?>  
<div class="jumbotron text-center"  style="margin-bottom:0; background-color: #ffc60b; height:40%" >
	<a href="home.php"><img src="images/logo.png"width="350px" height="270px" style="margin-top: -25px; padding-top: 10px; padding-bottom: 15px;"></a><br>
	<?php
	if(!empty($_SESSION['access']))
	{
	?>
	<span style="font-size:30px; font-weight:bold; text-transform:uppercase; font-family:Comic Sans MS;" >Welcome <?php echo $_SESSION['username']?></span>
	<?php
		}
	?>
</div>
<nav class="navbar navbar-inverse">
		<div class="collapse navbar-collapse" id="myNavbar" >
			<ul class="nav navbar-nav" name="catg" style="font-size:20px;">
				<li><a href='home.php'>Home</a></li>
			</ul>
    </div>	
</nav>
					

<!-------------------------------------------------End of Header and nav bar------------------------------------------------------->
 <section class="home-slider inner-page owl-carousel">
      <div class="slider-item" style="background-image: url('images/aboutus.jpg');">
        
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center">
            <div class="col-md-8 text-center col-sm-12 element-animate">
              <h1>About Us</h1>
              <p class="mb-5 sub-text">Our unique approach to the local market allows us to offer a firm hand to our international suppliers and support them into understanding the needs of our clients.</p>
              
            </div>
          </div>
        </div>

      </div>
    </section>
    <section>
      <div class="half d-lg-flex d-block">
        <div class="image" style="background-image: url('images/2.jpg')"></div>
        <div class="text text-center element-animate">
          <h3 class="mb-4">Our Mission</h3>
          <p class="mb-5">INgaz System's main target is to provide a service that has only been available internationally to Egyptians. The system allows the client to create, customize, and print flyers, business cards, and notebooks with simple clicks that make this service all over Egypt easier. </p>
          
        </div>
      </div>

      <div class="half d-lg-flex d-block">
        <div class="image order-2" style="background-image: url('images/test2.jpg')"></div>
        <div class="text text-center element-animate">
          <h3 class="mb-4">Company History</h3>
          <p class="mb-5"> Is an Egyptian IT company established in 1996 in Cairo-Egypt. We specialize in the IT industry through our four subsidiaries: IT Learning, Software Development, Web Development, and Advertising. Each one of these subsidiaries has its own management committee, premises, and staff-members. Nevertheless, all subsidiaries share one common aim: That is to fit together in the IT sphere to deliver comprehensive top quality integrated solutions,but now it devided into two parts, yat for courses and INGAZ for printing.</p>
          
          
        </div>
      </div>

    </section>
<br>
<br>
<section class="section element-animate">
          <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="media block-6 d-block text-center">
              <div class="icon mb-3"><span class="glyphicon glyphicon-bell"></span></div>
              <div class="media-body">
                <h3 class="heading">Modern Design</h3>
                <p>Designs toinspire you. If you are looking for graphic design ideas to market your product, you are at the right place.</p>
              </div>
            </div> 
          </div>
          <div class="col-md-6 col-lg-4 ">
            <div class="media block-6 d-block text-center">
              <div class="icon mb-3"><span class="glyphicon glyphicon-heart"></span></div>
              <div class="media-body">
                <h3 class="heading">Build With Love</h3>
                <p>Easy to use to order your customize produts.Our system offers a delivery service that delivers all over Egypt. </p>
              </div>
            </div> 
          </div>

           <div class="col-md-6 col-lg-4">
            <div class="media block-6 d-block text-center">
              <div class="icon mb-3"><span class="glyphicon glyphicon-flash"></span></div>
              <div class="media-body">
                <h3 class="heading">Fast Loading</h3>
                <p>PageSpeed Insights analyzes the content of a web page, then generates suggestions to make that page faster.</p>
              </div>
            </div> 
          </div>
        </div>
        </section>

    <script src="..\\lib\\js\\jquery-3.2.1.min.js"></script>
    <script src="..\\lib\\js\\popper.min.js"></script>
    <script src="..\\lib\\js\\bootstrap.min.js"></script>
    <script src="..\\lib\\js\\owl.carousel.min.js"></script>
    <script src="..\\lib\\js\\jquery.waypoints.min.js"></script>
    <script src="..\\lib\\js\\main.js"></script>
<!-----------------------------------------------------Start of Footer------------------------------------------------------------->
  <?php include "footer.php";?>
<!------------------------------------------------------End of Footer-------------------------------------------------------------->

</body>
</html>
