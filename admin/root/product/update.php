<?php
// Include config file
require_once "../db/config.php";

// Define variables and initialize with empty values
$ten_san = $mo_ta = $anh = $gia = $danh_muc = "";
$ten_san_err = $mo_ta_err = $anh_err = $gia_err = $danh_muc_err = "";

// Processing form data when form is submitted
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    // Get hidden input value
    $id = $_POST["id"];

    // Validate title
    // $input_title = trim($_POST["title"]);
    // if (empty($input_title)) {
    //     $title_err = "Please enter a title.";
    // } elseif (!filter_var($input_title, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
    //     $title_err = "Please enter a valid title.";
    // } else {
    //     $title = $input_title;
    // }

    // Validate mo_ta
    $input_ten_san = trim($_POST["ten_san"]);
    if (empty($input_ten_san)) {
        $ten_san_err = "Please enter an ten_san.";
    } else {
        $ten_san = $input_ten_san;
    }

    // Validate mo_ta
    $input_mo_ta = trim($_POST["mo_ta"]);
    if (empty($input_mo_ta)) {
        $mo_ta_err = "Please enter an mo_ta.";
    } else {
        $mo_ta = $input_mo_ta;
    }

    // Validate anh
    $input_anh = trim($_POST["anh"]);
    if (empty($input_anh)) {
        $anh_err = "Please enter the anh amount.";
    } else {
        $anh = $input_anh;
    }

    // Validate gia
    $input_gia = trim($_POST["gia"]);
    if (empty($input_gia)) {
        $price_err = "Please enter the price amount.";
    } elseif (!ctype_digit($input_gia)) {
        $gia_err = "Please enter a positive integer value.";
    } else {
        $gia = $input_gia;
    }

    // Validate danh_muc
    $input_danh_muc = trim($_POST["danh_muc"]);
    if (empty($input_danh_muc)) {
        $danh_muc_err = "Please enter the price amount.";
    } else {
        $danh_muc = $input_danh_muc;
    }


    // Check input errors before inserting in database
    if (empty($ten_san_err) && empty($mo_ta_err) && empty($anh_err) && empty($gia_err) && empty($danh_muc_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO products (ten_san, mo_ta, anh, gia, danh_muc) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_ten_san, $param_mo_ta, $param_anh, $param_gia, $param_danh_muc);

            // Set parameters
            $param_ten_san = $ten_san;
            $param_mo_ta = $mo_ta;
            $param_anh = $anh;
            $param_gia = $gia;
            $param_danh_muc = $danh_muc;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                header("location: ../productTable.php");
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
        $sql = "SELECT * FROM san_pham WHERE id = ?";
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
                    $param_ten_san = $ten_san;
                    $param_mo_ta = $mo_ta;
                    $param_anh = $anh;
                    $param_gia = $gia;
                    $param_danh_muc = $danh_muc;
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
                            <label>Ten San Pham</label>
                            <input type="text" title="title" name="ten_san" class="form-control <?php echo (!empty($ten_san_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $ten_san; ?>">
                            <span class="invalid-feedback"><?php echo $ten_san_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Mo ta</label>
                            <textarea title="thumbnail" name="mo_ta" class="form-control <?php echo (!empty($mo_ta_err)) ? 'is-invalid' : ''; ?>"><?php echo $mo_ta; ?></textarea>
                            <span class="invalid-feedback"><?php echo $mo_ta_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Anh </label>
                            <input type="text" title="content" name="anh" class="form-control <?php echo (!empty($anh_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $anh; ?>">
                            <span class="invalid-feedback"><?php echo $anh_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Gia </label>
                            <input type="text" title="price" name="gia" class="form-control <?php echo (!empty($gia_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $gia; ?>">
                            <span class="invalid-feedback"><?php echo $gia_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Danh Muc</label>
                            <input type="text" title="price" name="danh_muc" class="form-control <?php echo (!empty($danh_muc_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $danh_muc; ?>">
                            <span class="invalid-feedback"><?php echo $danh_muc_err; ?></span>
                        </div>

                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../productTable.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>