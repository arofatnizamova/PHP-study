<?php
header('Content-Type: application/json'); 
include __DIR__ . '/../components/User.php';
include 'data-base.php';
$user = new User($pdo);

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$response = [];

$userData = $user->isUserExist($email, $password);

if ($userData) {
    session_start();
    $_SESSION['user_id'] = $userData['id'];

    echo json_encode([
        'success' => true
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Неправильный логин или пароль.'
    ]);
}
