<?php

include_once "classes/AccountModel.php";

class ValidationController extends AccountModel{

    public function checkRegistrationFormFields($data) {
        if (!empty($data[0]) && !empty($data[1]) && !empty($data[2]) && !empty($data[3]) && !empty($data[4]) && !empty($data[5]) && !empty($data[6])) {
            return true;
        } else {
            echo '<h4 class = "signuperror" style = "margin-left: 740px; margin-top: 30px; color: red;">Empty Field</h4>';
        }
    }

    public function checkUsernamePasswordMinLength($data) {
        if (strlen($data[2]) >= 5 && strlen($data[2]) <= 16 && strlen($data[3]) >= 8) {
            return true;
        } else {
            echo '<h4 class = "signuperror" style = "margin-left: 560px; margin-top: 30px; color: red;">Username must be greater than 5 and less than 16 and password > or = 8</h4>';
        }
    }

    public function checkPasswordConfirmation($data) {
        if (strcmp($data[3], $data[6]) == 0){
            return true;
        } else {
            echo '<h4 class = "signuperror" style = "margin-left: 740px; margin-top: 30px; color: red;">Passwords not identical</h4>';
        }
    }

    public function checkAccountPermissions() {
        foreach ($this->getAccountTypeById() as $account) {
            return $account['type'];
        }
    }

    public function checkAllAccountValidations($data) {
        if($this->checkRegistrationFormFields($data)) {
            if($this->checkUsernamePasswordMinLength($data)) {
                if($this->checkPasswordConfirmation($data)) {
                    return true;
                }
            }
        }
    }

}