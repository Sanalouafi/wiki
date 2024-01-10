<?php

namespace App\DAO;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Database\Database;

class CategoryDAO
{
    public static function getAllCategories()
    {
        try {
            $conn = Database::connect();

            $sql = "SELECT * FROM `category`";
            $stmt = $conn->query($sql);
            $categories = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            return $categories;
        } catch (\PDOException $e) {
            die("Error getting categories: " . $e->getMessage());
        } finally {
            if ($conn) {
                $conn = null;
            }
        }
    }

    public static function getCategoryById($categoryId)
    {
        try {
            $conn = Database::connect();

            $sql = "SELECT * FROM `category` WHERE `id` = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $categoryId, \PDO::PARAM_INT);
            $stmt->execute();
            $category = $stmt->fetch(\PDO::FETCH_ASSOC);

            return $category;
        } catch (\PDOException $e) {
            die("Error getting category by ID: " . $e->getMessage());
        } finally {
            if ($conn) {
                $conn = null;
            }
        }
    }

    public static function getCategoryByName($categoryName)
    {
        try {
            $conn = Database::connect();

            $sql = "SELECT * FROM `category` WHERE `category_name` = :name";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':name', $categoryName, \PDO::PARAM_STR);
            $stmt->execute();
            $category = $stmt->fetch(\PDO::FETCH_ASSOC);

            return $category;
        } catch (\PDOException $e) {
            die("Error getting category by name: " . $e->getMessage());
        } finally {
            if ($conn) {
                $conn = null;
            }
        }
    }

    public static function addCategory($categoryName)
    {
        try {
            $conn = Database::connect();

            $sql = "INSERT INTO `category`(`category_name`) VALUES (?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $categoryName);
            $stmt->execute();
        } catch (\PDOException $e) {
            die("Error adding category: " . $e->getMessage());
        } finally {
            if ($conn) {
                $conn = null;
            }
        }
    }

    public static function editCategory($categoryId, $newCategoryName)
    {
        try {
            $conn = Database::connect();

            $sql = "UPDATE `category` SET `category_name` = :newName WHERE `id` = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':newName', $newCategoryName, \PDO::PARAM_STR);
            $stmt->bindParam(':id', $categoryId, \PDO::PARAM_INT);
            $stmt->execute();
        } catch (\PDOException $e) {
            die("Error editing category: " . $e->getMessage());
        } finally {
            if ($conn) {
                $conn = null;
            }
        }
    }

    public static function deleteCategory($categoryId)
    {
        try {
            $conn = Database::connect();

            $sql = "DELETE FROM `category` WHERE `id` = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $categoryId, \PDO::PARAM_INT);
            $stmt->execute();
        } catch (\PDOException $e) {
            die("Error deleting category: " . $e->getMessage());
        } finally {
            if ($conn) {
                $conn = null;
            }
        }
    }
}
?>
