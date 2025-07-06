<?php
header('Content-Type: application/json'); 

include __DIR__ . '/../components/User.php';
include __DIR__ . '/../components/Validator.php';
include 'data-base.php';

$user = new User($pdo);
$validator = new Validator();
$errors = [];
$response = [];

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if ($validator->isEmailValid($email) !== true){
    $errors[] = "Невалидный email";
}
if ($validator->isNameValid($name) !== true){
    $errors[] = "Невалидное имя";
}
if ($validator->isPasswordValid($password) !== true){
    $errors[] = "Невалидный пароль";
}

if (!empty($errors)) {
    echo json_encode([
        'success' => false,
        'message' => implode(', ', $errors)
    ]);
    exit;
}

if ($user->isRegistered($email) === true) {
    echo json_encode([
        'success' => false,
        'message' => 'Пользователь с таким email уже зарегистрирован.'
    ]);
} else {
    $user->create($name, $email, $password);
    echo json_encode([
        'success' => true
    ]);
}
