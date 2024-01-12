<?php

namespace App\Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\CategoryModel;
use App\Models\TagModel;

session_start();
class CategoryController
{
    
    public function categoryAdmin()

    {
        $categories = CategoryModel::getAllCategories();
        $tags = TagModel::getAllTags();
        include '../../views/admin/categoryAdmin.php';
        exit();
    }

    public function addCategory()
    {
        $category_name = isset($_POST['category_name']) ? htmlspecialchars($_POST['category_name']) : null;
        if (empty($category_name)) {
            $error = "All fields are required.";
        } else {
            CategoryModel::addCategory($category_name);
            header("Location:categoryAdmin");
            exit();
        }
    }

    public function editCategory()
    {
        $id = isset($_POST['id']) ? htmlspecialchars($_POST['id']) : null;
        $category_name = isset($_POST['category_name']) ? htmlspecialchars($_POST['category_name']) : null;

        if (empty($category_name)) {
            $error = "All fields are required.";
        } else {
            CategoryModel::editCategory($id, $category_name);
            header("Location:categoryAdmin");
            exit();
        }
    }
    public function deleteCat()
    {
        $id = $_GET['id'];

        CategoryModel::deleteCategory($id);
        header("Location:categoryAdmin");
        exit();
    }
}
