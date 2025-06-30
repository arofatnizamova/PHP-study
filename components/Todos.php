<?php
/**
 * Class Todos
 *
 * Handles user todo tasks in the database.
 */
class Todos {

    /**
     * @var PDO $pdo
     * Database connection object.
     */
    private $pdo;

    /**
     * Todos constructor.
     *
     * @param PDO $pdo PDO database connection.
     */
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Retrieves all tasks for a given user.
     *
     * @param int $user_id The ID of the user.
     * @return array List of tasks as associative arrays.
     */
    public function getTasks($user_id){
        $stmt = $this->pdo->prepare("SELECT * FROM todos WHERE user_id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }

    /**
     * Adds a new task for a user.
     *
     * @param int $user_id The ID of the user.
     * @param string $task The task description.
     * @return bool True on success, false on failure.
     */
    public function addTask($user_id, $task) {
        $stmt = $this->pdo->prepare("INSERT INTO todos (user_id, task) VALUES (?, ?)");
        return $stmt->execute([$user_id, $task]);
    }
    /**
     * Deletes a task for a user.
     * 
     * @param int $id The ID of the task.
     * @return bool True on success, false on failure.
     */
    public function deleteByID($id){
        $stmt = $this->pdo->prepare("DELETE FROM todos WHERE id = ?");
        return $stmt->execute([$id]);
    }
    /**
     * Changes a task for a user.
     * 
     * @param int $id The ID of the task.
     * @param string $task The task description.
     * @return bool True on success, false on failure.
     */
    public function updateTaskById($id, $task){
        $stmt = $this->pdo->prepare("UPDATE todos SET task = ? WHERE id = ?");
        return $stmt->execute([$task, $id]);
    }
}
