<?php
    include_once "classes/CartModel.php";
    class CartController extends CartModel {

        public function viewCartTotalCost($userId) {
            foreach($this->getCartTotalCost($userId) as $cost) {
                return $cost['totalCost'];
            }
        }

        public function viewCartDetails($userId) {
            return $this->getCartDetails($userId);
        }

        public function viewCartProduct3($userId) {
            foreach ($this->getCartProduct3($userId) as $product3) {
                return $product3['product3'];
            }
        }

    }