<?php
	class DocumentosPublics extends Controllers{
		public function __construct()
		{
			parent::__construct();
			// session_start();
			// session_regenerate_id(true);
			// if(empty($_SESSION['login']))
			// {
			// 	header('Location: '.base_url().'/login');
			// 	die();
			// }
			// getPermisos(MDOCUMENTOS);
		}

		public function DocumentosPublics()
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_tag'] = "Documentos Publicos";
			$data['page_title'] = "DOCUMENTOS PUBLICOS";
			$data['page_name'] = "documentosP";
			$data['page_functions_js'] = "functions_documentosP.js";
			$this->views->getView($this,"documentacionV",$data);
		}


		public function downloadPDFP(int $id_documentoP) {
			// Obtener el nombre del archivo PDF basado en el ID proporcionado
			$pdfFileName = $this->model->getPDFFileNameById($id_documentoP);
			
			if ($pdfFileName) {
				// Ruta base donde se almacenan los archivos
				$pdfDirectory = 'Assets/documents/uploads2/';
				
				//Encontrar la    [  ruta y el nombre  ]   	del archivo que se queire descargar
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
		
				// proceso de leer y enviar
				readfile($pdfPath);
				exit;
			} else {
				// control de error
				echo "El archivo no existe.";
			}
		}

		

		
	



    }
    
 ?>