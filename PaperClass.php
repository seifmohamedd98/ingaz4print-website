<?php

class Paper
{
	protected $id;
	protected $description;
	protected $name;
	protected $price;
	protected $weight;
	protected $size;
	protected $finish;
	protected $side;
	
	function __construct($id,$name,$finish="Uncoated",$side="Single Sided") 
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
	}
	
	function setId($id) 
	{
		return $this->id = $id;
	}
  
	function getId() 
	{
		return $this->id;
	}


	function setDescription($description) 
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
	}
	
	
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
	
	function setFinish($finish) 
	{
		return $this->finish = $finish;
	}
  
	function getFinish() 
	{
		return $this->finish;
	}
}

//$a4=new Paper(0,"A4",0.4,0.2,"200x400","Matte");
$a4=new Paper(0,"A4");

$flyerStandardPaper= new Paper(1,"Standard","Gloss");

$businessCardPaper = new Paper(2,"Business Card","Matte");
//echo $a4->getDescription();
//echo "<br>";
//echo $a4->getFinish();



?>