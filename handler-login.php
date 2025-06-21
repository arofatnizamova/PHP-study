<?php

include 'user.php';
$user = new User("MySQL-8.0", "testDB", "root", "");

$email = $_POST['email'];
$password = $_POST['password'];

if ($user -> isUserExist($email, $password ) !== false){
    header("Location: welcome.php");
} else {
    echo "Неправильный логин или пароль. <a href='index.html'>Зарегистрироваться</a>";
}