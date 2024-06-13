<?php 

	class HorariosOf extends Controllers{

		public function __construct()
		{
			parent::__construct();
			session_start();
			//getPermisos(MDPAGINAS);
		}

		public function horariosOf()
		{
			$pageContent = getPageRout('horariosOf');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				$data['page_tag'] = NOMBRE_EMPESA;
				$data['page_title'] = NOMBRE_EMPESA." - ".$pageContent['titulo'];
				$data['page_name'] = $pageContent['titulo'];
				$data['page'] = $pageContent;
				$this->views->getView($this,"horariosOf",$data); 
			}

		}


		

	}
 ?>
