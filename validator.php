<?php

class Validator {
    public function isEmailValid($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return false;
        }
        $domain = substr(strrchr($email, "@"), 1);
        return checkdnsrr($domain, "MX");
    }

    public function isNameValid($name){
        if (!preg_match('/^[a-zA-Zа-яА-ЯёЁ0-9_]{3,20}$/u', $name)) {
            return false;
        }

        return true;
    }
    public function isPasswordValid($password){
        if (strlen($password) < 6 || strlen($password) > 20) {
            return false;
        }

        if (!preg_match('/[a-zA-Z]/', $password) || !preg_match('/[0-9]/', $password)) {
            return false;
        }

        return true;
    }

}