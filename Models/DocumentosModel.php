<?php 

	class DocumentosModel extends Mysql
	{
		public $intIddocumento;
		public $intIdpdf;
		public $strDocumento;
		public $strDescripcion;
		public $intStatus;
		public $strPortada;
		public $strRuta;

       public $strFechaDocl;

		public function __construct()
		{
			parent::__construct();
		}

		public function insertDocumento(string $nombre, string $descripcion, string $portada, string $ruta, int $status, string $fechaDocl ){

			$return = 0;
			$this->strDocumento = $nombre;
			$this->strDescripcion = $descripcion;
			$this->strPortada = $portada;
			$this->strRuta = $ruta;
			$this->intStatus = $status;
			$this->strFechaDocl = $fechaDocl;

			$sql = "SELECT * FROM documento WHERE nombre = '{$this->strDocumento}' ";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO documento(nombre,descripcion,portada,ruta,status,fechaDocl) VALUES(?,?,?,?,?,?)";
	        	$arrData = array($this->strDocumento, 
								 $this->strDescripcion, 
								 $this->strPortada,
								 $this->strRuta, 
								 $this->intStatus,
								 $this->strFechaDocl);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}

		public function selectDocumentos()
		{
			$sql = "SELECT * FROM documento 
					WHERE status != 0 ";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectDocumento(int $id_documento){
			$this->intIddocumento = $id_documento;
			$sql = "SELECT * FROM documento
					WHERE id_documento = $this->intIddocumento";
			$request = $this->select($sql);
			return $request;
		}

		public function updateDocumento(int $id_documento, string $documento, string $descripcion, string $portada, string $ruta, int $status, string $fechaDocl){
			$this->intIddocumento = $id_documento;
			$this->strDocumento = $documento;
			$this->strDescripcion = $descripcion;
			$this->strPortada = $portada;
			$this->strRuta = $ruta;
			$this->intStatus = $status;
			$this->strFechaDocl = $fechaDocl;

			$sql = "SELECT * FROM documento WHERE nombre = '{$this->strDocumento}' AND id_documento != $this->intIddocumento";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE documento SET nombre = ?, descripcion = ?, portada = ?, ruta = ?, status = ?, fechaDocl = ? WHERE id_documento = $this->intIddocumento ";
				$arrData = array($this->strDocumento, 
								 $this->strDescripcion, 
								 $this->strPortada,
								 $this->strRuta, 
								 $this->intStatus,
								 $this->strFechaDocl);
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}

		public function deleteDocumento(int $id_documento)
		{
			$this->intIddocumento = $id_documento;
			
			$sql = "DELETE FROM  documento WHERE id_documento = $this->intIddocumento ";
				$arrData = array(0);
				$request = $this->delete($sql);

			return $request;
		}	

		public function getDocumentosFooter(){
			$sql = "SELECT id_documento, nombre, descripcion, portada, ruta, fechaDocl
					FROM documento WHERE  status = 1 AND id_documento IN (".CAT_FOOTER.")";
			$request = $this->select_all($sql);
			if(count($request) > 0){
				for ($c=0; $c < count($request) ; $c++) { 
					$request[$c]['portada'] = BASE_URL.'/Assets/documents/uploads1/'.$request[$c]['portada'];		
				}
			}
			return $request;
		}







		public function getPDFFileNameById(int $id_documento){
			$this->intIddocumento = $id_documento;
			$sql = "SELECT portada FROM documento WHERE id_documento = $this->intIddocumento";
			$request = $this->select($sql);
			if ($request) {
				return $request['portada']; // Devuelve el nombre del archivo PDF
			} else {
				return null; // Devuelve null si no se encuentra el archivo
			}
		}






	}
 ?>