<?php
include_once "classes/CartModel.php";
class CartValidationController extends CartModel{

    public function checkCartEmptyProduct($userId) {
        foreach ($this->getCartDetails($userId) as $cart) {
            if ($cart['product2'] == null) {
                return 2;
            } elseif($cart['product3'] == null) {
                return 3;
            }
        }
    }

    public function checkExistingCart($userId) {
        if($this->getCartDetails($userId)) {
            return true;
        }
    }

    public function isEnoughProductQuantity($products) {
        foreach($this->getCartDetails($_COOKIE['id']) as $cart) {
            include_once "controllers/ProuctController.php";
            $productC = new ProductModel();
            if(!$productC->viewProductQuantity($cart['product1']) > 0) {
                return false;
            }
            if($cart['product2'] != null) {
                if(!$productC->viewProductQuantity($cart['product2']) > 0) {
                    return false;
                }
            }
            if($cart['product3'] != null) {
                if(!$productC->viewProductQuantity($cart['product3']) > 0) {
                    return false;
                }
            }
            return true;
        }
    } 

}