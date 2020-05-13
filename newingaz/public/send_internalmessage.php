<?php
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
            <form action="send_internalmessage.php?action=internalsendMessage" method="post">

            <!-- <table width='80%' class="table table-hover" id="table">
                <?php
                        // $details=$_GET['id'];
                        
                        // foreach($this->model->showmessages() as $message)
                        // {
                        //     if($message->getid() == $details)
                        //     {
                        //         $getid = $message->getid();
                        //         $getsender = $message ->getsender();
                        //         $getsubject = $message->getsubject();
                        //         $getmessage= $message->getmessage();
                        //     }
                        // }
                ?>
            </table> -->

                <div class="form-group">      
                    <!-- <table>
                        <tr>
                        <th scope="row">Sender</th>
                         <td colspan='2'><input type='' value="<?php //echo $getsender; ?>" name='sender' style='border:none; background:none; width:100%;' readonly></td>
                        </tr>  
                        <tr>
                            <th scope="row">Subject</th>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <th scope="row">Message</th>
                            <td colspan="2"> </td>
                        </tr>  
                    </table>   -->

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
                    <button class="btn btn-primary"  name="send" ><b> REPLAY </b></button>
                </div>

            </form>
		
        <!-------------------------------------------------------End of Content----------------------------------------------------------------->

        <!-------------------------------------------------------Start of Footer---------------------------------------------------------------->
        <?php include "footer.php";?>
        <!-------------------------------------------------------End of Footer------------------------------------------------------------------>
    </body>
</html>
