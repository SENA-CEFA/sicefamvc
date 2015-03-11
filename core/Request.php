<?php

class Request {

    private $_app;
    private $_controlador;
    private $_metodo;
    private $_argumentos;

    public function __construct() {
        if (isset($_GET['url'])) {
            $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            $url = array_filter($url);

            $this->_app = strtolower(array_shift($url));
            $this->_controlador = strtolower(array_shift($url));
            $this->_metodo = strtolower(array_shift($url));
            $this->_argumentos = $url;
        }

        if (!$this->_app) {
            $this->_app = DEFAULT_APP;
        }
        if (!$this->_controlador) {
            $this->_controlador = DEFAULT_CONTROLLER;
        }

        if (!$this->_metodo) {
            $this->_metodo = DEFAULT_METHOD;
        }

        if (!isset($this->_argumentos)) {
            $this->_argumentos = array();
        }
    }

    public function run() {
        $app = $this->_app;
        $controller = $this->_controlador;
        $nombrecontroller = $controller . 'Controller';
        $rutaControlador = ROOT . $app . DS . $controller . DS . $nombrecontroller . '.php';
        $metodo = $this->_metodo;
        $args = $this->_argumentos;

        if (is_readable($rutaControlador)) {
            require_once $rutaControlador;
            $controller = new $nombrecontroller;

            if (is_callable(array($controller, $metodo))) {
                $metodo = $this->_metodo;
            } else {
                $metodo = DEFAULT_METHOD;
            }

            if (isset($args)) {
                call_user_func_array(array($controller, $metodo), $args);
            } else {
                call_user_func(array($controller, $metodo));
            }
        } else {
            header('Status: 301 Moved Permanently', false, 301);
            header('Location: ' . BASE_URL . $app);
            exit();
        }
    }

}

?>