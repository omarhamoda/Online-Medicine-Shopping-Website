<?php
    class AddController{
        public function addProduct($data) {
            include_once "classes/Add.php";
            $product = new Product();
            if($product->add($data)) {
                header("Location: Home.php");
            }
        }

        public function addCart($productId) {
            include_once "classes/Add.php";
            include_once "ProductController.php";
            $price = new ProductController();
            $cart = new Cart();
            $data = array($_COOKIE['id'], $productId, $price->viewProductPrice($productId));
            $cart->add($data);
            header("Location: Home.php");
        }

        public function addBill($userId) {
            include_once "classes/Add.php";
            include_once "BillController.php";
            $bill = new BillController();
            $addBill = new Bill();
            if($addBill->add($bill->copyCartInfo($userId))) {
                header("location: delete-cart.php");
            }
        }

    }