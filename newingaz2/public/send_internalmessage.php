<?php
  define('__ROOT__', "../app/");
  require_once(__ROOT__ . "model/messages_php.php");
  require_once(__ROOT__ . "controller/MessagesController.php");
  require_once(__ROOT__ . "view/ViewMessages.php");
  

  $model = new Message();
  $controller = new MessageController($model);



$id=$_GET['id'];
foreach($model->showmessages() as $messages)
{
    if($messages->getid() == $id)
    {
        $id = $messages->getid();
        $sender = $messages->getsender();
        $subject = $messages->getsubject();
        $message = $messages->getmessage();
   }
}

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
        <style>
        table
        {
            margin-bottom: 44px;
            width: 100%;
        }
        th,td
        {
            line-height: 44px;
            font-size: 14px;
            font-weight: 400;
            padding-top: 22px;
            text-transform: uppercase;
            padding-bottom: 22px;
            vertical-align: top;
        }
        th 
        {
            color: #648880;
            font-size: 24px;
            border-bottom: 1px solid #dfe2e5;
            padding-top: 21px;
            padding-right: 45px;
            text-align: right;
            width: 20%;
        }
        td 
        {
            border-bottom: 1px solid #dfe2e5;
            padding-top: 21px;
            width: 40%;
        }
    </style>

    </head>
    
    <body>		
    <!-------------------------------------------------------Start of Header---------------------------------------------------------------->
    <?php include("C:\\xampp\\htdocs\\newingaz\\app\\view\\Viewbar.php");?>
    <!-------------------------------------------------------End of Header------------------------------------------------------------------>

    <!-------------------------------------------------------Start of Content--------------------------------------------------------------->
            <h1 class="jumbotron"> Write Your Message </h1>
            <form action="view_internalmessage.php?action=internalsendMessage" method="post">
                <div class="form-group">      
                    <table>
                        <tr>
                        <th scope="row">Message ID</th>
                        <td colspan='2'><input type='' value="<?php echo $id; ?>"  style='border:none; background:none; width:100%;' readonly></td>
                        </tr>  


                        <tr>
                        <th scope="row">Sender</th>
                         <td colspan='2'><input type='' value="<?php echo $sender; ?>" name='receiver' style='border:none; background:none; width:100%;' readonly></td>
                        </tr>  
                        <tr>
                            <th scope="row">Subject</th>
                            <td colspan='2'><input type='' value="<?php echo $subject; ?>" style='border:none; background:none; width:100%;' readonly></td>
                        </tr>
                        <tr>
                            <th scope="row">Message</th>
                            <td colspan='2'><input type='' value="<?php echo $message; ?>"  style='border:none; background:none; width:100%;' readonly></td>
                        </tr>  
                    </table>  

                    <br>
                    <input type="text" class="form-control" placeholder="SUBJECT" name="subject">
                    <br>
                    <br>
                    <br>
                    <textarea  class="form-control" placeholder="YOUR MESSAGE" name="message"></textarea>
                    <br>
                    <br>
                    <br>
                    <button class="btn btn-primary"  name="send" ><b> REPLAY </b></button>
                </div>

            </form>
		
        <!-------------------------------------------------------End of Content----------------------------------------------------------------->

        <!-------------------------------------------------------Start of Footer---------------------------------------------------------------->
        <?php include "footer.php";?>
        <!-------------------------------------------------------End of Footer------------------------------------------------------------------>
    </body>
</html>
