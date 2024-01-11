<?php

namespace App\DAO;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Database\Database;

class UserDAO
{
    public static function getAllUsers()
    {
        try {
            $conn = Database::connect();

            $sql = "SELECT * FROM `user`";
            $stmt = $conn->query($sql);
            $users = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            return $users;
        } catch (\PDOException $e) {
            die("Error getting users: " . $e->getMessage());
        } finally {
            if ($conn) {
                $conn = null;
            }
        }
    }

    public static function getUserById($userId)
    {
        try {
            $conn = Database::connect();

            $sql = "SELECT * FROM `user` WHERE `id` = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $userId, \PDO::PARAM_INT);
            $stmt->execute();
            $user = $stmt->fetch(\PDO::FETCH_ASSOC);

            return $user;
        } catch (\PDOException $e) {
            die("Error getting user by ID: " . $e->getMessage());
        } finally {
            if ($conn) {
                $conn = null;
            }
        }
    }

    public static function registerUser($fullname, $email, $password, $photo, $status, $roleId)
    {
        try {
            $conn = Database::connect();

            $existingUser = self::getUserByEmail($email);

            if ($existingUser) {
                throw new \Exception("Email already exists. Please choose a different email.");
            }

            $conn->beginTransaction();

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO `user` (`fullname`, `email`, `password`, `photo`, `status`, `role_id`) 
                VALUES (?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->execute([$fullname, $email, $hashedPassword, $photo, $status, $roleId]);

            $conn->commit();
        } catch (\PDOException $e) {
            $conn->rollBack();
            throw new \Exception("Error registering user: " . $e->getMessage());
        } finally {
            if ($conn) {
                $conn = null;
            }
        }
    }

    public static function loginUser($email, $password)
    {
        try {
            $conn = Database::connect();

            $sql = "SELECT * FROM `user` WHERE `email` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $email, \PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                return $user;
            } else {
                return false;
            }
        } catch (\PDOException $e) {
            die("Error logging in user: " . $e->getMessage());
        } finally {
            if ($conn) {
                $conn = null;
            }
        }
    }

    public static function logout()
    {
        session_unset();
        session_destroy();
        session_regenerate_id(true);
    }

    public static function getUserByEmail($email)
    {
        try {
            $conn = Database::connect();

            $sql = "SELECT * FROM `user` WHERE `email` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $email, \PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(\PDO::FETCH_ASSOC);

            return $user;
        } catch (\PDOException $e) {
            die("Error getting user by email: " . $e->getMessage());
        } finally {
            if ($conn) {
                $conn = null;
            }
        }
    }
    public static function getUsersByRoleId($roleId)
    {
        try {
            $conn = Database::connect();

            $sql = "SELECT * FROM `user` WHERE `role_id` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $roleId, \PDO::PARAM_INT);
            $stmt->execute();

            $users = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            return $users;
        } catch (\PDOException $e) {
            die("Error getting users by role ID: " . $e->getMessage());
        } finally {
            if ($conn) {
                $conn = null;
            }
        }
    }

    public static function updateStatus($userId, $newStatus)
    {
        try {
            $conn = Database::connect();

            $sql = "UPDATE `user` SET `status` = ? WHERE `id` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $newStatus, \PDO::PARAM_STR);
            $stmt->bindParam(2, $userId, \PDO::PARAM_INT);
            $stmt->execute();

            return true;
        } catch (\PDOException $e) {
            die("Error updating status: " . $e->getMessage());
        } finally {
            if ($conn) {
                $conn = null;
            }
        }

        return false;
    }
}
