<?php
    include "classes.php";
    $goods = new Goods();
    if($goods->deleteGoods($_GET['id'])) {
        header("Location: Home.php");
    }