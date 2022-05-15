<?php
    include_once "ProductModel.php";
    interface Printt {
        function PrintAll();
    }

    class PrintProduct implements Printt {
        function PrintAll(){
            $product = new ProductModel();
            return $product->getProducts();
        }
    }