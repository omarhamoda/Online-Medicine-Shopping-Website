<?php
    include_once "classes/DatabaseModification.php";
    class Account extends DatabaseModification{
        function getAllAccounts() {
            $sql = "select * from accounts";
            return $this->executeSelectStatementt($sql);
        }
        
        function getOneAccount($username, $password) {
            $sql = "select * from accounts where username = '$username' and password = '$password'";
            return $this->executeSelectStatementt($sql);
        }
    
        function getOneAccountForValidation($username, $password) {
            $sql = "select username, password from accounts where username = '$username' and password = '$password'";
            return $this->executeSelectStatementt($sql);
        }
    
        function getAccountTypeById() {
            $sql = "select type from accounts where id = " . $_COOKIE['id'];
            return $this->executeSelectStatementt($sql);
        }
    
        function getAccountProfilePicture() {
            $sql = "select picture from accounts where id = " . $_COOKIE['id'];
            return $this->executeSelectStatementt($sql);
        }
    }