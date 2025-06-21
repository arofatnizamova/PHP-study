<?php

class User {
    public $pdo;

    public function __construct($host, $dbname, $username, $password)
    {
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
        $this -> pdo = new PDO($dsn, $username, $password);
    }

    public function getById($id){
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteById($id){
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function create($name, $email, $password){
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email, password) VALUES (? , ? , ?)");
        return $stmt->execute([$name, $email, $password]);
    }

    public function update($id, $name, $email, $password){
        $stmt = $this->pdo->prepare("UPDATE users SET name = ?, email = ?, passord = ? WHERE id = ?");
        return $stmt->execute([$name, $email, $password, $id]);
    }

    public function isRegistered($email){
        $stmt = $this->pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt-> execute([$email]);
        return $stmt->fetchColumn() > 0;
    }

    public function isUserExist($email, $password){
        $stmt = $this->pdo->prepare("SELECT id FROM users WHERE email = ? AND password = ?");
        $stmt-> execute([$email, $password]);
        return $stmt->fetchColumn() >0;
    }
}