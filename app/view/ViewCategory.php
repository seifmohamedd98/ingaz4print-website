<?php
require_once(__ROOT__ . 'view/View1.php');
require_once(__ROOT__ . "db\Dbh.php");
	class ViewCategory extends View1
	{
		public function categoryForm()
		{
			
			$str="
			<h1><b>Edit Categories :-</b></h1>
			<hr> <br>
            <form action='' method='post' class='signinform'>
				<?php
					\$rand=rand();
					\$_SESSION['rand']=\$rand;
				?>
				<input type='hidden' value='<?php echo \$rand; ?>' name='randcheck' />

                <div class='form-group'>

					
                    <label><b>Category Name</b></label>
                    <input type='text' name='categoryName' placeholder='Enter new category or new category name for existing category' class='form-control'>
					<span class = 'error'><?php echo \$categoryError;?></span>                    

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
					<input class='btn btn-danger' type='submit' value='Delete Category' onClick=\"return confirm('Are you sure you want to delete this Category? Doing so will result in all samples and products under this category to be deleted?')\" name='deleteCategory'>       					
				</div>
            </form>
			";
			return $str;
		}
		
		public function allCategorySelect()
		{
			$str="<select class='form-control form-control-lg' name='categorySelect'>";
					
			foreach($this->model->getCategories() as $category)
			{
				$str.="<option value='".$category->getName()."'>".$category->getName()."</option>";
			}
			$str.="<option value='all'>All Categories</option>";
			$str.="	</select>";
			return $str;
		}
		
		public function categorySelectType($type)
		{
			$str="<h3><b>Paper ".$type."</b></h3>
            <select name='paper".$type."' class='form-control'>";
                       
			$dbh=new DBh();
			
			$sql="SELECT * FROM product WHERE name_category='".$this->model->getName()."' AND paper_type='$type'";
			
			$result = $dbh->query($sql);
			
			while($row=mysqli_fetch_assoc($result))
			{
				$str.="<option value='".$row['description']."'>".$row['description']."</option>";
			}
						
			$str.= "</select>";
			
			return $str;
		}
		
		public function categorySelect()
		{
			$str="<select class='form-control form-control-lg' name='categorySelect'>";
					
			foreach($this->model->getCategories() as $category)
			{
				$str.="<option value='".$category->getName()."'>".$category->getName()."</option>";
			}
			//$str.="<option value='All Categories'>All Categories</option>";
			$str.="	</select>";
			return $str;
		}
		

		
		public function viewCategorySamples()
		{
			
			$str="<form action='' method='post' class='need-validated' enctype='multipart/form-data'>
			<div class='row'>";
			
			foreach($this->model->getCategorySamples() as $categorySample)
			//foreach($this->model->$categorySamples as $categorySample)
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
				<style>
				div button,a
				{
					display:inline-block;
				}
				</style>
				<div class='col-sm-4'>
					<div class='panel panel-warning'>
						<div class='panel-heading'>".$categorySample->getheadline()."</div>
							<img src='data:image/jpg;base64,".base64_encode($categorySample->getimage())."' height='300px' width='100%'/>
							<center><b><div class='panel-footer'>".$categorySample->getheadline()." ".$categorySample->getdescription()." Sample</div></b></center>
							<br>
							<!--<center><button class='btn btn-warning' ><a href='".$this->model->getName()." Maker.php' style='text-decoration:none'>Make your own product</a></button></center>-->
							
							
							";
				if(isset($_SESSION['access']))
				{
					if($_SESSION['access'] == "admin" || $_SESSION['access'] == "internal")
					{
						//$str.="<center><button type='submit' class='glyphicon glyphicon-trash btn-lg btn-danger' name='".$categorySample->getid()."'></button><center>";
						$str.="
						<center><button type='submit' class='btn btn-danger' name='".$categorySample->getid()."'>Delete Sample</button><center></div></center>";
					}
					else
					{
						$str.="<center><a href='".$this->model->getName()." Maker.php'  class='btn btn-warning' style='text-decoration:none'>Make your own product</a></center>";
					}
				}
				else
				{
					$str.="<center><a href='#' class='btn btn-warning' style='text-decoration:none'>You Must to login first</a></center>";
				}
				$str.="
					</div>
				</div>
				
				
				";
			}
			$str.="</div> </form><br>";
			
			return $str;
		}
		
	public  function NormalBar()
	{}	
	}
	

?>