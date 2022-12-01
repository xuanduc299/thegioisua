<?php
$name=$email=$password="";
if(isset($_POST['name']))
{
    $name=$_POST['name'];
}
if(isset($_POST['email']))
{
    $email=$_POST['email'];
}
if(isset($_POST['phone_number']))
{
    $phone_number=$_POST['phone_number'];
}
if(isset($_POST['address']))
{
    $address=$_POST['address'];
}
if(isset($_POST['password']))
{
    $password=$_POST['password'];
}
require_once('../db/connect.php');

$sql="select count(*) from users where email='$email'";
$result=mysqli_query($connect,$sql);
$each=mysqli_fetch_array($result)['count(*)'];
if($each==1)
{
    session_start();
    $_SESSION['erro']="Gmail đã được đăng ký";
    header('location:../register.php');
    exit();
}
$sql="insert into users(name, email, password,phone_number,address) values('$name','$email','$password','$phone_number','$address')";
mysqli_query($connect,$sql);
$number_row=mysqli_num_rows($result);
if($number_row==1){
    header('location:../login.php');
    exit();
}
$sql="select id from users where email='$email'";
$result=mysqli_query($connect,$sql);
$each=mysqli_fetch_array($result)['id'];
session_start();
$_SESSION['id']=$each['id'];
$_SESSION['name']=$each['name'];
mysqli_close($connect);

