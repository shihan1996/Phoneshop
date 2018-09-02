<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location: login.php');
}
?>
<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <title>Phone shop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="logout">
        <a class="btn" href="logout.php?>">Logout</a>

    </div>

    <div class="center padding">
        <a class="mbtn "href="item.php">Items</a>
        <a class="mbtn "href="viewstock.php">Stock</a>
        <a class="mbtn "href="invoice.php">Invoice</a>
        <a class="mbtn "href="report.php">Report</a>
    </div> 
</body>
</html>