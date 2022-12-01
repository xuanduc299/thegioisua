<?php
// Include config file
require_once "../../../db/config.php";

// Define variables and initialize with empty values
$order_id = $product_id = $quantity = "";
$order_id_err = $product_id_err = $quantity_err = "";

// Processing form data when form is submitted
if (isset($_POST["order_id"]) && !empty($_POST["order_id"])) {
    // Get hidden input value
    $id = $_POST["order_id"];

    // Validate product_id
    $input_product_id = trim($_POST["product_id"]);
    if (empty($input_product_id)) {
        $product_id_err = "Please enter the price amount.";
    } elseif (!ctype_digit($input_product_id)) {
        $product_id_err = "Please enter a positive integer value.";
    } else {
        $order_id = $input_product_id;
    }

    // Validate num
    $input_quantity = trim($_POST["quantity"]);
    if (empty($input_quantity)) {
        $quantity_err = "Please enter the price amount.";
    } elseif (!ctype_digit($input_quantity)) {
        $quantity_err = "Please enter a positive integer value.";
    } else {
        $quantity = $input_quantity;
    }

    // Check input errors before inserting in database
    if (empty($order_id_err) && empty($product_id_err) && empty($num_err) && empty($price_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO order_product (order_id,product_id,quantity) VALUES (?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_order_id, $param_product_id, $param_quantity);

            // Set parameters
            $param_order_id = $order_id;
            $param_product_id = $product_id;
            $param_quantity = $quantity;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                header("location: ../../../admin/root/tableOrderDetail.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }


    // Close connection
    mysqli_close($link);
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET["order_id"]) && !empty(trim($_GET["order_id"]))) {
        // Get URL parameter
        $id =  trim($_GET["order_id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM order_product WHERE order_id = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value

                    $param_order_id = $order_id;
                    $param_product_id = $product_id;
                    $param_quantity = $quantity;
                } else {
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($link);
    } else {
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>order_id</label>
                            <input type="text" title="order_id" name="order_id" class="form-control <?php echo (!empty($order_id_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $order_id; ?>">
                            <span class="invalid-feedback"><?php echo $order_id_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>product_id</label>
                            <input type="text" title="product_id" name="product_id" class="form-control <?php echo (!empty($product_id_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $product_id; ?>">
                            <span class="invalid-feedback"><?php echo $product_id_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>num</label>
                            <input type="text" title="num" name="num" class="form-control <?php echo (!empty($num_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $num; ?>">
                            <span class="invalid-feedback"><?php echo $num_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>price</label>
                            <input type="text" title="price" name="price" class="form-control <?php echo (!empty($price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $price; ?>">
                            <span class="invalid-feedback"><?php echo $price_err; ?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../../../admin/root/tableOrderDetail.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>