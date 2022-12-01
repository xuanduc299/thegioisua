<?php
require_once('utils/utility.php');
require_once('db/dbhelper.php');


$id = getGet('id');
$product = executeResult('select * from san_pham where id = ' . $id, true);
if ($product == null) {
    header('Location: index.php');
    die;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SKINLELE.COM</title>
    <?php include('css-libary.php') ?>
    <link rel="stylesheet" href="css/detail_product.css">

    <style>
        .container {
            color: #424646;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 16px;
            line-height: 47px;
        }
    </style>

</head>

<body>
    <?php
    include('./component/header_2.php');
    ?>
    <div class="container" style="margin-bottom: 30px;">
        <div class="row">
            <div class="col-md-6">
                <div id="sliders">
                    <div class="item">
                        <img width="85%" style="margin-bottom: 40px;" src="<?= $product['anh'] ?>" />
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-dtl">
                    <div class="product-info">
                        <div class="product-name"><?= $product['ten_san'] ?></div>
                        <!-- <div class="reviews-counter">
                            <div class="rate">
                                <input type="radio" id="star5" name="rate" value="5" checked />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rate" value="4" checked />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rate" value="3" checked />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rate" value="1" />
                                <label for="star1" title="text">1 star</label>
                            </div>
                            
                        </div> -->
                        <div class="product-price-discount"><span style="color: #820813;"><?= $product['gia'] ?> đ</span><span style="color: #820813;" class="line-through"> - <?= $product['khuyen_mai'] ?> đ</span></div>
                    </div>
                    <p style="text-align: justify;margin-bottom: 20px;"><?= $product['mo_ta'] ?></p>
                    <div class="product-count">
                        <!-- <label for="size">Số lượng</label>
                        <form action="#" class="display-flex">
                            <a class="qtyminus">-</a>
                            <input type="text" name="quantity" value="1" class="qty">
                            <a class="qtyplus">+</a>
                        </form> -->
                        <a style="width: 100%;" href="component/add_to_cart_detail.php?id=<?php echo $product['id'] ?>"> <button style="background-color: #5a90e5;width: 38%;" type="button" class="btn btn-primary">Thêm vào giỏ hàng</button></a>
                        <!-- <div class="cart mt-4 align-items-center"> <button class="btn btn-danger text-uppercase mr-2 px-4" onclick="addToCart(<?= $id ?>)">Thêm vào giỏ hàng</button></div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-bottom: 50px;">
        <p style="font-size: 25px;font-weight: bold;font-family: 'Times New Roman', Times, serif;color: #c05353;margin-bottom: 20px;">CÁC SẢN PHẨM KHÁC</p>
        <div class="row">
            <div class="col-12">
                <div class="product-info">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="man" role="tabpanel">
                            <div class="tab-single">
                                <div class="row">
                                    <?php include('./component/new_product.php') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- <script type="text/JavaScript">
        function addToCart(id) {
        $.post('./api/cookie.php', {
            'action' : 'add',
            'id' : id,
            'num' : 1
        }, function(data) {
            location.reload()
        })
    } -->
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="	sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="./js/detail.js"></script>
    <?php
    include 'component/footer.php'
    ?>
</body>

</html>