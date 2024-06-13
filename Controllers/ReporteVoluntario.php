<?php

class ReporteVoluntario extends Controllers
{

	public function __construct()
	{
		parent::__construct();
		session_start();
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
			die();
		}
		getPermisos(MREPORTE);
	}


	public function ReporteVoluntario()
	{
		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "Reporte";
		$data['page_title'] = "REPORTES";
		$data['page_name'] = "reporteVoluntario";
		$data['page_functions_js'] = "functions_reporte.js";
		$this->views->getView($this, "reporteVoluntario", $data);
	}



public function getVoluntariosRango()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $fechaInicio = $_POST['fechaInicio'];
      $fechaFin = $_POST['fechaFinal'];

      $data = $this->model->selectRangoVoluntario($fechaInicio, $fechaFin);

      echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
  }





	public function getVoluntariosRango1()
	{
		if ($_SESSION['permisosMod']['r']) {
			$arrData = $this->model->selectRangoVoluntario1();

			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}




}

?>