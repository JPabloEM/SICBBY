<?php 
     require_once("Models/TTallerV.php");
	class TallerV extends Controllers{
        use TTallerV;
		public function __construct()
		{
			parent::__construct();
			session_start();
			//getPermisos(MDPAGINAS);
		}

		public function TallerV()
		{
			$pageContent = getPageRout('tallerV');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				$data['page_tag'] = NOMBRE_EMPESA;
				$data['page_title'] = NOMBRE_EMPESA." - ".$pageContent['titulo'];
				$data['page_name'] = $pageContent['titulo'];
				$data['page'] = $pageContent;
                $data['tallerV'] = $this->getTallerV();
				$this->views->getView($this,"tallerV",$data); 
			}

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
						$arrResponse = array('status' => false, 'msg' => 'Actividad no encontrada.');
					}else{
						// $arrData['url_portada'] = media().'/images/uploads/'.$arrData['portada'];
						$arrResponse = array('status' => true, 'data' => $arrData);
					}
				
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			//}
			die();
		}

		

	}
 ?>
