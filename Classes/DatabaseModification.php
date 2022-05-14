<?php

class DatabaseModification {
    function executeSelectStatementt($sql) {
        include 'DBconnect.php';
        $query = mysqli_query($con, $sql);
        $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $results;
    }
    function executeStatement($sql) {
        include 'DBconnect.php';
        if (mysqli_query($con, $sql)) {
            return true;
        }
    }
}