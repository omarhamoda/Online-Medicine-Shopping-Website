<?php

    $con = mysqli_connect('localhost','salah', '01675190064', 'store');
    if (!$con) {
        echo "connection Error" . mysqli_connect_error();
    }