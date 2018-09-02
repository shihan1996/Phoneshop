<?php include("server.php"); 

if(!isset($_SESSION['username'])){
    header('location: login.php');
}

?>

<!DOCTYPE html>
<head>
    
    <title>Stock Summary</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a class="btn" href="index.php?>">Back</a>
    <div class="logout">
        <a class="btn" href="logout.php?>">Logout</a>
    </div>
    <a class="btn" href="stock.php?>">Add Stock</a>


    <table>
        <thead>
            <tr>
                <th>ItemName</th>
                <th>Quantity</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($row = mysqli_fetch_array($results2)){ ?>
                <tr>
                    <td><?php echo $row['item']; ?></td>
                    <td><?php echo $row['qty']; ?></td>
                </tr>
            <?php } ?>

        </tbody>
    </table>

</body>
</html>