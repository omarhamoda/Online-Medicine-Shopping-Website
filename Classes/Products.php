<?php

include_once "Database.php";

class Product extends database{

    function viewProducts() {
        return $this->getProducts();
    }

    function addProduct($data) {
        if($this->addProductToDatabase($data)) {
            return true;
        }
    }

    function printProductInfoToUpdate($id) {
        return $this->getProductDetails($id);
    }

    function updateProduct($data) {
        if($this->updateProductToDatabase($data)) {
            return true;
        }
    }

    function deleteProductById($id) {
        if($this->deleteProductByIdFromDatabase($id)) {
            return true;
        }
    }

    function printProductName($id) {
        return $this->getProductName($id);
    }

    function printProductDetails($id) {
        return $this->getProductDetails($id);
    }
}