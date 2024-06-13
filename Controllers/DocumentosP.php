<?php
	class DocumentosP extends Controllers{
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


		
		public function DocumentosP()
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_tag'] = "Documentos Publicos";
			$data['page_title'] = "DOCUMENTOS PUBLICOS";
			$data['page_name'] = "documentosP";
			$data['page_functions_js'] = "functions_documentosP.js";
			$this->views->getView($this,"documentosP",$data);
		}


        public function setDocumentoP(){
			if($_POST){
				if(empty($_POST['txtNombreP']) || empty($_POST['txtDescripcionP']) || empty($_POST['listStatus'])|| empty($_POST['txtFechaDocP'])  )
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{
					
					$intIddocumentoP = intval($_POST['idDocumentoP']);
					$strDocumentoP =  strClean($_POST['txtNombreP']);
					$strDescipcionP = strClean($_POST['txtDescripcionP']);
					$strFechaDocP = strClean($_POST['txtFechaDocP']);
					$intStatus = intval($_POST['listStatus']);

					$rutaP = strtolower(clear_cadena($strDocumentoP));
					$rutaP = str_replace(" ","-",$rutaP);

					$pdf   	 	= $_FILES['pdf'];
					$nombre_pdf 	= $pdf['name'];
					$type 		 	= $pdf['type'];
					$url_temp    	= $pdf['tmp_name'];
					//$imgPortadaP 	= 'pdf-icon-1.jpg';
					$request_documento = "";
					if($nombre_pdf != ''){
						$imgPortadaP = $strDocumentoP.'.pdf';
					}

					if($intIddocumentoP == 0)
					{
						//Crear
						if($_SESSION['permisosMod']['w']){
							$request_documento = $this->model->insertDocumentoP($strDocumentoP, $strDescipcionP,$imgPortadaP,$rutaP,$intStatus,$strFechaDocP);
							$option = 1;
						}
					}else{
						//Actualizar
						if($_SESSION['permisosMod']['u']){
							if($nombre_pdf == ''){
								if($_POST['pdf_actual'] != 'portada_categoria.png' && $_POST['pdf_remove'] == 0 ){
									$imgPortadaP = $_POST['pdf_actual'];
								}
							}
							$request_documento = $this->model->updateDocumentoP($intIddocumentoP,$strDocumentoP, $strDescipcionP,$imgPortadaP,$rutaP,$intStatus,$strFechaDocP);
							$option = 2;
						}
					}
					if($request_documento > 0 )
					{
						if($option == 1)
						{
							$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
							if($nombre_pdf != ''){ uploadImageP($pdf,$imgPortadaP); }
						}else{
							$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
							if($nombre_pdf != ''){ uploadImageP($pdf,$imgPortadaP); }

							if(($nombre_pdf == '' && $_POST['pdf_remove'] == 1 && $_POST['pdf_actual'] != 'portada_categoria.png')
								|| ($nombre_pdf != '' && $_POST['pdf_actual'] != 'portada_categoria.png')){
									deleteFileP($_POST['pdf_actual']);
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




		// public function downloadPDFP(int $id_documentoP) {
		// 	// Obtener el nombre del archivo PDF basado en el ID proporcionado
		// 	$pdfFileName = $this->model->getPDFFileNameById($id_documentoP);
			
		// 	if ($pdfFileName) {
		// 		// Ruta base donde se almacenan los archivos
		// 		$pdfDirectory = 'Assets/documents/uploads2/';
				
		// 		//Encontrar la    [  ruta y el nombre  ]   	del archivo que se queire descargar
		// 		$pdfPath = $pdfDirectory . $pdfFileName;
				
		// 		//cabeceras para la descarga del archivo
		// 		header('Content-Description: File Transfer');
		// 		header('Content-Type: application/octet-stream');
		// 		header('Content-Disposition: attachment; filename="' . basename($pdfPath) . '"');
		// 		header('Expires: 0');
		// 		header('Cache-Control: must-revalidate');
		// 		header('Pragma: public');
		// 		header('Content-Length: ' . filesize($pdfPath));
		
		// 		// proceso de leer y enviar
		// 		readfile($pdfPath);
		// 		exit;
		// 	} else {
		// 		// control de error
		// 		echo "El archivo no existe.";
		// 	}
		// }
		






		//  public function downloadPDFP(int $id_documentoP) {
		// // 	// Obtener el nombre del archivo PDF basado en el ID proporcionado
		//  	$pdfFileName = $this->model->getPDFFileNameById($id_documentoP);
			
		// 	if ($pdfFileName) {
		// // 		// Ruta base donde se almacenan los archivos
		// 		$pdfDirectory = 'Assets/documents/uploads2/';
				
		// // 		// Encontrar la ruta y el nombre del archivo que se quiere descargar
		// 		$pdfPath = $pdfDirectory . $pdfFileName;
				
		// // 		// Cabeceras para la descarga del archivo
	 	//      	header('Content-Description: File Transfer');
		// 	    header('Content-Type: application/pdf'); // Tipo MIME cambiado a application/pdf
		// 		header('Content-Disposition: attachment; filename="' . basename($pdfPath) . '"');
		// 		header('Expires: 0');
		// 		header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0'); // Desactivar la caché
		// 		header('Pragma: no-cache');
		// 		header('Content-Length: ' . filesize($pdfPath));
				
		// // 		// Proceso de leer y enviar
	 	// 	readfile($pdfPath);
		//  		exit;
		//  	} else {
		// 		// Control de error
		// 		echo "El archivo no existe.";
		//  	}
		//  }
		

		public function downloadPDFP(int $id_documentoP) {
			// Obtener el nombre del archivo PDF basado en el ID proporcionado
			$pdfFileName = $this->model->getPDFFileNameById($id_documentoP);
		
			if ($pdfFileName) {
				// Ruta base donde se almacenan los archivos
				$pdfDirectory = 'Assets/documents/uploads2/';
		
				// Encontrar la ruta y el nombre del archivo que se quiere descargar
				$pdfPath = $pdfDirectory . $pdfFileName;
		
				// Limpiar el buffer de salida
				ob_clean();
		
				// Cabeceras para la descarga del archivo
				header('Content-Description: File Transfer');
				header('Content-Type: application/pdf'); // Tipo MIME cambiado a application/pdf
				header('Content-Disposition: attachment; filename="' . basename($pdfPath) . '"');
				header('Expires: 0');
				header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0'); // Desactivar la caché
				header('Pragma: no-cache');
				header('Content-Length: ' . filesize($pdfPath));
		
				// Proceso de leer y enviar
				readfile($pdfPath);
				exit;
			} else {
				// Control de error
				echo "El archivo no existe.";
			}
		}
		





		public function getDocumentosP()
		{
			if($_SESSION['permisosMod']['r']){
				$arrData = $this->model->selectDocumentosP();
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
						$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['id_documentoP'].')" title="Ver documento"><i class="far fa-eye"></i></button>';
						 $btnDown = '<button class="btn btn-info btn-sm" onClick="downloadPDFP('.$arrData[$i]['id_documentoP'].')" title="Descargar documento"><i class="fas fa-download"></i></button>';

					}
					if($_SESSION['permisosMod']['u']){
						$btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['id_documentoP'].')" title="Editar documento"><i class="fas fa-pencil-alt"></i></button>';
					}
					if($_SESSION['permisosMod']['d']){	
						$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['id_documentoP'].')" title="Eliminar documento"><i class="far fa-trash-alt"></i></button>';
					}
					$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.''.$btnDown. '</div>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function getDocumentoP($id_documentoP)
		{
			if($_SESSION['permisosMod']['r']){
				$intIddocumentoP = intval($id_documentoP);
				if($intIddocumentoP > 0)
				{
					$arrData = $this->model->selectDocumentoP($intIddocumentoP);
					if(empty($arrData))
					{
						$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
					}else{
						$arrData['url_portada'] = media().'/documents/uploads2/'.$arrData['portadaP'];
						$arrResponse = array('status' => true, 'data' => $arrData);
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}

		public function delDocumentoP()
		{
			if($_POST){
				if($_SESSION['permisosMod']['d']){
					$intIddocumentoP = intval($_POST['idDocumentoP']);
					$requestDelete = $this->model->deleteDocumentoP($intIddocumentoP);
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

		public function getSelectDocumentosP(){
			$htmlOptions = "";
			$arrData = $this->model->selectDocumentosP();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['id_documentoP'].'">'.$arrData[$i]['nombre'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();	
		}




    }
    
 ?>