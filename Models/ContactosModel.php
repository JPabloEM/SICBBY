<?php 

class ContactosModel extends Mysql{


	public $intMensajeI;


	public function selectContactos()
	{
		$sql = "SELECT id, nombre, email, DATE_FORMAT(datecreated, '%d/%m/%Y') as fecha
				FROM contacto ORDER BY id DESC";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectMensaje(int $idmensaje){
		$sql = "SELECT id, nombre, email, DATE_FORMAT(datecreated, '%d/%m/%Y') as fecha, mensaje
				FROM contacto WHERE id = {$idmensaje}";
		$request = $this->select($sql);
		return $request;
	}

	public function deleteMensaje(int $idmensaje)
	{
		$this->intMensajeI =  $idmensaje;
		
		$sql = "DELETE FROM  contacto WHERE id = $this->intMensajeI ";
			$arrData = array(0);
			$request = $this->delete($sql);

		return $request;
	}	


}
 ?>