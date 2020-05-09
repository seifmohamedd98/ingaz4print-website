<?php
require_once("C:\\xampp\\htdocs\\ingazclasses\\app\\db\\Dbh.php");
abstract class Model{
    protected $db;
    protected $conn;
    //public static $count = 0;

    public function connect(){
        if(null === $this->conn ){
            //echo "making new connection " . self::$count++;
            $this->db = new Dbh();
           // $this->conn = $this->db->connect();
        }
        return $this->db;
    }
}
?>