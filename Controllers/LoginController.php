<?php
include_once "classes/AccountModel.php";
class LoginController extends AccountModel{

    public function setLogInInfo($username, $password) {
        foreach ($this->getOneAccount($username, $password) as $account) {
                setcookie("id", $account['id'], time() + (84600 * 30), '/');
                setcookie("username", $account['username'], time() + (84600 * 30), '/');
                setcookie("password", $account['password'], time() + (84600 * 30), '/');
                setcookie("fname", $account['fname'], time() + (84600 * 30), '/');
        }
    }

    public function checkLogInValidationn($username, $password) {
        foreach ($this->getOneAccountForValidation($username, $password) as $account) {
            if (strcmp($account['username'], $username) == 0 && strcmp($account['password'], $password) == 0) {
                return true;
            }
        }
    }

    public function loginn($username, $password) {
        if($this->checkLogInValidationn($username, $password)) {
            $this->setLogInInfo($username, $password);
            return header('Location: Home.php');
        } else {
            return '<h4 style = "margin-left: 670px; margin-top: 30px; color: red;">Wrong Username or Password</h4>';
        }
    }

    public function logOut() {
        if(isset($_COOKIE['username']) && isset($_COOKIE['password']) && isset($_COOKIE['fname'])) {
            setcookie("id", $account['id'], time() - (84600 * 1000), '/');
            setcookie("username", $_COOKIE['username'], time() - (86400 * 1000), '/');
            setcookie("password", $_COOKIE['password'], time() - (86400 * 1000), '/');
            setcookie("fname", $_COOKIE['fname'], time() - (86400 * 1000), '/');
        }
    }

}
