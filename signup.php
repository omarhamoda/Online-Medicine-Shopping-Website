<?php 
        include_once "header.php";
        include_once "classes/Validation.php";
        include_once "classes/Add.php";
        include_once "classes/LoginAndRegistration.php";
        $validation = new Validation();
        $register = new Account();
        $login = new Login();
        if(isset($_POST['submit'])) {
            $dataForValidation = array($_POST['fname'], $_POST['lname'], $_POST['username'], $_POST['password'], $_POST['phone'], $_POST['address'], $_POST['password-repeat']);
            $dataForRegister = array($_POST['fname'], $_POST['lname'], $_POST['username'], $_POST['password'], $_POST['phone'], $_POST['address']);
            if ($validation->checkRegistrationFormFields($dataForValidation)) {
                if ($validation->checkUsernamePasswordMinLength($dataForValidation)) {
                    if ($validation->checkPasswordConfirmation($dataForValidation)){
                        $register->add($dataForRegister);
                        $login->setLogInInfo($_POST['username'], $_POST['password']);
                        header('location: Home.php');
                    } else {
                        echo '<h4 class = "signuperror" style = "margin-left: 700px; margin-top: 30px; color: red;">Wrong Password Confirmation</h4>';
                    }
                } else {
                    echo '<h4 class = "signuperror" style = "margin-left: 560px; margin-top: 30px; color: red;">Username must be greater than 5 and less than 16 and password > or = 8</h4>';
                }
            } else {
                echo '<h4 class = "signuperror" style = "margin-left: 740px; margin-top: 30px; color: red;">Empty Field</h4>';
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
            <input type = "number" name ="phone" placeholder = "Phone Number ...">
            <input type = "text" name = "address" placeholder = "Address...">
            <input type = "text" name = "password" placeholder = "Password ...">
            <input type = "text" name = "password-repeat" placeholder = "Repeat Password ...">
            <button type = "submit" name = "submit" id = "butt">Register</button>
        </form>
    </div>
</body>
</html>