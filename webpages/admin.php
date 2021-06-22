<?php 
session_start();

$emailid = 'admin123@gmail.com';
$password =  '123456';

if(isset($_GET['logout']))
{
    unset($_SESSION['login']);
}

if($_POST)
{
    if($_POST['email'] == $emailid && $_POST['password'] == $password)
    {
        $_SESSION["login"] = $emailid;
        header("Location:adminpage.php");
    }
    else
    {
        echo '<p>Emailid or Password is invalid</p>';
    }
}

if(!isset($_SESSION["login"])) 
{
    header("Location:login.php");
}
else{
    header("Location:adminpage.php");
}
?> 
 
