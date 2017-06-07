<?php

class UserView
{
    public function showAllUser($listUsers)
    {
        require_once 'templates/list-users.php';
    }

    public function addUser()
    {
        require_once 'templates/add-user.php';
    }

    public function editUser($detailUser)
    {
        require_once 'templates/edit-user.php';
    }
}
