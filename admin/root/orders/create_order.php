<?php
// Include config file
require_once "../../../db/config.php";

// Define variables and initialize with empty values
$customer_id = $name_receiver = $phone_receiver = $address_receiver = $total_price = $status = $created_at = "";
$customer_id_err = $name_receiver_err = $phone_receiver_err = $address_receiver_err = $total_price_err = $status_err = $created_at_err = "";
// $customer_id = $email = $phone_number = $address = $note = "";
// $customer_id_err = $email_err = $phone_number_err = $address_err = $note_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate customer_id
    $input_customer_id = trim($_POST["customer_id"]);
    if (empty($input_customer_id)) {
        $customer_id_err = "Please enter a title.";
    } elseif (!filter_var($input_customer_id, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $customer_id_err = "Please enter a valid title.";
    } else {
        $title = $input_customer_id;
    }

    // Validate phone
    $input_phone_number = trim($_POST["phone_number"]);
    if (empty($input_phone_number)) {
        $phone_err = "Please enter the price amount.";
    } elseif (!ctype_digit($input_phone_number)) {
        $phone_err = "Please enter a positive integer value.";
    } else {
        $phone_number = $input_phone_number;
    }

    // Validate email
    $input_email = trim($_POST["email"]);
    if (empty($input_email)) {
        $email_err = "Please enter an thumbnail.";
    } else {
        $email = $input_email;
    }

    // Validate address
    $input_address = trim($_POST["address"]);
    if (empty($input_address)) {
        $psw_err = "Please enter the content amount.";
    } else {
        $address = $input_address;
    }

    // Validate note
    $input_note = trim($_POST["note"]);
    if (empty($input_note)) {
        $note_err = "Please enter the content amount.";
    } else {
        $note = $input_note;
    }



    // Check input errors before inserting in database
    if (empty($customer_id_err) && empty($email_err) && empty($address_err) && empty($phone_number_err) && empty($note_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO orders (customer_id,phone_number, email, address, note) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_customer_id, $param_phone_number, $param_email, $param_address, $param_note);

            // Set parameters
            $param_customer_id = $customer_id;
            $param_email = $email;
            $param_address = $address;
            $param_phone_number = $phone_number;
            $param_note = $note;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                header("location: ../../../admin/root/tableOrders.php");
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
                            <label>customer_id</label>
                            <input type="text" title="customer_id" name="customer_id" class="form-control <?php echo (!empty($customer_id_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $customer_id; ?>">
                            <span class="invalid-feedback"><?php echo $customer_id_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>phone_number</label>
                            <input type="text" title="phone_number" name="phone_number" class="form-control <?php echo (!empty($phone_number_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone_number; ?>">
                            <span class="invalid-feedback"><?php echo $phone_number_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>email</label>
                            <input type="email" title="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>address</label>
                            <input type="text" title="address" name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $address; ?>">
                            <span class="invalid-feedback"><?php echo $address_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>note</label>
                            <input type="text" title="note" name="note" class="form-control <?php echo (!empty($note_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $note; ?>">
                            <span class="invalid-feedback"><?php echo $note_err; ?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../../../admin/root/tableOrders.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>