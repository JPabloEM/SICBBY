<?php
	class Actividades extends Controllers{

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
			getPermisos(MActividades);
		}

		public function Actividades()
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_tag'] = "Actividades";
			$data['page_title'] = "Talleres";
			$data['page_name'] = "Taller";
			$data['page_functions_js'] = "functions_actividades.js";
			$this->views->getView($this,"actividades",$data);
		}

		public function setActividad(){

			
			if($_POST){
				if(empty($_POST['txtNombre']) || empty($_POST['txtDescripcion']) || empty($_POST['txtFecha']) || empty($_POST['txtHora']) 
				|| empty($_POST['txtLugar']) || empty($_POST['txtCapacidad']) || empty($_POST['listStatus']) )
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{
					
					$intIdtaller= intval($_POST['idTaller']);
					$strNombre =  strClean($_POST['txtNombre']);

					
					$strDescipcion = strClean($_POST['txtDescripcion']);
					$strFecha= strClean($_POST['txtFecha']);
					$strHora= strClean($_POST['txtHora']);
					$strLugar= strClean($_POST['txtLugar']);
					$intCapacidad = intval($_POST['txtCapacidad']);

					$intStatus = intval($_POST['listStatus']);

					

					// $foto   	 	= $_FILES['foto'];
					// $nombre_foto 	= $foto['name'];
					// $type 		 	= $foto['type'];
					// $url_temp    	= $foto['tmp_name'];
					$fecha           = date('ymd');
					$hora           = date('Hms');
					
					$request_actividad = "";
					// if($nombre_foto != ''){
					// 	$imgPortada = 'img_'.md5(date('d-m-Y H:i:s')).'.jpg';
					// }

					if($intIdtaller== 0)
					{
						//Crear
						if($_SESSION['permisosMod']['w']){
							$request_actividad = $this->model->InsertActividad($strNombre, $strDescipcion,$strFecha,$strHora,$strLugar,$intCapacidad,$intStatus);
							$option = 1;
						}
					}else{
						//Actualizar
						if($_SESSION['permisosMod']['u']){
							//if($nombre_foto == ''){
								//if($_POST['foto_actual'] != 'portada_categoria.png' && $_POST['foto_remove'] == 0 ){
									//$imgPortada = $_POST['foto_actual'];
								}
							//}
							$request_actividad = $this->model->updateTaller($intIdtaller,$strNombre, $strDescipcion,$strFecha,$strHora,$strLugar,$intCapacidad,$intStatus);
							$option = 2;
						//}
					}
					if($request_actividad> 0 )
					{
						if($option == 1)
						{
							$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
							// if($nombre_foto != ''){ uploadImage($foto,$imgPortada); }
						}else{
							$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
							//if($nombre_foto != ''){ uploadImage($foto,$imgPortada); }

							//if(($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'portada_categoria.png')
								//|| ($nombre_foto != '' && $_POST['foto_actual'] != 'portada_categoria.png')){
								//deleteFile($_POST['foto_actual']);
							//}
						}
					}else if($request_actividad == 'exist'){
						$arrResponse = array('status' => false, 'msg' => '¡Atención! La actividad ya existe.');
					}else{
						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}




		public function getTalleres()
		{
			if($_SESSION['permisosMod']['r']){
				$arrData = $this->model->SelectTalleres();
				for ($i=0; $i < count($arrData); $i++) {
					$btnView = '';
					$btnEdit = '';
					$btnDelete = '';

					if($arrData[$i]['status'] == 1)
					{
						$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
					}else{
						$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
					}

					if($_SESSION['permisosMod']['r']){
						$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['idtaller'].')" title="Ver taller"><i class="far fa-eye"></i></button>';
					}
					if($_SESSION['permisosMod']['u']){
						$btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['idtaller'].')" title="Editar taller"><i class="fas fa-pencil-alt"></i></button>';
					}
					if($_SESSION['permisosMod']['d']){	
						$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['idtaller'].')" title="Eliminar taller"><i class="far fa-trash-alt"></i></button>';
					}
					$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}


		public function getTaller($idtaller)
		{
			//if($_SESSION['permisosMod']['r']){
				$intIdtaller = intval($idtaller);
				if($intIdtaller > 0)
				{
					$arrData = $this->model->selectTaller($intIdtaller);

					

					if(empty($arrData))
					{
						$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
					}else{
						// $arrData['url_portada'] = media().'/images/uploads/'.$arrData['portada'];
						$arrResponse = array('status' => true, 'data' => $arrData);
					}
				
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			//}
			die();
		}

			public function delTaller()
		{
			if($_POST){
				if($_SESSION['permisosMod']['d']){
					$intIdtaller = intval($_POST['idtaller']);
					$requestDelete = $this->model->deleteTaller($intIdtaller);
					if($requestDelete == 'ok')
					{
						$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el taller');
					}else if($requestDelete == 'exist'){
						$arrResponse = array('status' => false, 'msg' => 'No es posible eliminar una taller.');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el taller.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}
		/*

		public function getSelectActividades(){
			$htmlOptions = "";
			$arrData = $this->model->selectActividades();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['idcategoria'].'">'.$arrData[$i]['nombre'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();	
		}*/

	}


 ?>