<?php
			$_SESSION['category']='Banner';
			define('__ROOT__', '../app/');		
			require_once(__ROOT__ . 'model/User_php.php');
			require_once(__ROOT__ . 'controller/UserController.php');
			$model = new User();
			$controller = new UserController($model);
			require_once(__ROOT__ . 'view/Viewbar.php');

		?>


		<html>
			<head>
				<title>Banner | INAGZ</title>
				<link rel = 'icon' href ='images/logo2.jpg' type = 'image/x-icon'> 
				<meta charset='UTF-8'>
				<meta name='viewport' content='width=device-width, initial-scale=1.0'>

				<!-- links of bootstrap 3 -->
				<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
				<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
				<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script>

				
			</head>

			<body>
				<!-------------------------------------------------------Start of Content--------------------------------------------------------------->			
				<div class='container'>

					<h1><b>Banner :-</b></h1>
					<hr> <br>

					

				</div>

				<!-------------------------------------------------------End of Content----------------------------------------------------------------->
				
				<!-------------------------------------------------------Start of Footer---------------------------------------------------------------->
				<?php include 'footer.php'; ?>
				<!-------------------------------------------------------End of Footer------------------------------------------------------------------>
			</body>
		</html>