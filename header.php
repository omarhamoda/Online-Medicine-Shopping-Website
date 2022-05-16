
<?php
    if(isset($_POST['logout'])) {
        include_once "controllers/LoginController.php";
        $logout = new LoginController();
        $logout->logOut();
        header("location: Home.php");
    }
    include_once 'controllers/AccountController.php';
    $accountC = new AccountController();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "stylesheet/Header2.css">
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
            <?php if(isset($_COOKIE['username']) && isset($_COOKIE['password'])) { ?>
                    <a href = "ViewCart.php"><li>View Cart</li></a>
                    <a href = "ViewBills.php"><li>Bills</li></a>
                <?php if($accountC->viewAccountTypeById() == "admin") { ?>
                        <a href = "add-products.php"><li>Add Product</li></a>
                        <a href = "ViewUsers.php"><li>Users</li></a>
                    <?php
                    }
                }
            ?>
            </ul>
            <div class="SearchWrapper">
                <form action = "SearchResult.php" method = "get" class = "SearchBar">
                    <input type = "text" name ="value" id ="bar">
                    <input type = "submit" name = "submitName" value = ">>" id = "butt">
                </form>
            </div>
                <?php if(isset($_COOKIE['username']) && isset($_COOKIE['password'])) { ?>
                        <a href = "#" class = "account">
                        <?php
                        foreach ($accountC->viewAccountProfilePicture() as $account) {
                            if ($account['picture'] == null) { ?>
                                <img src = "images/usericon.jpg" width = "40px" height= "40px">
                            <?php } else { ?>
                                <img src = "data:image/jpeg;base64, <?php echo base64_encode($account['picture']); ?>" width = "40px" height= "40px">
                            <?php }
                        } ?>
                        <h3><?php echo $_COOKIE['fname']; ?></h3>
                        </a>
                        <form action = "Home.php" method = post class = "logout">';
                            <input type = "submit" name = "logout" value = "Logout" style = " float: right; margin-top :20px; color: white; background:#201f1f; border:none;">
                        </form>
                <?php } else { ?>
                        <a href = "login.php" class = "account"><h3>Login</h3></a>
                        <a href = "signup.php" class = "signup">Register</a>
                   <?php }?>
    </div>
</body>
</html>