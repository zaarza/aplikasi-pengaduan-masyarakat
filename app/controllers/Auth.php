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
        if ($this->model("User_Model")->register($_POST) > 0) {
            echo "<script>alert('Register berhasil')</script>";
        } else {
            "<script>alert('Register gagal')</script>";
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
