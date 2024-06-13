public function getCharlaInfo($idcharla)
{
    $intIdcharla = intval($idcharla);
    if ($intIdcharla > 0) {
        $arrData = $this->model->selectCharlaInfo($intIdcharla);

        if (empty($arrData)) {
            $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
        } else {
            // $arrData['url_portada'] = media().'/images/uploads/'.$arrData['portada'];
            $arrResponse = array('status' => true, 'data' => $arrData);
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    } else {
        // Manejar el caso en el que el ID de la charla no sea válido
        $arrResponse = array('status' => false, 'msg' => 'ID de charla no válido.');
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
    die();
}