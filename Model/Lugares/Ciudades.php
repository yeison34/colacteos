<?php
    include_once("../Model/Conexion.php");
    class Ciudad{
        private $ciudades;
        private $conexion;
        public function __construct(){
            $this->conexion=new Conexion();
            $this->conexion=$this->conexion->getConection();
        }

        public function getCiudades($departamento){
            $sql="SELECT *from ciudad where nom_depto=?";
            $datos=array($departamento);
            $stament=$this->conexion->prepare($sql);
            $stament->execute($datos);
            $this->ciudades=$stament->fetchall(PDO::FETCH_ASSOC);
            return $this->ciudades;
        }
    }
?>