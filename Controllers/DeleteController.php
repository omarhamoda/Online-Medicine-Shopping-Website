<?php
    class DeleteController {
        public function productDelete($productId) {
            include "classes/Delete.php";
            $product = new Product();
            if($product->delete($productId)) {
                header("Location: Home.php");
            }
        }
        public function cartDelete($userId) {
            include "classes/Delete.php";
            $product = new Cart();
            if($product->delete($userId)) {
                header("Location: Home.php");
            }
        }
    }