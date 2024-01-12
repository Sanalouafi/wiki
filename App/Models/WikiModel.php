<?php

namespace App\Models;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\DAO\WikiDAO;

class WikiModel
{
    private $id;
    private $title;
    private $content;
    private $status;
    private $image;
    private $createdAt;
    private $categoryId;
    private $userId;
    private $tags;

    public function __construct($id, $title, $content, $status, $image, $createdAt, $categoryId, $userId, $tags)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->status = $status;
        $this->image = $image;
        $this->createdAt = $createdAt;
        $this->categoryId = $categoryId;
        $this->userId = $userId;
        $this->tags = $tags;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }

    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    public static function getAllWikis()
    {
        return WikiDAO::getAllWikis();
    }
    public static function getAllowWikis()
    {
        return WikiDAO::getAllowWikis();
    }
    public static function getUserWikies($userId)
    {
        return WikiDAO::getUserWikies($userId);
    }


    public static function getWikiById($wikiId)
    {
        return WikiDAO::getWikiById($wikiId);
    }

    public static function addWiki($title, $content, $status, $image, $categoryId, $userId, $tags)
    {
        WikiDAO::addWiki($title, $content, $status, $image, $categoryId, $userId, $tags);
    }

    public static function editWiki($wikiId, $title, $content, $status, $image, $categoryId, $userId, $tags)
    {
        WikiDAO::editWiki($wikiId, $title, $content, $status, $image, $categoryId, $userId, $tags);
    }

    public static function deleteWiki($wikiId)
    {
        WikiDAO::deleteWiki($wikiId);
    }

    public static function updateStatusWiki($wikiId, $status)
    {

        return WikiDAO::updateStatusWiki($wikiId, $status);
    }
    public static function updateWikisForAuthor($wikiId, $title, $category, $image, $description, $user_id, $tags)
    {
        return WikiDAO::updateWikisForAuthor($wikiId, $title, $category, $image, $description, $user_id, $tags);
    }

    public static function getLastWikies(){
        return WikiDAO::getLastWikies();
    }
    public static function search($word){
        return WikiDAO::search($word);
    }
}
