<?php
    include "Database.php";
    class Search extends database {

        function viewSearchedProducts($name) {
            return $this->getSearchedProducts($name);
        }

    }