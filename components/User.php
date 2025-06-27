<?php
/**
 * Class User
 *
 * Provides methods to manage users in the database.
 */
class User {
    /**
     * @var PDO Database connection instance
     */
    private $pdo; 

    /**
     * User constructor.
     *
     * @param PDO $pdo Database connection
     */
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Retrieve user data by ID.
     *
     * @param int $id User ID
     * @return array|false Associative array of user data or false if not found
     */
    public function getById($id){
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Delete a user by ID.
     *
     * @param int $id User ID
     * @return bool True on success, false on failure
     */
    public function deleteById($id){
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }

    /**
     * Create a new user.
     *
     * @param string $name User name
     * @param string $email User email
     * @param string $password User password (should be hashed before storing)
     * @return bool True on success, false on failure
     */
    public function create($name, $email, $password){
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $email, $password]);
    }

    /**
     * Update user information.
     *
     * @param int $id User ID
     * @param string $name New name
     * @param string $email New email
     * @param string $password New password (should be hashed)
     * @return bool True on success, false on failure
     */
    public function update($id, $name, $email, $password){
        $stmt = $this->pdo->prepare("UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?");
        return $stmt->execute([$name, $email, $password, $id]);
    }

    /**
     * Check if a user with the given email is registered.
     *
     * @param string $email User email
     * @return bool True if registered, false otherwise
     */
    public function isRegistered($email){
        $stmt = $this->pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetchColumn() > 0;
    }

    /**
     * Check if a user exists with the given email and password.
     *
     * @param string $email User email
     * @param string $password User password (plain text or hashed depending on implementation)
     * @return bool True if the user exists, false otherwise
     */
    public function isUserExist($email, $password){
        $stmt = $this->pdo->prepare("SELECT id FROM users WHERE email = ? AND password = ?");
        $stmt->execute([$email, $password]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
