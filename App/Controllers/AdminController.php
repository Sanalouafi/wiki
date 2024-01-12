<?php

namespace App\Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\UserModel;
use App\Models\WikiModel;

session_start();
class AdminController
{
    public function dashboard()
    {
        $wikies = WikiModel::getAllWikis();
        include '../../views/admin/dashboard.php';
        exit();
    }
    public function author()
    {
        $role_id = 2;
        $authors = UserModel::getAuthors($role_id);
        include '../../views/admin/author.php';
        exit();
    }
    public function updateStatusWiki()
    {
        $id = $_GET['id'];
        $status = $_GET['status'];

        if ($status == 'allow') {
            WikiModel::updateStatusWiki($id, 'allow');
        } else {
            WikiModel::updateStatusWiki($id, 'deny');
        }

        header("Location: dashboard");
        exit();
    }
    public function logout()
    {
        UserModel::logout();
        header("Location: signin");
        exit();
    }
}
