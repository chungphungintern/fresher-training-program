<?php

class Database
{
    var $connect;
    var $_sql;
    var $_cmd;

    public function __construct()
    {
        try {
            $this->connect = new PDO("mysql:host=localhost;dbname=fresher_user", "root", "");
            $this->connect->query("set names utf8");
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // Assign query statement
    public function setQuery($sql)
    {
        $this->_sql = $sql;
    }

    // Handle the query statement
    public function execute($option = array())
    {
        $this->_cmd = $this->connect->prepare($this->_sql);
        if ($option) {
            for ($i = 0; $i < count($option); $i++) {
                $this->_cmd->bindParam($i + 1, $option[$i]);
            }
        }
        $this->_cmd->execute();

        return $this->_cmd;
    }

    // Get all the data(possible conditions)
    public function loadAllRows($option = array())
    {
        if (!$option) {
            if (!$result = $this->execute())
                return false;
        } else {
            if (!$result = $this->execute($option))
                return false;
        }

        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    // Get a row
    public function loadRow($option = array())
    {
        if (!$option) {
            if (!$result = $this->execute())
                return false;
        } else {
            if (!$result = $this->execute($option))
                return false;
        }

        return $result->fetch(PDO::FETCH_OBJ);
    }

    // Display a data
    public function loadRecord($option = array())
    {
        if (!$option) {
            if (!$result = $this->execute())
                return false;
        } else {
            if (!$result = $this->execute($option))
                return false;
        }

        return $result->fetch(PDO::FETCH_COLUMN);
    }

    // Get last row
    public function getLastId()
    {
        return $this->connect->lastInsertId();
    }

    // Count the number of records
    public function totalRows($option = array())
    {
        if (!$option) {
            if (!$result = $this->execute())
                return false;
        } else {
            if (!$result = $this->execute($option))
                return false;
        }

        return $this->_cmd->rowCount();
    }

    // Disconnect 
    public function disconnect()
    {
        $this->connect = NULL;
    }

}

?>
