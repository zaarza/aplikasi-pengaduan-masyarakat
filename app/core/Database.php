<?php
class Database
{
    private $databaseHost = DATABASE_HOST;
    private $databaseName = DATABASE_NAME;
    private $databaseUsername = DATABASE_USERNAME;
    private $databasePassword = DATABASE_PASSWORD;
    private $databaseHandler;
    private $statement;

    public function __construct()
    {
        $databaseSourceName = "mysql:host=$this->databaseHost;dbname=$this->databaseName";
        $options = [
            PDO::ATTR_ERRMODE => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];

        try {
            $this->databaseHandler = new PDO($databaseSourceName, $this->databaseUsername, $this->databasePassword, $options);
        } catch (PDOException $error) {
            echo $error->getMessage();
            die;
        }
    }

    public function query($query)
    {
        $this->statement = $this->databaseHandler->prepare($query);
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }

        $this->statement->bindValue($param, $value, $type);
    }

    public function execute()
    {
        $this->statement->execute();
    }

    public function getSingleResult()
    {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getManyResult()
    {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function rowCount()
    {
        return $this->statement->rowCount();
    }
}
