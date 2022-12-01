<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .wrapper {
            width: 1600px;
            margin: 0 auto;
        }

        table tr td:last-child {
            width: 220px;
        }

        ul {
            list-style: none;
        }

        a {
            text-decoration: none;
        }

        ul#main-menu {
            display: flex;
            background: orange;
        }

        ul#main-menu a {
            padding: 5px 10px;
            display: block;
            color: #ffffff;
        }

        ul#main-menu li:hover a {
            color: #4f4242;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <div class="wrapper">
        <div id="header">
            <ul id="main-menu">
                <li><a href="index_crud.php" style="background-color: black;">PRODUCT</a></li>
                <li><a href="./crud_order_detail/index_order_detail.php">ODER_DETAIL</a></li>
                <li><a href="./crud_register/index_register.php">REGISTER-LOGIN</a></li>
                <li><a href="./crud_order/index_order.php">ORDERS</a></li>
                <li><a href="../../../index.php">HOME</a></li>
            </ul>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">products Details</h2>
                        <div style="text-align:center;">
                            <form action="" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" name="search" required value="<?php if (isset($_GET['search'])) {
                                                                                            echo $_GET['search'];
                                                                                        } ?>" class="form-control" placeholder="Search data">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </form>
                            <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Employee</a>
                        </div>
                    </div>
                    <?php
                    // require_once "../../db/config.php";
                    // if (isset($_POST['submit'])) {
                    //     $search = $_POST['search'];

                    //     $sql = "Select * from `products` where id='$search'";
                    //     $result = mysqli_query($link, $sql);
                    //     if ($result) {
                    //         if (mysqli_num_rows($result) > 0) {
                    //             echo '<table class="table table-bordered table-striped">';
                    //             echo "<thead>";
                    //             echo "<tr>";
                    //             echo "<th>id</th>";
                    //             echo "<th>title</th>";
                    //             echo "<th>thumbnail</th>";
                    //             echo "<th>content</th>";
                    //             echo "<th>price</th>";
                    //             echo "<th>create_at</th>";
                    //             echo "<th>updated_at</th>";
                    //             echo "</tr>";
                    //             echo "</thead>";
                    //             echo "<tbody>";
                    //             while ($row = mysqli_fetch_array($result)) {
                    //                 echo "<tr>";
                    //                 echo "<td>" . $row['id'] . "</td>";
                    //                 echo "<td>" . $row['title'] . "</td>";
                    //                 echo "<td>" . $row['thumbnail'] . "</td>";
                    //                 echo "<td>" . $row['content'] . "</td>";
                    //                 echo "<td>" . $row['price'] . "</td>";
                    //                 echo "<td>";
                    //                 echo "<td>";
                    //                 echo "<td>";
                    //                 echo '<a href="read.php?id=' . $row['id'] . '" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                    //                 echo '<a href="update.php?id=' . $row['id'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                    //                 echo '<a href="delete.php?id=' . $row['id'] . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                    //                 echo "</td>";
                    //                 echo "</tr>";
                    //             }
                    //             echo "</tbody>";
                    //             echo "</table>";

                    //             mysqli_free_result($result);
                    //         } else {
                    //             echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                    //         }
                    //     } else {
                    //         echo "Oops! Something went wrong. Please try again later.";
                    //     }
                    // }

                    // mysqli_close($link);



                    ?>
                    <tbody>
                        <?php
                        require_once "../../db/config.php";
                        if (isset($_GET['search'])) {
                            $filtervalues = $_GET['search'];
                            $query = "SELECT * FROM products WHERE CONCAT(title,thumbnail,content,price,quantity) LIKE '%$filtervalues%' ";
                            $query_run = mysqli_query($link, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $items) {
                        ?>
                                    <tr>
                                        <td><?= $items['id']; ?></td>
                                        <td><?= $items['title']; ?></td>
                                        <td><?= $items['thumbnail']; ?></td>
                                        <td><?= $items['content']; ?></td>
                                        <td><?= $items['price']; ?></td>
                                        <td><?= $items['quantity']; ?></td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6">No Record Found</td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>


                    <?php
                    // Include config file
                    require_once "../../db/config.php";
                    // Attempt select query execution
                    $sql = "SELECT * FROM products";
                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo '<table class="table table-bordered table-striped">';
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>id</th>";
                            echo "<th>title</th>";
                            echo "<th>thumbnail</th>";
                            echo "<th>content</th>";
                            echo "<th>price</th>";
                            echo "<th>create_at</th>";
                            echo "<th>updated_at</th>";
                            echo "<th>quantity</th></th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['title'] . "</td>";
                                echo "<td>" . $row['thumbnail'] . "</td>";
                                echo "<td>" . $row['content'] . "</td>";
                                echo "<td>" . $row['price'] . "</td>";
                                echo "<td>" . $row['quantity'] . "</td>";
                                echo "<td>";
                                echo "<td>";
                                echo "<td>";
                                echo '<a href="read.php?id=' . $row['id'] . '" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                echo '<a href="update.php?id=' . $row['id'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                echo '<a href="delete.php?id=' . $row['id'] . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else {
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>