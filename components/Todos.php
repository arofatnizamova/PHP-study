<?php
class Todos {

    private $pdo; 

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    public function getTasks($user_id){
        $stmt = $this->pdo->prepare("SELECT * FROM todos WHERE user_id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }

    public function addTask($user_id, $task) {
        $stmt = $this->pdo->prepare("INSERT INTO todos (user_id, task) VALUES (?, ?)");
        return $stmt->execute([$user_id, $task]);
    }
}