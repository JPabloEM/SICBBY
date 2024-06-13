<?php
require_once("Models/TCliente.php");
require_once("Models/LoginModel.php");

class Corredor extends Controllers
{
    use TCliente;
    public $login;

    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->login = new LoginModel();
    }

    public function Corredor()
    {
      //  $data['page_tag'] = defined('NOMBRE_EMPRESA') ? NOMBRE_EMPRESA : "Nombre de la Empresa"; // Verifica si la constante está definida
      //  $data['page_title'] = defined('NOMBRE_EMPRESA') ? NOMBRE_EMPRESA : "Nombre de la Empresa"; // Verifica si la constante está definida
        $data['page_name'] = "Ptemplate";
        //$data['productos'] = $this->getProductosT();
        $pagina = 1;

        $this->views->getView($this, "Ptemplate", $data);
    }

    public function voluntario()
    {
        // Configura el encabezado para indicar que se envía una respuesta JSON
        // header('Content-Type: application/json');
        //$arrResponse = array('status' => false, 'msg' => "No es posible enviar la inscribcion."); // Mensaje de error predeterminado
        if ($_POST) {

            $identificacion_volunteer = ucwords(strtolower(strClean($_POST['identificacion_volunteer'])));
            $frist_name_volunteer = strtolower(strClean($_POST['frist_name_volunteer']));
            $last_name_volunteer = strtolower(strClean($_POST['last_name_volunteer']));
            $email = strtolower(strClean($_POST['email']));
            $address_volunteer = strtolower(strClean($_POST['address_volunteer']));
            $age_volunteer = ucwords(strtolower(strClean($_POST['age_volunteer'])));
            $general = isset($_POST['voluntarioGeneralValue']) ? $_POST['voluntarioGeneralValue'] : '';
            $actividad = isset($_POST['actividadSeleccionadaValue']) ? $_POST['actividadSeleccionadaValue'] : '';
     

            $mensaje = strClean($_POST['mensaje']);
            $ocupation_volunteer = strtolower(strClean($_POST['ocupation_volunteer']));
            $phone_number_volunteer = strtolower(strClean($_POST['phone_number_volunteer']));

            $request_voluntario = $this->setVoluntarioT($identificacion_volunteer, $frist_name_volunteer, $last_name_volunteer, $email, $address_volunteer, $age_volunteer,  $general,  $actividad, $mensaje, $ocupation_volunteer, $phone_number_volunteer);



            if ($request_voluntario > 0) {

                if ($request_voluntario == "exist") {
                    $arrResponse = array('status' => false, 'msg' => '¡Atención! Usted ya envió sus datos para ser voluntario general.');
                } elseif ($request_voluntario == "exist2") {
                    $arrResponse = array('status' => false, 'msg' => '¡Atención! Usted ya envió sus datos para anotarse en esta actividad.');
                } else {
                    $arrResponse = array('status' => true, 'msg' => 'Su inscripción para ser voluntario fue enviada correctamente.');
            

                    // $dataUsuario = array('nombre' =>  $frist_name_volunteer,
                    // 			 'email' => $email,
                    // 				 'asunto' => 'Bienvenido voluntario - '.NOMBRE_REMITENTE,
                    // 				 'url_recovery' => $url_recovery);

                    //  sendEmail($dataUsuario,'email_bienvenida');
                    //    Enviar correo
                   $dataUsuario = array(
                        'asunto' => 'Bienvenido voluntario - ' . NOMBRE_REMITENTE,
                        'email' => EMAIL_CONTACTO,
                        'nombre' => $frist_name_volunteer,
                        'emaiil' => $email,
                    );
                    sendEmail($dataUsuario, "email_bienvenida");
                
                }
            } else {
                $arrResponse = array("status" => false, "msg" => 'No fue posible en envío de se inscripción para ser voluntario.');
            }



            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
    public function contacto()
    {
        if ($_POST) {
            //dep($_POST);
            $nombre = ucwords(strtolower(strClean($_POST['nombreContacto'])));
            $email  = strtolower(strClean($_POST['emailContacto']));
            $mensaje  = strClean($_POST['mensaje']);
            $useragent = $_SERVER['HTTP_USER_AGENT'];
            $ip        = $_SERVER['REMOTE_ADDR'];
            $dispositivo = "PC";

            if (preg_match("/mobile/i", $useragent)) {
                $dispositivo = "Movil";
            } else if (preg_match("/tablet/i", $useragent)) {
                $dispositivo = "Tablet";
            } else if (preg_match("/iPhone/i", $useragent)) {
                $dispositivo = "iPhone";
            } else if (preg_match("/iPad/i", $useragent)) {
                $dispositivo = "iPad";
            }

            $userContact = $this->setContacto($nombre, $email, $mensaje, $ip, $dispositivo, $useragent);

            if ($userContact > 0) {

                if ($userContact == "exist") {
                    $arrResponse = array('status' => false, 'msg' => '¡Atención! este email ya envío un mensaje duda o consulta, espere a que nos comuniquemos con usted!');
                } else {

                    $arrResponse = array('status' => true, 'msg' => "Su mensaje fue enviado correctamente.");
                    //    Enviar correo
                    $dataUsuario = array(
                        'asunto' => "Nuevo Usuario en contacto",
                        'email' => EMAIL_CONTACTO,
                        'nombreContacto' => $nombre,
                        'emailContacto' => $email,
                        'mensaje' => $mensaje
                    );
                    sendEmail($dataUsuario, "email_contacto");
                
                }
            } else {
                $arrResponse = array('status' => false, 'msg' => "No es posible enviar el mensaje, duda o consulta.");
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function Charla()
    {

        $arrData = $this->selectCharlas();

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);

        die();
    }

    public function Taller()
    {

        $arrData = $this->selectTalleres();

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);

        die();
    }

    public function Voluntariado()
    {

        $arrData = $this->selectVoluntariados();

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);

        die();
    }
}