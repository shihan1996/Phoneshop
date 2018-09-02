<?php
//Login 

session_start();
$error="";
//get values from the login.php
if(isset($_POST['login'])){
    $username=$_POST['user'];
    $password=$_POST['pw'];
    $link="StockPage";

//connect to db
$db=mysqli_connect('localhost','root','','logininfo');

    //prevent mysql injection
    $username=stripcslashes($username);
    $password=stripcslashes($password);
    $username=mysqli_real_escape_string($db,$username);
    $password=mysqli_real_escape_string($db,$password);

    $result=mysqli_query($db, "SELECT * FROM userdetails WHERE username='$username' AND password='$password'")
        or die("Failed to connect ");
    $row=mysqli_fetch_array($result);
    if($row['username'] == $username && $row['password'] == $password){
        $_SESSION['username']=$row['username'];
    //echo "Login Successful"; 
    header('location: index.php');
    } else {
        header('location: login.php?error');
    }

}

//Other Functions

//initialize variables
$itemname="";
$price="";
$des="";
$id=0;
$edit_state=false;

//connect to the database
$db=mysqli_connect('localhost','root','','shop');

//save details
if(isset($_POST['save'])){
    $itemname=$_POST['itemname'];
    $des=$_POST['des'];
    $price=$_POST['price'];


    $query="INSERT INTO item(itemname,des,price) VALUES('$itemname','$des','$price')";
    mysqli_query($db, $query);
    header('location: item.php');//redirect to the main page after inserting
}

//retrieve records
$results=mysqli_query($db, "SELECT * FROM item");

//update records
if(isset($_POST['update'])){
    $id = mysqli_real_escape_string($db,$_POST['id']);
    $itemname = mysqli_real_escape_string($db,$_POST['itemname']);
    $price = mysqli_real_escape_string($db,$_POST['price']);
    $des = mysqli_real_escape_string($db,$_POST['des']);


    mysqli_query($db,"UPDATE item SET itemname='$itemname' ,des='$des', price='$price' WHERE id='$id'");
    header('location: item.php');//redirect to the main page 
}

//delete records
if(isset($_GET['del'])){
    $id=$_GET['del'];
    mysqli_query($db, "DELETE FROM item WHERE id=$id");
    header('location: item.php');//redirect to the main page 
}


//stock save details
if(isset($_POST['ssave'])){
    $itemname=$_POST['sitemname'];
    $qty=$_POST['snqty'];
    $id=$_POST['iid'];
    
    $results2=mysqli_query($db, "SELECT * FROM stock WHERE item='$itemname'");
    if(mysqli_num_rows($results2)==1){
        $record = mysqli_fetch_array($results2);
        $oqty = $record['qty'];
        $sid = $record['id'];
        $nqty=$oqty+$qty;
        mysqli_query($db,"UPDATE stock SET qty='$nqty' WHERE id='$sid'");
    }else{
        $query="INSERT INTO stock(item,qty) VALUES('$itemname','$qty')";
        mysqli_query($db, $query);
    }  
    $price=$_POST['snprice'];
        mysqli_query($db,"UPDATE item SET price='$price' WHERE id='$id'");

    header('location: viewstock.php');//redirect to the main page after inserting
}

//retrieve stock records
$results2=mysqli_query($db, "SELECT * FROM stock");

if(isset($_POST['isave'])){
    $itemname=$_POST['itemname'];
    $qty=$_POST['qty'];
    $id=$_POST['id'];
    $price=$_POST['price'];
    $customer=$_POST['customer'];
    
    $results2=mysqli_query($db, "SELECT * FROM stock WHERE item='$itemname'");
    if(mysqli_num_rows($results2)==1){
        $record = mysqli_fetch_array($results2);
        $oqty = $record['qty'];
        $sid = $record['id'];
        $nqty=$oqty-$qty;
        $total=$qty*$price;
        if($oqty>=$qty){
            mysqli_query($db,"UPDATE stock SET qty='$nqty' WHERE id='$sid'");
            $query="INSERT INTO invoice(customer,item,qty,price,total) VALUES('$customer','$itemname','$qty','$price','$total')";
            mysqli_query($db, $query);
            header('location: report.php?success');//redirect to the main page after inserting
        }else{
            header('location: invoice.php?error');
        }
        
    }  
    else{
        header('location: invoice.php?error');
    }
    
}


//retrieve invoice records
$results3=mysqli_query($db, "SELECT * FROM invoice");

?>