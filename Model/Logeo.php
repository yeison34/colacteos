<?php
	include ("Operaciones.php");
	//include ("View/index.php");
	class Logeo{

		public $usuario;
		public $contrasena;
		public $var;

		public function __construct($usuario){
			$this->usuario=new Login($usuario);
		}

		public function prueba(){

			$this->var=$this->usuario->getResultado();
			if(!empty($this->var)){
				$this->var=$this->usuario->getResultado();
				echo $var;	
			}else{
				echo "No existe";
			}
		}
	}
?>
