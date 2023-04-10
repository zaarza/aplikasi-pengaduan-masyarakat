<?php

class Auth extends Controller
{
    public function index()
    {
        $data['title'] = 'Daftar';
        $this->view("templates/header", $data);
        $this->view("Auth/register");
        $this->view("templates/footer");
    }

    public function register()
    {
        $model = $this->model("User_Model");

        if ($model->register($_POST)) {
            Flasher::setFlash("Registrasi berhasil, Silahkan isi data untuk masuk", "success");
            header('Location:' . BASE_URL . "/auth/login");
            exit;
        } else {
            Flasher::setFlash($model->getErrorMessage(), "danger");
            header('Location:' . BASE_URL . "/auth");
            exit;
        }
    }

    public function login()
    {
        $data['title'] = 'Masuk';
        $this->view("templates/header", $data);
        $this->view("Auth/login");
        $this->view("templates/footer");
    }

    public function getLogin()
    {
        $model = $this->model("User_Model");

        if ($model->login($_POST)) {
        } else {
            Flasher::setFlash($model->getErrorMessage(), "danger");
            header('Location:' . BASE_URL . "/auth/login");
            exit;
        }
    }

    public function admin()
    {
        $data['title'] = 'Login sebagai Admin/Pengurus';
        $this->view("templates/header", $data);
        $this->view("Auth/admin");
        $this->view("templates/footer");
    }
}
