<?php

namespace App\Model;

use App\DAO\RoleDAO;

class RoleModel
{
    private $id;
    private $roleName;

    public function __construct($id, $roleName)
    {
        $this->id = $id;
        $this->roleName = $roleName;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getRoleName()
    {
        return $this->roleName;
    }

    public function setRoleName($roleName)
    {
        $this->roleName = $roleName;
    }

    public static function getAllRoles()
    {
        return RoleDAO::getAllRoles();
    }

    public static function getRoleById($roleId)
    {
        return RoleDAO::getRoleById($roleId);
    }

    public static function addRole($roleName)
    {
        RoleDAO::addRole($roleName);
    }
}
