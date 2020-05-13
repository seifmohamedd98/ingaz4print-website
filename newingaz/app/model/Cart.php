<?php
require_once(__ROOT__ . "model/Model.php");
require_once("Product.php");

class Cart extends Model
{
	$productArray;
	
	function __construct($productArray=array())
	{
		$this->productArray=$productArray;
	}

	function addToCart($product)
	{
		array_push($this->productArray,$product);
	}
	
	
	
}