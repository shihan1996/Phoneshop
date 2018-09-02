<?php include("server.php"); 

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
    
    <title>Stock Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a class="btn" href="viewstock.php?>">Back</a>
    <div class="logout">
        <a class="btn" href="logout.php?>">Logout</a>
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
                    <td><?php echo $row['price']; ?></td>

                    <td>
                        <a class="edit_btn "href="stock.php?edit=<?php echo $row['id']; ?>">Select</a>
                    </td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
    
    <form method="POST" action="server.php">
    <input type="hidden" name="iid" value="<?php echo $id; ?>">

        <div class="input-group">
            <label>ItemName</label>
            <input type="text" name="sitemname" value="<?php echo $itemname; ?>" required>     
        </div>

        <div class="input-group">
            <label>Price</label>
            <input type="real" name="snprice" value="<?php echo $price; ?>" required>     
        </div>

        <div class="input-group">
            <label>Quantity</label>
            <input type="real" name="snqty" required>     
        </div>

        <div>
                <button type="submit" name="ssave" class="btn">Add Item</button>
        </div>

    </form>

    <!-- <table>
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
    </table> -->

</body>
</html>