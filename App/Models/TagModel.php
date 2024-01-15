<?php

namespace App\Models;
require_once __DIR__.'/../../vendor/autoload.php';
use App\DAO\TagDAO;

class TagModel
{
    private $id;
    private $tagName;

    public function __construct($id, $tagName)
    {
        $this->id = $id;
        $this->tagName = $tagName;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTagName()
    {
        return $this->tagName;
    }

    public function setTagName($tagName)
    {
        $this->tagName = $tagName;
    }

    public static function getAllTags()
    {
        return TagDAO::getAllTags();
    }

    public static function getTagById($tagId)
    {
        return TagDAO::getTagById($tagId);
    }

    public static function addTag($tagName)
    {
        TagDAO::addTag($tagName);
    }

    public static function editTag($tagId, $newTagName)
    {
        TagDAO::editTag($tagId, $newTagName);
    }

    public static function deleteTag($tagId)
    {
        TagDAO::deleteTag($tagId);
    }
    public static function tagCount(){
        return TagDAO::tagCount();
    }
}
