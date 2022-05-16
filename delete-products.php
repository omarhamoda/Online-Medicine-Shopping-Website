<?php
    include "controllers/DeleteController.php";
    $product = new DeleteController();
    $product->productDelete($_GET['id']);