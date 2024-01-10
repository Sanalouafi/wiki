<?php

namespace App\Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\UserModel;

session_start();
class AuthController
{
    public function signup()
    {
        include '../../views/auth/signUp.php';
        exit();
    }

    public function login()
    {
        include '../../views/auth/login.php';
        exit();
    }

    public function registerUser()
    {
        $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : null;
        $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : null;
        $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : null;
        $roleId = 2;
        $status='allow';
        if (empty($name) || empty($email) || empty($password)) {
            $error = "All fields are required.";
            include '../../views/auth/signUp.php';
            exit();
        }

        $photo = null;
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $photo = $this->handleImageUpload($_FILES['photo']);
            if (!$photo) {
                $error = "Error uploading file.";
                include '../../views/auth/signUp.php';
                exit();
            }
        }

        $registerUser = UserModel::registerUser($name, $email, $password, $photo,$status, $roleId);
        if ($registerUser) {
            header("Location: signin");
            exit();
        } else {
            include '../../views/auth/signUp.php';
            exit();
        }
    }


    private function handleImageUpload($file)
    {
        $uploadDir = '/wiki/public/images/';
        $uploadFile = $uploadDir . basename($file['name']);

        if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
            echo "Image uploaded successfully: " . $uploadFile;
            return $uploadFile;
        } else {
            echo "Error uploading file.";
            return false;
        }
    }


    public function authenticateUser()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $userModel = UserModel::loginUser($email, $password);

        if ($userModel) {

            $userId = $userModel['id'];
            $userName = $userModel['fullname'];
            $userRoleId = $userModel['role_id'];
            $photo = $userModel['photo'];

            $_SESSION['id'] = $userId;
            $_SESSION['name'] = $userName;
            $_SESSION['role_id'] = $userRoleId;
            $_SESSION['photo'] = $photo;

            if ($userRoleId == 1) {
                header("Location: dashboard");
                exit();
            } elseif ($userRoleId == 2) {
                // User logic
                header("Location: signup");
                exit();
            }
        } else {
            include '../../views/auth/login.php';
            exit();
        }
    }
}
