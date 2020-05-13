<?php

  //require_once("C:\\xampp\\htdocs\\ingazclasses\\app\\controller\\Controller.php");
   require_once(__ROOT__ . "controller\Controller.php");


class AdminController extends Controller
{
    public function addinternalaccount()
    {
        $email=$_REQUEST['email'];
        $username=$_REQUEST['username'];
        $password=$_REQUEST['password'];
        $Fname=$_REQUEST['Fname'];;
        $Lname=$_REQUEST['Lname'];
        $birthday=$_REQUEST['bday'];
        $gender=$_REQUEST['gender'];

        $this->model->addinternal($email,$username,$password,$Fname,$Lname,$birthday,$gender);
    }
}