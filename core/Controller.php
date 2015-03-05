<?php

abstract class Controller {

    protected $_view;
    protected $_model;

    public function __construct($a, $c) {
        $this->_view = new View($a, $c);
        $men = new Menu;
        $this->_view->menu = $men->menurol();
    }

    abstract public function index();

    protected function loadModel($app, $modelo) {
        $nombremodelo = $modelo . 'Model';
        $rutaModelo = ROOT . $app . DS . $modelo . DS . $nombremodelo . '.php';

        if (is_readable($rutaModelo)) {
            require_once $rutaModelo;
            $modelo = new $nombremodelo;
            return $modelo;
        } else {
            throw new Exception('Error de modelo');
        }
    }

    protected function getLibrary($libreria) {
        $rutaLibreria = LIB . $libreria . '.php';

        if (is_readable($rutaLibreria)) {
            require_once $rutaLibreria;
        } else {
            throw new Exception('Error de libreria');
        }
    }

}

?>
