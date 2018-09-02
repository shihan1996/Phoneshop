<?php include("server.php"); 
$price=0;
if(!isset($_SESSION['username'])){
    header('location: login.php');
}
//fetch the record to be updated
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $edit_state = true;
    $rec = mysqli_query($db, "SELECT * FROM item WHERE id=$id");
    $record = mysqli_fetch_array($rec);
    $itemname = $record['itemname'];
    $price = $record['price'];
    $id = $record['id'];
}

?>
<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    
    <title>Purchasing Invoice</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a class="btn" href="index.php?>">Back</a>
    <div class="logout">
        <a class="btn" href="logout.php?>">Logout</a>
    </div>
    <div class="center">
            <?php 
                if(isset($_GET['error'])){
                    echo '<label class="fail">Out Of Stock</label>';
                }
            ?>
            </div>
    <table>
        <thead>
            <tr>
                <th>ItemName</th>
                <th>Price</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($row = mysqli_fetch_array($results)){ ?>
                <tr>
                    <td><?php echo $row['itemname']; ?></td>
                    <td><?php echo number_format($row['price'],2); ?></td>
                    
                    <td><?php 
                    $item=$row['itemname'];    
                    $results5=mysqli_query($db, "SELECT * FROM stock WHERE item='$item'");
                    $rec = mysqli_fetch_array($results5);
                    $cqty=$rec['qty'];

                    if($cqty>0){
                    ?>
                        <a class="edit_btn "href="invoice.php?edit=<?php echo $row['id']; ?>">select</a>
                    <?php }else{?>
                        <a class="outofstck_btn "href="#">Out of stock</a>
                    <?php }?>
                    </td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
    
    <form method="POST" action="server.php">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="input-group">
            <label>Customer</label>
            <input type="text" name="customer" required>     
        </div>

        <div class="input-group">
            <label>ItemName</label>
            <input type="text" name="itemname" value="<?php echo $itemname; ?>" required>     
        </div>

        <div class="input-group">
            <label>Price</label>
            <input type="real" name="price" value="<?php echo number_format($price,2); ?>" required>     
        </div>

        <div class="input-group">
            <label>Quantity</label>
            <input type="real" name="qty" required>     
        </div>

        <div>
                <button type="submit" name="isave" class="btn">Generate Invoice</button>
        </div>

    </form>   

</body>
</html>