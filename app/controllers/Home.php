<?php
class Home extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['user'])) {
            $data['title'] = 'Beranda';
            $this->view("templates/header", $data);
            $this->view("Home/no-login");
            $this->view("templates/footer");
        } else {
            if ($_SESSION['user']['userLevel'] == 0) {
                $data['title'] = 'Beranda';
                $this->view("templates/header", $data);
                $this->view("Home/public");
                $this->view("templates/footer");
            }
        }
    }
}
