<?php

//aqui va la configuracion general del mvc

define('BASE_URL', 'http://localhost/sicefamvc/');
define('BASE_URL_LIB', BASE_URL . 'core/library/');
define('DEFAULT_APP', 'portal');
define('DEFAULT_MODULO', 'inicio');
define('DEFAULT_CONTROLLER', 'inicio');
define('DEFAULT_METHOD', 'index');
define('DEFAULT_LAYOUT', 'sicefa');

define('APP_NAME', "SICEFA");
define('APP_COMPANY', ' - Equipo ADSI');
define('COMPANY_CONTACT', 'SENA - Centro de Formación Agroindustrial "La Angostura"');

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '123');
define('DB_NAME', 'sicefa');
define('DB_CHAR', 'utf8');

//aqui se definen las librerias y frameworks js y css
define('COMMON', BASE_URL . 'public/common/');
$icn = "<link rel='icon' href='" . COMMON . "img/favicon.ico'>";
define('ICON', $icn);
$jqy = "<script src='" . COMMON . "jquery/jquery-2.1.3.min.js'></script>";
define('FW_JQUERY', $jqy);
$boot = "<link href='" . COMMON . "bootstrap/css/bootstrap.min.css' rel='stylesheet'>
        <script src='" . COMMON . "bootstrap/js/bootstrap.min.js'></script>";
define('FW_BOOTSTRAP', $boot);
$sysc = "<link href='" . COMMON . "simplyscroll/jquery.simplyscroll.css' rel='stylesheet'>
        <script src='" . COMMON . "simplyscroll/jquery.simplyscroll.min.js'></script>";
define('LIB_SIMPLYSCROLL', $sysc);
$datab = "<link href='" . COMMON . "datatables/media/css/jquery.dataTables.min.css' rel='stylesheet'>"
        . "<script src='" . COMMON . "datatables/media/js/jquery.dataTables.min.js'></script>"
        . "<link href='" . COMMON . "datatables/extensions/Responsive/css/dataTables.responsive.css' rel='stylesheet'>"
        . "<script src='" . COMMON . "datatables/extensions/Responsive/js/dataTables.responsive.js'></script>"
        . "<link href='" . COMMON . "datatables/extensions/TableTools/css/dataTables.tableTools.css' rel='stylesheet'>"
        . "<script src='" . COMMON . "datatables/extensions/TableTools/js/dataTables.tableTools.js'></script>"
        . "<script src='" . COMMON . "js/datatable_es.js'></script>";
define('LIB_DATATABLE', $datab);
$valid = "<link href='" . COMMON . "formvalidation/dist/css/bootstrapValidator.css' rel='stylesheet'>"
        . "<script src='" . COMMON . "formvalidation/dist/js/bootstrapValidator.js'></script>"
        . "<script src='" . COMMON . "formvalidation/dist/js/language/es_CL.js'></script>"
        . "<script src='" . COMMON . "js/validar.js'></script>";
define('LIB_VALIDATOR', $valid);
$alert = "<link href='" . COMMON . "jalerts/jquery.alerts.css' rel='stylesheet'>"
        . "<script src='" . COMMON . "jalerts/jquery.ui.draggable.js'></script>"
        . "<script src='" . COMMON . "jalerts/jquery.alerts.mod.js'></script>";
define('LIB_JALERTS', $alert);

$jpt = "<script src='" . COMMON . "printpage/jquery.printPage.js'></script>";
define('LIB_PRINT', $jpt);

$jsv = "<script src='" . COMMON . "js/page.js'></script>";
define('JS_PAGE', $jsv);
$jqy = "<script src='" . COMMON . "js/ajax.js'></script>";
define('JS_AJAX', $jqy);
$jcl = "<script src='" . COMMON . "js/clona.js'></script>";
define('JS_CLON', $jcl);
$boot = "<link href='" . COMMON . "css/general.css' rel='stylesheet'>";
define('CSS_GENERAL', $boot);

class Funcionesphp {

    public static function DateToQuotedMySQLDate($Fecha) {
        if ($Fecha <> "") {
            $trozos = explode("/", $Fecha);
            return "'" . $trozos[2] . "-" . $trozos[1] . "-" . $trozos[0] . "'";
        } else {
            return "NULL";
        }
    }

    public static function MySQLDateToDate($MySQLFecha) {
        if (($MySQLFecha == "") or ( $MySQLFecha == "0000-00-00")) {
            return "";
        } else {
            return date("d/m/Y", strtotime($MySQLFecha));
        }
    }

    public static function noCache() {
        header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
    }

    public static function fechaservidor() {
        $men = new Menu;
        return $men->fechaactual();
    }

    public static function horaservidor() {
        $men = new Menu;
        return $men->horaactual();
    }

    public static function lectorRSS() {
        
    }

}
