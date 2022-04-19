
<?php
    include "header.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "stylesheet/Home.css">
    <title>Products</title>
</head>
<body>
    <?php
        include "classes.php";
        $goods = new Goods();
        $goods->getGoods();
    ?>
</body>
</html>