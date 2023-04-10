<?php
class Home extends Controller
{
    public function index()
    {
        $data['title'] = 'Beranda';
        $this->view("templates/header", $data);
        $this->view("Home/no-login");
        $this->view("templates/footer");
    }
}
