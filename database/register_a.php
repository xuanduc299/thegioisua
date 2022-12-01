<?php
include_once 'database.php';
if (isset($_POST['save'])) {
    $full_name = $_POST['fullname'];
    $email = $_POST['email'];
    $psw = $_POST['psw'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO register_login (fullname,email,psw,phone)
	 VALUES ('$full_name','$email','$psw','$phone')";
    if (mysqli_query($conn, $sql)) {
        if ($email != "" &&  $psw != "") {
            header('Location: login.php?status=success');
            die();
        }
    } else {
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
