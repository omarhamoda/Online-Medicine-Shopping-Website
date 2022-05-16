<?php
    include_once "classes/AccountModel.php";
     class AccountController extends AccountModel {
    
        public function viewAccountTypeById() {
            foreach($this->getAccountTypeById() as $type) {
                return $type['type'];
            }
        }
    
        public function viewAccountProfilePicture() {
            return $this->getAccountProfilePicture();
        }
        
     }