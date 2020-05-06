<?php
include("PaperClass.php");

class Product
{
	protected $id;
	protected $name;
	protected $paper;
	protected $quantity;
	protected $paperQuantity;
	protected $price;
	protected $totalPrice;
	protected $description;
	
	function __construct($id,$paper,$quantity,$paperQuantity=1) 
	{
		$this->id=$id;
		//$this->name=$name;
		$this->paper=$paper;
		$this->quantity=$quantity;
		$this->paperQuantity=$paperQuantity;
		
		$this->description="";
		/*
		switch($name)
		{
			case "NoteBook":
				$this->price = ($paper->getPrice() * $paperQuantity) +10 ;
				$this->totalPrice = $this->price * $quantity;
				$this->description="Product: ".$paperQuantity." pages ".$name." <br>Quantity: ".$quantity." <br>Paper Type: ".$paper->getDescription()." <br>Price of 1 NoteBook: ".$this->price."EG <br>Total Price of NoteBooks: ".$this->totalPrice."EG"; 
				break;
			case "Business Card":
				$this->price = $paper->getPrice();
				$this->totalPrice = $this->price * $quantity;
				$this->description="Product: ".$name." <br>Quantity: ".$quantity." <br>Paper Type: ".$paper->getDescription()." <br>Price of 1 Business Card: ".$this->price."EG <br>Total Price of Business Cards: ".$this->totalPrice."EG"; 
				break;
			case "Flyer":
				$this->price = $paper->getPrice();
				$this->totalPrice = $this->price * $quantity;
				$this->description="Product: ".$name." <br>Quantity: ".$quantity." <br>Paper Type: ".$paper->getDescription()." <br>Price of 1 Flyer: ".$this->price."EG <br>Total Price of Flyers: ".$this->totalPrice."EG"; 
				break;
		}*/
		
		
		
	}
	
	function setId($id) 
	{
		return $this->id = $id;
	}
  
	function getId() 
	{
		return $this->id;
	}
	

	function setName($name) 
	{
		return $this->name = $name;
	}
  
	function getName() 
	{
		return $this->name;
	}
	

	function setPaper($paper) 
	{
		return $this->paper = $paper;
	}
  
	function getPaper() 
	{
		return $this->paper;
	}
	
	function setQuantity($quantity) 
	{
		return $this->quantity = $quantity;
	}
  
	function getQuantity() 
	{
		return $this->quantity;
	}
	
	
	function setPaperQuantity($paperQuantity) 
	{
		return $this->paperQuantity = $paperQuantity;
	}
  
	function getPaperQuantity() 
	{
		return $this->paperQuantity;
	}
	
	
	function setPrice($price) 
	{
		return $this->price = $price;
	}
  
	function getPrice() 
	{
		return $this->price;
	}
	
	
	function setTotalPrice($totalPrice) 
	{
		return $this->totalPrice = $totalPrice;
	}
  
	function getTotalPrice() 
	{
		return $this->totalPrice;
	}
	
	
	function setDescription($description) 
	{
		return $this->description = $description;
	}
  
	function getDescription() 
	{
		return $this->description;
	}
	
}



class NoteBook extends Product
{
	function __construct($id,$paper,$quantity,$paperQuantity=1)
	{
		parent::__construct($id,$paper,$quantity,$paperQuantity);
		$this->name = "NoteBook";
		$this->price = ($paper->getPrice() * $paperQuantity) +10 ;
		$this->totalPrice = $this->price * $quantity;
		$this->description="Product: ".$paperQuantity." pages ".$this->name." <br>Quantity: ".$quantity." <br>Paper Type: ".$paper->getDescription()." <br>Price of 1 NoteBook: ".$this->price."EG <br>Total Price of NoteBooks: ".$this->totalPrice."EG";
	}	
}



class Flyer extends Product
{
	function __construct($id,$paper,$quantity,$paperQuantity=1)
	{
		parent::__construct($id,$paper,$quantity,$paperQuantity);
		$this->name = "Flyer";
		$this->price = $paper->getPrice();
		$this->totalPrice = $this->price * $quantity;
		$this->description="Product: ".$this->name." <br>Quantity: ".$quantity." <br>Paper Type: ".$paper->getDescription()." <br>Price of 1 Flyer: ".$this->price."EG <br>Total Price of Flyers: ".$this->totalPrice."EG"; 
	}	
}



class BusinessCard extends Product
{
	function __construct($id,$paper,$quantity,$paperQuantity=1)
	{
		parent::__construct($id,$paper,$quantity,$paperQuantity);
		$this->name = "Business Card";
		$this->price = $paper->getPrice();
		$this->totalPrice = $this->price * $quantity;
		$this->description="Product: ".$this->name." <br>Quantity: ".$quantity." <br>Paper Type: ".$paper->getDescription()." <br>Price of 1 Business Card: ".$this->price."EG <br>Total Price of Business Cards: ".$this->totalPrice."EG"; 
	}
}

//$notebook = new Product(0,"Flyer",$a4,1000,200);
$notebook = new NoteBook(0,$a4,1000,200);
echo $notebook->getDescription();

echo "<br>";
echo "<br>";
$flyer = new Flyer(0,$flyerStandardPaper,500,200);
echo $flyer->getDescription();

echo "<br>";
echo "<br>";
$businessCard = new BusinessCard(0,$businessCardPaper,1000,200);
echo $businessCard->getDescription();

?>