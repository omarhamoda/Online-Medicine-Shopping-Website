<?php
    include_once "classes/AdminModel.php";
    class AdminController extends AdminModel {
        function viewUsers() {
            return $this->getUsers();
        }

        function viewBills() {
            return $this->getBills();
        }
    }