<?php
// require_once("login.php");
// require_once("user_php.php");
require_once("../app/model/Model.php");
require_once("../app/db/Dbh.php");
require_once("../app/view/View.php");
require_once("../app/controller/Controller.php");
// require_once("../app/view/View.php");


// $model = new user();
// $username = $_POST["username"];
// $password = $_POST["password"];
// $model->login($username, $password);
// $model->Model();
// $conn = new Dbh();
// $conn->connect();
include("login.php");
    class navbar extends View
    {
        
            public function navbarinternal()
            {   
                if($_SESSION['access'] == "internal")
                {
                // $str="";
                // $str='<li><a href="internal_view.php"><span class="glyphicon glyphicon-cloud-download"></span> Review Message</a></li>';
                // return $str;
                
               echo'<li><a href="internal_view.php"><span class="glyphicon glyphicon-cloud-download"></span> Review Message</a></li>';
                }       

            }
    }

    $nav = new navbar();
    $nav->navbarinternal();
?>

