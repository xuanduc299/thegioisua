<?php
// Include config file
require_once "../db/config.php";

// Define variables and initialize with empty values
// $name_receiver = $email = $phone_receiver = $address_receiver = $note = "";
// $name_receiver_err = $email_err = $phone_receiver_err = $address_receiver_err = $note_err = "";

$name_receiver = $phone_receiver = $address_receiver = $total_price = $status = "";
$name_receiver_err = $phone_receiver_err = $address_receiver_err = $total_price_err = $status_err = "";

// Processing form data when form is submitted
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    // Get hidden input value
    $id = $_POST["id"];

    // Validate name_receiver
    $input_name_receiver = trim($_POST["name_receiver"]);
    if (empty($input_name_receiver)) {
        $name_receiver_err = "Please enter a title.";
    } else {
        $name_receiver = $input_name_receiver;
    }

    // Validate phone
    $input_phone_receiver = trim($_POST["phone_receiver"]);
    if (empty($input_phone_receiver)) {
        $phone_err = "Please enter the price amount.";
    } elseif (!ctype_digit($input_phone_receiver)) {
        $phone_err = "Please enter a positive integer value.";
    } else {
        $phone_receiver = $input_phone_receiver;
    }

    // Validate total_price
    $input_total_price = trim($_POST["total_price"]);
    if (empty($input_total_price)) {
        $total_price_err = "Please enter the price amount.";
    } elseif (!ctype_digit($input_total_price)) {
        $total_price_err = "Please enter a positive integer value.";
    } else {
        $total_price = $input_total_price;
    }

    // Validate address_receiver
    $input_address_receiver = trim($_POST["address_receiver"]);
    if (empty($input_address_receiver)) {
        $psw_err = "Please enter the content amount.";
    } else {
        $address_receiver = $input_address_receiver;
    }

    // Validate note
    $input_status = trim($_POST["status"]);
    if (empty($input_status)) {
        $status_err = "Please enter the content amount.";
    } else {
        $status = $input_status;
    }


    // Check input errors before inserting in database
    if (empty($name_receiver_err) && empty($phone_receiver_err) && empty($address_receiver_err) && empty($total_price_err) && empty($status_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO orders (name_receiver,phone_receiver, address_receiver, total_price, status) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_name_receiver, $param_phone_receiver, $param_email, $param_address_receiver);

            mysqli_stmt_bind_param($stmt, "sssss", $param_name_receiver, $param_phone_receiver, $param_address_receiver, $param_total_price, $param_status);

            // Set parameters
            $param_name_receiver = $name_receiver;
            $param_phone_receiver = $phone_receiver;
            $param_address_receiver = $address_receiver;
            $param_total_price = $total_price;
            $param_status = $status;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                header("location: ../tableOrders.php");
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
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM orders WHERE id = ?";
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
                    $param_name_receiver = $name_receiver;
                    $param_phone_receiver = $phone_receiver;
                    $param_address_receiver = $address_receiver;
                    $param_total_price = $total_price;
                    $param_status = $status;
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
                            <label>name_receiver</label>
                            <input type="text" title="name_receiver" name="name_receiver" class="form-control <?php echo (!empty($name_receiver_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name_receiver; ?>">
                            <span class="invalid-feedback"><?php echo $name_receiver_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>phone_receiver</label>
                            <input type="text" title="phone_receiver" name="phone_receiver" class="form-control <?php echo (!empty($phone_receiver_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone_receiver; ?>">
                            <span class="invalid-feedback"><?php echo $phone_receiver_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>address_receiver</label>
                            <input type="email" title="address_receiver" name="address_receiver" class="form-control <?php echo (!empty($address_receiver_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $address_receiver; ?>">
                            <span class="invalid-feedback"><?php echo $address_receiver_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>total</label>
                            <input type="text" title="total_price" name="total_price" class="form-control <?php echo (!empty($total_price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $total_price; ?>">
                            <span class="invalid-feedback"><?php echo $total_price_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>status</label>
                            <input type="text" title="status" name="status" class="form-control <?php echo (!empty($status_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $status; ?>">
                            <span class="invalid-feedback"><?php echo $status_err; ?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../tableOrders.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>