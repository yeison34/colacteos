<?php 
	include ("Conexion.php");
	
	class Consultar{
		private $resultado;
		public function __construct($usuario){
			$conexion=new Conexion();
			$conexion=$conexion->getConection();
			$sql="SELECT id_usuario,contrasena FROM usuario where id_usuario='$usuario'";
			
			
			if($stament=$conexion->query($sql)){
				$this->resultado=$stament->fetch(PDO::FETCH_ASSOC);
			}else{
				$this->resultado=null;
			}

		}

		public function getResultado(){
			return $this->resultado;
		}

	}
?>