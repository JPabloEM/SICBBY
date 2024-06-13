<?php
	class Documentos extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			session_regenerate_id(true);
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
				die();
			}
			getPermisos(MDOCUMENTOS);
		}


		
		public function Documentos()
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_tag'] = "Documentos Internos";
			$data['page_title'] = "DOCUMENTOS INTERNOS";
			$data['page_name'] = "documentos";
			$data['page_functions_js'] = "functions_documentos.js";
			$this->views->getView($this,"documentos",$data);
		}




		public function setDocumento(){
			if($_POST){
				if(empty($_POST['txtNombre']) || empty($_POST['txtDescripcion']) || empty($_POST['listStatus'])|| empty($_POST['txtFechaDocl'])  )
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{
					
					$intIddocumento = intval($_POST['idDocumento']);
					$strDocumento =  strClean($_POST['txtNombre']);
					$strDescipcion = strClean($_POST['txtDescripcion']);
					$strFechaDocl = strClean($_POST['txtFechaDocl']);
					$intStatus = intval($_POST['listStatus']);

					$ruta = strtolower(clear_cadena($strDocumento));
					$ruta = str_replace(" ","-",$ruta);

					$pdf   	 	= $_FILES['pdf'];
					$nombre_pdf 	= $pdf['name'];
					$type 		 	= $pdf['type'];
					$url_temp    	= $pdf['tmp_name'];
					//$imgPortada 	= 'pdf-icon-1.jpg';
					$arrData = $this->model->selectDocumento($intIddocumento);
					$request_documento = "";
					if($nombre_pdf != ''){
						$imgPortada = $strDocumento.'.pdf';
					}

					if($intIddocumento == 0)
					{
						//Crear
						if($_SESSION['permisosMod']['w']){
							$request_documento = $this->model->insertDocumento($strDocumento, $strDescipcion,$imgPortada,$ruta,$intStatus,$strFechaDocl);
							$option = 1;
						}
					}else{
						//Actualizar
						if($_SESSION['permisosMod']['u']){
							if($nombre_pdf == ''){
								if($_POST['pdf_actual'] != 'portada_categoria.png' && $_POST['pdf_remove'] == 0 ){
									$imgPortada = $_POST['pdf_actual'];
								}
							}
							$request_documento = $this->model->updateDocumento($intIddocumento,$strDocumento, $strDescipcion,$imgPortada,$ruta,$intStatus,$strFechaDocl);
							$option = 2;
						}
					}
					if($request_documento > 0 )
					{
						if($option == 1)
						{
							$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
							if($nombre_pdf != ''){ uploadImage($pdf,$imgPortada); }
						}else{
							$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
							if($nombre_pdf != ''){ uploadImage($pdf,$imgPortada); }

							if(($nombre_pdf == '' && $_POST['pdf_remove'] == 1 && $_POST['pdf_actual'] != 'portada_categoria.png')
								|| ($nombre_pdf != '' && $_POST['pdf_actual'] != 'portada_categoria.png')){
								deleteFile($_POST['pdf_actual']);
							}
						}
					}else if($request_documento == 'exist'){
						$arrResponse = array('status' => false, 'msg' => '¡Atención! Documento ya existe.');
					}else{
						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}




		public function downloadPDF(int $id_documento) {
			// Obtener el nombre del archivo PDF basado en el ID proporcionado
			$pdfFileName = $this->model->getPDFFileNameById($id_documento);
			
			if ($pdfFileName) {
				// Ruta base donde se almacenan los archivos
				$pdfDirectory = 'Assets/documents/uploads1/';
				
				//Encontrar la    [  ruta y el nombre  ]   	del archivo que se queire descargar
				$pdfPath = $pdfDirectory . $pdfFileName;
				

				ob_clean();
				//cabeceras para la descarga del archivo
				header('Content-Description: File Transfer');
				header('Content-Type: application/pdf'); // Tipo MIME cambiado a application/pdf
				header('Content-Disposition: attachment; filename="' . basename($pdfPath) . '"');
				header('Expires: 0');
				header('Cache-Control: no-cache, no-store, must-revalidate'); // Desactivar la caché
				header('Pragma: no-cache');
				header('Content-Length: ' . filesize($pdfPath));
		
				// proceso de leer y enviar
				readfile($pdfPath);
				exit;
			} else {
				// control de error
				echo "El archivo no existe.";
			}
		}
		




		public function getDocumentos()
		{
			if($_SESSION['permisosMod']['r']){
				$arrData = $this->model->selectDocumentos();
				for ($i=0; $i < count($arrData); $i++) {
					$btnView = '';
					$btnEdit = '';
					$btnDelete = '';
					$btnDown = '';

					if($arrData[$i]['status'] == 1)
					{
						$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
					}else{
						$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
					}

					if($_SESSION['permisosMod']['r']){
						$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['id_documento'].')" title="Ver documento"><i class="far fa-eye"></i></button>';
						 $btnDown = '<button class="btn btn-info btn-sm" onClick="downloadPDF('.$arrData[$i]['id_documento'].')" title="Descargar documento"><i class="fas fa-download"></i></button>';

					}
					if($_SESSION['permisosMod']['u']){
						$btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['id_documento'].')" title="Editar documento"><i class="fas fa-pencil-alt"></i></button>';
					}
					if($_SESSION['permisosMod']['d']){	
						$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['id_documento'].')" title="Eliminar documento"><i class="far fa-trash-alt"></i></button>';
					}
					$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.''.$btnDown. '</div>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function getDocumento($id_documento)
		{
			if($_SESSION['permisosMod']['r']){
				$intIddocumento = intval($id_documento);
				if($intIddocumento > 0)
				{
					$arrData = $this->model->selectDocumento($intIddocumento);
					if(empty($arrData))
					{
						$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
					}else{
						$arrData['url_portada'] = media().'/documents/uploads1/'.$arrData['portada'];
						$arrResponse = array('status' => true, 'data' => $arrData);
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}

		public function delDocumento()
		{
			if($_POST){
				if($_SESSION['permisosMod']['d']){
					$intIddocumento = intval($_POST['idDocumento']);
					$requestDelete = $this->model->deleteDocumento($intIddocumento);
					if($requestDelete == 'ok')
					{
						$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el documento');
					// }else if($requestDelete == 'exist'){
					// 	$arrResponse = array('status' => false, 'msg' => 'No es posible eliminar una categoría con productos asociados.');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el documento.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}

		public function getSelectDocumentos(){
			$htmlOptions = "";
			$arrData = $this->model->selectDocumentos();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['id_documento'].'">'.$arrData[$i]['nombre'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();	
		}





		
// public function download()
// 	{
// 	if (isset($_GET['file_id'])) {
// 		$id = mysqli_real_escape_string($conn,$_GET['file_id']);
	
// 		// fetch file to download from database
// 		$sql = "SELECT * FROM  upload_files WHERE ID=$id";
// 		$result = mysqli_query($conn, $sql);
	
// 		$file = mysqli_fetch_assoc($result);
// 		$filepath = '../uploads/' . $file['NAME'];
	
// 		if (file_exists($filepath)) {
// 			header('Content-Description: File Transfer');
// 			header('Content-Type: application/octet-stream');
// 			header('Content-Disposition: attachment; filename=' . basename($filepath));
// 			header('Expires: 0');
// 			header('Cache-Control: must-revalidate');
// 			header('Pragma: public');
// 			header('Content-Length: ' . filesize('../uploads/' . $file['NAME']));
// 			readfile('../uploads/' . $file['NAME']);
	
// 			// Now update downloads count
// 			$newCount = $file['DOWNLOAD'] + 1;
// 			$updateQuery = "UPDATE upload_files SET DOWNLOAD=$newCount WHERE ID=$id";
// 			mysqli_query($conn, $updateQuery);
// 			exit;
// 		}
	
// 	}
// 	}









	}




	

 ?>