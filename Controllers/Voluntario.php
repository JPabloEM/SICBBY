<?php 
	class Voluntario extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			//getPermisos(MDPAGINAS);
		}

		public function voluntario()
		{
			$pageContent = getPageRout('voluntario');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				$data['page_tag'] = NOMBRE_EMPESA;
				$data['page_title'] = NOMBRE_EMPESA." - ".$pageContent['titulo'];
				$data['page_name'] = $pageContent['titulo'];
				$data['page'] = $pageContent;
				$this->views->getView($this,"voluntario",$data); 
			}

		}


		

	}
 ?>
