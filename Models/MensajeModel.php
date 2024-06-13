<?php

class MensajeModel extends Mysql
{


    private $intId;

    private $strNombre;

    private $strEmail;

    private $strMensaje;








    public function __construct()
    {
        parent::__construct();
    }

    public function insertMensaje(string $nombre,  string $email, string $mensaje)
    {
        $return = 0;
        $this->strNombre = $nombre;
        $this->strEmail = $email;
        $this->strMensaje = $mensaje;
       


        $sql = "SELECT * FROM mensaje WHERE 
				email = '{$this->strEmail}' or nombre = '{$this->strNombre}'";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $query_insert = "INSERT INTO mensaje(nombre, email, mensaje) 
							  VALUES(?,?,?)";
            $arrData = array(
                
                $this->strNombre,
                $this->strEmail,
                $this->strMensaje,
                
            );
            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
        } else {
            $return = 'exist';
        }
        return $return;
    }



    public function selectMensajes()
    {
        $sql = "SELECT id,nombre,email, mensaje, DATE_FORMAT(datecreated, '%d/%m/%Y') as datecreated
				FROM mensaje 
				ORDER BY id DESC";
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectMensaje(int $id)
    {
        $this->intId = $id;
        $sql = "SELECT id,nombre,email, mensaje, DATE_FORMAT(datecreated, '%d/%m/%Y') as datecreated
				FROM mensaje 
				WHERE id = $this->intId";
         $request = $this->select($sql);
        return $request;
    }

    public function deleteMensaje(int $intId)
    {
        $this->intId = $intId;
        $sql = "DELETE FROM mensaje WHERE id = $this->intId ";
        $arrData = array(0);
        $request = $this->delete($sql);
        return $request;
    }
}
