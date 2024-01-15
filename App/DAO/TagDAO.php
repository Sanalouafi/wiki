<?php

namespace App\DAO;

require_once __DIR__.'/../../vendor/autoload.php';

use App\Database\Database;

class TagDAO
{
    public static function getAllTags()
    {
        try {
            $conn = Database::connect();

            $sql = "SELECT * FROM `tag`";
            $stmt = $conn->query($sql);
            $tags = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            return $tags;
        } catch (\PDOException $e) {
            die("Error getting tags: " . $e->getMessage());
        } finally {
            if ($conn) {
                $conn = null;
            }
        }
    }

    public static function getTagById($tagId)
    {
        try {
            $conn = Database::connect();

            $sql = "SELECT * FROM `tag` WHERE `id` = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $tagId, \PDO::PARAM_INT);
            $stmt->execute();
            $tag = $stmt->fetch(\PDO::FETCH_ASSOC);

            return $tag;
        } catch (\PDOException $e) {
            die("Error getting tag by ID: " . $e->getMessage());
        } finally {
            if ($conn) {
                $conn = null;
            }
        }
    }

    public static function getTagByName($tagName)
    {
        try {
            $conn = Database::connect();

            $sql = "SELECT * FROM `tag` WHERE `tag_name` = :name";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':name', $tagName, \PDO::PARAM_STR);
            $stmt->execute();
            $tag = $stmt->fetch(\PDO::FETCH_ASSOC);

            return $tag;
        } catch (\PDOException $e) {
            die("Error getting tag by name: " . $e->getMessage());
        } finally {
            if ($conn) {
                $conn = null;
            }
        }
    }

    public static function addTag($tagName)
    {
        try {
            $conn = Database::connect();

            $sql = "INSERT INTO `tag`(`tag_name`) VALUES (?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $tagName);
            $stmt->execute();
        } catch (\PDOException $e) {
            die("Error adding tag: " . $e->getMessage());
        } finally {
            if ($conn) {
                $conn = null;
            }
        }
    }

    public static function editTag($tagId, $newTagName)
    {
        try {
            $conn = Database::connect();

            $sql = "UPDATE `tag` SET `tag_name` = :newName WHERE `id` = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':newName', $newTagName, \PDO::PARAM_STR);
            $stmt->bindParam(':id', $tagId, \PDO::PARAM_INT);
            $stmt->execute();
        } catch (\PDOException $e) {
            die("Error editing tag: " . $e->getMessage());
        } finally {
            if ($conn) {
                $conn = null;
            }
        }
    }

    public static function deleteTag($tagId)
    {
        try {
            $conn = Database::connect();

            $sql = "DELETE FROM `tag` WHERE `id` = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $tagId, \PDO::PARAM_INT);
            $stmt->execute();
        } catch (\PDOException $e) {
            die("Error deleting tag: " . $e->getMessage());
        } finally {
            if ($conn) {
                $conn = null;
            }
        }
    }
    public static function tagCount()
    {
        try {
            $conn = Database::connect();

            $sql = "SELECT COUNT(*) as allTag FROM `tag`";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $tagCount = $stmt->fetch(\PDO::FETCH_ASSOC);

            return $tagCount;
        } catch (\PDOException $e) {
            die("Error get tag number " . $e->getMessage());
        } finally {
            if ($conn) {
                $conn = null;
            }
        }
    }
}
?>
