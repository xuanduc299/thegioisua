<?php
    session_start();
    $id="";
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
    }
    if(empty($_SESSION['cart'][$id]))
    {
        require_once('../db/connect.php');
        $sql="select * from san_pham where id='$id'";
        $result=mysqli_query($connect,$sql);
        $each=mysqli_fetch_array($result);
        $_SESSION['cart'][$id]['ten_san']=$each['ten_san'];
        $_SESSION['cart'][$id]['anh']=$each['anh'];
        $_SESSION['cart'][$id]['gia']=$each['gia'];
        $_SESSION['cart'][$id]['so_luong']=1;
        
    }else{
        $_SESSION['cart'][$id]['so_luong']++;
    }
    header('location:../product_1.php');
    exit();
 ?>