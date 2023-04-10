<?php
class Index extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['user'])) {
            $data['title'] = 'Beranda';
            $this->view("templates/header", $data);
            $this->view("Index/no-login");
            $this->view("templates/footer");
        } else {
            if ($_SESSION['user']['userLevel'] == 0) {
                $model = $this->model("Complaint_Model");

                $data['title'] = 'Beranda';
                $data['complaints'] = $model->getCurrentUserComplaint();

                $this->view("templates/header", $data);
                $this->view("Index/public", $data);
                $this->view("templates/footer");
            }
        }
    }

    public function addComplaint()
    {
        $model = $this->model("Complaint_Model");

        if ($model->addComplaint($_POST, $_FILES)) {
            Flasher::setFlash("Berhasil menambah aduan", "success");
            header('Location:' . BASE_URL . '/');
            exit;
        } else {
            Flasher::setFlash('Gagal menambahkan aduan! ' . $model->getErrorMessage(), "danger");
            header('Location:' . BASE_URL . '/');
            exit;
        }

        $model->addComplaint($_POST, $_FILES);
    }
}
