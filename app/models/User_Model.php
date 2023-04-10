<?php

class User_Model
{
    private $tableName = 'users';
    private $database;
    private $errorMessage;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    public function register($data)
    {
        // Validation
        // All input must be filled
        if (
            empty($data['nik']) ||
            empty($data['fullName']) ||
            empty($data['address']) ||
            empty($data['phoneNumber']) ||
            empty($data['password'])
        ) {
            $this->errorMessage = "Semua data harus terisi";
            return false;
        }

        // NIK must 16 digit number
        if (intval($data['nik']) === 0 || strlen(strval($data['nik'])) < 16 || strlen(strval($data['nik'])) > 16) {
            $this->errorMessage = "NIK harus berisi 16 digit angka";
            return false;
        }

        // Fullname must be letter
        if (!preg_match("/^([a-zA-Z' ]+)$/", $data['fullName'])) {
            $this->errorMessage = "Nama hanya boleh berisi huruf";
            return false;
        }

        // Fullname max length is 50 letter
        if (strlen($data['fullName']) > 50) {
            $this->errorMessage = "Panjang maksimal nama adalah 50 huruf";
            return false;
        }

        // Address min length is 15
        if (strlen($data['address']) < 15) {
            $this->errorMessage = "Alamat harus lengkap";
            return false;
        }

        // Phone number must be number
        if (intval($data['phoneNumber']) === 0) {
            $this->errorMessage = "Nomor harus berupa angka";
            return false;
        }

        // Phone number minimum length is 12 and max is 13
        if (strlen(strval($data['phoneNumber'])) < 11 || strlen(strval($data['phoneNumber'])) > 13) {
            $this->errorMessage = "Nomor telepon salah";
            return false;
        }

        if (strlen(strval($data['password'])) < 8) {
            $this->errorMessage = "Password harus berisi minimal 8 karakter";
            return false;
        }

        // NIK must be unique
        $this->database->query("SELECT * FROM $this->tableName WHERE nik=:nik");
        $this->database->bind("nik", intval($data['nik']));

        $result = $this->database->getManyResult();

        if (!empty($result)) {
            $this->errorMessage = "NIK telah terdaftar";
            return false;
        }

        $this->database->query("INSERT INTO $this->tableName VALUES (NULL, :nik, :fullName, :address, :phoneNumber, :password, :userLevel)");
        $this->database->bind("fullName", $data['fullName']);
        $this->database->bind("address", $data['address']);
        $this->database->bind("nik", intval($data['nik']));
        $this->database->bind("phoneNumber", intval('62' . strval($data['phoneNumber'])));
        $this->database->bind("password", password_hash($data['password'], PASSWORD_DEFAULT));
        $this->database->bind("userLevel", intval(0));

        $this->database->execute();
        return true;
    }

    public function login($data)
    {
        // Check NIK
        $this->database->query("SELECT * FROM $this->tableName WHERE nik=:nik");
        $this->database->bind("nik", $data['nik']);
        $this->database->execute();

        $result = $this->database->getSingleResult();

        if (empty($result)) {
            $this->errorMessage = "NIK tidak terdaftar";
            return false;
        }

        // Check password
        if (password_verify($data['password'], $result['password'])) {
            $_SESSION['user'] = $result;
            return true;
        }

        $this->errorMessage = "Password salah";
        return false;
    }
}
