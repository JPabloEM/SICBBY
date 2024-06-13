<?php 

	class Contactos extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			session_regenerate_id(true);
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
				die();
			}
			getPermisos(MDCONTACTOS);
		}

		public function Contactos()
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_tag'] = "Contactos";
			$data['page_title'] = "CONTACTOS";
			$data['page_name'] = "contactos";
			$data['page_functions_js'] = "functions_contactos.js";
			$this->views->getView($this,"contactos",$data);
		}

		public function getContactos(){
			if($_SESSION['permisosMod']['r']){
				$arrData = $this->model->selectContactos();
				for ($i=0; $i < count($arrData) ; $i++) { 
					$btnView = '';
					$btnDelete = '';
					if($_SESSION['permisosMod']['r']){
						$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['id'].')" title="Ver mensaje"><i class="far fa-eye"></i></button>';
					}

					if($_SESSION['permisosMod']['d']){	
						$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['id'].')" title="Eliminar Mnesaje"><i class="far fa-trash-alt"></i></button>';
					}

					$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnDelete.'</div>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function getMensaje($idmensaje){
			if($_SESSION['permisosMod']['r']){
				$idmensaje = intval($idmensaje);
				if($idmensaje > 0){
					$arrData = $this->model->selectMensaje($idmensaje);
					if(empty($arrData)){
						$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
					}else{
						$arrResponse = array('status' => true, 'data' => $arrData);
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}

		public function deleteMensaje()
		{
			if($_POST){
				if($_SESSION['permisosMod']['d']){
					$idmensaje = intval($_POST['idmensaje']);
					$requestDelete = $this->model->deleteMensaje($idmensaje);
					if($requestDelete == 'ok')
					{
						$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el documento');
					// }else if($requestDelete == 'exist'){
					// 	$arrResponse = array('status' => false, 'msg' => 'No es posible eliminar una categoría con productos asociados.');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el documento.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}




	}
?>