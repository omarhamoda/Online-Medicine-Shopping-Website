<?php

class database {

    function addAccount($data) {
        include "DBconnect.php";
        $sql = "INSERT INTO `accounts`(`fname`, `lname`, `username`, `password`, `phone`, `address`) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', $data[4], '$data[5]')";
        if (mysqli_query($con, $sql)) {
            return true;
        }
    }

    function getAllAccounts() {
        include 'DBconnect.php';
        $sql = "select * from accounts";
        $query = mysqli_query($con, $sql);
        $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $results;
    }
    
    function getOneAccount($username, $password) {
        include 'DBconnect.php';
        $sql = "select * from accounts where username = '$username' and password = '$password'";
        $query = mysqli_query($con, $sql);
        $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $results;
    }

    function getOneAccountForValidation($username, $password) {
        include 'DBconnect.php';
        $sql = "select username, password from accounts where username = '$username' and password = '$password'";
        $query = mysqli_query($con, $sql);
        $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $results;
    }

    function getAccountTypeById() {
        include 'DBconnect.php';
        $sql = "select type from accounts where id = " . $_COOKIE['id'];
        $query = mysqli_query($con, $sql);
        $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $results;
    }

    function getAccountProfilePicture() {
        include 'DBconnect.php';
        $sql = "select picture from accounts where id = " . $_COOKIE['id'];
        $query = mysqli_query($con, $sql);
        $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $results;
    }

    function addProductToDatabase($data) {
        include "DBconnect.php";
        $sql = "INSERT INTO `products`(`name`, `category`, `description`, `picture`, `price`, `quantity`, `supplierId`) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', $data[4], '$data[5]', $data[6])";
        if (mysqli_query($con, $sql)) {
            return true;
        }
    }

    function updateProductToDatabase($data) {
        include "DBconnect.php";
        $sql = "UPDATE `products` SET `name` = '$data[0]', `category` = '$data[1]', `description` = '$data[2]', `price` =$data[3], `quantity` = $data[4] WHERE `id` =". $data[5];
        if(mysqli_query($con, $sql)) {
            return true;
        }
    }

    function deleteProductByIdFromDatabase($id) {
        include "DBconnect.php";
        $sql = "DELETE FROM `products` WHERE `id` = $id";
        if (mysqli_query($con, $sql)) {
            return true;
        }
    }

    function getProducts() {
        include 'DBconnect.php';
        $sql = "SELECT * FROM products ORDER BY RAND() LIMIT 50;";
        $query = mysqli_query($con, $sql);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $result;
    }

    function getProductDetails($id) {
        include 'DBconnect.php';
        $sql = "select * from products where id = $id";
        $query = mysqli_query($con, $sql);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $result;
    }

    function getSearchedProducts($name) {
        include 'DBconnect.php';
        $sql = "select * from products where name like '%$name%'";
        $query = mysqli_query($con, $sql);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $result;
    }

    function getProductName($id) {
        include 'DBconnect.php';
        $sql = "select name from products where id = $id";
        $query = mysqli_query($con, $sql);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        foreach($result as $name) {
            return $name['name'];
        }
        return "";
    }

    function getProductQuantity($id) {
        include 'DBconnect.php';
        $sql = "select quantity from products where id = $id";
        $query = mysqli_query($con, $sql);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        foreach($result as $quantity) {
            return $quantity['quantity'];
        }
    }

    function getProductPrice($id) {
        include 'DBconnect.php';
        $sql = "select price from products where id = $id";
        $query = mysqli_query($con, $sql);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        foreach($result as $price) {
            return $price['price'];
        }
    }

    function getCartTotalCost($userId) {
        include 'DBconnect.php';
        $sql = "select totalCost from cart where userId = $userId";
        $query = mysqli_query($con, $sql);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        foreach($result as $cost) {
            return $cost['totalCost'];
        }
    }

    function addNewCart($userId, $productId) {
        include 'DBconnect.php';
        $totalCost = $this->getProductPrice($productId);
        $sql = "INSERT INTO `cart`(`userId`, `product1`, `totalCost`) VALUES ($userId, '$productId', $totalCost)";
        if (mysqli_query($con, $sql)) {
            return true;
        }
    }

    function updateCartProduct2($userId, $productId) {
        include "DBconnect.php";
        $totalCost = $this->getCartTotalCost($userId) + $this->getProductPrice($productId);
        $sql = "UPDATE `cart` SET `product2` = '$productId', `totalCost` = '$totalCost' WHERE `userId` =". $userId;
        if(mysqli_query($con, $sql)) {
            return true;
        }
    }

    function updateCartProduct3($userId, $productId) {
        include "DBconnect.php";
        $totalCost = $this->getCartTotalCost($userId) + $this->getProductPrice($productId);
        $sql = "UPDATE `cart` SET `product3` = '$productId', `totalCost` = '$totalCost' WHERE `userId` =". $userId;
        if(mysqli_query($con, $sql)) {
            return true;
        }
    }

    function getCartDetails($userId) {
        include 'DBconnect.php';
        $sql = "select * from cart where userId = $userId";
        $query = mysqli_query($con, $sql);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $result;
    }

    function deleteCartFromDatabase($userId) {
        include "DBconnect.php";
        $sql = "DELETE FROM `cart` WHERE `userId` = $userId";
        if (mysqli_query($con, $sql)) {
            return true;
        }
    }

    function checkCart($userId) {
        include 'DBconnect.php';
        $sql = "select * from cart where userId = $userId";
        $query = mysqli_query($con, $sql);
        if(mysqli_num_rows($query) > 0 ) {
            return true;
        }
    }

    function decreaseProductQuantity($productId) {
        include 'DBconnect.php';
        $sql = "UPDATE `products` SET  `quantity` = `quantity` - 1 WHERE `id` = $productId and `quantity` > 0";
        if(mysqli_query($con, $sql)) {
            return true;
        }
    }

    function decreaseProductsQuantity($userId) {
        include "DBconnect.php";
        foreach($this->getCartDetails($userId) as $cart) {
            $this->decreaseProductQuantity($cart['product1']);
            if($cart['product2'] != null) {
                $this->decreaseProductQuantity($cart['product2']);
            }
            if($cart['product3'] != null) {
                $this->decreaseProductQuantity($cart['product3']);
            }
        }
    }

    function addCustomerBill($userId) {
        include 'DBconnect.php';
        $totalCost = 0;
        $products = array(0, 0, 0);
        foreach($this->getCartDetails($userId) as $cart) {
            $products[0] = $cart['product1'];
            if($cart['product2'] != null) {
                $products[1] = $cart['product2'];
            }
            if($cart['product3'] != null) {
                $products[2] = $cart['product3'];
            }
            $totalCost = $cart['totalCost'];
        }
        $sql = "INSERT INTO `customerbills` (`userId`, `product1`, `product2`, `product3`, `totalCost`) VALUES ($userId, $products[0], $products[1], $products[2], $totalCost)";
        if (mysqli_query($con, $sql)) {
            return true;
        }
    }

    function getAllCustomerBills() {
        include 'DBconnect.php';
        $sql = "SELECT * FROM `customerbills` join `accounts` on `customerbills`.userId = `accounts`.id";
        $query = mysqli_query($con, $sql);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $result;
    }

}