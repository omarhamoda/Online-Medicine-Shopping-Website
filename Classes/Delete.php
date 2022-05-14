<?php
    include_once "DatabaseModification.php";
    interface Delete {
        function delete($id);
    }

    class Product implements Delete{
        function delete($id) {
            $sql = "DELETE FROM `products` WHERE `id` = $id";
            $modify = new DatabaseModification();
            return $modify->executeStatement($sql);
        }
    }

    class Cart implements Delete{
        function delete($userId) {
            $sql = "DELETE FROM `cart` WHERE `userId` = $userId";
            $modify = new DatabaseModification();
            return $modify->executeStatement($sql);
        }
    }