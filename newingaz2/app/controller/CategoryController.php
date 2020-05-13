<?php
	require_once(__ROOT__ . "controller/Controller.php");
	
	class CategoryController extends Controller
	{
		public function insert()
		{
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "ingaz";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			$headline=$_REQUEST['headline'];
			$description=$_REQUEST['description'];
			$image=mysqli_real_escape_string($conn,file_get_contents($_FILES['image']['tmp_name']));
			//$image=$_FILES['image']['tmp_name'];
			//echo "<img src='data:image/jpg;base64,".base64_encode($image)."' height='300px' width='100%'/>";
			$categoryName=$_REQUEST['categorySelect'];
			$this->model->insertCategorySample($headline,$description,$image,$categoryName);
		}
		
		public function edit()
		{
			
		}
		
		public function delete()
		{
			
		}
	}