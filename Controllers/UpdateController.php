<?php
    class UpdateController {
        public function updateProduct($updateData) {
            include "classes/Update.php";
            $updateProduct = new Product();
            if($updateProduct->update($updateData)) {
                header("Location: Home.php");
            }
        }
    }