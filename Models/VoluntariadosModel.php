<?php

class VoluntariadosModel extends Mysql
{
	public $intIdvoluntariado;
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

	public function InsertVoluntariado(string $nombre, string $descripcion, string $fecha, string $hora, string $lugar, int $capacidad, int $status)
	{

		$return = 0;
		$this->strNombre = $nombre;
		$this->strDescripcion = $descripcion;
		$this->strFecha = $fecha;
		$this->strHora = $hora;
		$this->strLugar = $lugar;
		$this->intCapacidad = $capacidad;
		$this->intStatus = $status;

		$sql = "SELECT * FROM voluntariado WHERE nombre = '{$this->strNombre}' ";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$query_insert  = "INSERT INTO voluntariado(nombre,descripcion,fechaVoluntariado,horaVoluntariado,lugar,capacidad,status) VALUES(?,?,?,?,?,?,?)";
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

	public function selectVoluntariados()
	{
		$sql = "SELECT * FROM voluntariado
					WHERE status != 0 ";
		$request = $this->select_all($sql);
		return $request;
	}


	public function selectVoluntariado(int $idvoluntariado)
	{
		$this->intIdvoluntariado = $idvoluntariado;
		$sql = "SELECT * FROM voluntariado
					WHERE idvoluntariado = $this->intIdvoluntariado";
		$request = $this->select($sql);
		return $request;
	}



	public function deleteVoluntariado(int $idvoluntariado)
	{
		$this->intIdvoluntariado = $idvoluntariado;
		$sql = "DELETE FROM voluntariado WHERE idvoluntariado = $this->intIdvoluntariado";
		$request = $this->delete($sql);
		return $request;
	}

	public function updateVoluntariado(int $idvoluntariado, string $nombre, string $descripcion, string $fecha, string $hora, string $lugar, int $capacidad, int $status)
	{
		$this->intIdvoluntariado = $idvoluntariado;
		$this->strNombre = $nombre;
		$this->strDescripcion = $descripcion;
		$this->strFecha = $fecha;
		$this->strHora = $hora;
		$this->strLugar = $lugar;
		$this->intCapacidad = $capacidad;
		$this->intStatus = $status;

		$sql = "SELECT * FROM voluntariado WHERE nombre = '{$this->strNombre}' AND idvoluntariado != $this->intIdvoluntariado";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$sql = "UPDATE voluntariado SET nombre = ?, descripcion = ?, fechaVoluntariado = ?, horaVoluntariado = ?, lugar = ?, capacidad = ?, status = ? WHERE idvoluntariado = $this->intIdvoluntariado ";
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

		

		/*public function getActividadesFooter(){
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
