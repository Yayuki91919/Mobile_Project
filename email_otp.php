<?php 
session_start();
include __DIR__.'/controller/registerController.php';
error_reporting(0);
$email=$_GET['email'];
$_SESSION['email']=$email;
$register_controller=new RegisterController();
$user=$register_controller->getUser($email);
$token=$user['token'];
$id=$user['id'];
$status=$register_controller->mailRegister($email,$token);

if($status==true)
{
    echo "<script>location.href='otp.php'</script>";
}


?>