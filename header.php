
<?php
    if(isset($_POST['logout'])) {
        include "classes.php";
        $User = new User();
        $User->logout();
        header("location: Home.php");
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "stylesheet/Header.css">
</head>
<body>
    <div class = "header">
            <div class = "inner_header">
                <div class = "logo-container">
                    <h1><span>Online Medicine </span>Shopping</h1>
                </div>
            </div>
            <ul class = "navigation" >
                <a href = "Home.php"><li>Products</li></a>
                <a href = "#"><li>TBA</li></a>
                <a href = "#"><li>TBA</li></a>
                <?php
                if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
                    include 'DBconnect.php';
                    $sql = "select * from account where id = " . $_COOKIE['id'];
                    $query = mysqli_query($con, $sql);
                    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                    foreach ($result as $account) {
                        if ($account['type'] == "admin") {
                            echo '<a href = "add-goods.php"><li>Add Product</li></a>';
                        }
                    }
                }
            ?>
            </ul>
                <?php 
                    if(isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
                        echo '<a href = "#" class = "account">';
                        include "DBconnect.php";
                        $sql = "SELECT * FROM `account` WHERE username = '" . $_COOKIE['username'] . "'";
                        $result = mysqli_query($con, $sql);
                        while($row = mysqli_fetch_array($result)) {
                            if ($row['profile_pic'] == null) {
                                echo '<img src = "images/usericon.jpg" width = "40px" height= "40px">';
                            } else {
                                echo '<img src = "data:image/jpeg;base64,'. base64_encode($row['profile_pic']).'" width = "40px" height= "40px">';
                            }
                        }
                        echo '<h3>' . $_COOKIE['fname'] . '</h3>';
                        echo '</a>';
                        echo '<form action = "Home.php" method = post class = "logout">';
                        echo '<input type = "submit" name = "logout" value = "Logout" style = " float: right; margin-top :30px; color: white; background:#201f1f; border:none;">';
                        echo '</form>';
                    }
                    else {
                        echo '<a href = "login.php" class = "account">';
                        echo '<h3>Login</h3>';
                        echo '</a>';
                        echo '<a href = "signup.php" class = "signup">Register</a>';
                    }
                ?>
    </div>
</body>
</html>