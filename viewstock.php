<?php include("server.php"); 

//session_start(); //Session already started
if(!isset($_SESSION['username'])){
    header('location: login.php');
}
//fetch the record to be updated
// if(isset($_GET['edit'])){
//     $id = $_GET['edit'];
//     $edit_state = true;
//     $rec = mysqli_query($db, "SELECT * FROM item WHERE id=$id");
//     $record = mysqli_fetch_array($rec);
//     // $itemname = $record['itemname'];
//     // $price = $record['price'];
//     // $id = $record['id'];
// }

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


    <form>
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

    </form>
</body>
</html>