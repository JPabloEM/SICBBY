<?php
require_once("Libraries/Core/Mysql.php");

trait TCharlaV
{
    private $con;
    public $intIdcharla;
    
    public function __construct()
	{
		parent::__construct();
	}


    public function getCharlaV()
    {
        $this->con = new Mysql();
        $sql = "SELECT * FROM charla
    WHERE status = 1 ";
        $request = $this->con->select_all($sql);
        if (count($request) > 0) {
            for ($i = 0; $i < count($request); $i++) {
                $id = $request[$i]['idcharla'];
            }
        }
        return $request;
    }

    public function selectCharlaV(int $idcharla)
	{
        $this->con = new Mysql();
		$this->intIdcharla = $idcharla;
		$sql = "SELECT * FROM charla
					WHERE idcharla = $this->intIdcharla";
		$request = $this->con->select($sql);
		return $request;
	}


}

?>