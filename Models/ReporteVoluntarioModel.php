<?php

class ReporteVoluntarioModel extends Mysql
{

    private $intId;
  
	public $fecha_Inicio;
    public $fecha_Final;


    public function __construct()
	{
		parent::__construct();
	}


 public function selectRangoVoluntario($fechaInicio, $fechaFinal)
{
    // Convierte las fechas a formato compatible con MySQL
   // $fechaInicio = date("Y-m-d", strtotime($fechaInicio));
//    $fechaFinal = date("Y-m-d", strtotime($fechaFinal));
    
    // Construye la consulta SQL utilizando las fechas y el estado
    $sql = "SELECT id,identificacion_volunteer,frist_name_volunteer,last_name_volunteer,email,address_volunteer,age_volunteer, general, actividad,
        mensaje, ocupation_volunteer, phone_number_volunteer, DATE_FORMAT(datecreated, '%d/%m/%Y') as datecreated,  Estado
				FROM volunteers
            WHERE Estado IN ('Activo', 'Inactivo') AND 
                  datecreated BETWEEN '$fechaInicio 00:00:00' AND '$fechaFinal 23:59:59'";
    
    $request = $this->select_all($sql);
    return $request;
}



public function selectRangoVoluntario1()
{
    $sql = "SELECT id,identificacion_volunteer,frist_name_volunteer,last_name_volunteer,email,address_volunteer,age_volunteer, general, actividad,
        mensaje, ocupation_volunteer, phone_number_volunteer, DATE_FORMAT(datecreated, '%d/%m/%Y') as datecreated,  Estado
				FROM volunteers
            WHERE Estado IN ('Activo', 'Inactivo')
            ORDER BY id DESC";
    $request = $this->select_all($sql);
    return $request;
}






}


?>