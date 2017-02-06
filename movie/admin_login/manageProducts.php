<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="crud/css/bootstrap.min.css" rel="stylesheet">
    <script src="crud/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
    <div class="row">
        <h3>Product Information</h3>
    </div>

    <div class="row">
        <p>
            <a href="crud/create.php" class="btn btn-success">Create</a>
        </p>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
<!--                <th>Description</th>-->
<!--                <th>Price</th>-->
<!--                <th>Quantity</th>-->
<!--                <th>Supplier</th>-->
<!--                <th>Photos</th>-->
<!--                <th>Supplier ID</th>-->
<!--                <th>Category ID</th>-->

            </tr>
            </thead>
            <tbody>
            <?php
            include '../include/dbh.php';
            $pdo = Database::connect();
            $sql = 'SELECT * FROM film ORDER BY id DESC';
            foreach ($pdo->query($sql) as $row) {
                echo '<tr>';
                echo '<td>'. $row['ProID'] . '</td>';
                echo '<td>'. $row['Name'] . '</td>';
//                echo '<td>'. $row['Description'] . '</td>';
//                echo '<td>'. $row['Pris'] . '</td>';
//                echo '<td>'. $row['Quantity'] . '</td>';
//                echo '<td>'. $row['Supplier'] . '</td>';
//                echo '<td>'. $row['Photos'] . '</td>';
//                echo '<td>'. $row['SupID'] . '</td>';
//                echo '<td>'. $row['CatID'] . '</td>';


                echo '<td width=250>';
                echo '<a class="btn" href="crud/read.php?id='.$row['id'].'">Read</a>';
                echo '&nbsp;';
                echo '<a class="btn btn-success" href="crud/update.php?id='.$row['id'].'">Update</a>';
                echo '&nbsp;';
                echo '<a class="btn btn-danger" href="crud/delete.php?id='.$row['id'].'">Delete</a>';
                echo '</td>';
                echo '</tr>';
            }
            Database::disconnect();
            ?>
            </tbody>
        </table>
        <p>
            <a class="btn" href="admin.php">back</a>
        </p>
    </div>
</div> <!-- /container -->
</body>
</html>