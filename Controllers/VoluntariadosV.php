<?php 
     require_once("Models/TVoluntariadosV.php");
	class VoluntariadosV extends Controllers{
        use TVoluntariadosV;
		public function __construct()
		{
			parent::__construct();
			session_start();
			//getPermisos(MDPAGINAS);
		}


		public function voluntariadosV()
		{
			$pageContent = getPageRout('voluntariadosV');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				$data['page_tag'] = NOMBRE_EMPESA;
				$data['page_title'] = NOMBRE_EMPESA." - ".$pageContent['titulo'];
				$data['page_name'] = $pageContent['titulo'];
				$data['page'] = $pageContent;
				$data['VoluntariadosV'] = $this->getVoluntariadosV();
				$this->views->getView($this,"voluntariadosV",$data); 
			}

		}
	

	}
 ?>
