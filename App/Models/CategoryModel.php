<?php

namespace App\Model;

use App\DAO\CategoryDAO;

class CategoryModel
{
    private $id;
    private $categoryName;

    public function __construct($id, $categoryName)
    {
        $this->id = $id;
        $this->categoryName = $categoryName;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCategoryName()
    {
        return $this->categoryName;
    }

    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;
    }

    public static function getAllCategories()
    {
        return CategoryDAO::getAllCategories();
    }

    public static function getCategoryById($categoryId)
    {
        return CategoryDAO::getCategoryById($categoryId);
    }

    public static function addCategory($categoryName)
    {
        CategoryDAO::addCategory($categoryName);
    }

    public static function editCategory($categoryId, $newCategoryName)
    {
        CategoryDAO::editCategory($categoryId, $newCategoryName);
    }

    public static function deleteCategory($categoryId)
    {
        CategoryDAO::deleteCategory($categoryId);
    }
}
