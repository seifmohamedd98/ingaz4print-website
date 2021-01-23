<?php
	require_once(__ROOT__ . "controller/Controller.php");
	require_once(__ROOT__ . 'db\Dbh.php');
	
	class CategoryController extends Controller
	{
		
		public function insert()
		{
			$dbh=new Dbh();
			/*$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "ingaz";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);*/
			
			
			$headline=$_REQUEST['headline'];
			$description=$_REQUEST['description'];
			$image=mysqli_real_escape_string($dbh->getConn(),file_get_contents($_FILES['image']['tmp_name']));
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
			$dbh=new Dbh();
			$sql="SELECT * FROM category_samples WHERE category_name ='".$_SESSION['category']."';";

			$result=$dbh->query($sql);

			if($result!=false)
			{
				while($row=$dbh->fetchRow($result))
				{
				if(isset($_POST[$row['id']]))
					{
						$this->model->deleteCategorySample($row['id']);
					}
				}
			}
		}
	}