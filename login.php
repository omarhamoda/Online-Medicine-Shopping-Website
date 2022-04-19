<?php 
    include_once "header.php";
    if(isset($_POST['submit'])) {
        include "classes.php";
        $user = new User();
        $login = $user->login($_POST['username'], $_POST['password']);
        if ($login) {
            header("Location: Home.php");
        } else {
            echo '<h4 style = "margin-left: 670px; margin-top: 30px; color: red;">خطأ في اسم المستخدم او كلمة السر</h4>';
        }
    }
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