
<?php
    if(isset($_POST['submit'])) {
        $image = file_get_contents($_FILES['image']['tmp_name']);
        $image = addslashes($image);
        include "classes.php";
        $goods = new Goods();
        $check = $goods->addGoods($_POST['gname'], $_POST['gprice'], $_POST['gdesc'], $image);
        if ($check) {
            header("location: Home.php");
        }
    }
    include "header.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "stylesheet/add-goods.css">
    <title>Add Products</title>
</head>
<body>
    <div class = "add-goods-form">
        <form action = "add-goods.php" method = "post" enctype = "multipart/form-data">
            <input type = "text" name = "gname" placeholder = "Product Name">
            <input type = "text" name = "gprice" placeholder = "Price">
            <input type = "text" name = "gdesc" placeholder = "Description">
            <input type = "file" name = "image">
            <button type = "submit" name = "submit" id = "butt">Add</button>
        </form>
    </div>
</body>
</html>