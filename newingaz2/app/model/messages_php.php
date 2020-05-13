<?php
session_start();

require_once(__ROOT__ . "model\Model.php");

//require_once("C:\\xampp\\htdocs\\ingazclasses\\app\\model\\Model.php");

class Message extends Model
{ 
    private $id;
    private $sender;
    private $receiver;
    private $receiver2;
    private $subject;
    private $message;

    function __construct($sender="",$receiver="",$receiver2="",$subject="",$message="")
    {
        $this->sender = $sender;
        $this->receiver = $receiver;
        $this->receiver2 = $receiver2;
        $this->subject = $subject;
        $this->message= $message;
    }
    function setid($id)
    {
        return $this->id = $id;
    }
    function getid()
    {
        return $this->id;
    }

    function setsender($sender) 
    {
        return $this->sender = $sender;
    }
    function getsender() 
    {
        return $this->sender;
    }

    function setreceiver($receiver)
    {
        return $this->receiver =$receiver;
    } 
    function getreceiver() 
    {
         return $this->receiver;
    }

    function setreceiver2($receiver2)
    {
        return $this->receiver2 =$receiver2;
    } 
    function getreceiver2() 
    {
         return $this->receiver2;
    }

    function setsubject($subject)
    {
        return $this->subject =$subject;
    } 
    function getsubject() 
    {
         return $this->subject;
    }

    function setmessage($message)
    {
        return $this->message = $message;
    }
    function getmessage() 
    {
        return $this->message;
    }



    function viewmessageclient()
    {
        $sql = "SELECT * FROM messages WHERE receiver ='" . $_SESSION['username'] . "';";
        $dbh = new Dbh();
        $result = $dbh->query($sql);
        $messages = array();
        while($row=mysqli_fetch_assoc($result))
        {
            $message = new Message();
            $message->setid($row['id']);
            $message->setsender($row['sender']);
            // $message->setreceiver($row['receiver']);
            // $message->setreceiver2($row['recevier2']);
            $message->setsubject($row['subject']);
            $message->setmessage($row['message']);
            $messages[] = $message;
        }
            return $messages;
    }
    function viewmessageAdmin()
    {
        $sql = "SELECT * FROM messages WHERE receiver2 ='" . $_SESSION['access'] . "';";
        $dbh = new Dbh();
        $result = $dbh->query($sql);
        $messages = array();
        while($row=mysqli_fetch_assoc($result))
        {
            $message = new Message();
            $message->setid($row['id']);
            $message->setsender($row['sender']);
            $message->setreceiver($row['receiver']);
            // $message->setreceiver2($row['recevier2']);
            $message->setsubject($row['subject']);
            $message->setmessage($row['message']);
            $messages[] = $message;
        }
            return $messages;
    }
    function viewmessageInternal()
    {
        $sql = "SELECT * FROM messages WHERE receiver ='" . $_SESSION['access'] . "';";
        $dbh = new Dbh();
        $result = $dbh->query($sql);
        $messages = array();
        while($row=mysqli_fetch_assoc($result))
        {
            $message = new Message();
            $message->setid($row['id']);
            $message->setsender($row['sender']);
            // $message->setreceiver($row['receiver']);
            // $message->setreceiver2($row['recevier2']);
            $message->setsubject($row['subject']);
            $message->setmessage($row['message']);
            $messages[] = $message;
        }
            return $messages;
    }

    static function sendmessageclient($sender,$receiver,$receiver2,$subject,$message)
    {
        if($_SESSION['access']=='user')
        {
            $sender = $_SESSION['username'];
            $receiver = 'internal';
            $receiver2 = 'admin';
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            $sql="insert into messages (sender,receiver,receiver2,subject,message) values('$sender','$receiver', '$receiver2','$subject','$message');";
            // echo $sender;
            // echo $receiver;
            // echo $receiver2;
            // echo $subject;
            // echo $message;
            // echo $sql;
            $dbh = new dbh();
            $result = $dbh->query($sql);
            if($result === true)
            {
                echo "Send Successfully.";
            } 
            else
            {
                echo "ERROR: Could not able to execute $sql. " . $conn->error;
            }
        }
    }
    static function sendmessageinternal($sender,$receiver,$subject,$message)
    {
        if($_SESSION['access']=='internal')
        {
            // $id=$_POST['id'];
            $sender = $_SESSION['access'];
            $receiver = $_POST['receiver'];
            $receiver2 = 'admin';
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            
       
            $sql="insert into messages (sender,receiver,receiver2,subject,message) values('$sender','$receiver', '$receiver2','$subject','$message');";
            $sql2 = "SELECT id,sender, subject, message FROM messages WHERE id= ".$_SESSION['id']."";
            // echo $sender;
            // echo $receiver;
            // echo $receiver2;
            // echo $subject;
            // echo $message;
            // echo $sql;
            $dbh = new dbh();
            $result = $dbh->query($sql);
            if($result === true)
            {
                echo "Send Successfully.";
            } 
            else
            {
                echo "ERROR: Could not able to execute $sql. " . $conn->error;
            }
        }
    }
    function showmessages()
    {
        $sql = "SELECT * FROM messages WHERE receiver ='" . $_SESSION['username'] . "';";
        $dbh = new Dbh();
        $result = $dbh->query($sql);
        $messages = array();
        while($row=mysqli_fetch_assoc($result))
        {
            $message = new Message();
            $message->setid($row['id']);
            $message->setsender($row['sender']);
            $message->setreceiver($row['receiver']);
            $message->setreceiver2($row['receiver2']);
            $message->setsubject($row['subject']);
            $message->setmessage($row['message']);
            $messages[] = $message;
        }
            return $messages;
    }
        // else if($_SESSION['UserType']='Admin')
        // {
        //     $sender = $_SESSION['Email'];
        //     $receiver = $_POST['Receiver'];
        //     $message = $_POST['Message'];
        //     $sql="Insert Into Messages (sender,receiver,message) values('$sender', '$receiver','$message');";
        //     $dbh = new dbh();
        //     $result = $dbh->query($sql);
        //     if($dbh->query($sql) === true)
        //     {
        //         echo "Send Successfully.";
        //     } 
        //     else
        //     {
        //         echo "ERROR: Could not able to execute $sql. " . $conn->error;
        //     }
        // }
  
    // static function delete($id)
    // {
        
    //     $sql = "Delete * From Messages";
    //     $dbh = new dbh();
    //     $result = $dbh->query($sql);
    //     if($dbh->query($sql) === true)
    //     {
    //         echo "Delete Successfully.";
    //     } 
    //     else
    //     {
    //         echo "ERROR: Could not able to execute $sql. " . $conn->error;
    //     }
    // }
}
