<?php
session_start();
?>

<style>
    .list-main li :hover {
        font-weight: bold;

    }

    .header.shop .nav li:hover a {
        background: #e28585;
        border-radius: 30px;
    }
</style>
<!-- Header -->
<header class="header shop">
    <!-- Topbar -->
    <div class="topbar" style="background-color:#e28585 ;">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12 col-12">
                    <!-- Top Left -->
                    <div class="top-left">
                        <ul class="list-main">
                            <li style="color:#ffff ;"><i style="color:#ffff ;" class="ti-headphone-alt"></i> +84 0979 840 906</li>
                            <li style="color:#ffff ;"><i style="color:#ffff ;" class="ti-email"></i> support@shopnxd.com</li>
                        </ul>
                    </div>
                    <!--/ End Top Left -->
                </div>
                <div class="col-lg-7 col-md-12 col-12">
                    <!-- Top Right -->
                    <div class="right-content">
                        <ul class="list-main">
                            <?php if (empty($_SESSION['id'])) { ?>
                                <li><i style="color: #ffff;font-size: 14px;" class="fa-solid fa-user"></i><a style="color:#ffff ;" href="login.php">Đăng Nhập</a></li>
                                <li><i style="color: #ffff;font-size: 14px;" class="fa-solid fa-right-to-bracket"></i><a style="color:#ffff ;" href="register.php">Đăng Ký</a></li>
                            <?php } else { ?>
                                <li><i style="color: #ffff;font-size: 14px;" class="fa-solid fa-user"></i><a style="color:#ffff ;" href=""><?php echo $_SESSION['name'] ?></a></li>
                                <li><i style="color: #ffff;font-size: 14px;" class="fa-solid fa-right-from-bracket"></i><a style="color:#ffff ;" href="logout.php">Đăng Xuất</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <!-- End Top Right -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="index.php"><img src="./images/design_sua/logo.png" alt="logo" style="max-width: 150%;"></a>
                    </div>
                    <!--/ End Logo -->
                    <!-- Search Form -->
                    <div class="search-top">
                        <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                        <!-- Search Form -->
                        <div class="search-top">
                            <form class="search-form">
                                <input type="text" placeholder="Nhập..." name="search" id="live_search">
                                <!-- <div id="search_result">

                                </div> -->
                                <button value="search" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Search Form -->
                    </div>
                    <!--/ End Search Form -->
                    <div class="mobile-nav"></div>
                </div>
                <div class="col-lg-8 col-md-7 col-12" style="margin-top: 40px;">
                    <div class="search-bar-top">
                        <div class="search-bar">
                            <select>
                                <option selected="selected">All</option>
                            </select>
                            <form>
                                <input name="search" placeholder="Nhập thông tin tìm kiếm..." type="search" id="search">
                                <!-- <button class="btnn"><i class="ti-search"></i></button> -->
                            </form>
                            <div id="output"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-12" style="margin-top: 40px;">
                    <div class="right-bar">
                        <!-- Search Form -->
                        <div class="sinlge-bar">
                            <a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                        </div>
                        <div class="sinlge-bar">
                            <a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                        </div>
                        <div class="sinlge-bar shopping">
                            <?php
                            if (isset($_SESSION['cart'])) {
                                $cart = $_SESSION['cart'];
                                $num = count($cart);
                            } else {
                                $num = 0;
                            }
                            ?>
                            <a href="view_cart.php" class="single-icon"><i class="ti-bag"></i> <span class="total-count"><?php echo $num ?></span></a>
                            <!-- Shopping Item -->
                            <div class="shopping-item">
                                <?php if (isset($_SESSION['cart'])) {
                                    if (is_array($cart) || is_object($cart)) foreach ($cart as $id => $each) : ?>
                                        <ul class="shopping-list">
                                            <li style="display: flex;">
                                                <div style="width: 100px;margin-right: 20px;">
                                                    <img src="<?php echo $each['anh'] ?>" width="100px" alt="">
                                                    <p style="color: #74140d"><?php echo $each['gia'] ?>đ</p>
                                                </div>
                                                <div>
                                                    <p style="display: -webkit-box;
                                                        max-height: 3.2rem;
                                                    -webkit-box-orient: vertical;
                                                        overflow: hidden;
                                                        text-overflow: ellipsis;
                                                        white-space: normal;
                                                        -webkit-line-clamp: 2;
                                                        line-height: 1.6rem;
                                                        margin-top: 10px;
                                                        font-size: 12px;"><?php echo $each['ten_san'] ?></p>
                                                </div>
                                            </li>
                                        </ul>
                                    <?php endforeach ?>
                                <?php } ?>
                                <a style="color: #ffff;" href="view_cart.php" class="btn animate">Đặt hàng</a>
                            </div>
                            <!--/ End Shopping Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Inner -->
    <div class="header-inner" style="background-color: #ffff;margin-bottom: 30px;">
        <div class="container">
            <div class="cat-nav-head">
                <!-- <div class="row">
                    <div class="col-12"> -->
                <div class="menu-area">
                    <!-- Main Menu -->
                    <nav class="navbar navbar-expand-lg">
                        <div class="navbar-collapse">
                            <div class="nav-inner" style="width: 100%;">
                                <ul class="nav main-menu menu navbar-nav" style="display: flex;
                                                                                        align-items: center;
                                                                                        justify-content: center;
                                                                                        width: 100%;">
                                    <li><a style="color:gray ;" href="index.php">Trang Chủ</a></li>
                                    <li><a style="color:gray ;" href="#">Sản Phẩm<i class="ti-angle-down"></i></a>
                                        <ul class="dropdown">
                                            <li><a style="color:gray ;" href="product_1.php">Chăm Sóc Da</a></li>
                                            <li><a style="color:gray ;" href="product_2.php">Trang Điểm</a></li>
                                        </ul>
                                    </li>
                                    <li><a style="color:gray ;" href="#">Cửa Hàng<i class="ti-angle-down"></i><span class="new">New</span></a>
                                        <ul class="dropdown">
                                            <li><a style="color:gray ;" href="view_cart.php">Giỏ Hàng</a></li>
                                            <li><a style="color:gray ;" href="">Thanh Toán</a></li>
                                        </ul>
                                    </li>
                                    <li><a style="color:gray ;" href="contact.php">Liên Hệ</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <!--/ End Main Menu -->
                </div>
                <!-- </div>
                </div> -->
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>