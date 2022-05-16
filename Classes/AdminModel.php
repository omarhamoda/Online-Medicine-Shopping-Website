<?php
    include_once "classes/DatabaseModification.php";
    class AdminModel extends DatabaseModification{

        function getUsers() {
            $sql = "select * from accounts";
            return $this->executeSelectStatementt($sql);
        }

        function getBills() {
            $sql = "select * from customerbills join accounts on customerbills.userId = accounts.id";
            return $this->executeSelectStatementt($sql);
        }
    }