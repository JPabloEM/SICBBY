<?php

class CharlasModel extends Mysql
{
	public $intIdcharla;
	public $strNombre;
	public $strDescripcion;
	public $strFecha;
	public  $strHora;
	public $strLugar;
	public $intCapacidad;
	public $intStatus;
	public $strPortada;


	public function __construct()
	{
		parent::__construct();
	}

	public function InsertCharla(string $nombre, string $descripcion, string $fecha, string $hora, string $lugar, int $capacidad, int $status)
	{

		$return = 0;
		$this->strNombre = $nombre;
		$this->strDescripcion = $descripcion;
		$this->strFecha = $fecha;
		$this->strHora = $hora;
		$this->strLugar = $lugar;
		$this->intCapacidad = $capacidad;
		$this->intStatus = $status;

		$sql = "SELECT * FROM charla WHERE nombre = '{$this->strNombre}' ";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$query_insert  = "INSERT INTO charla(nombre,descripcion,fechaCharla,horaCharla,lugar,capacidad,status) VALUES(?,?,?,?,?,?,?)";
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

	public function selectCharlas()
	{
		$sql = "SELECT * FROM charla
					WHERE status != 0 ";
		$request = $this->select_all($sql);
		return $request;
	}


	public function selectCharla(int $idcharla)
	{
		$this->intIdcharla = $idcharla;
		$sql = "SELECT * FROM charla
					WHERE idcharla = $this->intIdcharla";
		$request = $this->select($sql);
		return $request;
	}



	public function deleteCharla(int $idcharla)
	{
		$this->intIdcharla = $idcharla;
		$sql = "DELETE FROM charla WHERE idcharla = $this->intIdcharla";
		$request = $this->delete($sql);
		return $request;
	}


	


	public function updateCharla(int $idCharla, string $nombre, string $descripcion, string $fecha, string $hora, string $lugar, int $capacidad, int $status)
	{
		$this->intIdcharla = $idCharla;
		$this->strNombre = $nombre;
		$this->strDescripcion = $descripcion;
		$this->strFecha = $fecha;
		$this->strHora = $hora;
		$this->strLugar = $lugar;
		$this->intCapacidad = $capacidad;
		$this->intStatus = $status;

		$sql = "SELECT * FROM charla WHERE nombre = '{$this->strNombre}' AND idcharla != $this->intIdcharla";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$sql = "UPDATE charla SET nombre = ?, descripcion = ?, fechaCharla = ?, horaCharla = ?, lugar = ?, capacidad = ?, status = ? WHERE idcharla = $this->intIdcharla ";
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

	/*
		public function getActividadesFooter(){
			$sql = "SELECT idcategoria, nombre, descripcion, portada, ruta
					FROM categoria WHERE  status = 1 AND idcategoria IN (".CAT_FOOTER.")";
			$request = $this->select_all($sql);
			if(count($request) > 0){
				for ($c=0; $c < count($request) ; $c++) { 
					$request[$c]['portada'] = BASE_URL.'/Assets/images/uploads/'.$request[$c]['portada'];		
				}
			}
			return $request;
		}*/
}
