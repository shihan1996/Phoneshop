<?php
$error="";
?>

<!DOCTYPE html>
<html>
<head>
    
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="form">
        <form action="server.php" method="POST">
            <div class="center">
            <?php 
                if(isset($_GET['error'])){
                    echo '<label class="fail">Login fail</label>';
                }
            ?>
            </div>

            <p>
                <label>Username</label>
                <input type="text" id="user" name="user" />
            </p>

            <p>
                <label>Password</label>
                <input type="password" id="pw" name="pw" />
            </p>

            <p>
            <button type="submit" name="login" value="login" class="btn">Login</button>

            </p>
        
        </form>
    
    </div>
</body>
</html>