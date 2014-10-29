<?php

abstract class Controller
{
    protected $_view;
    
    public function __construct($v) {
        $this->_view = new View($v);
    }
    
    abstract public function index();
    
    protected function loadModel($modelo)
    {
        $nombremodelo = $modelo . 'Model';
        $rutaModelo = ROOT . $modelo . DS . $nombremodelo . '.php';
        
        if(is_readable($rutaModelo)){
            require_once $rutaModelo;
            $modelo = new $nombremodelo;
            return $modelo;
        }
        else {
            throw new Exception('Error de modelo');
        }
    }
    
    protected function getLibrary($libreria)
    {
        $rutaLibreria = LIB . $libreria . '.php';
        
        if(is_readable($rutaLibreria)){
            require_once $rutaLibreria;
        }
        else{
            throw new Exception('Error de libreria');
        }
    }
}

?>
