<?php 
require_once("Libraries/Core/Mysql.php");
trait TDocumentacionV{
    private $con;


	public function getDocumentacionV()
	{
        $this->con = new Mysql();
		$sql = "SELECT * FROM documentacionp 
					WHERE status = 1 ";
        $request = $this->con->select_all($sql);
        if (count($request) > 0) {
            for ($i = 0; $i < count($request); $i++) {
               $id  = $request[$i]['id_documentoP'];
            }
        }
		return $request;
	}


}

?>