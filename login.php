<?php
//session_start();
if (isset($_COOKIE['remember'])) {
    $token = $_COOKIE['remember'];
    require_once('db/connect.php');
    $sql = "select * from users where token='$token' limit 1";
    $result = mysqli_query($connect, $sql);
    $number_row = mysqli_num_rows($result);
    $each = mysqli_fetch_array($result);
    $_SESSION['id'] = $each['id'];
    $_SESSION['name'] = $each['name'];
}
if (isset($_SESSION['id'])) {
    header('location:index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <?php include('css-libary.php') ?>
    <title>SKINLELE.COM</title>
</head>

<body>
    <?php
    include 'component/header_2.php'
    ?>
    <div class="container" style="margin-bottom: 50px;">
        <div class="row">
            <div class="col-sm-6">
                <h2 style="font-size: 20px;font-family: 'Times New Roman', Times, serif;margin-bottom: 20px;">ĐĂNG NHẬP</h2>
                <form method="POST" action="./component/process_login.php">
                    <div class="form-group">
                        <label style="font-size: 18px;font-family: 'Times New Roman', Times, serif;margin-bottom: 20px;">Email:</label>
                        <input style="height: 40px;width: 80%;font-size: 14px" type="email" class="form-control" name="email" placeholder="Nhập email...">
                    </div>
                    <div class="form-group">
                        <label style="font-size: 18px;font-family: 'Times New Roman', Times, serif;margin-bottom: 20px;">Mật khẩu:</label>
                        <input style="height: 40px;width: 80%;font-size: 14px" type="password" class="form-control" name="password" placeholder="Nhập mật khẩu...">
                    </div>
                    <label style="font-size: 18px;font-family: 'Times New Roman', Times, serif;margin-bottom: 20px;">Nhớ mật khẩu</label>
                    <input name="remember" type="checkbox">
                    <br>
                    <button style="height: 50px;border-radius: 5px;" class="btn btn-default">Đăng Nhập</button>
                </form>
            </div>
            <div class="col-sm-6"><img src="./images/design_sua/img_product_banner_3.jpg" alt="" width="100%"></div>
        </div>
    </div>

    <?php
    include 'component/footer.php'
    ?>
    <?php include('jquery.php') ?>
</body>

</html>