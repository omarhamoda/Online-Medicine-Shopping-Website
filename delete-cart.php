<?php
        include "controllers/DeleteController.php";
        $cart = new DeleteController();
        $cart->cartDelete($_COOKIE['id']);