<?php

class CharlasInfoModel extends Mysql
{
	public $intIdcharla;
	


	public function __construct()
	{
		parent::__construct();
	}

	
	public function getCharlaInfo()
    {
        $this->con = new Mysql();
        $sql = "SELECT * FROM charla
    WHERE status = 1 ";
        $request = $this->select_all($sql);
        if (count($request) > 0) {
            for ($i = 0; $i < count($request); $i++) {
                $id = $request[$i]['idcharla'];
            }
        }
        return $request;
    }



	public function selectCharlaInfo(int $idcharla)
	{
		$this->intIdcharla = $idcharla;
		$sql = "SELECT * FROM charla
					WHERE idcharla = $this->intIdcharla";
		$request = $this->select($sql);
		return $request;
	}



}
