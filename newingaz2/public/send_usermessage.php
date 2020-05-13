<?php
  define('__ROOT__', "../app/");
  require_once(__ROOT__ . "model/messages_php.php");
  require_once(__ROOT__ . "controller/MessagesController.php");

  $model = new Message();
  $controller = new MessageController($model);
  if (isset($_GET['action']) && !empty($_GET['action']))
  {
      $controller->{$_GET['action']}();
  }
?>
<!DOCTYPE HTML>

<html>
    <head>
        <title>Send Message | INAGZ</title>
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
		require_once(__ROOT__ . "view\Viewbar.php");?>
    <!-------------------------------------------------------End of Header------------------------------------------------------------------>

    <!-------------------------------------------------------Start of Content--------------------------------------------------------------->
            
            <h1 class="jumbotron"> Write Your Message </h1>
            <form action="send_usermessage.php?action=sendMessage" method="post">

                <div class="form-group">                      
                    <br>
                    <input type="text" class="form-control" placeholder="SUBJECT" name="subject">
                    <br>
                    <input name="id" value="<?php echo $id;?>"  hidden />
                    <input name="receiver" value="<?php echo $receiver;?>"  hidden />
                    <input name="receiver2" value="<?php echo $receiver2;?>"  hidden />
                    <br>
                    <br>
                    <textarea  class="form-control" placeholder="YOUR MESSAGE" name="message"></textarea>
                    <br>
                    <br>
                    <br>
                    <button class="btn btn-primary"  name="send" ><b> SEND </b></button>
                </div>

            </form>
		
        <!-------------------------------------------------------End of Content----------------------------------------------------------------->

        <!-------------------------------------------------------Start of Footer---------------------------------------------------------------->
        <?php include "footer.php";?>
        <!-------------------------------------------------------End of Footer------------------------------------------------------------------>
    </body>
</html>
