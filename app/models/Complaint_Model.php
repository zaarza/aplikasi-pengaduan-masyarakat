<?php
class Complaint_Model
{
    public $database;
    public $tableName = "complaints";
    public $errorMessage;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    public function uploadImage($image)
    {
        if ($image['image']['error'] === 4) {
            $this->errorMessage = "Tidak ada gambar yang diunggah";
            return false;
        }

        $fileType = explode('.', $image['image']['name']);
        $fileType = end($fileType);
        $fileType = strtolower($fileType);

        $supportedFormats = ['jpg', 'png', 'jpeg'];

        if (!in_array($fileType, $supportedFormats)) {
            $this->errorMessage = "Format gambar tidak didukung";
            return false;
        }

        $maxSize = 5000000;

        if ($image['image']['size'] > $maxSize) {
            $this->errorMessage = "Ukuran maksimal gambar adalah 5MB";
            return false;
        }

        $newFileName = time() . '.' . $fileType;
        $directory = "assets/images/uploaded/$newFileName";

        move_uploaded_file($image['image']['tmp_name'], $directory);

        return $newFileName;
    }

    public function addComplaint($data, $image)
    {
        $image = $this->uploadImage($image);

        if (!$image) {
            $this->errorMessage = "Tidak ada gambar yang diunggah";
            return false;
        }

        $this->database->query("INSERT INTO $this->tableName VALUES (NULL, :userId, :title, :description, :location, :image, :createdAt, NULL, 0)");
        $this->database->bind("userId", intval($_SESSION['user']['id']));
        $this->database->bind("title", $data['title']);
        $this->database->bind("description", $data['description']);
        $this->database->bind("location", $data['location']);
        $this->database->bind("image", $image);
        $this->database->bind("createdAt", strval(time()));

        $this->database->execute();
        return true;
    }

    public function getCurrentUserComplaint()
    {
        $userId = intval($_SESSION['user']['id']);
        $this->database->query("SELECT * FROM complaints WHERE complaints.user_id = $userId");

        return $this->database->getManyResult();
    }

    public function deleteComplaint($id)
    {
        $this->database->query("DELETE FROM $this->tableName WHERE id=:id");
        $this->database->bind("id", intval($id));

        $this->database->execute();
    }

    public function getDetailComplaint($id)
    {
        $this->database->query("SELECT * FROM $this->tableName WHERE id=:id");
        $this->database->bind("id", intval($id));

        $data = $this->database->getSingleResult();
        return $data;
    }

    public function updateComplaint($data, $image)
    {
        if ($image['image']['error'] === 4) {
            $this->database->query("UPDATE $this->tableName SET title=:title, description=:description, location=:location, editedAt=:editedAt WHERE id=:id");
        } else {
            $image = $this->uploadImage($image);

            if (!$image) {
                return false;
            };

            $this->database->query("UPDATE $this->tableName SET title=:title, description=:description, location=:location, image=:image, editedAt=:editedAt WHERE id=:id");
            $this->database->bind('image', strval($image));
        }

        $this->database->bind("title", $data['title']);
        $this->database->bind("description", $data['description']);
        $this->database->bind("location", $data['location']);
        $this->database->bind("editedAt", strval(time()));
        $this->database->bind("id", intval($data['id']));

        $this->database->execute();
        return $this->database->rowCount();
    }
}
