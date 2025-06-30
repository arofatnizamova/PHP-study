<?php

if(isset($_POST['task'], $_POST['id'])){
    include 'components/Todos.php';
    include 'data-base.php';

    $todo = new Todos($pdo);
    $task = $_POST['task'];
    $id = $_POST['id'];

    $todo->updateTaskById($id, $task);
    header("Location: welcome.php");
    exit(); 
} else{
    die ("invalid request");
}