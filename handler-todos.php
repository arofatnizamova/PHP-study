<?php

include 'components/Todos.php';
include 'data-base.php';

$todo = new Todos($tasksBD);


$task = $_POST['task'];
$user_id = $_SESSION['user_id'];

if (!empty($task)){
    $todo->addTask($user_id, $task);
}