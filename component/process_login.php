<?php 
$email=$password="";
if(isset($_POST['email']))
{
    $email=$_POST['email'];
}
if(isset($_POST['password']))
{
    $password=$_POST['password'];
}
if(isset($_POST['remember']))
{
   $remember=true;
}else{
    $remember=false;
}
require_once('../db/connect.php');
$sql="select * from users where email='$email' and password='$password'";
$result=mysqli_query($connect,$sql);
$number_row=mysqli_num_rows($result);
if($number_row==1)
{
    session_start();
    $each=mysqli_fetch_array($result);
    $id=$each['id'];
    $_SESSION['id']=$id;
    $_SESSION['name']=$each['name'];
    if($remember)
    {
        $token=uniqid('user_',true);
        $sql="update users set token='$token' where id='$id'";
        mysqli_query($connect,$sql);
        setcookie('remember',$token,time()+60*60*24*30);         
    }
    header('location:../index.php');
    exit();
}else{
	echo "Đăng nhập sai rồi";
}
 
