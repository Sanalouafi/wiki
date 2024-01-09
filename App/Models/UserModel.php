<?php

namespace App\Models;

use App\DAO\UserDAO;

class UserModel
{
    private $id;
    private $fullname;
    private $email;
    private $password;
    private $photo;
    private $roleId;

    public function __construct($id, $fullname, $email, $password, $photo, $roleId)
    {
        $this->id = $id;
        $this->fullname = $fullname;
        $this->email = $email;
        $this->password = $password;
        $this->photo = $photo;
        $this->roleId = $roleId;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFullname()
    {
        return $this->fullname;
    }

    public function setFullname($fullname)
    {
        $this->fullname = $fullname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    public function getRoleId()
    {
        return $this->roleId;
    }

    public function setRoleId($roleId)
    {
        $this->roleId = $roleId;
    }

    public static function getAllUsers()
    {
        return UserDAO::getAllUsers();
    }

    public static function getUserById($userId)
    {
        return UserDAO::getUserById($userId);
    }

    public static function registerUser($fullname, $email, $password, $photo, $roleId)
    {
        UserDAO::registerUser($fullname, $email, password_hash($password, PASSWORD_DEFAULT), $photo, $roleId);
    }

    public static function loginUser($email, $password)
    {
        return UserDAO::loginUser($email, $password);
    }

    public static function getUserByEmail($email)
    {
        return UserDAO::getUserByEmail($email);
    }

    public static function editUser($userId, $fullname, $email, $password, $photo, $roleId)
    {
        UserDAO::editUser($userId, $fullname, $email, $password, $photo, $roleId);
    }

    public static function deleteUser($userId)
    {
        UserDAO::deleteUser($userId);
    }
}
