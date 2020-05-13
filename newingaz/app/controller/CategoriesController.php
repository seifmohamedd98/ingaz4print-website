<?php
	require_once(__ROOT__ . "controller/Controller.php");
	
	class CategoriesController extends Controller
	{
		public function insert()
		{
			$name=$_REQUEST['categoryName'];
			
			$this->model->insertCategory($name);
		}
		
		public function edit()
		{
			$categoryName=$_REQUEST['categorySelect'];
			
			$newCategoryName=$_REQUEST['categoryName'];
			
			$this->model->editCategory($categoryName, $newCategoryName);
		}
		
		public function delete()
		{
			$name=$_REQUEST['categorySelect'];
			
			$this->model->deleteCategory($name);
		}
		
		
	}