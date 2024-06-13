<?php 
     require_once("Models/TDocumentacionV.php");
	class DocumentacionV extends Controllers{
        use TDocumentacionV;
		public function __construct()
		{
			parent::__construct();
			//session_start();
			//getPermisos(MDPAGINAS);
		}

		public function documentacionV()
		{
			$pageContent = getPageRout('documentacionV');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				$data['page_tag'] = NOMBRE_EMPESA;
				$data['page_title'] = NOMBRE_EMPESA." - ".$pageContent['titulo'];
				$data['page_name'] = $pageContent['titulo'];
				$data['page'] = $pageContent;
                $data['DocumentacionV'] = $this->getDocumentacionV();
				$this->views->getView($this,"documentacionV",$data); 
			}

		}


		

	}
 ?>
