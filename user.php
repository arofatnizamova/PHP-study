<?php

class User {
    public $pdo;

    public function __construct()
    {
        $this -> pdo = new PDO("mysql:host=MySQL-8.0;dbname=testDB", "root", "");
    }

    public function getbyId($id){
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deletebyId($id){
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
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt-> execute([$email]);
        if($stmt->fetchColumn() > 0){
            return true;
        } else{
            return false;
        }
    }
}