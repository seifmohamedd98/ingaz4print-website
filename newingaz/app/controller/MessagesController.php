<?php

  //require_once("C:\\xampp\\htdocs\\ingazclasses\\app\\controller\\Controller.php");
  require_once(__ROOT__ . "controller\Controller.php");

class MessageController extends Controller
{
    public function sendMessage() 
    {
        $sender = $_SESSION['username'];
        $receiver = $_REQUEST['receiver'];
        $receiver2 = $_REQUEST['receiver2'];
        $subject = $_REQUEST['subject'];
        $message = $_REQUEST['message'];
        $this->model->sendmessageclient($sender,$receiver,$receiver2,$subject,$message);
    }
    public function internalsendMessage() 
    {
        
        $sender = $_SESSION['access'];
        $receiver = $_REQUEST['receiver'];
        // $receiver2 = $_REQUEST['receiver2'];
        $subject = $_REQUEST['subject'];
        $message = $_REQUEST['message'];
        // $whosend= $_REQUEST['sender'];
        $this->model->sendmessageinternal($sender,$receiver,$subject,$message);
    }

}