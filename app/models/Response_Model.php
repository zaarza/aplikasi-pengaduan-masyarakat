<?php

class Response_Model
{
    private $database;
    private $tableName = "responses";
    private $errorMessage;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function addResponse($complaintId, $data)
    {
        $this->database->query("INSERT INTO $this->tableName VALUES (NULL, :responderId, :responseAt, :response, :createdAt, NULL)");

        $this->database->bind("responderId", intval($_SESSION['user']['id']));
        $this->database->bind("responseAt", intval($complaintId));
        $this->database->bind("response", strval($data['response']));
        $this->database->bind("createdAt", intval(time()));

        $this->database->execute();

        return $this->database->rowCount();
    }


    public function deleteResponse($responseId)
    {
        $this->database->query("DELETE FROM $this->tableName WHERE id=:id ");

        $this->database->bind("id", intval($responseId));

        $this->database->execute();

        return $this->database->rowCount();
    }

    public function getAllResponses()
    {
        $this->database->query("SELECT * FROM $this->tableName");

        $result = $this->database->getManyResult();
        return $result;
    }

    public function getCurrentComplaintResponses($complaintId)
    {
        $this->database->query("SELECT $this->tableName.*, users.fullName FROM $this->tableName INNER JOIN users ON $this->tableName.responderId = users.id AND $this->tableName.responseAt=:responseAt");

        $this->database->bind("responseAt", intval($complaintId));

        $data = $this->database->getManyResult();
        return $data;
    }
}
