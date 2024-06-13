<?php

class Mensaje extends Controllers
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
		getPermisos(MMensaje);
	}

	public function Mensaje()
	{
		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "Mensaje";
		$data['page_title'] = "Mensaje";
		$data['page_name'] = "mensaje";
		$data['page_functions_js'] = "functions_mensaje.js";
		$this->views->getView($this, "mensaje", $data);
	}


	
	

	public function getMensajes()
	{
		if ($_SESSION['permisosMod']['r']) {
			$arrData = $this->model->selectMensajes();
			for ($i = 0; $i < count($arrData); $i++) {
				$btnView = '';
		
				if ($_SESSION['permisosMod']['r']) {
					$btnView = '<button class="btn btn-info btn-sm btnViewMensaje" onClick="fntViewMensaje(' . $arrData[$i]['id'] . ')" title="Ver Mensaje"><i class="far fa-eye"></i></button>';
				}
				if ($_SESSION['permisosMod']['d']) {
					$btnDelete = '<button class="btn btn-danger btn-sm btnDelMensaje" onClick="fntDelMensaje(' . $arrData[$i]['id'] . ')" title="Eliminar mensaje"><i class="far fa-trash-alt"></i></button>';
				}
				$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnDelete . '</div>';
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}


	public function getMensaje($idv)
	{
		if ($_SESSION['permisosMod']['r']) {
			$id = intval($idv);
			if ($id > 0) {
				$arrData = $this->model->selectMensaje($id);
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


	public function delMensaje()
	{
		if ($_POST) {
			if ($_SESSION['permisosMod']['d']) {
				$intIdMensaje = intval($_POST['idm']);
				$requestDelete = $this->model->deleteMensaje($intIdMensaje);
				if ($requestDelete) {
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el mensaje');
				} else {
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el mensaj.');
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}


}
?>