<?php 

class App {

    private $controller = "MainController"; 
    private $method = "index";
    private $params = [];

    public function __construct()
    {
        $url = $this->splitURL();

        // Check if the controller file exists
        if (!empty($url[0]) && file_exists("../app/controllers/" . ucfirst(strtolower($url[0])) . "Controller.php")) {
            $this->controller = ucfirst(strtolower($url[0])) . "Controller";
            unset($url[0]);
        }

        require_once "../app/controllers/" . $this->controller . ".php";

        $this->controller = new $this->controller;

        // Check if the method exists in the controller
        if (!empty($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        $this->params = array_values($url);

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function splitURL() {
        $url = isset($_GET['url']) ? $_GET['url'] : "layouts/main_layout";
        return explode("/", filter_var(trim($url, "/"), FILTER_SANITIZE_URL));
    }
}
