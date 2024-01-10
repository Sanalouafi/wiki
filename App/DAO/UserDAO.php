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

            $sql = "INSERT INTO `user` (`fullname`, `email`, `password`, `photo`,`status`, `role_id`) 
                VALUES (?, ?, ?, ?,?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $fullname, \PDO::PARAM_STR);
            $stmt->bindParam(2, $email, \PDO::PARAM_STR);
            $stmt->bindParam(3, $password, \PDO::PARAM_STR);
            $stmt->bindParam(4, $photo, \PDO::PARAM_STR);
            $stmt->bindParam(5, $status, \PDO::PARAM_STR);
            $stmt->bindParam(6, $roleId, \PDO::PARAM_INT);
            $stmt->execute();

            $conn->commit();
        } catch (\PDOException $e) {
            $conn->rollBack();
            die("Error registering user: " . $e->getMessage());
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
        session_start();  
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

    private static function updateUserRole($userId, $roleId, $conn)
    {
        $sqlUpdateRole = "UPDATE `user` SET `role_id` = ? WHERE `id` = ?";
        $stmtUpdateRole = $conn->prepare($sqlUpdateRole);
        $stmtUpdateRole->execute([$roleId, $userId]);
    }

    public static function editUser($userId, $fullname, $email, $password, $photo, $status, $roleId)
    {
        try {
            $conn = Database::connect();

            $conn->beginTransaction();

            $sql = "UPDATE `user` 
                    SET `fullname` = ?, `email` = ?, `password` = ?, `photo` = ?, `status` = ?,`role_id` = ? 
                    WHERE `id` = ?";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $fullname, \PDO::PARAM_STR);
            $stmt->bindParam(2, $email, \PDO::PARAM_STR);
            $stmt->bindParam(3, $password, \PDO::PARAM_STR);
            $stmt->bindParam(4, $photo, \PDO::PARAM_STR);
            $stmt->bindParam(5, $photo, \PDO::PARAM_STR);
            $stmt->bindParam(6, $status, \PDO::PARAM_INT);
            $stmt->bindParam(7, $userId, \PDO::PARAM_INT);
            $stmt->execute();

            self::updateUserRole($userId, $roleId, $conn);

            $conn->commit();
        } catch (\PDOException $e) {
            $conn->rollBack();
            die("Error editing user: " . $e->getMessage());
        } finally {
            if ($conn) {
                $conn = null;
            }
        }
    }

    public static function deleteUser($userId)
    {
        try {
            $conn = Database::connect();

            $conn->beginTransaction();

            // Delete from user table
            $sqlDeleteUser = "DELETE FROM `user` WHERE `id` = ?";
            $stmtDeleteUser = $conn->prepare($sqlDeleteUser);
            $stmtDeleteUser->execute([$userId]);

            $conn->commit();
        } catch (\PDOException $e) {
            $conn->rollBack();
            die("Error deleting user: " . $e->getMessage());
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
