<?php
require_once("Libraries/Core/Mysql.php");
trait TTallerV
{
    private $con;
    public $intIdtaller;

    public function getTallerV()
    {
        $this->con = new Mysql();
        $sql = "SELECT * FROM taller 
					WHERE status = 1 ";
        $request = $this->con->select_all($sql);
        if (count($request) > 0) {
            for ($i = 0; $i < count($request); $i++) {
                $id = $request[$i]['idtaller'];
            }
        }
        return $request;
    }

    public function selectTaller(int $idtaller)
	{
        $this->con = new Mysql();
		$this->intIdtaller = $idtaller;
		$sql = "SELECT * FROM taller
					WHERE idtaller = $this->intIdtaller";
		$request = $this->con->select($sql);
		return $request;
	}



}


?>