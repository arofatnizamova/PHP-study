<?php
session_start();
include __DIR__ . '/../components/Todos.php';
include 'data-base.php';

$todo = new Todos($pdo);


$task = $_POST['task'];
$user_id = $_SESSION['user_id'];

if (!empty($task)) {
    $todo->addTask($user_id, $task);
    header("Location: welcome.php");
    exit;
} else {
    echo "Пустое задание. <a href='welcome.php'>Назад</a>";
}