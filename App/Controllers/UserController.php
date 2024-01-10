<?php

namespace App\Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\UserModel;

class UserController
{

    public function updateStatus()
    {
        $id = $_GET['id'];
        $status = $_GET['status'];
    
        if ($status == 'allow') {
            UserModel::updateStatus($id, 'allow');
        } else {
            UserModel::updateStatus($id, 'deny');
        }
    
        header("Location: author");
        exit();
    }
    public function logout(){
        UserModel::logout();
        header("Location: signin");
        exit();
    }
    
}
