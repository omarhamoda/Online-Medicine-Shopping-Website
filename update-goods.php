<?php
    if(isset($_POST['submit'])) {
        include "classes.php";
        $goods = new Goods();
        if($goods->updateGoods($_POST['gname'], $_POST['gprice'], $_POST['gdesc'], $_GET['id'])) {
            header("Location: Home.php");
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
    <title>Update Product</title>
</head>
<body>
    <?php
        include "DBconnect.php";
        $sql = "SELECT * FROM `goods` WHERE `id` =". $_GET['id'];
        $query = mysqli_query($con, $sql);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        foreach ($result as $goods) {
            echo '<div class = "add-goods-form">
                <form action = "update-goods.php?id='. $_GET['id'] .'" method = "post">
                    <input type = "text" name = "gname" placeholder = "Product Name" value = "'. $goods['gname'] .'">
                    <input type = "text" name = "gprice" placeholder = "Price" value = "'. $goods['gprice'] .'">
                    <input type = "text" name = "gdesc" placeholder = "Description" value = "'. $goods['gdesc'] .'">
                    <button type = "submit" name = "submit" id = "butt">Update</button>
                </form>
            </div>';
        }
    ?>
</body>
</html>