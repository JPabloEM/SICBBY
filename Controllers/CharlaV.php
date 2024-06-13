<?php
require_once("Models/TCharlaV.php");
require_once("Models/CharlasModel.php"); // Reemplaza con la ubicación de tu modelo real
class CharlaV extends Controllers
{
	use TCharlaV;
	private $model; // Propiedad para contener la instancia del modelo

	public function __construct()
	{
		parent::__construct();
		//session_start();
		//getPermisos(MDPAGINAS);
		$this->model = new CharlasModel(); // Crea una instancia del modelo real
	}


	public function charlaV()
	{
		$pageContent = getPageRout('charlaV');
		if (empty($pageContent)) {
			header("Location: " . base_url());
		} else {
			$data['page_tag'] = NOMBRE_EMPESA;
			$data['page_title'] = NOMBRE_EMPESA . " - " . $pageContent['titulo'];
			$data['page_name'] = $pageContent['titulo'];
			$data['page'] = $pageContent;
			$data['CharlaV'] = $this->getCharlaV();
			$this->views->getView($this, "charlaV", $data);
		}

	}




}
?>