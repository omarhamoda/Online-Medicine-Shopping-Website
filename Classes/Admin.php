<?php
    include_once "classes/DatabaseModification.php";
    class Admin extends DatabaseModification{

        function viewUsers() {
            $sql = "select * from accounts";
            return $this->executeSelectStatementt($sql);
        }

        function ViewBills() {
            $sql = "select * from customerbills join accounts on customerbills.userId = accounts.id";
            return $this->executeSelectStatementt($sql);
        }
    }