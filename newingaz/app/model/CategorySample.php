<?php
class CategorySample extends Model 
{
	protected $id;
	protected $headline;
	protected $description;
	protected $image;
	protected $categoryName;
	
	function __construct($id,$headline,$description,$image,$categoryName) 
	{
		$this->id=$id;
		$this->headline=$headline;
		$this->description=$description;
		$this->image=$image;
		$this->categoryName=$categoryName;
	}


	   function setid($id){
    return $this->id = $id;
    
  }
  function getid(){
    
    return $this->id;
  }
 
  

   function setheadline($headline){
    return $this->headline = $headline;
    
  }

  function getheadline(){
    
    return $this->headline;
  }
 

	   function setdecription($description){
    return $this->description = $description;
    
  }
  function getdescription(){
    
    return $this->description;
  }

	   function setImage($image){
    return $this->image = $image;
    
  }
  function getimage() {
    return $this->image;

  }

	   function setcategoryName($categoryName){
    return $this->categoryName = $categoryName;
    
  }
  function getcategoryName() 
  {
    return $this->categoryName ;
  }
  
 
 
    function getsamples()
	{
		$sql="SELECT * FROM category_samples Where category_name='$this->categoryName'; ";
		$dbh = new Dbh();
		$result = $dbh->query($sql);
		$samples = array();
		while($row=mysqli_fetch_assoc($result))
		{
			$category = new category();
			$category->setid($row['id']);
			$category->setdescription($row['description']);
			$category->setheadline($row['headline']);
			$category->setimage($row['image']);
			$category->setcategoryName($row['category_name']);

			$samples[] = $category;
		}
		return $samples;
    }
  
}	
?>