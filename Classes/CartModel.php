<?php
    include_once "DatabaseModification.php";
    class CartModel extends DatabaseModification{

        function getCartTotalCost($userId) {
            $sql = "select totalCost from cart where userId = $userId";
            return $this->executeSelectStatementt($sql);
        }
    
        function getCartDetails($userId) {
            $sql = "select * from cart where userId = $userId";
            return $this->executeSelectStatementt($sql);
        }

        function getCartproduct3($userId) {
            $sql = "select product3 from cart where userId = $userId";
            return $this->executeSelectStatementt($sql);
        }

    }