<?php
    include "classes/ProductModel.php";
    class ProductController extends ProductModel {
        public function viewProducts() {
            return $this->getProducts();
        }

        public function viewProductDetails($id) {
            return $this->getProductDetails($id);
        }

        public function viewSearchedProducts($name) {
            return $this->getSearchedProducts($name);
        }

        public function viewProductName($id) {
            foreach($this->getProductName($id) as $name) {
                return $name['name'];
            }
        }

        public function viewProductQuantity($id) {
            foreach($this->getProductQuantity($id) as $quantity) {
                return $quantity['quantity'];
            }
        }

        public function viewProductPrice($id) {
            foreach($this->getProductPrice($id) as $price) {
                return $price['price'];
            }
        }

    }