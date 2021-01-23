<?php
require_once(__ROOT__ . "model/Model.php");
class Paper extends Model
{
	//protected $id;
	//protected $description;
	protected $price;
	protected $size;
	protected $finish;
	protected $side;
	protected $weight;
	
	function __construct($size="",$finish="",$side="single",$weight="135 gsm")
	{
		//$this->id=$id;
		$this->finish=$finish;
		$this->side=$side;
		$this->size=$size;
		$this->weight=$weight;
	}
	
	
	/*function __construct($id,$name,$finish="Uncoated",$side="Single Sided") 
	{
		$this->id=$id;
		$this->name=$name;
		//$this->weight=$weight;
		
		if($finish=="")
		{
			$this->finish="Uncoated";
		}
		else
		{
			$this->finish=$finish;
		}
		
		$namePrice=0;
		
		switch ($name)
		{
			//NoteBook paper sizes
			case "A2":
				$namePrice=0.2;
				$this->size="16.5 x 23.4 inch";
				break;
				
			case "A3":
				$namePrice=0.18;
				$this->size="11.7 x 16.5 inch";
				break;
				
			case "A4":
				$namePrice=0.16;
				$this->size="8.3 x 11.7 inch";
				break;
				
			case "A5":
				$namePrice=0.14;
				$this->size="5.8 x 8.3 inch";
				break;
				
			//Flyer sizes
			case "Half Sheet":
				$namePrice=5;
				$this->size="5.5 x 8.5 in";
				break;
				
			case "Standard":
				$namePrice=10;
				$this->size="8.5 x 11 in";
				break;
				
			case "Large format":
				$namePrice=15;
				$this->size="11 x 17 in";
				break;
				
			//Business Card 
			case "Business Card":
				$namePrice=0.5;
				$this->size="3.5 x 2 inch";
				break;
		}
		
		$finishPrice=0;
		
		switch ($finish)
		{
			//Paper finish types
			case "Matte":
				$finishPrice=0.1;
				break;
				
			case "Gloss":
				$finishPrice=0.2;
				break;
				
			case "UV Gloss":
				$finishPrice=0.3;
				break;
		}
		
		$sidePrice=1;
		
		if($side="Double Sided")
		{
			$sidePrice=1.8;
		}
		
		
		$this->description=$side." ".$finish." ".$name." (".$this->size.") "."Static Weight gm";
		$this->price = $sidePrice*($namePrice + $finishPrice);
	}*/
	
	/*function setId($id) 
	{
		return $this->id = $id;
	}
  
	function getId() 
	{
		return $this->id;
	}*/


	/*function setDescription($description) 
	{
		return $this->description = $description;
	}
  
	function getDescription() 
	{
		return $this->description;
	}
	
	
	function setName($name) 
	{
		return $this->name = $name;
	}
  
	function getName() 
	{
		return $this->name;
	}*/
	
	
	function setPrice($price) 
	{
		return $this->price = $price;
	}
  
	function getPrice() 
	{
		return $this->price;
	}
	
	
	function setWeight($weight) 
	{
		return $this->weight = $weight;
	}
  
	function getWeight() 
	{
		return $this->weight;
	}
	
	
	function setSize($size) 
	{
		return $this->size = $size;
	}
  
	function getSize() 
	{
		return $this->size;
	}
	
	function setSide($side) 
	{
		return $this->side = $side;
	}
  
	function getSide() 
	{
		return $this->side;
	}
	
	function setFinish($finish) 
	{
		return $this->finish = $finish;
	}
  
	function getFinish() 
	{
		return $this->finish;
	}
	
	function getPriceOfType($type,$category)
	{
		$sql = "SELECT * FROM product WHERE name_category = '".$category."' AND description = '".$type."';";

		$dbh = new Dbh();
		
		//$result = $this->db->query($sql);
		$result = $dbh->query($sql);
		//if ($result != false)
		if($result==true)
		{
			$row = $result->fetch_assoc();
			return $row['price'];
		}
		else 
		{
			echo "ERROR: Could not able to execute $sql";
			echo "<br> ".$dbh->getConn()->error.";";
			return false;
		}
	}
}




?>