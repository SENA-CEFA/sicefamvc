<?php
session_start();
if (!$_SESSION) {
    $_SESSION['autentificado'] = 'No';
    $_SESSION['perfil'] = '';
    $_SESSION['documento'] = '';
    $_SESSION['usuario'] = '';
    $_SESSION['vota']='';
}
//aqui definimos las rutas de la aplicacion
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);
define('APP_PATH', ROOT . 'core' . DS);
define('LIB', APP_PATH . 'library' . DS);
//incluimos el archivo de configuracion general
require_once APP_PATH . 'Config.php';
require_once APP_PATH . 'Request.php';
require_once APP_PATH . 'Controller.php';
require_once APP_PATH . 'Database.php';
require_once APP_PATH . 'Model.php';
require_once APP_PATH . 'View.php';
require_once APP_PATH . 'Menu.php';

//aqui se instancia el request y se llama al metodo run
try {
    $pag = new Request;
    $pag->run();
} catch (Exception $e) {
    echo $e->getMessage();
}