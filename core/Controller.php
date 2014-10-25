<?php

abstract class Controller
{
    protected $_view;
    private $_cont;
    
    public function __construct($v) {
        $this->_view = new View($v);
        $this->_cont=$v;
    }
    
    abstract public function index();
    
    protected function loadModel($modelo)
    {
        $nombremodelo = $modelo . 'Model';
        $rutaModelo = ROOT . $this->_cont . DS . $nombremodelo . '.php';
        
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
        $rutaLibreria = ROOT . $this->_cont . DS . $libreria . '.php';
        
        if(is_readable($rutaLibreria)){
            require_once $rutaLibreria;
        }
        else{
            throw new Exception('Error de libreria');
        }
    }
}

?>
