<?php
class Voluntariados extends Controllers{

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

    public function Voluntariados()
    {
        if(empty($_SESSION['permisosMod']['r'])){
            header("Location:".base_url().'/dashboard');
        }
        $data['page_tag'] = "Voluntariados";
        $data['page_title'] = "Voluntariados";
        $data['page_name'] = "voluntariados";
        $data['page_functions_js'] = "functions_voluntariados.js";
        $this->views->getView($this,"voluntariados",$data);
    }


    public function setVoluntariado(){

			
        if($_POST){
            if(empty($_POST['txtNombre']) || empty($_POST['txtDescripcion']) || empty($_POST['txtFecha']) || empty($_POST['txtHora']) 
            || empty($_POST['txtLugar']) || empty($_POST['txtCapacidad']) || empty($_POST['listStatus']) )
            {
                $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
            }else{
                
                $intIdvoluntariado = intval($_POST['idVoluntariado']);
                $strNombre =  strClean($_POST['txtNombre']);

                
                $strDescipcion = strClean($_POST['txtDescripcion']);
                $strFecha= strClean($_POST['txtFecha']);
                $strHora= strClean($_POST['txtHora']);
                $strLugar= strClean($_POST['txtLugar']);
                $intCapacidad = intval($_POST['txtCapacidad']);

                $intStatus = intval($_POST['listStatus']);

                $ruta = strtolower(clear_cadena($strNombre));
                $ruta = str_replace(" ","-",$ruta);

                // $foto   	 	= $_FILES['foto'];
                // $nombre_foto 	= $foto['name'];
                // $type 		 	= $foto['type'];
                // $url_temp    	= $foto['tmp_name'];
                $fecha           = date('ymd');
                $hora           = date('Hms');
                
                $request_voluntariado = "";
                // if($nombre_foto != ''){
                // 	$imgPortada = 'img_'.md5(date('d-m-Y H:i:s')).'.jpg';
                // }

                if($intIdvoluntariado == 0)
                {
                    //Crear
                    if($_SESSION['permisosMod']['w']){
                        $request_voluntariado= $this->model->InsertVoluntariado($strNombre, $strDescipcion,$strFecha,$strHora,$strLugar,$intCapacidad,$intStatus);
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
                        $request_voluntariado = $this->model->updateVoluntariado($intIdvoluntariado,$strNombre, $strDescipcion,$strFecha,$strHora,$strLugar,$intCapacidad,$intStatus);
                        $option = 2;
                    //}
                }
                if($request_voluntariado> 0 )
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
                }else if($request_voluntariado == 'exist'){
                    $arrResponse = array('status' => false, 'msg' => '¡Atención! el voluntariado ya existe.');
                }else{
                    $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
                }
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function getVoluntariados()
		{
			if($_SESSION['permisosMod']['r']){
				$arrData = $this->model->selectVoluntariados();
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
						$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['idvoluntariado'].')" title="Ver voluntariado"><i class="far fa-eye"></i></button>';
					}
					if($_SESSION['permisosMod']['u']){
						$btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['idvoluntariado'].')" title="Editar voluntariado"><i class="fas fa-pencil-alt"></i></button>';
					}
					if($_SESSION['permisosMod']['d']){	
						$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['idvoluntariado'].')" title="Eliminar voluntariado"><i class="far fa-trash-alt"></i></button>';
					}
					$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

        public function getVoluntariado($idvoluntariado)
		{
			//if($_SESSION['permisosMod']['r']){
				$intIdvoluntariado = intval($idvoluntariado);
				if($intIdvoluntariado > 0)
				{
					$arrData = $this->model->selectVoluntariado($intIdvoluntariado);

					

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

        public function delVoluntariado()
		{
			if($_POST){
				if($_SESSION['permisosMod']['d']){
					$intIdvoluntariado = intval($_POST['idvoluntariado']);
					$requestDelete = $this->model->deleteVoluntariado($intIdvoluntariado);
					if($requestDelete == 'ok')
					{
						$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la Voluntariado');
					}else if($requestDelete == 'exist'){
						$arrResponse = array('status' => false, 'msg' => 'No es posible eliminar la voluntariado.');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'Error al eliminar la Voluntariado.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}

}
?>