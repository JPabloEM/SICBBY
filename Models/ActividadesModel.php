<?php

class ActividadesModel extends Mysql
{
	public $intIdtaller;
	public $strNombre;
	public $strDescripcion;
	public $strFecha;
	public $strHora;
	public $strLugar;
	public $intCapacidad;
	public $intStatus;
	public $strPortada;


	public function __construct()
	{
		parent::__construct();
	}

	public function InsertActividad(string $nombre, string $descripcion, string $fecha, string $hora, string $lugar, int $capacidad, int $status)
	{

		$return = 0;
		$this->strNombre = $nombre;
		$this->strDescripcion = $descripcion;
		$this->strFecha = $fecha;
		$this->strHora = $hora;
		$this->strLugar = $lugar;
		$this->intCapacidad = $capacidad;
		$this->intStatus = $status;

		$sql = "SELECT * FROM taller WHERE nombre = '{$this->strNombre}' ";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$query_insert = "INSERT INTO taller(nombre,descripcion,fechaTaller,horaTaller,lugar,capacidad,status) VALUES(?,?,?,?,?,?,?)";
			$arrData = array(
				$this->strNombre,
				$this->strDescripcion,
				$this->strFecha,
				$this->strHora,
				$this->strLugar,
				$this->intCapacidad,
				$this->intStatus
			);
			$request_insert = $this->insert($query_insert, $arrData);
			$return = $request_insert;
		} else {
			$return = "exist";
		}
		return $return;
	}

	public function selectTalleres()
	{
		$sql = "SELECT * FROM taller 
					WHERE status != 0 ";
		$request = $this->select_all($sql);
		return $request;
	}


	public function selectTaller(int $idtaller)
	{
		$this->intIdtaller = $idtaller;
		$sql = "SELECT * FROM taller
					WHERE idtaller = $this->intIdtaller";
		$request = $this->select($sql);
		return $request;
	}



	public function deleteTaller(int $idtaller)
	{
		$this->intIdtaller = $idtaller;
		$sql = "DELETE FROM taller WHERE idtaller = $this->intIdtaller";
		$request = $this->delete($sql);
		return $request;
	}





	public function updateTaller(int $idTaller, string $nombre, string $descripcion, string $fecha, string $hora, string $lugar, int $capacidad, int $status)
	{
		$this->intIdtaller = $idTaller;
		$this->strNombre = $nombre;
		$this->strDescripcion = $descripcion;
		$this->strFecha = $fecha;
		$this->strHora = $hora;
		$this->strLugar = $lugar;
		$this->intCapacidad = $capacidad;
		$this->intStatus = $status;

		$sql = "SELECT * FROM taller WHERE nombre = '{$this->strNombre}' AND idtaller != $this->intIdtaller";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$sql = "UPDATE taller SET nombre = ?, descripcion = ?, fechaTaller = ?, horaTaller = ?, lugar = ?, capacidad = ?, status = ? WHERE idtaller = $this->intIdtaller ";
			$arrData = array(
				$this->strNombre,
				$this->strDescripcion,
				$this->strFecha,
				$this->strHora,
				$this->strLugar,
				$this->intCapacidad,
				$this->intStatus
			);
			$request = $this->update($sql, $arrData);
		} else {
			$request = "exist";
		}
		return $request;
	}



	/*public function getActividadesFooter()
	{
		$sql = "SELECT idcategoria, nombre, descripcion, portada, ruta
					FROM categoria WHERE  status = 1 AND idcategoria IN (" . CAT_FOOTER . ")";
		$request = $this->select_all($sql);
		if (count($request) > 0) {
			for ($c = 0; $c < count($request); $c++) {
				$request[$c]['portada'] = BASE_URL . '/Assets/images/uploads/' . $request[$c]['portada'];
			}
		}
		return $request;
	}
	*/
}