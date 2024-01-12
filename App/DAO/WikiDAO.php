<?php

namespace App\DAO;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Database\Database;

class WikiDAO
{
    public static function getAllWikis()
    {
        try {
            $conn = Database::connect();

            $sql = "SELECT * FROM `wiki`";
            $stmt = $conn->query($sql);
            $wikis = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            return $wikis;
        } catch (\PDOException $e) {
            die("Error getting wikis: " . $e->getMessage());
        } finally {
            if ($conn) {
                $conn = null;
            }
        }
    }
    public static function getAllowWikis()
    {
        try {
            $conn = Database::connect();

            $sql = "SELECT * FROM `wiki` where `status`='allow'";
            $stmt = $conn->query($sql);
            $wikis = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            return $wikis;
        } catch (\PDOException $e) {
            die("Error getting wikis: " . $e->getMessage());
        } finally {
            if ($conn) {
                $conn = null;
            }
        }
    }

    public static function getWikiById($wikiId)
    {
        try {
            $conn = Database::connect();

            $sql = "SELECT
            w.*,
            u.fullname,
            u.email,
            u.photo,
            c.category_name,
            GROUP_CONCAT(t.tag_name SEPARATOR '#') AS tag_names
        FROM
            wiki w
        JOIN
            user u ON w.user_id = u.id
        JOIN
            category c ON w.category_id = c.id
        LEFT JOIN
            tag_wiki tw ON w.id = tw.wiki_id
        LEFT JOIN
            tag t ON tw.tag_id = t.id
        WHERE
            w.id = :id
        GROUP BY
            w.id;
        ";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $wikiId, \PDO::PARAM_INT);
            $stmt->execute();
            $wiki = $stmt->fetch(\PDO::FETCH_ASSOC);

            return $wiki;
        } catch (\PDOException $e) {
            die("Error getting wiki by ID: " . $e->getMessage());
        } finally {
            if ($conn) {
                $conn = null;
            }
        }
    }

    public static function addWiki($title, $content, $status, $image, $categoryId, $userId, $tags)
    {
        try {
            $conn = Database::connect();

            $conn->beginTransaction();

            $sql = "INSERT INTO `wiki` (`title`, `content`, `status`, `image`, `category_id`, `user_id`, `create_at`) 
                    VALUES (?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $title, \PDO::PARAM_STR);
            $stmt->bindParam(2, $content, \PDO::PARAM_STR);
            $stmt->bindParam(3, $status, \PDO::PARAM_STR);
            $stmt->bindParam(4, $image, \PDO::PARAM_STR);
            $stmt->bindParam(5, $categoryId, \PDO::PARAM_INT);
            $stmt->bindParam(6, $userId, \PDO::PARAM_INT);
            $stmt->execute();

            $lastInsertedId = $conn->lastInsertId();

            self::insertTagsForWiki($lastInsertedId, $tags, $conn);

            $conn->commit();
        } catch (\PDOException $e) {
            $conn->rollBack();
            die("Error adding wiki: " . $e->getMessage());
        } finally {
            if ($conn) {
                $conn = null;
            }
        }
    }

    private static function insertTagsForWiki($wikiId, $tags, $conn)
    {
        $sqlTagWiki = "INSERT INTO `tag_wiki` (`tag_id`, `wiki_id`) VALUES (?, ?)";
        $stmtTagWiki = $conn->prepare($sqlTagWiki);

        foreach ($tags as $tagId) {
            $stmtTagWiki->execute([$tagId, $wikiId]);
        }
    }

    public static function editWiki($wikiId, $title, $content, $status, $image, $categoryId, $userId, $tags)
    {
        try {
            $conn = Database::connect();

            $conn->beginTransaction();

            $sql = "UPDATE `wiki` 
                    SET `title` = ?, `content` = ?, `status` = ?, `image` = ?, `category_id` = ?, `user_id` = ? 
                    WHERE `id` = ?";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $title, \PDO::PARAM_STR);
            $stmt->bindParam(2, $content, \PDO::PARAM_STR);
            $stmt->bindParam(3, $status, \PDO::PARAM_STR);
            $stmt->bindParam(4, $image, \PDO::PARAM_STR);
            $stmt->bindParam(5, $categoryId, \PDO::PARAM_INT);
            $stmt->bindParam(6, $userId, \PDO::PARAM_INT);
            $stmt->bindParam(7, $wikiId, \PDO::PARAM_INT);
            $stmt->execute();

            self::deleteTagsForWiki($wikiId, $conn);

            self::insertTagsForWiki($wikiId, $tags, $conn);

            $conn->commit();
        } catch (\PDOException $e) {
            $conn->rollBack();
            die("Error editing wiki: " . $e->getMessage());
        } finally {
            if ($conn) {
                $conn = null;
            }
        }
    }

    private static function deleteTagsForWiki($wikiId, $conn)
    {
        $sqlDeleteTags = "DELETE FROM `tag_wiki` WHERE `wiki_id` = ?";
        $stmtDeleteTags = $conn->prepare($sqlDeleteTags);
        $stmtDeleteTags->execute([$wikiId]);
    }

    public static function deleteWiki($wikiId)
    {
        try {
            $conn = Database::connect();

            $conn->beginTransaction();

            $sqlDeleteWiki = "DELETE FROM `wiki` WHERE `id` = ?";
            $stmtDeleteWiki = $conn->prepare($sqlDeleteWiki);
            $stmtDeleteWiki->execute([$wikiId]);

            self::deleteTagsForWiki($wikiId, $conn);

            $conn->commit();
        } catch (\PDOException $e) {
            $conn->rollBack();
            die("Error deleting wiki: " . $e->getMessage());
        } finally {
            if ($conn) {
                $conn = null;
            }
        }
    }

    public static function updateStatusWiki($wikiId, $newStatus)
    {
        try {
            $conn = Database::connect();

            $sql = "UPDATE `wiki` SET `status` = ? WHERE `id` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $newStatus, \PDO::PARAM_STR);
            $stmt->bindParam(2, $wikiId, \PDO::PARAM_INT);
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

    public static function getUserWikies($userId)
    {
        try {
            $conn = Database::connect();

            $sql = "SELECT * FROM `wiki` WHERE `user_id` = ? AND `status`= 'allow'";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $userId, \PDO::PARAM_INT);
            $stmt->execute();
            $wikies = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            return $wikies;
        } catch (\PDOException $e) {
            die("Error getting user's wikies: " . $e->getMessage());
        } finally {
            if ($conn) {
                $conn = null;
            }
        }
    }

    public static function updateWikisForAuthor($wikiId, $title, $category, $image, $description, $user_id, $tags)
    {
        try {
            $conn = Database::connect();
            $sql = "UPDATE wiki SET title = ?, content = ?, image = ?, user_id = ?, category_id = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$title , $description , $image , $user_id , $category , $wikiId]);

            $deleteSql = "DELETE FROM tag_wiki WHERE wiki_id = ?";
            $deleteStmt = $conn->prepare($deleteSql);
            $deleteStmt->bindParam(1, $wikiId);
            $deleteStmt->execute();

            self::insertTagsForWiki($wikiId, $tags,$conn);
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public static function getLastWikies()
    {
        try {
            $conn = Database::connect();
            $sql = "SELECT * FROM `wiki` ORDER BY `id` DESC LIMIT 3";
            $stmt = $conn->query($sql);
            $lastWikies = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $lastWikies;
            
        } catch (\PDOException $e) {
            die("Error getting last wikies: " . $e->getMessage());
        } finally {
            if ($conn) {
                $conn = null;
            }
        }
    }
}
