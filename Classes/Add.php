<?php
    include_once "DatabaseModification.php";
    interface Add {
        function add($data);
    }

    class Account implements Add {
        function add($data) {
            $sql = "INSERT INTO `accounts`(`fname`, `lname`, `username`, `password`, `phone`, `address`) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', $data[4], '$data[5]')";
            $modify = new DatabaseModification();
            return $modify->executeStatement($sql);
        }
    }

    class Product implements Add {
        function add($data) {
            $sql = "INSERT INTO `products`(`name`, `category`, `description`, `picture`, `price`, `quantity`, `supplierId`) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', $data[4], '$data[5]', $data[6])";
            $modify = new DatabaseModification();
            return $modify->executeStatement($sql);
        }
    }

    class Cart implements Add {
        function add($data) {
            $sql = "INSERT INTO `cart`(`userId`, `product1`, `totalCost`) VALUES ($data[0], '$data[1]', $data[2])";
            $modify = new DatabaseModification();
            return $modify->executeStatement($sql);
        }
    }

    class Bill implements Add {
        function add($data) {
            $sql = "INSERT INTO `customerbills`(`userId`, `product1`, `product2`, `product3`,  `totalCost`) VALUES ($data[0], $data[1], $data[2], $data[3], $data[4])";
            $modify = new DatabaseModification();
            return $modify->executeStatement($sql);
        }
    }