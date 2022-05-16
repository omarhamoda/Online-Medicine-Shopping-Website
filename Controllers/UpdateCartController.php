<?php
    include_once "controllers/CartController.php";
    class UpdateCartController extends CartController {

        public function UpdateCartProduct2And3($productId) {
            include_once "ProductController.php";
            $price = new ProductController();
            $updatedTotalCost = $price->viewProductPrice($productId) + $this->viewCartTotalCost($_COOKIE['id']);
            $updateData = array($_COOKIE['id'], $productId, $updatedTotalCost);
            $this->Update($updateData);
        }

        public function ReplaceCartProduct3($productId) {
            include_once "ProductController.php";
            $price = new ProductController();
            $updatedTotalCost = $price->viewProductPrice($productId) + $this->viewCartTotalCost($_COOKIE['id']) - $price->viewProductPrice($this->viewCartProduct3($_COOKIE['id']));
            $updateData = array($_COOKIE['id'], $productId, $updatedTotalCost);
            $this->Update($updateData);
        }

        public function Update($updateData) {
            include_once "classes/Update.php";
            $cart = new Cart();
            $cart->update($updateData);
            header("Location: Home.php");
        }

    }