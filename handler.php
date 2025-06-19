<?php

include 'user.php';
include 'validator.php';

$validator = new Validator();
$user = new User();
$errors = [];

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];


if ($validator->is_Email_Valid($email) !== true){
    array_push($errors, "Невалидный email");
}
if ($validator->is_Name_Valid($name) !== true){
    array_push($errors, "Невалидный имя");
}
if ($validator->is_Password_Valid($password) !== true){
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