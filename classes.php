<?php
class User{

    function login($username, $password) {
        include 'DBconnect.php';
        $sql = "select * from account where username = '$username' and password = '$password'";
        $query = mysqli_query($con, $sql);
        $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
        foreach ($results as $account) {
            if (strcmp($account['username'], $username) == 0 && strcmp($account['password'], $password) == 0) {
                setcookie("id", $account['id'], time() + (84600 * 30), '/');
                setcookie("username", $account['username'], time() + (84600 * 30), '/');
                setcookie("password", $account['password'], time() + (84600 * 30), '/');
                setcookie("fname", $account['fname'], time() + (84600 * 30), '/');
                return true;
            }
        }
        return false;
    }

    function signup($fname, $lname, $username, $password, $email, $phone, $date_created) {
        $sql = "INSERT INTO `account`(`fname`, `lname`, `username`, `password`, `email`, `phone`, `date_created`, `type`) VALUES ('$fname','$lname','$username','$password','$email',$phone,'$date_created','user')";
        include "DBconnect.php";
        if(mysqli_query($con, $sql)) {
            return true;
        }
        else {
            return false;
        }
    }

    function logout() {
        if(isset($_COOKIE['username']) && isset($_COOKIE['password']) && isset($_COOKIE['fname'])) {
            setcookie("id", $account['id'], time() - (84600 * 1000), '/');
            setcookie("username", $_COOKIE['username'], time() - (86400 * 1000), '/');
            setcookie("password", $_COOKIE['password'], time() - (86400 * 1000), '/');
            setcookie("fname", $_COOKIE['fname'], time() - (86400 * 1000), '/');
        }
    }
}

class Goods {

    function addGoods($name, $price, $desc, $image) {
        include "DBconnect.php";
        $sql = "INSERT INTO `goods`(`gname`, `gprice`, `gdesc`, `gpicture`, `data_posted`) VALUES ('$name', $price, '$desc', '$image', '2021-08-07')";
        if (mysqli_query($con, $sql)) {
            return true;
        }
        return false;
    }

    function getGoods() {
        include 'DBconnect.php';
        $sql = "select * from goods";
        $query = mysqli_query($con, $sql);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        foreach ($result as $goods) {
            echo '<a href = "View.php?id=' . $goods['id'] .'"><div class = "goods" >';
            echo '<h3> '. $goods['gname'] . ' </h3>';
            echo '<img src = "data:image/jpeg;base64,'. base64_encode($goods['gpicture']).'" width = "399px" height= "250px">';
            echo '<h2>' . $goods["gprice"] . ' <b>$</b></h2>';
            echo'<p>'. $goods['gdesc'] .'</p>';
            echo '</div></a>';
        }
    }
    
    function getOneGoods($id) {
        include 'DBconnect.php';
        $sql = "select * from goods where id = $id";
        $query = mysqli_query($con, $sql);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        foreach ($result as $goods) {
            echo '<div class = "ViewGoods1">
                <img src = "data:image/jpeg;base64,'. base64_encode($goods['gpicture']).' " width = "380px" height= "350px">
            </div>';
            if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
                include 'DBconnect.php';
                $sql = "select * from account where id = " . $_COOKIE['id'];
                $query = mysqli_query($con, $sql);
                $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                foreach ($result as $account) {
                    if ($account['type'] == "admin") {
                        echo '<div class = "ViewGoods2">
                            <a href = "update-goods.php?id='. $id .'"><button id = "butt1">Update</button></a>
                            <a href = "delete-goods.php?id='. $id .'"><button id = "butt2">Delete</button></a>
                        </div>';
                    }
                }
            }
            if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
                echo '<div class = "ViewGoods6">
                    <a href = "request-goods.php?id='. $id .'"><button id = "butt1">Order</button></a>
                </div>';
            } else {
                echo '<div class = "ViewGoods6">
                    <a href = "signup.php"><button id = "butt1">Order</button></a>
                </div>';
            }
            echo '<div class = "ViewGoods3">
                <h3 id = "price"> '. $goods['gprice'] . ' $</h3>
            </div>';
            echo '<div class = "ViewGoods4">
                <h2 id = "name">Name: </h2>
                <h3 id = "name2">' . $goods['gname'] . '</h2>
            </div>';
            echo '<div class = "ViewGoods5">
                <h2 id = "desc">Description: </h2>
                <h3 id = "desc2">'. $goods['gdesc'] .'</h2>
            </div>';
        }
    }

    function updateGoods($name, $price, $desc, $id) {
        include "DBconnect.php";
        $sql = "UPDATE `goods` SET `gname` = '$name', `gprice` = $price, `gdesc` = '$desc' WHERE `id` =". $id;
        if(mysqli_query($con, $sql)) {
            return true;
        }
        return false;
    }

    function deleteGoods($id) {
        include "DBconnect.php";
        $sql = "DELETE FROM `goods` WHERE `id` = $id";
        if (mysqli_query($con, $sql)) {
            return true;
        }
        return false;
    }
}