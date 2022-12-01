<?php
// Include config file
require_once "../../../db/config.php";

// Define variables and initialize with empty values
$order_id = $product_id = $num = $price = "";
$order_id_err = $product_id_err = $num_err = $price_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate oder_id
    $input_order_id = trim($_POST["order_id"]);
    if (empty($input_order_id)) {
        $order_id_err = "Please enter the price amount.";
    } elseif (!ctype_digit($input_order_id)) {
        $order_id_err = "Please enter a positive integer value.";
    } else {
        $order_id = $input_order_id;
    }

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
    $input_num = trim($_POST["num"]);
    if (empty($input_num)) {
        $num_err = "Please enter the price amount.";
    } elseif (!ctype_digit($input_num)) {
        $num_err = "Please enter a positive integer value.";
    } else {
        $num = $input_num;
    }

    // Validate price
    $input_price = trim($_POST["price"]);
    if (empty($input_price)) {
        $price_err = "Please enter the price amount.";
    } elseif (!ctype_digit($input_price)) {
        $price_err = "Please enter a positive integer value.";
    } else {
        $price = $input_price;
    }


    // Check input errors before inserting in database
    if (empty($order_id_err) && empty($product_id_err) && empty($num_err) && empty($price_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO order_details (order_id,product_id, num, price) VALUES (?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_order_id, $param_product_id, $param_num, $param_price);

            // Set parameters
            $param_order_id = $order_id;
            $param_product_id = $product_id;
            $param_num = $num;
            $param_price = $price;

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
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../../../admin/root/tableOrderDetail.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>