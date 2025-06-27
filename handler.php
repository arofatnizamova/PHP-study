<?php

include 'components/User.php';
include 'components/Validator.php';
include 'data-base.php';

$user = new User($pdo);
$validator = new Validator();
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

if($user->isRegistered($email) === true){
    echo "Пользователь с таким email уже зарегистрирован.";
} else{
    $user->create($name, $email, $password);
    echo "Регистрация прошла успешно!";
}