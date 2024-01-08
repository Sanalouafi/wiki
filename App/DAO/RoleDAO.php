<?php

namespace App\DAO;

require_once '/../../vendor/autoload.php';

use App\Database\Database;

class RoleDAO
{
    public static function getAllRoles()
    {
        try {
            $conn = Database::connect();
            
            $sql = "SELECT * FROM `role`";
            $stmt = $conn->query($sql);
            $roles = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            
            return $roles;
        } catch (\PDOException $e) {
            die("Error getting roles: " . $e->getMessage());
        } finally {
            if ($conn) {
                $conn = null;
            }
        }
    }

    public static function getRoleById($roleId)
    {
        try {
            $conn = Database::connect();

            $sql = "SELECT * FROM `role` WHERE `id` = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $roleId, \PDO::PARAM_INT);
            $stmt->execute();

            $role = $stmt->fetch(\PDO::FETCH_ASSOC);
            
            return $role;
        } catch (\PDOException $e) {
            die("Error getting role by ID: " . $e->getMessage());
        } finally {
            if ($conn) {
                $conn = null;
            }
        }
    }

    public static function addRole($role_name)
    {
        try {
            $conn = Database::connect();

            $sql = "INSERT INTO `role`(`role_name`) VALUES (?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $role_name);
            $stmt->execute();
        } catch (\PDOException $e) {
            die("Error adding role: " . $e->getMessage());
        } finally {
            if ($conn) {
                $conn = null;
            }
        }
    }
}
?>
