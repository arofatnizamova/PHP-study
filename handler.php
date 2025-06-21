<?php

include 'user.php';
include 'validator.php';

$validator = new Validator();
$user = new User("MySQL-8.0", "testDB", "root", "");
$errors = [];

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];


if ($validator->isEmailValid($email) !== true){
    array_push($errors, "Невалидный email");
}
if ($validator->isNameValid($name) !== true){
    array_push($errors, "Невалидный имя");
}
if ($validator->isPasswordValid($password) !== true){
    array_push($errors, "Невалидный пароль");
}

if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p>$error</p>";
    }
    exit;
}

if($user ->isRegistered($email) === true){
    echo "Пользователь с таким email уже зарегистрирован.";
} else{
    $user -> create($name, $email, $password);
    echo "Регистрация прошла успешно!";
}