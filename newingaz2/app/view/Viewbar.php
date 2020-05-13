<?php 
if (version_compare(phpversion(), '5.4.0', '<')) {
     if(session_id() == '') {
        session_start();
     }
 }
 else
 {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
 }
 require_once(__ROOT__ . "model\user_php.php");
 require_once(__ROOT__ . "controller\UserController.php");
 require_once(__ROOT__ . "view\View1.php");
 
	//require_once("C:\\xampp\\htdocs\\ingazclasses\\app\model\\user_php.php");
	//require_once("C:\\xampp\\htdocs\\ingazclasses\\app\\controller\\UserController.php");
	//require_once("C:\\xampp\\htdocs\\ingazclasses\\app\\view\\View1.php");

	$model = new user();
	$controller = new UserController($model);
	
	$dbh=new DBh();
 
 $sql="SELECT * FROM category;";
 
 $result=$dbh->query($sql);
 
 $files=array();
 
 while($row=$dbh->fetchRow())
 {
	 $fileName=$row['name'];
	 $filePath=$row['name'].".php";
	 
	 
	 
	 array_push($files, array("fileName" => $fileName, "filePath" => $filePath));
	 
	 //$files[$fileName]=$filePath;
	 //echo $files["Notebook"];
	 //$file=fopen($filePath,"r");
 }
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- links of bootstrap 3 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<style> 
	.navbar 
	{
		margin-bottom: 0;
		border-radius: 0;
	}
	#myNavbar a
	{
		
		color:#ffc60b;
	}
	#myNavbar a:hover
	{
		color:white;
	}
	#searchid
	{
		padding:1px 8px;
		margin: 7px 5px;
	}
	</style>        
</head>
<body>
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
<!-------------------------------------------------------Navigate Menu---------------------------------------------------------------->
<nav class="navbar navbar-inverse">
	<div class="container-fluid">

		<div class="navbar-header ">    
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>  
			</button>
		</div>
			
		<div class="collapse navbar-collapse" id="myNavbar" >
			<ul class="nav navbar-nav" name="catg" style="font-size:20px;">
				<li><a href='home.php'>Home</a></li>
				<li><a href='#' class="dropdown" data-toggle="dropdown">Categories<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<!--<li><a href='notebook.php'>Notebook</a></li>
						<li><a href='flyer.php'>Flyer</a></li>
						<li><a href='buisnesscard.php'>Business Card</a></li>-->
						
						
						
						<?php
						
							foreach($files as &$value)
							{
								echo "<li><a href='".$value['filePath']."'>".$value['fileName']."</a></li>";
							}
						
							if(isset($_SESSION['access']))
							{
								if($_SESSION['access']=="admin" || $_SESSION['access']=="internal" )
								{
									echo "<li><a href='EditCategories.php'><span class='glyphicon glyphicon-th-list'></span> Edit Categories</a></li>";
									echo "<li><a href='EditCategorySample.php'><span class='glyphicon glyphicon-th'></span> Edit Category Samples</a></li>";
								}
							}
						?>
					</ul>
				</li>
				<li><a href='samples.php'>Samples</a></li>
				
			</ul>


	<ul class="nav navbar-nav navbar-right" style="font-size:20px;">  

<!-------------------------------------------------------Start of Bars---------------------------------------------------------------->
<?php 

class Bar extends View1
{
	//$clientid= new client();
	
	
	public function NormalBar()
	{
		$str='';
		// $str.='<ul class="nav navbar-nav navbar-right" style="font-size:20px;">';
		// $str.="<li>";
		
	    $str.=include("../public/login.php");
		$str.=include("../public/signup.php");
		
		$str.='<li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>'; 
		// $str.="</li>";
		// $str.='</ul>';
       
		return $str;
		
	}
	public function AdminBar()
	{
		$str="";	
		$str.='<li><a href="view_adminmessage.php"><span class="glyphicon glyphicon-cloud-download"></span> Review Message</a></li>';
        $str.='<li><a href="../public/CreateAccount.php"><span class="glyphicon glyphicon-briefcase"></span> Create Account</a></li>';
		$str.='<li><a href="DeleteinternalAccount.php" ><span class="glyphicon glyphicon-remove"></span>  Delete Account</a></li>';

		$str.='<li><a href="#" class="dropdown" data-toggle="dropdown">Products <span class="glyphicon glyphicon-collapse-down"></span></a>';
		$str.='<ul class="dropdown-menu">
			   <li><a href="AddProduct.php">Add Product</a></li>
			   <li><a href="showproducts.php">Edit Product</a></li>
			   <li><a href="DeleteProduct.php">Delete Product</a></li>
		       </ul></li>';
		$str.='<li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>'; 
		$str.='<li><a href="signout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
		return $str;
	}
	public function InternalBar()
	{
		$str="";	
		$str.='<li><a href="view_internalmessage.php"><span class="glyphicon glyphicon-cloud-download"></span> Review Message</a></li>';
		$str.='<li><a href="#" class="dropdown" data-toggle="dropdown">Products <span class="glyphicon glyphicon-collapse-down"></span></a>';
		$str.='<ul class="dropdown-menu">
			   <li><a href="AddProduct.php">Add Product</a></li>
			   <li><a href="showproducts.php">Edit Product</a></li>
			   <li><a href="DeleteProduct.php">Delete Product</a></li>
		       </ul></li>';
		$str.='<li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>'; 
		$str.='<li><a href="signout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
		return $str;
	}

	public function userBar()
	{
		$str="";	
        $str.='<li><a href="#"><span class="glyphicon glyphicon-calendar"></span> Order History</a></li>';
        $str.='<li><a href="editaccount.php?id='.$_SESSION['id'].'"><span class="glyphicon glyphicon-wrench"></span> Edit Account</a></li>';
        $str.='<li><a href="#" class="dropdown" data-toggle="dropdown"> <span class="glyphicon glyphicon-collapse-down"></span> More</a>';
        $str.='<ul class="dropdown-menu">
            <li><a href="send_usermessage.php"><span class="glyphicon glyphicon-cloud-upload"></span> Send Message</a></li>
            <li><a href="view_usermessage.php"><span class="glyphicon glyphicon-cloud-download"></span> Review Message</a></li>
            <li><a href="home.php?action=DeleteUser&id='.$_SESSION['id'].'" onClick="return confirm("Are you sure you want to delete your Account ?")"><span class="glyphicon glyphicon-remove"></span> Delete Account</a></li>
        </ul>';
		$str.='</li>';
		$str.='<li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>'; 
		$str.='<li><a href="signout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';

		return $str;
	}
}
   $view = new Bar($controller, $model);
   if (isset($_SESSION['access']) && !empty($_SESSION['access']))
    {
        switch($_SESSION['access']){
        case 'admin': 
            echo $view->AdminBar();
            break;
        case 'internal':
            echo $view->InternalBar();
            break;
        case 'user':
            echo $view->userBar();
            break;       
        }
    }
    else {
        echo $view->NormalBar();

    }

?>

<!-------------------------------------------------------End of Bars---------------------------------------------------------------->
			</ul>
		</div>
	</div> 
</nav>

</body>
</html>