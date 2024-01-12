<?php

namespace App\Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\UserModel;

session_start();
class AdminController
{
    public function dashboard()
    {      

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
}
