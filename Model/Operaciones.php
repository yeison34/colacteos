
<?php
	include ("Controller/Conexion.php");	
?>	


<?php
	
	class Login{
		private $usuario;
		private $contrasena;
		private $conexion;
		private $resultado;

		public function __construct($usuario){
			$this->conexion=new Conexion();
			$this->conexion=$this->conexion->getConection();
			$sql="SELECT id_usuario, nombre_administrador,apellido_administrador FROM usuario join administrador on cod_administrador=id_usuario where id_usuario=".$usuario;
			$stament=$this->conexion->query();
			$this->resultado=$stament->fecthall(PDO:FECTH_ASSOC);
		}

		public function getResultado(){
			return $this->resultado;
		}

	}
?>
