<?php

    $con = mysqli_connect('localhost','root', '', 'Medicine');
    if (!$con) {
        echo "connection Error" . mysqli_connect_error();
    }