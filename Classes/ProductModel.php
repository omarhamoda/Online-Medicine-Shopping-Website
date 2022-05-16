<?php
    include_once "DatabaseModification.php";
    class ProductModel extends DatabaseModification {
        protected function getProducts() {
            $sql = "SELECT * FROM products ORDER BY RAND() LIMIT 50;";
            return $this->executeSelectStatementt($sql);
        }
    
        protected function getProductDetails($id) {
            $sql = "select * from products where id = $id";
            return $this->executeSelectStatementt($sql);
        }
    
        protected function getSearchedProducts($name) {
            $sql = "select * from products where name like '%$name%'";
            return $this->executeSelectStatementt($sql);
        }
    
        protected function getProductName($id) {
            $sql = "select name from products where id = $id";
            return $this->executeSelectStatementt($sql);
        }
    
        protected function getProductQuantity($id) {
            $sql = "select quantity from products where id = $id";
            return $this->executeSelectStatementt($sql);
        }
    
        protected function getProductPrice($id) {
            $sql = "select price from products where id = $id";
            return $this->executeSelectStatementt($sql);
        }
    }