<?php

class Voluntarioschk extends Controllers
{
	public function __construct()
	{
		parent::__construct();
		session_start();
		session_regenerate_id(true);
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
			die();
		}
		getPermisos(MDVoluntarios);
	}

	public function Voluntarioschk()
	{
		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "Voluntarios";
		$data['page_title'] = "VOLUNTARIOS";
		$data['page_name'] = "voluntarioschk";
		$data['page_functions_js'] = "functions_voluntarioschk.js";
		$this->views->getView($this, "voluntarioschk", $data);
	}


	public function setVoluntario1()
	{
		dep($_POST);
		die();
	}



	public function setVoluntariochk()
	{
		// Configura el encabezado para indicar que se envía una respuesta JSON
		//header('Content-Type: application/json');
		//header("Content-type: application/x-www-form-urlencoded");
		if ($_POST) {
			if (empty($_POST['txtIdentificacion']) || empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtEmail']) || empty($_POST['txtDireccion']) || empty($_POST['txtEdad']) || empty($_POST['txtMensaje']) || empty($_POST['txtTelefono']) || empty($_POST['txtOcupacion']) | empty($_POST['listStatus'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
			} else {
				$idv = intval($_POST['idv']);
				$strIdentificacion = strClean($_POST['txtIdentificacion']);
				$strNombre = ucwords(strClean($_POST['txtNombre']));
				$strApellido = ucwords(strClean($_POST['txtApellido']));
				$strEmail = strtolower(strClean($_POST['txtEmail']));
				$strDireccion = ucwords(strClean($_POST['txtDireccion']));
				$intEdad = intval(strClean($_POST['txtEdad']));
				$strMensaje = ucwords(strClean($_POST['txtMensaje']));
				$strOcupacion = strtolower(strClean($_POST['txtOcupacion']));
				$general = isset($_POST['voluntarioGeneralValue']) ? $_POST['voluntarioGeneralValue'] : '';
				$actividad = isset($_POST['actividadSeleccionadaValue']) ? $_POST['actividadSeleccionadaValue'] : '';
				$intTelefono = intval(strClean($_POST['txtTelefono']));
				$strEstado = ucwords(strClean($_POST['listStatus']));
				$request_voluntario = "";

				if ($idv == 0) {
					$option = 1;
					if ($_SESSION['permisosMod']['w']) {
						$request_voluntario = $this->model->insertVoluntariochk(
							$strIdentificacion,
							$strNombre,
							$strApellido,
							$strEmail,
							$strDireccion,
							$intEdad,
							$general,
							$actividad,
							$strMensaje,
							$strOcupacion,
							$intTelefono,
							$strEstado
						);
					}
				} else {
					$option = 2;
					if ($_SESSION['permisosMod']['u']) {
						$request_voluntario = $this->model->updateVoluntariochk(
							$idv,
							$strIdentificacion,
							$strNombre,
							$strApellido,
							$strEmail,
							$strDireccion,
							$intEdad,
							$general,
							$actividad,
							$strMensaje,
							$strOcupacion,
							$intTelefono,
							$strEstado

						);
					}
				}

				if ($request_voluntario > 0) {
					if ($option == 1) {
						if ($request_voluntario == "exist") {
							$arrResponse = array('status' => false, 'msg' => '¡Atención! Usted ya envió sus datos para ser voluntario general.');
						} elseif ($request_voluntario == "exist2") {
							$arrResponse = array('status' => false, 'msg' => '¡Atención! Usted ya envió sus datos para anotarse en esta actividad.');
						} else {
							$arrResponse = array('status' => true, 'msg' => 'Datos de voluntario ingresado correctamente.');

							//$nombre = $strNombre.' '.$strApellido;
							//$url_recovery = base_url();
							//$dataUsuario = array('nombre' => $nombre,
							//				 'email' => $strEmail,
							//				 'asunto' => 'Bienvenido voluntario - '.NOMBRE_REMITENTE,
							//				 'url_recovery' => $url_recovery);

							//	 sendEmail($dataUsuario,'email_bienvenida');
						}
					} else {
						$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
					}
				} else {
					$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}


	public function getVoluntariosSI()
	{
		if ($_SESSION['permisosMod']['r']) {
			$arrData = $this->model->selectVoluntariosSI();
			for ($i = 0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';
				if ($_SESSION['permisosMod']['r']) {
					$btnView = '<button class="btn btn-info btn-sm btnViewVoluntario" onClick="fntViewVoluntariochk(' . $arrData[$i]['id'] . ')" title="Ver voluntario"><i class="far fa-eye"></i></button>';
				}
				if ($_SESSION['permisosMod']['u']) {
					$btnEdit = '<button class="btn btn-primary btn-sm btnEditVoluntario" onClick="fntEditVoluntariochk(this,' . $arrData[$i]['id'] . ')" title="Editar voluntario"><i class="fas fa-pencil-alt"></i></button>';
				}
				if ($_SESSION['permisosMod']['d']) {
					$btnDelete = '<button class="btn btn-danger btn-sm btnDelVoluntario" onClick="fntDelVoluntariochk(' . $arrData[$i]['id'] . ')" title="Eliminar voluntario"><i class="far fa-trash-alt"></i></button>';
				}
				$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}


	public function getVoluntariochk($idv)
	{
		if ($_SESSION['permisosMod']['r']) {
			$id = intval($idv);
			if ($id > 0) {
				$arrData = $this->model->selectVoluntariochk($id);
				if (empty($arrData)) {
					$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
				} else {
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}


	public function delVoluntariochk()
	{
		if ($_POST) {
			if ($_SESSION['permisosMod']['d']) {
				$intIdVoluntario = intval($_POST['idv']);
				$requestDelete = $this->model->deleteVoluntariochk($intIdVoluntario);
				if ($requestDelete) {
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el voluntario');
				} else {
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el voluntario.');
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}


	public function Charla()
	{

		$arrData = $this->model->selectCharlas();

		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);

		die();
	}

	public function Taller()
	{

		$arrData = $this->model->selectTalleres();

		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);

		die();
	}

	public function Voluntariado()
	{

		$arrData = $this->model->selectVoluntariados();

		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);

		die();
	}
}
