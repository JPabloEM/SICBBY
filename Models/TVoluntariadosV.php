<?php
require_once("Libraries/Core/Mysql.php");

trait TVoluntariadosV
{
    private $con;
    public function getVoluntariadosV()
    {
        $this->con = new Mysql();
        $sql = "SELECT * FROM voluntariado
    WHERE status = 1 ";
        $request = $this->con->select_all($sql);
        if (count($request) > 0) {
            for ($i = 0; $i < count($request); $i++) {
                $id = $request[$i]['idvoluntariado'];
            }
        }
        return $request;
    }

}

?>