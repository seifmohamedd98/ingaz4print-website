<?php
require_once(__ROOT__ . "model/Model.php");
require_once("Paper.php");
class Papers extends Model
{
	protected $papers;

	function __construct()
	{
		$this->fillArray();
	}
	
	
	
	
	function fillArray() 
	{
		$this->papers = array();
		$this->db = $this->connect();
		$result = $this->readPapers();
		while ($row = $result->fetch_assoc()) 
		{
			array_push($this->papers, new );
		}
    }
	
	function readPapers(){
    $sql = "SELECT * FROM product;";
    
    $result = $this->db->query($sql);
    if ($result->num_rows > 0){
        return $result;
    }
    else {
        return false;
    }
  }
}