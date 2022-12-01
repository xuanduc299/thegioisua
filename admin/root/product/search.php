<?php
$conn = mysqli_connect("localhost", "root", "", "buy_sell_php");
if (isset($_GET["search"]) && !empty($_GET["search"])) {
    $key = $_GET["search"];
    $sql = "SELECT * FROM products WHERE title LIKE " % $key % " OR thumbnail LIKE " % $key % " OR content LIKE " % $key % " OR price LIKE " % $key % "";
} else {
    $sql = "SELECT * products";
}
$result = mysqli_query($conn, $sql);
?>

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
    <style>
        .wrapper {
            width: 1600px;
            margin: 0 auto;
        }

        table tr td:last-child {
            width: 220px;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <table cellspacing="0" cellpadding="5" width="85px">
        <tr>
            <th>Qué quan</th>
            <th>Ngay sinh</th>
            <th>Nganh hoc</th>
            <th>Tac vu</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            $title = $row["title"];
            $thumbnail = $row["thumbnail"];
            $content = $row["content"];
            $price = $row["price"];
        }
        ?>
        <tr>
            <td><?php echo $title ?></td>
            <td><?php echo $thumbnail ?></td>
            <td><?php echo $content ?></td>
            <td><?php echo $price ?></td>
        </tr>
    </table>


</body>

</html>