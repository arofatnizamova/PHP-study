<?php

include 'user.php';
$user = new User("MySQL-8.0", "testDB", "root", "");

$email = $_POST['email'];
$password = $_POST['password'];

session_start();

if ($user->isUserExist($email, $password)) {
    $_SESSION['logged_in'] = true;
    header("Location: welcome.php");
    exit;
} else {
    echo "Неправильный логин или пароль. <a href='index.html'>Зарегистрироваться</a>";
}