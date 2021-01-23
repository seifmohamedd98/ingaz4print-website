<?php
session_start();
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/messages_php.php");
require_once(__ROOT__ . "controller/MessagesController.php");
require_once(__ROOT__ . "view/ViewMessages.php");


$model = new Message();
$controller = new MessageController($model);
$view = new ViewTable($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) 
{
  $controller->{$_GET['action']}();
}

?>
<!DOCTYPE HTML>

<html>
    <head>
        <title>Review Message | INGAZ</title>
        <link rel = "icon" href ="images/logo2.jpg" type = "image/x-icon"> 

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>    
        
    </head>
    
    <body>		
    <!-------------------------------------------------------Start of Header---------------------------------------------------------------->
    <?php
        //include("C:\\xampp\\htdocs\\ingazclasses\\app\\view\\Viewbar.php");
		require_once(__ROOT__ . "view\Viewbar.php");

    ?> 
    <!-------------------------------------------------------End of Header------------------------------------------------------------------>

        <!-------------------------------------------------------Start of Content--------------------------------------------------------------->
        <h1 class="jumbotron">Messages Review</h1>
        <table width='80%' class="table table-hover" id="table">
                <thead> <!-- deh 3ashan may3mlsh hover 3alehom -->
                    <tr class="info">   
                        <th>Sender</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <?php
                    $model = new Message();
                    $table = $model->viewmessageclient();
                    foreach($table as $message)
                    {
                        echo "<tr>";
                        echo "<td>".$message->getsender() ."</td>";
                        echo "<td>".$message->getsubject()."</td>";
                        echo "<td>".$message->getmessage()."</td>";
                    // echo "<td><input type='button' onclick='DeleteRow(this)' value='Delete'></td>";
                        echo"</tr>";
                    }
                ?>
        </table>   
        <br><br>
        <!-------------------------------------------------------End of Content----------------------------------------------------------------->

        <!-------------------------------------------------------Start of Footer---------------------------------------------------------------->
        <?php include "footer.php";?>
        <!-------------------------------------------------------End of Footer------------------------------------------------------------------>
    </body>
</html>
