<?php
if(isset($_GET['id'])){
    include 'components/Todos.php';
    include 'data-base.php';

    $todo = new Todos($pdo);
    $todo->deleteByID($_GET['id']);
    header("Location: welcome.php");
} else {
    die("ERROR");
}