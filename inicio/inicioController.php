<?php

class inicioController extends Controller {

    public function __construct() {
        parent::__construct("inicio");
    }

    public function index() {
        $this->_view->titulo = 'Pagina de Incio';
        $this->_view->renderizar('inicio', 'default');
    }

    public function consolidado() {
        $empresa = $this->loadModel('empresa');
        $this->_view->vende = $empresa->numvende();
        $this->_view->compra = $empresa->numcompra();
        $agenda = $this->loadModel('agenda');
        $this->_view->programada = $agenda->cprogramada();
        $this->_view->finalizada = $agenda->cfinalizada();
        $data = $this->loadModel('inicio');
        $this->_view->datos = $data->consolidar();
        $this->_view->titulo = 'Consolidado';
        $this->_view->renderizar('consolidado', 'default');
    }

    public function correo() {
        if (isset($_POST['txtCorreo']) && $_POST['txtCorreo'] != '') {
            $this->getLibrary('phpmailer' . DS . 'PHPMailerAutoload');
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'damendez4@misena.edu.co';
            $mail->Password = 'cursosvirtuales';
            $mail->SMTPSecure = "ssl";
            $mail->Port = 465;
//Escribimos el correo de origen de antes
            $mail->From = 'exporurales2014@misena.edu.co';
            $mail->FromName = 'Exporurales 2014'; //titulo del correo
            $email = $_POST['txtCorreo']; //usuarios al que va destinado el correo
            $nombre = "SENA"; //Nombre de usuarios
            $apellidos = ""; //Apellidos si los quieres

            $mail->addAddress($email, $nombre . $apellidos);
            $mail->WordWrap = 50;
            $mail->isHTML(true);
            $mail->Subject = 'Consolidado Rueda de Negocios Exporurales 2014'; //encabezado

            $mail->Body = "Hola soy el contenido del correo";

            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if (!$mail->send()) {
                echo 'No se ha podido mandar el mensaje.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
                exit;
            }
        }

        $this->consolidado();
    }

}
