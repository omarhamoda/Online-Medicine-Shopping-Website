<?php
    include_once "DatabaseModification.php";
    class BillModel extends Databasemodification {
        function getCartInfo($userId) {
            include_once "CartModel.php";
            $cart = new CartModel();
            $data = array(0, 0, 0, 0, 0);
            $data[0] = $userId;
            foreach($cart->getCartDetails($userId) as $cart) {
                $data[1] = $cart['product1'];
                if($cart['product2'] != null) {
                    $data[2] = $cart['product2'];
                }
                if($cart['product3'] != null) {
                    $data[3] = $cart['product3'];
                }
                $data[4] = $cart['totalCost'];
            }
            return $data;
        }
        function getUserBills($userId) {
            $sql = "select * from customerbills join accounts on customerbills.userId = accounts.id where customerbills.userId = $userId";
             return $this->executeSelectStatementt($sql);
        }
    }