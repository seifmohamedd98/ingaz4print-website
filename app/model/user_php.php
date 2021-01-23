<?php
// session_start();
require_once(__ROOT__ . "model\Model.php");
require_once(__ROOT__ . "model\cart.php");
//require_once "vendor\autoload.php";
//require_once "constants\constants.php";
//require_once("C:\\xampp\\htdocs\\ingazclasses\\app\\model\\Model.php");
class user extends Model
{
    private $id;
    private $email;
    private $username;
    private $password;
    private $Fname;
    private $Lname;
    private $address;
    private $mobile;
    private $birthday;
    private $gender;
    private $dbh;
    private $cart;
    private $token;

    function __construct($username = "", $password="")
    {
        $this->username=$username;
        $this->password=$password;
		    $this->cart=new Cart();
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

    public function setaddress($address)
    {
      return $this->address=$address;   
    }
    public function getaddress()
    {
      return $this->address;   
    }

    public function setmobile($mobile)
    {
      return $this->mobile=$mobile;   
    }
    public function getmobile()
    {
      return $this->mobile;   
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
	
    public function setCart($cart)
    {
      return $this->cart=$cart;   
    }
    public function getCart()
    {
      return $this->cart;   
    }

    public function settoken($token)
    {
      return $this->token=$token;   
    }
    public function gettoken()
    {
      return $this->token;   
    }

	public function addToCart($product)
	{
		//$cart = new Cart();
		//$cart->addToCart($product);
		$this->cart->addToCart($product,$this->getusername());
	}

    public function login($username,$password)
    {
    
        $username = $_POST["username"];
        $password = $_POST["password"];
        $pass=hash('sha512',$password); //sha512 deh algorithm byt3ml beha hashing

        $sql="Select * from users where username ='$username' and password='$pass'";
        

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
            
            //  echo "login successfully";
            //  echo "<script>alert('login successfully');</script>";

         }

        else
        {
           //echo "Invalid Email or Password";
           echo "<script>alert('Invalid Email or Password');</script>";
        }

        $_SESSION['id']=$row['id'];
        $_SESSION['email']=$row['email'];
        $_SESSION['username']=$row['username'];
        $_SESSION['password']=$row['password'];
        $_SESSION['Fname']=$row['Fname'];
        $_SESSION['Lname']=$row['Lname'];
        $_SESSION['address']=$row['address'];
        $_SESSION['mobile']=$row['mobile'];
        $_SESSION['birthday']=$row['bday'];
        $_SESSION['gender']=$row['gender'];
        // echo"<pre>";
        // print_r($sql);
        // echo"</pre>";

        // echo"<pre>";
        // print_r($row);
        // echo"</pre>";
        
    }

    function signup($email,$username,$password,$Fname,$Lname,$address,$mobile,$birthday,$gender)
    {
        // $email=$_POST['email'];
        // $username=$_POST['username'];
        //  $password=password_hash($_POST['password'], PASSWORD_BCRYPT);
        $password=$_POST['password'];
        $pass=hash('sha512',$password); //sha512 deh algorithm byt3ml beha hashing
        //$token = bin2hex(random_bytes(50));
        // $Fname=$_POST['Fname'];;
        // $Lname=$_POST['Lname'];
        // $birthday=$_POST['bday'];
        // $gender=$_POST['gender'];
        
        $sql="insert into users(email,username,password,Fname,Lname,address,mobile,bday,gender,access) values('".$_POST['email']."','".$_POST["username"]."','$pass','".$_POST["Fname"]."','".$_POST["Lname"]."','".$_POST["address"]."','".$_POST["mobile"]."','".$_POST["bday"]."','".$_POST["gender"]."','user')";
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
           // echo" Signup successfully";
            echo "<script>alert('Signup successfully');</script>";
        }
        // else
        // {
        //  echo "ERROR: Could not able to execute $sql. " . $conn->error;
        // }
    }

    function deleteuser($id)
    {
      $sql="DELETE FROM users WHERE id=$id";
      $dbh = new dbh();
      $result = $dbh->query($sql);
      if($dbh->query($sql) === true)
      {
        //echo "Deleted Successfully.";
        echo "<script>alert('Deleted Successfully.');</script>";
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
        //echo "Deleted Successfully.";
        echo "<script>alert('Deleted Successfully.');</script>";
      } 
      else
      {
        echo "ERROR: Could not able to execute $sql. " . $conn->error;
      }
      
    }
    function getUsers()
    {
        $sql = "SELECT id,email,username,password,Fname,Lname,address,mobile,bday,gender FROM users WHERE access='internal' ";

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
          $user->setaddress($row['address']);
          $user->setmobile($row['mobile']);
          $user->setbirthday($row['bday']);
          $user->setgender($row['gender']);
          $users[] = $user;
        }
        return $users;
    }

    function reset($email)
    {
      $errors = [];
      $email = $_POST['email'];
      $sql = "SELECT email FROM users WHERE email='$email'";
      $dbh = new Dbh();
      $results = $dbh->query($sql);

      // if (empty($email))
      // {
      //   array_push($errors, "Your email is required");
      // }
      if($results != false)
      {
      if(mysqli_num_rows($results) == 1)
      {
        // echo "<script>alert('E-mail Will be Sent');</script>";
        $token = bin2hex(random_bytes(10));
        //$token = rand(0,25);
        $body="Go to this link -> http://localhost/newingaz/public/new_password.php where your token = " . $token . " to reset your password";
        if (count($errors) == 0)
        {
          // store token in the password-reset database table against the user's email
          $sql1 = "INSERT INTO password_resets(email, token) VALUES ('$email', '$token')";
          $results = $dbh->query($sql1);
          //Send email to user with the token in a link they can click on
          $to = $email;
          $subject = "Reset your password on ingazforprint.com";
          $msg = $body;
          $msg = wordwrap($msg,70);
          $headers = "From: ingazforprint@gmail.com";
          mail($to, $subject, $msg, $headers);
          header("Location:../public/pending.php?email=" . $email);
        }
      }
      else 
      {
          // echo "Sorry, no user exists on our system with that email");
          echo "<script>alert('Sorry, no user exists on our system with that email');</script>";
      }
    }

    }
    function passwordchange($password,$token)
    {
      
      $password =  $_POST['password'];

      $token = $_POST['token'];

      $sql = "SELECT email FROM password_resets WHERE token='$token' LIMIT 1";
      $dbh = new Dbh();
      $results = $dbh->query($sql);
      $email = mysqli_fetch_assoc($results)['email'];
      
      if ($email)
      {
        $password=hash('sha512',$password); 
        //$new_pass = md5($new_pass);
        $sql2 = "UPDATE users SET password='$password' WHERE email='$email'";
        $dbh2 = new Dbh();
        $results2 = $dbh2->query($sql2);
        header('location: ../public/home.php');
      }
      
    }

}

?>