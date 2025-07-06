<?php
if(isset($_GET['id'])){
    include __DIR__ . '/../components/Todos.php';
    include 'data-base.php';

    $todo = new Todos($pdo);
    $todo->deleteByID($_GET['id']);
    header("Location: welcome.php");
} else {
    die("ERROR");
}