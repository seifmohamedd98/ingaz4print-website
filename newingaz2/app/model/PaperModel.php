<?php
	require_once(__ROOT__ . "model/Model.php");
	class PaperModel extends Model
	{
		protected $id;
		protected $paperType;
		protected $description;
		protected $price;
		protected $nameCategory;
		
		function __construct($id,$paperType,$description,$price,$nameCategory)
		{
			$this->id=$id;
			$this->paperType=$paperType;
			$this->description=$description;
			$this->price=$price;
			$this->nameCategory=$nameCategory;
		}
		
		function addPaperModel($id,$paperType,$description,$price,$nameCategory)
		{
			
			$dbh = new Dbh();
			$sql = "INSERT INTO product VALUE('$id','$paperType','$description',".$price.",'$nameCategory')"
			$result = $dbh->query($sql);
		}
		
		
		function getPaperModels()
		{
			$sql="SELECT * FROM product";
            $dbh = new Dbh();
            $result = $dbh->query($sql);
            $paperModels = array();
            while($row=mysqli_fetch_assoc($result))
			{
				$paperModel = new PaperModel($row['id'],$row['paper_type'],$row['description'],$row['price'],$row['name_category']);

				array_push($paperModels,$paperModel);
            }
            return $paperModels;
		}
		

	}
?>