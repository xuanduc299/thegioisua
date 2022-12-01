<?php
include 'database.php';
$email = $_POST['email'];
$psw = $_POST['psw'];


$sql = "SELECT * FROM register_login where email='$email' and psw='$psw'";
$result = mysqli_query($conn, $sql);

// $sql = mysqli_query($conn, "SELECT * FROM register_login where email='$email' and psw='$psw'");
// die($sql);
$number_row  = mysqli_num_rows($result);
if ($number_row == 1) {
    $each = mysqli_fetch_array($result);
    session_start();
    $_SESSION["id"] = $each['id'];
    $_SESSION["fullname"] = $each['fullname'];

    if ($_SESSION['fullname'] == 'admin') {
        header("Location: ../component/crud/index_crud.php");
        exit();
    } else {
        header("Location: ../index.php");
        exit();
    }

    // header("Location:../index.php");
    // exit();
} else {
    echo "Invalid Email ID/Password";
}
