<?php
    include "classes/Delete.php";
    $product = new Product();
    if($product->delete($_GET['id'])) {
        header("Location: Home.php");
    }