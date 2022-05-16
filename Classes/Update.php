<?php
    include_once "DatabaseModification.php";
    interface Update {
        function update($data);
    }

    class Product implements Update {
        function update($updateData) {
            $sql = "UPDATE `products` SET `name` = '$updateData[0]', `category` = '$updateData[1]', `description` = '$updateData[2]', `price` =$updateData[3], `quantity` = $updateData[4] WHERE `id` =". $updateData[5];
            $modify = new DatabaseModification();
            return $modify->executeStatement($sql);
        }
    }
    
    class Cart implements Update {
        function update($updateData) {
            include_once "controllers/CartValidationController.php";
            $validation = new CartValidationController();
            if($validation->checkCartEmptyProduct($_COOKIE['id']) == 2) {
                $sql = "UPDATE `cart` SET `product2` = '$updateData[1]', `totalCost` = '$updateData[2]' WHERE `userId` =". $updateData[0];
            } else {
                $sql = "UPDATE `cart` SET `product3` = '$updateData[1]', `totalCost` = '$updateData[2]' WHERE `userId` =". $updateData[0];
            }
            $modify = new DatabaseModification();
            return $modify->executeStatement($sql);
        }
    }