<?php
	require_once(__ROOT__ . "controller/Controller.php");
	require_once(__ROOT__ . 'db\Dbh.php');
	
	class CategoriesController extends Controller
	{
		public function insert()
		{
			$dbh=new Dbh();
			$name=mysqli_real_escape_string($dbh->getConn(),$_REQUEST['categoryName']);
			
			$this->model->insertCategory($name);
		}
		
		public function edit()
		{
			$dbh=new Dbh();
			$categoryName=mysqli_real_escape_string($dbh->getConn(),$_REQUEST['categorySelect']);
			
			$newCategoryName=mysqli_real_escape_string($dbh->getConn(),$_REQUEST['categoryName']);
			
			$this->model->editCategory($categoryName, $newCategoryName);
		}
		
		public function delete()
		{
			$dbh=new Dbh();
			$name=mysqli_real_escape_string($dbh->getConn(),$_REQUEST['categorySelect']);
			
			$this->model->deleteCategory($name);
		}
		
		
	}