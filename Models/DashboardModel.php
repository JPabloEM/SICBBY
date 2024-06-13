<?php 
	class DashboardModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function cantUsuarios(){
			$sql = "SELECT COUNT(*) as total FROM persona WHERE status != 0";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}

		public function cantVoluntariosSolicitud(){
			$sql = "SELECT COUNT(*) as total FROM volunteers WHERE Estado = 'Solicitud'";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}

		public function cantVoluntarios(){
			$sql = "SELECT COUNT(*) as total FROM volunteers WHERE Estado != 'Solicitud'";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}

		public function cantTalleres(){
			$sql = "SELECT COUNT(*) as total FROM taller";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}

		public function cantCharlas(){
			$sql = "SELECT COUNT(*) as total FROM charla";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}

		public function cantVoluntariados(){
			$sql = "SELECT COUNT(*) as total FROM voluntariado";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}

		public function cantDocumentos(){
			$sql = "SELECT COUNT(*) as total FROM documento WHERE status != 0";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}

		public function cantDocumentosP(){
			$sql = "SELECT COUNT(*) as total FROM documentacionp WHERE status != 0";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}

		
		public function cantMensajes(){
			$sql = "SELECT COUNT(*) as total FROM contacto ";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}

	


	}
 ?>