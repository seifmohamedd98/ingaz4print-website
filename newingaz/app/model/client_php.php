<?php
// session_start();
require_once(__ROOT__ . "model/Model.php");
class client extends Model
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
    public function __construct($id='',$username = "", $password="",$Fname="",$Lname="")
    {   
        $this->id=$id;
        $this->username=$username;
        $this->password=$password;
        $this->Fname=$Fname;
        $this->Lname=$Lname;
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

    function getUsers()
    {
        $sql = "SELECT id,username,password,Fname,Lname FROM users WHERE access='user' ";

        $dbh = new Dbh();
        $result = $dbh->query($sql);

        $users = array();
        while($row=mysqli_fetch_assoc($result))
        {
          $user = new client();
          //$user->setid($row['id']);
         //$user->setemail($row['email']);
          $user->setusername($row['username']);
          $user->setpassword($row['password']);
          $user->setFname($row['Fname']);
          $user->setLname($row['Lname']);
        //$user->setbirthday($row['bday']);
        //$user->setgender($row['gender']);
          $users[] = $user;
        }
        return $users;
    }
    function editacc($id,$username,$password, $Fname,$Lname)
    {
        // Attempt insert query execution
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $Fname = $_POST['Fname'];
        $Lname = $_POST['Lname'];
        

      $sql = "update users set username='$username', password='$password', Fname='$Fname' , Lname='$Lname' where id='$id'";
      echo"<pre>";
      echo $sql;
      echo"</pre>";
      $sql2 = "SELECT id, username FROM users WHERE username='" . $_POST['username'] ."'";
    
        $dbh = new dbh();
        $dbh2 = new dbh();

        // $result=$dbh->query($sql);
        // $result2=$dbh2->query($sql2);
    
        
      if($dbh2->query($sql2) == true)
      {
          while($row=$dbh2->fetchRow())
          {
            if($row['username']==$_POST['username'])
            {
              echo "<script>alert('Username Already Taken');</script>";
            }	
          }
      }
        if($dbh->query($sql) == true)	
        {
          $_SESSION["username"]=$_POST["username"];
          $_SESSION["password"]=$_POST["password"];
          $_SESSION["Fname"]=$_POST["Fname"];
          $_SESSION["Lname"]=$_POST["Lname"];
          echo "<script>alert('Updated Successfully');</script>";
          //header("Location:C:\\xampp\\htdocs\\ingazclasses\\public\\editaccount.php");
        }
       else
        {
          echo "ERROR: Could not able to execute $sql. " . $conn->error;
        }
        header("Location:../public/editaccount.php");
    }



}

?>