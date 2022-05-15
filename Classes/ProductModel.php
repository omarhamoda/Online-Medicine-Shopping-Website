<?php
    include_once "DatabaseModification.php";
    class ProductModel extends DatabaseModification {
        function getProducts() {
            $sql = "SELECT * FROM products ORDER BY RAND() LIMIT 50;";
            return $this->executeSelectStatementt($sql);
        }
    
        function getProductDetails($id) {
            $sql = "select * from products where id = $id";
            return $this->executeSelectStatementt($sql);
        }
    
        function getSearchedProducts($name) {
            $sql = "select * from products where name like '%$name%'";
            return $this->executeSelectStatementt($sql);
        }
    
        function getProductName($id) {
            $sql = "select name from products where id = $id";
            foreach($this->executeSelectStatementt($sql) as $name) {
                return $name['name'];
            }
        }
    
        function getProductQuantity($id) {
            $sql = "select quantity from products where id = $id";
            foreach($this->executeSelectStatementt($sql) as $quantity) {
                return $quantity['quantity'];
            }
        }
    
        function getProductPrice($id) {
            $sql = "select price from products where id = $id";
            foreach($this->executeSelectStatementt($sql) as $price) {
                return $price['price'];
            }
        }
    }