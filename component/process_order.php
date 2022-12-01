<?php 

$name_receiver=$phone_number_receiver=$address_receiver="";
if(isset($_POST['name_receiver'])){
    $name_receive=$_POST['name_receiver'];
}
if(isset($_POST['phone_number_receiver'])){
    $phone_number_receiver=$_POST['phone_number_receiver'];
}
if(isset($_POST['address_receiver'])){
    $address_receiver=$_POST['address_receiver'];
}
require_once('../db/connect.php');
session_start();
$cart = $_SESSION['cart'];

$total_price = 0;
foreach($cart as $each){
	$total_price +=  $each['gia']*$each['so_luong'];
}
$customer_id = $_SESSION['id'];
$status = 0;

$sql = "insert into orders(customer_id, name_receiver, phone_receiver, address_receiver, status, total_price)
values ('$customer_id', '$name_receiver', '$phone_number_receiver', '$address_receiver', '$status', '$total_price')";
mysqli_query($connect,$sql);
$sql = "select max(id) from orders where customer_id = '$customer_id'";
$result = mysqli_query($connect,$sql);
$order_id = mysqli_fetch_array($result)['max(id)'];
foreach($cart as $product_id => $each){
        $quantity = $each['so_luong'];
        $sql = "insert into order_product(order_id,product_id,quantity)
        values('$order_id','$product_id','$quantity')";
        mysqli_query($connect,$sql);
}
mysqli_close($connect);
unset($_SESSION['cart']);
header('location:../complete.php');
exit();
