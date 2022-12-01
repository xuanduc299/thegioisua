<?php
require_once('./db/connect.php');
$sql = "select * from san_pham where ten_san like '%{$_POST['query']}%' LIMIT 5";
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result)>0){
   foreach ($result as $value) : ?>
    <img src="<?php echo $value['anh'] ?>" width="100px" alt="">
    <p style="display: -webkit-box;
            max-height: 3.2rem;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;
            -webkit-line-clamp: 2;
            line-height: 1.6rem;
            margin-top: 10px;
            font-size: 12px;"><?php echo $value['ten_san']?></p>
    <?php  endforeach ?>
    <?php  }else {?>
        <p>Không có sản phẩm</p>
    <?php  }?>
    
