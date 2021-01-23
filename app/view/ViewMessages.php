<?php
//require_once("C:\\xampp\\htdocs\\ingazclasses\\app\\view\\View.php");
  require_once(__ROOT__ . "view\View.php");

class ViewTable extends View
{   
    public function messagesview()
    {
        $str = "";
        foreach($this->model->viewmessageclient() as $message)
        {
            $str = $str .'<tr>'.
            '<td>' . $message->getsender()   . "</td>" .
            '<td>' . $message->getsubject()  . "</td>" .
            '<td>' . $message->getmessage()  . "</td>" .
            // '<td><a href="deletemessage.php?id='.$message->getid().'">Delete Message </a></td> '.
            '</tr>';
        }
            return $str;
    }
}

?>