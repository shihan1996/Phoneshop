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
    $des = $record['des'];
    
    $id = $record['id'];
}

?>
<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    
    <title>Item Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a class="btn" href="index.php?>">Back</a>
    <div class="logout">
        <a class="btn" href="logout.php?>">Logout</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ItemName</th>               
                <th>Description</th>
                <th>Price</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($row = mysqli_fetch_array($results)){ ?>
                <tr>
                    <td><?php echo $row['itemname']; ?></td>
                    <td><?php echo $row['des']; ?></td>
                    <td><?php echo number_format($row['price'],2); ?></td>
                    

                    <td>
                        <a class="edit_btn "href="item.php?edit=<?php echo $row['id']; ?>">Edit</a>
                        <a class="del_btn" href="item.php?del=<?php echo $row['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
    
    <form method="POST" action="server.php">
    <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="input-group">
            <label>ItemName</label>
            <input type="text" name="itemname" value="<?php echo $itemname; ?>" required>     
        </div>

        <div class="input-group">
            <label>Description</label>
            <input type="text" name="des" value="<?php echo $des; ?>" required>     
        </div>

        <div class="input-group">
            <label>Price</label>
            <input type="real" name="price" value="<?php echo $price; ?>" required>     
        </div>

        <div>
            <?php if($edit_state == false): ?>
                <button type="submit" name="save" class="btn">Save</button>
            <?php else: ?>
                <button type="submit" name="update" class="btn">Update</button>
            <?php endif ?>
        </div>

    </form>
</body>
</html>