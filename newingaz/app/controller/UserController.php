<?php
require_once(__ROOT__ . "controller\Controller.php");
  //require_once("C:\\xampp\\htdocs\\ingazclasses\\app\\controller\\Controller.php");

class UserController extends Controller
{
    public function loginController()
    {
        // Escape user inputs for security
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];

        $this->model->login($username,$password);
    }

    public function signupController()
    {
        $email=$_REQUEST['email'];
        $username=$_REQUEST['username'];
        $password=$_REQUEST['password'];
        $Fname=$_REQUEST['Fname'];;
        $Lname=$_REQUEST['Lname'];
        $birthday=$_REQUEST['bday'];
        $gender=$_REQUEST['gender'];

        $this->model->signup($email,$username,$password,$Fname,$Lname,$birthday,$gender);
    }
    public function DeleteUser()
    {
        $id = $_REQUEST['id'];
        $this->model->deleteuser($id);
    }
    public function Deleteinternal()
    {
        $id = $_REQUEST['id'];
        $this->model->deleteinternal($id);
    }
    
}