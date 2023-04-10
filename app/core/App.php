<?php
class App
{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->urlParser();

        // Controller
        if (file_exists('../controllers/' . ucwords($url[0]) . '.php')) {
            $this->controller = ucwords($url[0]);
            unset($url[0]);
        }

        require_once("../app/controllers/$this->controller.php");
        $this->controller = new $this->controller();

        // Method
        if (isset($url[1])) {
            if (method_exists($this->controller, strtolower($url[1]))) {
                $this->method = $url;
                unset($url[1]);
            }
        }

        // Params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function urlParser()
    {
        if (isset($_GET['url'])) {
            $url = $_GET['url'];

            // Remove slash in last word
            $url = rtrim($url);

            // Filter url
            $url = filter_var($url, FILTER_SANITIZE_URL);

            // Convert url to array
            $url = explode('/', $url);

            return $url;
        }
    }
}
