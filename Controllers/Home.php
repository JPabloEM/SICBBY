<?php 

	class Home extends Controllers{

		public function __construct()
		{
			parent::__construct();
			session_start();
		}

		public function home()
		{
			$pageContent = getPageRout('inicio');
			$data['page_tag'] = NOMBRE_EMPESA;
			$data['page_title'] = NOMBRE_EMPESA;
			$data['page_name'] = "Corredor_virtual";
			$data['page'] = $pageContent;
			$this->views->getView($this,"home",$data); 
		}

	}
 ?>
