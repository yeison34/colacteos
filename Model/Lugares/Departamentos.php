<?php
    include_once("../Model/Conexion.php");
    class Departamento{
        private $departamentos;
        private $conexion;
        public function __construct(){
            $this->conexion=new Conexion();
            $this->conexion=$this->conexion->getConection();
        }

        public function getDepartamentos($pais){
            $sql="SELECT *from departamento where nom_pais=?";
            $datos=array($pais);
            $stament=$this->conexion->prepare($sql);
            $stament->execute($datos);
            $this->departamentos=$stament->fetchall(PDO::FETCH_ASSOC);
            return $this->departamentos;
        }
    }
?>