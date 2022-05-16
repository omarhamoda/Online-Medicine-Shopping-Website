<?php
    include_once "controllers/CartValidationController.php";
    include_once "controllers/UpdateCartController.php";
    $validation = new CartValidationController();
    $updateCart = new UpdateCartController();
    if(!$validation->checkExistingCart($_COOKIE['id'])) {
        include_once "controllers/AddController.php";
        $addCart = new AddController();
        $addCart->addCart($_GET['id']);
    }elseif($validation->checkCartEmptyProduct($_COOKIE['id']) == 2 || $validation->checkCartEmptyProduct($_COOKIE['id']) == 3) {
        $updateCart->UpdateCartProduct2And3($_GET['id']);
    } else {
        $updateCart->ReplaceCartProduct3($_GET['id']);
    }