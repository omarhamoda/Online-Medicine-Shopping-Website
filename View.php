
<?php
    include "header.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "stylesheet/View1.css">
    <title>
        <?php
            include "DBconnect.php";
            $sql = "SELECT * FROM goods WHERE id = " . $_GET['id'];
            $query = mysqli_query($con, $sql);
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            foreach ($result as $goods) {
                echo $goods['gname'];
            }
         ?>
    </title>
</head>
<body>
    <?php
        include "classes.php";
        $goods = new Goods();
        $goods->getOneGoods($_GET['id']);
    ?>
</body>
</html>