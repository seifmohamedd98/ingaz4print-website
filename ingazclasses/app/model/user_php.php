<?php
session_start();
require_once("C:\\xampp\\htdocs\\ingazclasses\\app\\model\\Model.php");
class user extends Model
{
    private $id;
    private $email;
    private $username;
    private $password;
    private $Fname;
    private $Lname;
    private $birthday;
    private $gender;
    private $dbh;

    public function __construct($username = "", $password="")
    {
        $this->username=$username;
        $this->password=$password;
    }

    public function getuser()
    {
      return $this->username;   
    }
    public function getpass()
    {
      return $this->password;   
    }

    public function setuser()
    {
        return $this->username=$username;
    }
    public function setpass()
    {
        return $this->password=$password;
    }

    public function login($username,$password)
    {
    
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql="Select *from users where username ='$username' and password='$password'";

        $dbh = new DBh();

        $result = $dbh->query($sql);

        $row=$dbh->fetchRow();        
        
        if (!empty($row))
        {

            if($row['access']=='admin')
            {
                $_SESSION['access']='admin';
            }
            if($row['access']=='internal')
            {
                $_SESSION['access']='internal';
            }
            if($row['access']=='user')
            {
                $_SESSION['access']='user';
            }
            
             echo "login successfully";
         }

        else
        {
           echo "Invalid Email or Password or still not accepted";
        }

        echo"<pre>";
        print_r($sql);
        echo"</pre>";

        echo"<pre>";
        print_r($row);
        echo"</pre>";
        
    }

    function signup($email,$username,$password,$Fname,$Lname,$birthday,$gender)
    {
        $email=$_POST['email'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $Fname=$_POST['Fname'];;
        $Lname=$_POST['Lname'];
        $birthday=$_POST['bday'];
        $gender=$_POST['gender'];
        
        $sql="insert into users(email,username,password,Fname,Lname,bday,gender,access) values('".$_POST['email']."','".$_POST["username"]."','".$_POST["password"]."','".$_POST["Fname"]."','".$_POST["Lname"]."','".$_POST["bday"]."','".$_POST["gender"]."','user')";
        $sql1 = "SELECT id, email, username FROM users WHERE email ='" . $_POST['email'] . "' or username='" . $_POST['username'] ."'";

        $dbh = new Dbh();
        $dbh2=new Dbh();

        

        if($dbh2->query($sql1) == true)
        {

            while($row=$dbh2->fetchRow())
            {
                if($row['email']==$_POST['email'])
                {
                    echo "<script>alert('Email Already Taken');</script>";
                }
                if($row['username']==$_POST['username'])
                {
                    echo "<script>alert('Username Already Taken');</script>";
                }   
            }
        }
        if($dbh->query($sql) == true)
        {
            echo" Signup successfully";
        }
        // else
        // {
        //  echo "ERROR: Could not able to execute $sql. " . $conn->error;
        // }
        
    }
}

?>