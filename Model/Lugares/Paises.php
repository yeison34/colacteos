<?php
    include_once("../Model/Conexion.php");
    class Pais{
        private $paises;
        private $conexion;
        public function __construct(){
            $this->conexion=new Conexion();
            $this->conexion=$this->conexion->getConection();
        }

        public function getPaises(){
            $sql="SELECT *from pais";
            $stament=$this->conexion->query($sql);
            $this->paises=$stament->fetchall(PDO::FETCH_ASSOC);
            return $this->paises;
        }
    }
?>