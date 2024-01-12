<?php


namespace App\Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\CategoryModel;
use App\Models\WikiModel;

session_start();

class IndexController
{
    public function index()
    {
        $lastCategories = CategoryModel::getLastCategories();
        $lastWikies = WikiModel::getLastWikies();
        include '../../views/index.php';
        exit();
    }
}