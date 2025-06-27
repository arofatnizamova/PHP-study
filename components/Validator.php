<?php

/**
 * Class Validator
 *
 * Provides input validation methods for user data.
 */
class Validator {

    /**
     * Validate an email address.
     *
     * Checks if the email format is valid and if the domain has an MX record.
     *
     * @param string $email The email address to validate
     * @return bool True if valid, false otherwise
     */
    public function isEmailValid($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        $domain = substr(strrchr($email, "@"), 1);
        return checkdnsrr($domain, "MX");
    }

    /**
     * Validate a username.
     *
     * The name must contain only letters (Latin or Cyrillic), digits, or underscores,
     * and be between 3 and 20 characters long.
     *
     * @param string $name The username to validate
     * @return bool True if valid, false otherwise
     */
    public function isNameValid($name){
        if (!preg_match('/^[a-zA-Zа-яА-ЯёЁ0-9_]{3,20}$/u', $name)) {
            return false;
        }
        return true;
    }

    /**
     * Validate a password.
     *
     * The password must be between 6 and 20 characters long,
     * contain at least one letter and one digit.
     *
     * @param string $password The password to validate
     * @return bool True if valid, false otherwise
     */
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
