<?php
include_once "AccountModel.php";
include_once "Validation.php";
class Login extends Account{

    function setLogInInfo($username, $password) {
        foreach ($this->getOneAccount($username, $password) as $account) {
                setcookie("id", $account['id'], time() + (84600 * 30), '/');
                setcookie("username", $account['username'], time() + (84600 * 30), '/');
                setcookie("password", $account['password'], time() + (84600 * 30), '/');
                setcookie("fname", $account['fname'], time() + (84600 * 30), '/');
        }
    }

    function checkLogInValidationn($username, $password) {
        foreach ($this->getOneAccountForValidation($username, $password) as $account) {
            if (strcmp($account['username'], $username) == 0 && strcmp($account['password'], $password) == 0) {
                return true;
            }
        }
    }

    function loginn($username, $password) {
        if($this->checkLogInValidationn($username, $password)) {
            $this->setLogInInfo($username, $password);
            return true;
        }
    }

    function logOut() {
        if(isset($_COOKIE['username']) && isset($_COOKIE['password']) && isset($_COOKIE['fname'])) {
            setcookie("id", $account['id'], time() - (84600 * 1000), '/');
            setcookie("username", $_COOKIE['username'], time() - (86400 * 1000), '/');
            setcookie("password", $_COOKIE['password'], time() - (86400 * 1000), '/');
            setcookie("fname", $_COOKIE['fname'], time() - (86400 * 1000), '/');
        }
    }

}
