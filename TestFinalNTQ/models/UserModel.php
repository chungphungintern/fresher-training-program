<?php
require_once 'Database.php';

class UserModel extends Database
{
    public function loadAllUsers()
    {
        $sql = "select * from user";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function getDetailUser($id)
    {
        $sql = "select * from user where user_id = ?";
        $this->setQuery($sql);
        $param = array($id);
        return $this->loadRow($param);
    }

    public function addUser($username, $pass, $status, $user_email, $user_img)
    {
        $sql = "INSERT INTO `user`(`username`, `pass`, `status`, `user_email`, `user_img`) VALUES (?, ?, ?, ?, ?)";
        $this->setQuery($sql);
        $param = array($username, $pass, $status, $user_email, $user_img);
        return $this->execute($param);
    }

    public function updateUser($username, $pass, $status, $user_email, $user_img, $user_id)
    {
        $sql = "UPDATE `user` SET `username` = ?, `pass` = ?, `status` = ?, `user_email` = ?,`user_img` = ? WHERE `user`.`user_id` = ?";
        $this->setQuery($sql);
        $param = array($username, $pass, $status, $user_email, $user_img, $user_id);
        return $this->execute($param);
    }

    public function deleteUser($id)
    {
        $sql = "delete from user where id = ?";
        $this->setQuery($sql);
        $param = array($id);
        return $this->execute($param);
    }
}

?>
