<?php

include 'components/User.php';
include 'data-base.php';
$user = new User($pdo);

$email = $_POST['email'];
$password = $_POST['password'];


$userData = $user->isUserExist($email, $password);



if ($userData) {
    session_start();
    $_SESSION['user_id'] = $userData['id'];
    header("Location: welcome.php");
    exit;
} else {
    echo "Неправильный логин или пароль. <a href='index.html'>Зарегистрироваться</a>";
}