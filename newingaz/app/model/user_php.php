<?php
// session_start();
require_once(__ROOT__ . "model\Model.php");
//require_once("C:\\xampp\\htdocs\\ingazclasses\\app\\model\\Model.php");
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

    public function setid($id)
    {
      return $this->id=$id;   
    }
    public function getid()
    {
      return $this->id;   
    }

    public function setemail($email)
    {
      return $this->email=$email;   
    }
    public function getemail()
    {
      return $this->email;   
    }

    public function setusername($username)
    {
        return $this->username=$username;
    }
    public function getusername()
    {
      return $this->username;   
    }

    public function setpassword($password)
    {
        return $this->password=$password;
    }
    public function getpassword()
    {
      return $this->password;   
    }

    public function setFname($Fname)
    {
      return $this->Fname=$Fname;   
    }
    public function getFname()
    {
      return $this->Fname;   
    }
    
    public function setLname($Lname)
    {
      return $this->Lname=$Lname;   
    }
    public function getLname()
    {
      return $this->Lname;   
    }

    public function setbirthday($birthday)
    {
      return $this->birthday=$birthday;   
    }
    public function getbirthday()
    {
      return $this->birthday;   
    }

    public function setgender($gender)
    {
      return $this->gender=$gender;   
    }
    public function getgender()
    {
      return $this->gender;   
    }

    public function login($username,$password)
    {
    
        $username = $_POST["username"];
        $password = $_POST["password"];
        // $password=password_hash($_POST['password'], PASSWORD_BCRYPT);

        $sql="Select * from users where username ='$username' and password='$password'";

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
            
            echo "<script>alert('Login Successfully');</script>";

          }

        else
        {
          echo "<script>alert('Invailed Email or Password');</script>";
        }

        $_SESSION['id']=$row['id'];
        $_SESSION['email']=$row['email'];
        $_SESSION['username']=$row['username'];
        $_SESSION['password']=$row['password'];
        $_SESSION['Fname']=$row['Fname'];
        $_SESSION['Lname']=$row['Lname'];
        $_SESSION['birthday']=$row['bday'];
        $_SESSION['gender']=$row['gender'];
        // echo"<pre>";
        // print_r($sql);
        // echo"</pre>";

        // echo"<pre>";
        // print_r($row);
        // echo"</pre>";
        
    }

    function signup($email,$username,$password,$Fname,$Lname,$birthday,$gender)
    {
        // $email=$_POST['email'];
        // $username=$_POST['username'];
        //  $password=password_hash($_POST['password'], PASSWORD_BCRYPT);
        $password=$_POST['password'];
        // $Fname=$_POST['Fname'];;
        // $Lname=$_POST['Lname'];
        // $birthday=$_POST['bday'];
        // $gender=$_POST['gender'];
        
        $sql="insert into users(email,username,password,Fname,Lname,bday,gender,access) values('".$_POST['email']."','".$_POST["username"]."','$password','".$_POST["Fname"]."','".$_POST["Lname"]."','".$_POST["bday"]."','".$_POST["gender"]."','user')";
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
            // header("Location:CreateAccount.php");
            echo "<script>alert('Signup Successfully');</script>";
        }

    }

    function deleteuser($id)
    {
      $sql="DELETE FROM users WHERE id=$id";
      $dbh = new dbh();
      $result = $dbh->query($sql);
      if($dbh->query($sql) === true)
      {
        echo "<script>alert('Deleted Successfully');</script>";
      } 
      else
      {
        echo "ERROR: Could not able to execute $sql. " . $conn->error;
      }
      session_unset();
      session_destroy();
    }
    function deleteinternal($id)
    {
      $sql="DELETE FROM users WHERE id=$id";
      $dbh = new dbh();
      $result = $dbh->query($sql);
      if($dbh->query($sql) === true)
      {
        echo "<script>alert('Deleted Successfully');</script>";
      } 
      else
      {
        echo "ERROR: Could not able to execute $sql. " . $conn->error;
      }
      
    }
    function getUsers()
    {
        $sql = "SELECT id,email,username,password,Fname,Lname,bday,gender FROM users WHERE access='internal' ";

        $dbh = new Dbh();
        $result = $dbh->query($sql);

        $users = array();
        while($row=mysqli_fetch_assoc($result))
        {
          $user = new user();
          $user->setid($row['id']);
          $user->setemail($row['email']);
          $user->setusername($row['username']);
          $user->setpassword($row['password']);
          $user->setFname($row['Fname']);
          $user->setLname($row['Lname']);
          $user->setbirthday($row['bday']);
          $user->setgender($row['gender']);
          $users[] = $user;
        }
        return $users;
    }

}

?>