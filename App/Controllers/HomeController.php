<?php


namespace App\Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\CategoryModel;
use App\Models\TagModel;
use App\Models\WikiModel;

session_start();

class HomeController
{
    public function home()
    {
        $lastCategories = CategoryModel::getLastCategories();
        include '../../views/user/home.php';
        exit();
    }
    public function addWiki()
    {
        $categories = CategoryModel::getAllCategories();
        $tags = TagModel::getAllTags();
        include '../../views/user/wiki/addWiki.php';
        exit();
    }
    public function wikies()
    {
        include '../../views/user/wiki/wikies.php';
        exit();
    }


    public function addWikies()
    {
        $title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : null;
        $description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : null;
        $category = isset($_POST['category']) ? htmlspecialchars($_POST['category']) : null;
        $tags = isset($_POST['tags']) ? $_POST['tags'] : null;  // Assuming tags are submitted as an array
        $userId = isset($_POST['userId']) ? htmlspecialchars($_POST['userId']) : null;
        $status = 'deny';

        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $photo = $this->handleImageUpload($_FILES['photo']);
            if (!$photo) {
                $error = "Error uploading file.";
                include '../../views/user/wiki/wikies.php';
                exit();
            }
        } else {
            $photo = null;
        }

        WikiModel::addWiki($title, $description, $status, $photo, $category, $userId, $tags);

        header("Location: wikies");
        exit();
    }



    private function handleImageUpload($file)
    {
        $uploadDir = '/wiki/public/images/';
        $uploadFile = $uploadDir . basename($file['name']);

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
            return $uploadFile;
        } else {
            echo "Error uploading file.";
            return false;
        }
    }
}
