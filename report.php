<?php include("server.php"); 

if(!isset($_SESSION['username'])){
    header('location: login.php');
}

?>

<!DOCTYPE html>
<head>
    
    <title>Customer Purchase Details Report</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a class="btn" href="index.php?>">Back</a>
    <div class="logout">
        <a class="btn" href="logout.php?>">Logout</a>
    </div>
<div class="center">
            <?php 
                if(isset($_GET['success'])){
                    echo '<label class="success">Success</label>';
                }
            ?>
            </div>

    <table>
        <thead>
            <tr>
            <th>Id</th>
            <th>Customer</th>
                <th>ItemName</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($row = mysqli_fetch_array($results3)){ ?>
                <tr>
                <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['customer']; ?></td>
                    <td><?php echo $row['item']; ?></td>
                    <td><?php echo $row['qty']; ?></td>
                    <td><?php echo number_format($row['price'],2); ?></td>
                    <td><?php echo number_format($row['total'],2); ?></td>
                </tr>
            <?php } ?>

        </tbody>
    </table>


</body>
</html>