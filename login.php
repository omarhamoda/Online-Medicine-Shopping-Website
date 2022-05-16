<?php 
    if(isset($_POST['submit'])) {
        include "Controllers/LoginController.php";
        $user = new LoginController();
        echo $user->loginn($_POST['username'], $_POST['password']);
    }
    include_once "header.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "stylesheet/signup.css">
    <title>Login</title>
</head>
<body>
    <div class = "signup-form" style = "height: 300px;">
        <img src = "images/usericon.jpg">
        <form action = "login.php" method = "post">
            <input type = "text" name = "username" placeholder = "User Name ...">
            <input type = "password" name = "password" placeholder = "Password ...">
            <button type = "submit" name = "submit" id = "butt">Login</button>
        </form>
    </div>
</body>
</html>
