<?php
require_once('./db/connect.php');
$sql = "select * from orders";
$result = mysqli_query($connect, $sql);
?>
<!-- <a href="../../../admin/root/orders/create_order.php" style="float: right; background-color: #e28585;" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Product</a> -->
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>customer_id</th>
                <th>name_receiver</th>
                <th>phone_receiver</th>
                <th>address_receiver</th>
                <th>total_price</th>
                <th>status</th>
                <th>created_at</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php if (is_array($result) || is_object($result)) foreach ($result as $value) : ?>
                <tr>
                    <td>
                        <p><?php echo $value['id'] ?></p>
                    </td>
                    <td>
                        <p><?php echo $value['customer_id'] ?></p>
                    </td>
                    <td>
                        <p><?php echo $value['name_receiver'] ?></p>
                    </td>
                    <td><?php echo $value['phone_receiver'] ?></td>
                    <td>
                        <p><?php echo $value['address_receiver'] ?></p>
                    </td>
                    <td>
                        <p><?php echo $value['total_price'] ?>đ</p>
                    </td>
                    <td>
                        <p><?php echo $value['status'] ?></p>
                    </td>
                    <td>
                        <p><?php echo $value['created_at'] ?></p>
                    </td>
                    <!-- <td>
                        <a href="../../../admin/root/orders/read_orders.php?id=<?php echo $value['id'] ?>"><span class="fa fa-eye"></span></a>
                    </td> -->
                    <td>
                        <a href="./orders/update_order.php?id=<?php echo $value['id'] ?>"><span class="fa fa-pencil" style="color: #e28585;"></a>
                    </td>
                    <td>
                        <a href="./orders/delete_order.php?id=<?php echo $value['id'] ?>"><span class="fa fa-trash" style="color: #e28585;"></span></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>