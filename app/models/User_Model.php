<?php

class User_Model
{
    private $tableName = 'users';
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function register($data)
    {
        $this->database->query("INSERT INTO $this->tableName VALUES (NULL, :nik, :fullName, :address, :numberPhone, :password, :userLevel)");
        $this->database->bind("nik", intval($data['nik']));
        $this->database->bind("fullName", $data['fullName']);
        $this->database->bind("address", $data['address']);
        $this->database->bind("numberPhone", intval($data['numberPhone']));
        $this->database->bind("password", $data['password']);
        $this->database->bind("userLevel", intval(0));

        $this->database->execute();
        return $this->database->rowCount();
    }
}
