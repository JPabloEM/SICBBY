<?php 

	class Dashboard extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			//session_regenerate_id(true);
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
				die();
			}
			getPermisos(MDASHBOARD);
		}

		public function dashboard()
		{
			$data['page_id'] = 2;
			$data['page_tag'] = "Dashboard - CBBY";
			$data['page_title'] = "Dashboard - CBBY";
			$data['page_name'] = "dashboard";
			$data['page_functions_js'] = "functions_dashboard.js";
			$data['usuarios'] = $this->model->cantUsuarios();
			$data['voluntariossolicitud'] = $this->model->cantVoluntariosSolicitud();
			$data['voluntarios'] = $this->model->cantVoluntarios();
			$data['actividades'] = $this->model->cantTalleres();
			$data['charlas'] = $this->model->cantCharlas();
			$data['voluntariados'] = $this->model->cantVoluntariados();
			$data['documentos'] = $this->model->cantDocumentos();
			$data['documentosp'] = $this->model->cantDocumentosP();
			$data['contacto'] = $this->model->cantMensajes();

			$anio = date('Y');
			$mes = date('m');
			

			if( $_SESSION['userData']['idrol'] == RCLIENTES ){
				$this->views->getView($this,"dashboardCliente",$data);
			}else{
				$this->views->getView($this,"dashboard",$data);
			}
		}




	}
 ?>