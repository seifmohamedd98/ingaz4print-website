<?php

  require_once("C:\\xampp\\htdocs\\ingazclasses\\app\\controller\\Controller.php");

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

    // public function profileController()
    // {
    //     $email = $_REQUEST['email'];

    //     $this->model->viewprofile($email);
    // }
    // public function AddUser()
    // {
    //     $fname = $_REQUEST['FirstName'];
    //     $lname = $_REQUEST['LastName'];
    //     $email = $_REQUEST['Email'];
    //     $password = $_REQUEST['Password'];
    //     $phone = $_REQUEST['Phone'];
    //     move_uploaded_file($_FILES["img"]["tmp_name"],  $_FILES["img"]["name"]);
    //     $image=$_FILES["img"]["name"];
    //     $usertype = $_REQUEST['UserType'];
    //     //$phone = $_REQUEST['phone'];
    //     //$age = $_REQUEST['age'];
      
    //     $this->model->adduser($fname,$lname,$email,$password,$phone,$image,$usertype);
    // }

    // public function EditUser()
    // {
    //     $id = $_REQUEST['id'];
    //     $fname = $_REQUEST['FirstName'];
    //     $lname = $_REQUEST['LastName'];
    //     $email = $_REQUEST['Email'];
    //     $password = $_REQUEST['Password'];
    //     $phone = $_REQUEST['Phone'];
    //     move_uploaded_file($_FILES["Image"]["tmp_name"],  $_FILES["Image"]["name"]);
    //     $image=$_FILES["Image"]["name"];
    //     $usertype = $_REQUEST['UserType'];
    //     //$age = $_REQUEST['age'];
    //     $this->model->edituser($id,$fname,$lname,$email,$password,$phone,$image,$usertype);
    // }

    // public function DeleteUser()
    // {
    //   $id = $_REQUEST['id'];
    //   $this->model->deleteuser($id);
    // }

  }