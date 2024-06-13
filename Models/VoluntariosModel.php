<?php

class VoluntariosModel extends Mysql
{


	private $intId;
	private $strIdentificacion;
	private $strNombre;
	private $strApellido;
	private $strEmail;
	private $strDireccion;
	private $intEdad;
	private $strMensaje;
	private $strOcupacion;
	private $strTelefono;

	private $strGeneral;

	private $strActividad;
	public $strEstado;





	public function __construct()
	{
		parent::__construct();
	}

	public function insertVoluntario(string $identificacion, string $nombre, string $apellido, string $email, string $direccion, int $edad, string $mensaje, string $ocupacion, string $telefono, string $Estado)
	{
		$return = 0;
		$this->strIdentificacion = $identificacion;
		$this->strNombre = $nombre;
		$this->strApellido = $apellido;
		$this->strEmail = $email;
		$this->strDireccion = $direccion;
		$this->intEdad = $edad;
		$this->strMensaje = $mensaje;
		$this->strOcupacion = $ocupacion;
		$this->strTelefono = $telefono;
		$this->strEstado = $Estado;


		$sql = "SELECT * FROM volunteers WHERE 
				email = '{$this->strEmail}' or identificacion_volunteer = '{$this->strIdentificacion}'";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$query_insert = "INSERT INTO volunteers(identificacion_volunteer, frist_name_volunteer, last_name_volunteer, email, address_volunteer, age_volunteer, mensaje, ocupation_volunteer, phone_number_volunteer, Estado) 
							  VALUES(?,?,?,?,?,?,?,?,?,?)";
			$arrData = array(
				$this->strIdentificacion,
				$this->strNombre,
				$this->strApellido,
				$this->strEmail,
				$this->strDireccion,
				$this->intEdad,
				$this->strMensaje,
				$this->strOcupacion,
				$this->strTelefono,
				$this->strEstado
			);
			$request_insert = $this->insert($query_insert, $arrData);
			$return = $request_insert;
		} else {
			$return = 'exist';
		}
		return $return;
	}



	public function selectVoluntarios()
	{
		$sql = "SELECT id,identificacion_volunteer,frist_name_volunteer,last_name_volunteer,email,address_volunteer,age_volunteer, general, actividad,
        mensaje, ocupation_volunteer, phone_number_volunteer, DATE_FORMAT(datecreated, '%d/%m/%Y') as datecreated, Estado 
				FROM volunteers where Estado ='Solicitud'
				ORDER BY id DESC";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectVoluntario(int $id)
	{
		$this->intId = $id;
		$sql = "SELECT id,identificacion_volunteer,frist_name_volunteer,last_name_volunteer,email,address_volunteer,age_volunteer, general, actividad,
        mensaje, ocupation_volunteer,phone_number_volunteer, Estado
				FROM volunteers WHERE id = $this->intId";
		$request = $this->select($sql);
		return $request;
	}



	public function updateVoluntario(int $id, string $identificacion, string $nombre, string $apellido, string $email, string $direccion, int $edad, string $general, string $actividad, string $mensaje, string $ocupacion, string $telefono, string $Estado)
{
    $this->intId = $id;
    $this->strIdentificacion = $identificacion;
    $this->strNombre = $nombre;
    $this->strApellido = $apellido;
    $this->strEmail = $email;
    $this->strDireccion = $direccion;
    $this->intEdad = $edad;
    $this->strGeneral = $general;
    $this->strActividad = ($general === 'Si') ? '' : $actividad; // Se verifica estrictamente la igualdad
    $this->strMensaje = $mensaje;
    $this->strOcupacion = $ocupacion;
    $this->strTelefono = $telefono;
    $this->strEstado = $Estado;

    $sql = "SELECT * FROM volunteers WHERE (email = '{$this->strEmail}' AND id != $this->intId)";
    $request = $this->select_all($sql);

    if (empty($request)) {
        $sql = "UPDATE volunteers SET identificacion_volunteer =?, frist_name_volunteer =?, last_name_volunteer =?, email =?, address_volunteer =?, age_volunteer =?, general =?, actividad =?, mensaje =?, ocupation_volunteer =?, phone_number_volunteer =?, Estado =? WHERE id = $this->intId";
        $arrData = array(
            $this->strIdentificacion,
            $this->strNombre,
            $this->strApellido,
            $this->strEmail,
            $this->strDireccion,
            $this->intEdad,
            $this->strGeneral,
            $this->strActividad,
            $this->strMensaje,
            $this->strOcupacion,
            $this->strTelefono,
            $this->strEstado
        );

        $request = $this->update($sql, $arrData);
    } else {
        $request = "exist";
    }
    return $request;
}





	public function deleteVoluntario(int $intId)
	{
		$this->intId = $intId;
		$sql = "DELETE FROM volunteers WHERE id = $this->intId ";
		$arrData = array(0);
		$request = $this->delete($sql);
		return $request;
	}




	public function selectCharlas()
	{
		
		$sql = "SELECT idcharla as id, nombre FROM charla WHERE status = 1";
		$request = $this->select_all($sql);

		return $request;
	}

	public function selectTalleres()
	{
		
		$sql = "SELECT idtaller as id, nombre FROM taller WHERE status = 1";
		$request = $this->select_all($sql);

		return $request;
	}

	public function selectVoluntariados()
	{
		
		$sql = "SELECT idvoluntariado as id, nombre FROM voluntariado WHERE status = 1";
		$request = $this->select_all($sql);

		return $request;
	}








}
?>