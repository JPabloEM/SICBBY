<?php
class Charlas extends Controllers{

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

    public function Charlas()
    {
        if(empty($_SESSION['permisosMod']['r'])){
            header("Location:".base_url().'/dashboard');
        }
        $data['page_tag'] = "Charlas";
        $data['page_title'] = "Charlas";
        $data['page_name'] = "charlas";
        $data['page_functions_js'] = "functions_charlas.js";
        $this->views->getView($this,"charlas",$data);
    }


    public function setCharla(){

			
        if($_POST){
            if(empty($_POST['txtNombre']) || empty($_POST['txtDescripcion']) || empty($_POST['txtFecha']) || empty($_POST['txtHora']) 
            || empty($_POST['txtLugar']) || empty($_POST['txtCapacidad']) || empty($_POST['listStatus']) )
            {
                $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
            }else{
                
                $intIdcharla = intval($_POST['idCharla']);
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
                
                $request_charala = "";
                // if($nombre_foto != ''){
                // 	$imgPortada = 'img_'.md5(date('d-m-Y H:i:s')).'.jpg';
                // }

                if($intIdcharla == 0)
                {
                    //Crear
                    if($_SESSION['permisosMod']['w']){
                        $request_charla= $this->model->InsertCharla($strNombre, $strDescipcion,$strFecha,$strHora,$strLugar,$intCapacidad,$intStatus);
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
                        $request_charla = $this->model->updateCharla($intIdcharla,$strNombre, $strDescipcion,$strFecha,$strHora,$strLugar,$intCapacidad,$intStatus);
                        $option = 2;
                    //}
                }
                if($request_charla> 0 )
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
                }else if($request_charla == 'exist'){
                    $arrResponse = array('status' => false, 'msg' => '¡Atención! La actividad ya existe.');
                }else{
                    $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
                }
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function getCharlas()
		{
			if($_SESSION['permisosMod']['r']){
				$arrData = $this->model->selectCharlas();
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
						$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['idcharla'].')" title="Ver charla"><i class="far fa-eye"></i></button>';
					}
					if($_SESSION['permisosMod']['u']){
						$btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['idcharla'].')" title="Editar charla"><i class="fas fa-pencil-alt"></i></button>';
					}
					if($_SESSION['permisosMod']['d']){	
						$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['idcharla'].')" title="Eliminar charla"><i class="far fa-trash-alt"></i></button>';
					}
					$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}


        
        public function getCharla($idcharla)
		{
			if($_SESSION['permisosMod']['r']){
				$intIdcharla = intval($idcharla);
				if($intIdcharla > 0)
				{
					$arrData = $this->model->selectCharla($intIdcharla);

					

					if(empty($arrData))
					{
						$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
					}else{
						// $arrData['url_portada'] = media().'/images/uploads/'.$arrData['portada'];
						$arrResponse = array('status' => true, 'data' => $arrData);
					}
				
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}

        public function delCharla()
		{
			if($_POST){
				if($_SESSION['permisosMod']['d']){
					$intIdcharla = intval($_POST['idcharla']);
					$requestDelete = $this->model->deleteCharla($intIdcharla);
					if($requestDelete == 'ok')
					{
						$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la Charla');
					}else if($requestDelete == 'exist'){
						$arrResponse = array('status' => false, 'msg' => 'No es posible eliminar la charla.');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'Error al eliminar la Charla.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}

}
?>