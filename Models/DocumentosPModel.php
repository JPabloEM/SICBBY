<?php 

	class DocumentosPModel extends Mysql
	{
		public $intIddocumentoP;
		public $intIdpdfP;
		public $strDocumentoP;
		public $strDescripcionP;
		public $intStatus;
		public $strPortadaP;
		public $strRutaP;

       public $strFechaDocP;

		public function __construct()
		{
			parent::__construct();
		}

		public function insertDocumentoP(string $nombreP, string $descripcionP, string $portadaP, string $rutaP, int $status, string $fechaDocP ){

			$return = 0;
			$this->strDocumentoP = $nombreP;
			$this->strDescripcionP = $descripcionP;
			$this->strPortadaP = $portadaP;
			$this->strRutaP = $rutaP;
			$this->intStatus = $status;
			$this->strFechaDocP = $fechaDocP;

			$sql = "SELECT * FROM documentacionp WHERE nombreP = '{$this->strDocumentoP}' ";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO documentacionp(nombreP,descripcionP,portadaP,rutaP,status,fechaDocP) VALUES(?,?,?,?,?,?)";
	        	$arrData = array($this->strDocumentoP, 
								 $this->strDescripcionP, 
								 $this->strPortadaP,
								 $this->strRutaP, 
								 $this->intStatus,
								 $this->strFechaDocP);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}

		public function selectDocumentosP()
		{
			$sql = "SELECT * FROM documentacionp 
					WHERE status != 0 ";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectDocumentoP(int $id_documentoP){
			$this->intIddocumentoP = $id_documentoP;
			$sql = "SELECT * FROM documentacionp
					WHERE id_documentoP = $this->intIddocumentoP";
			$request = $this->select($sql);
			return $request;
		}

		public function updateDocumentoP(int $id_documentoP, string $documentoP, string $descripcionP, string $portadaP, string $rutaP, int $status, string $fechaDocP){
			$this->intIddocumentoP = $id_documentoP;
			$this->strDocumentoP = $documentoP;
			$this->strDescripcionP = $descripcionP;
			$this->strPortadaP = $portadaP;
			$this->strRutaP = $rutaP;
			$this->intStatus = $status;
			$this->strFechaDocP = $fechaDocP;

			$sql = "SELECT * FROM documentacionp WHERE nombreP = '{$this->strDocumentoP}' AND id_documentoP != $this->intIddocumentoP";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE documentacionp SET nombreP = ?, descripcionP = ?, portadaP = ?, rutaP = ?, status = ?, fechaDocP = ? WHERE id_documentoP = $this->intIddocumentoP ";
				$arrData = array($this->strDocumentoP, 
								 $this->strDescripcionP, 
								 $this->strPortadaP,
								 $this->strRutaP, 
								 $this->intStatus,
								 $this->strFechaDocP);
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}

		public function deleteDocumentoP(int $id_documentoP)
		{
			$this->intIddocumentoP = $id_documentoP;
			
			$sql = "DELETE FROM  documentacionp WHERE id_documentoP = $this->intIddocumentoP ";
				$arrData = array(0);
				$request = $this->delete($sql);

			return $request;
		}	

		public function getDocumentosFooterP(){
			$sql = "SELECT id_documentoP, nombreP, descripcionP, portadaP, rutaP, fechaDocP
					FROM documentacionp WHERE  status = 1 AND id_documentoP IN (".CAT_FOOTER.")";
			$request = $this->select_all($sql);
			if(count($request) > 0){
				for ($c=0; $c < count($request) ; $c++) { 
					$request[$c]['portadaP'] = BASE_URL.'/Assets/documents/uploads2/'.$request[$c]['portadaP'];		
				}
			}
			return $request;
		}







		public function getPDFFileNameById(int $id_documentoP){
			$this->intIddocumentoP = $id_documentoP;
			$sql = "SELECT portadaP FROM documentacionp WHERE id_documentoP = $this->intIddocumentoP";
			$request = $this->select($sql);
			if ($request) {
				return $request['portadaP']; // Devuelve el nombre del archivo PDF
			} else {
				return null; // Devuelve null si no se encuentra el archivo
			}
		}






	}
 ?>