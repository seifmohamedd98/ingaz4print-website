<?php
require_once(__ROOT__ . 'view/View1.php');
	class ViewCategory extends View1
	{
		public function categoryForm()
		{
			
			$str="
			<h1><b>Edit Categories :-</b></h1>
			<hr> <br>
            <form action='' method='post' class='signinform'>
                <div class='form-group'>

                    <label><b>Category Name</b></label>
                    <input type='text' name='categoryName' placeholder='Enter new category or new category name for existing category' class='form-control' required>                    
                    <br> 
					<label><b>Categories</b></label>
					<select class='form-control form-control-lg' name='categorySelect'>";
					
			foreach($this->model->getCategories() as $category)
			{
				$str.="<option value='".$category->getName()."'>".$category->getName()."</option>";
			}
			$str.="	</select>
					<br>
					<input class='btn btn-success' type='submit' value='Add Category' name='addCategory'>
					<input class='btn btn-primary' type='submit' value='Edit Category' name='editCategory'>
					<input class='btn btn-danger' type='submit' value='Delete Category' name='deleteCategory'>       					
				</div>
            </form>
			";
			return $str;
		}
		
		public function categorySelect()
		{
			$str="<select class='form-control form-control-lg' name='categorySelect'>";
					
			foreach($this->model->getCategories() as $category)
			{
				$str.="<option value='".$category->getName()."'>".$category->getName()."</option>";
			}
			$str.="	</select>";
			return $str;
		}
		
		public function viewCategorySamples()
		{
			$str="<div class='row'>";
			
			foreach($this->model->getCategorySamples() as $categorySample)
			{
				/*$str.="
				<div class='col-sm-4'>
					<div class='content'>
						<h3>".$categorySample->getheadline()." " .$categorySample->getdescription()."</h3>
						<img src='data:image/jpg;base64,".base64_encode($categorySample->getimage())."' height='300px' width='100%'/>
					</div>
					<center><button class='btn btn-warning' ><a href='flyermaker.php'>Make your own product</a></button></center>
        		</div>
				";*/
				
				$str.="
				<div class='col-sm-4'>
					<div class='panel panel-warning'>
						<div class='panel-heading'>".$categorySample->getheadline()."</div>
							<img src='data:image/jpg;base64,".base64_encode($categorySample->getimage())."' height='300px' width='100%'/>
							<center><b><div class='panel-footer'>".$categorySample->getheadline()." ".$categorySample->getdescription()." Sample</div></b></center>
							<br>
							<center><button class='btn btn-warning' ><a href='flyermaker.php' style='text-decoration:none'>Make your own product</a></button></center>
					</div>
				</div>
				
				
				";
			}
			$str.="</div> <br>";
			
			return $str;
		}
		
	public  function NormalBar()
	{}	
	}
	

?>