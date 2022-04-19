<?php 
        include_once "header.php";
        session_start();
        if(isset($_POST['submit'])) {
            $signup = false;
            if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['password-repeat'])) {
                if (strlen($_POST['username']) > 5 && strlen($_POST['username']) < 16 && strlen($_POST['password']) > 7) {
                    if (strcmp($_POST['password'], $_POST['password-repeat']) == 0){
                        include "classes.php";
                        $user = new User();
                        $signup = $user->signup($_POST['fname'], $_POST['lname'], $_POST['username'], $_POST['password'], $_POST['email'], $_POST['phone'], '2021-08-07');
                    } else {
                        echo '<h4 class = "signuperror" style = "margin-left: 700px; margin-top: 30px; color: red;">كلمة السر غير متطابقة</h4>';
                    }
                } else {
                    echo '<h4 class = "signuperror" style = "margin-left: 560px; margin-top: 30px; color: red;">يجب ان يكون اسم المستخدم اكبر من 5 ولا يزيد عن 15 احرف وكلمة السر 8 او اكبر</h4>';
                }
            } else {
                echo '<h4 class = "signuperror" style = "margin-left: 740px; margin-top: 30px; color: red;">حقل فارغ</h4>';
            }
            if($signup) {
                include "DBconnect.php";
                $sql = "SELECT `id` FROM `account` where `username` = '". $_POST['username'] ."'";
                $query = mysqli_query($con, $sql);
                $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                foreach($result as $account) {
                    setcookie("id", $account['id'], time() + (86400 * 1000), '/');
                }
                setcookie("username", $_POST['username'], time() + (86400 * 1000), '/');
                setcookie("password", $_POST['password'], time() + (86400 * 1000), '/');
                setcookie("fname", $_POST['fname'], time() + (86400 * 1000), '/');
                header('location: Home.php');
            }
        }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "stylesheet/signup.css">
    <title>Register</title>
</head>
<body>
    <div class = "signup-form">
        <img src = "images/usericon.jpg">
        <form action = "signup.php" method = "post">
            <input type = "text" name = "fname" placeholder = "First Name...">
            <input type = "text" name = "lname" placeholder = "Last Name ...">
            <input type = "text" name = "username" placeholder = "User Name ...">
            <input type = "text" name = "email" placeholder = "Gmail...">
            <input type = "number" name ="phone" placeholder = "Phone Number ...">
            <input type = "text" name = "password" placeholder = "Password ...">
            <input type = "text" name = "password-repeat" placeholder = "Repeat Password ...">
            <button type = "submit" name = "submit" id = "butt">Register</button>
        </form>
    </div>
</body>
</html>