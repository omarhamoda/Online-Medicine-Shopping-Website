<?php
    include_once "classes/BillModel.php";
    class BillController extends Billmodel {

        public function copyCartInfo($userId) {
            return $this->getCartInfo($userId);
        }

        public function viewUserBills($userId) {
            return $this->getUserBills($userId);
        }

    }