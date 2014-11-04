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
        $this->_view->vende = count($empresa->numvende());
        $this->_view->compra = count($empresa->numcompra());
        $agenda = $this->loadModel('agenda');
        $this->_view->programada = $agenda->cprogramada();
        $this->_view->finalizada = $agenda->cfinalizada();
        $data = $this->loadModel('inicio');
        $this->_view->datos = $data->consolidar();
        $this->_view->titulo = 'Consolidado';
        $this->_view->renderizar('consolidado', 'default');
    }

    public function resumen() {
        $enviar = filter_input(INPUT_POST, 'enviar');
        if ($enviar) {
            $strHTML = "<html>
                <head>
                <meta charset='utf-8'>
                    </head>
                <style>
                #wrapper{
    padding:10px;
}

@page{margin: 0.2in 0.5in 0.2in 0.5in;}
</style>
<body>
                     <div>   
        <h3>Informe Consolidado Rueda de Negocios</h3>
                    </div>
                    <div>
                        <div><label>Empresas Vendedoras: </label>".$_POST['txtCompra']."</div>
                        <div><label>Empresas Compradoras: </label>".$_POST['txtVende']."</div>
                    </div>                            
            <hr>
    <div>
    <div><label>Citas Programadas: </label>".$_POST['txtProgram']."</div>
    <div><label>Contactos Realizados: </label>".$_POST['txtFinal']."</div>
                   
    </div>
  <hr>
  <div>
        <div>
    <label>NEGOCIOS LLEVADOS A FELIZ TERMINO</label>
        </div>
        </div>
 <div>
    <table>
        <tr>
        <th><label>Categoria</label></th>
        <th><label>Cantidad</label></th>
        <th><label>Valor</label></th>
        </tr>
        ";
        $cat=$_POST['txtCategoria'];
        $num=$_POST['txtCantidad'];
        $val=$_POST['txtValor'];
        for($i=0; $i<11;$i++)
        {
            $strHTML=$strHTML."<tr>
            <td>".htmlentities($cat[$i])."</td>
        <td align='center'>".$num[$i]."</td>
        <td align='right'>$ ".$val[$i]."</td>
        </tr>";
        }
        $strHTML=$strHTML.'
        </table>
 </div>
 

           <hr>
   <div>
    
        <label>Total negociado: </label>$ '.$_POST['txtTotal'].'
    
   </div>
<h6>SENA - Exporurales 2014</h6>  
</body>
</html>';

            if ($enviar == 'correo') {
                $this->correo($strHTML);
            } elseif ($enviar == 'pdf') {
                $this->pdf($strHTML);
            }else{
                $this->index();
            }
        }
    }

    public function correo($strHTML) {
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

            $mail->Body = $strHTML;

            if (!$mail->send()) {
                echo 'No se ha podido mandar el mensaje.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
                exit;
            }
        }

        $this->consolidado();
    }

    public function pdf($strHTML) {
            require_once (LIB . 'HTMLtoPDFinPHP' . DS . 'dompdf' . DS . 'dompdf_config.inc.php');
            $dompdf = new DOMPDF();
            $dompdf->load_html($strHTML);
            $dompdf->render();
            $dompdf->stream('consolidado exporurales 2014.pdf');
            exit();
    }

}
