<?php

 require_once(__ROOT__ . "model\Model.php");


//require_once("C:\\xampp\\htdocs\\ingazclasses\\app\\model\\Model.php");
class admin extends Model
{
    public function addinternal($email2,$username2,$password2,$Fname2,$Lname2,$address2,$mobile2,$birthday2,$gender2)
    {       
        $email2=$_POST['email'];
        $username2=$_POST['username'];
        $password2=$_POST['password'];
        $pass2=hash('sha512',$password2); //sha512 deh algorithm byt3ml beha hashing
        $Fname2=$_POST['Fname'];;
        $Lname2=$_POST['Lname'];
        $address2=$_POST['address'];;
        $mobile2=$_POST['mobile'];
        $birthday2=$_POST['bday'];
        $gender2=$_POST['gender'];


        $sql2="insert into users(email,username,password,Fname,Lname,address,mobile,bday,gender,access) values('$email2','$username2','$pass2','$Fname2','$Lname2','$address2','$mobile2','$birthday2','$gender2','internal')";
        $sql3 = "SELECT id, email, username FROM users WHERE email ='" . $_POST['email'] . "' or username='" . $_POST['username'] ."'";;
       
        $dbh3 = new Dbh();
        $dbh2=new Dbh();

        if($dbh2->query($sql3) == true)
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
        if($dbh3->query($sql2) == true)
        {
            // header("Location:CreateAccount.php");
            // echo" Created Account successfully";
            echo "<script>alert('Created Account successfully');</script>";
        }
    }

}

?>