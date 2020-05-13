<?php

//define('__ROOT__', "../app/");
require_once(__ROOT__ . "controller/Controller.php");
class ControllerClient extends Controller
{

    public function editclientaccount()
    {
        $id = $_SESSION['id'];
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        $Fname = $_SESSION['Fname'];
        $Lname = $_SESSION['Lname'];
        echo $id;
        echo $username;
        $this->model->editacc($id,$username,$password,$Fname,$Lname);
    }
}