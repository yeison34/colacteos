<?php
    include_once("../Model/Conexion.php");
    abstract class Persona{
        private $conexion;
        private $id;
        private $nombre;
        private $direccion;
        private $ciudad;
        private $telefono;
        private $correo;
        private $foto;

        public function __construct($id,$nombre,$direccion,$ciudad,$telefono,$correo,$foto){
            $this->id=$id;
            $this->nombre=$nombre;
            $this->direccion=$direccion;
            $this->ciudad=$ciudad;
            $this->telefono=$telefono;
            $this->correo=$correo;
            $this->foto=$foto;
        }

        public function getConexion(){
            $this->conexion=new Conexion();
            $this->conexion=$this->conexion->getConection();
            return $this->conexion;
        }

        abstract public function insert();

        abstract public function selectAll();

        abstract public function select($id);

        public abstract function delete($id);

        public function getId(){
            return $this->id;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function getDireccion(){
            return $this->direccion;
        }

        public function getCiudad(){
            return $this->ciudad;
        }

        public function getTelefono(){
            return $this->telefono;
        }
        
        public function getCorreo(){
            return $this->correo;
        }

        public function getFoto(){
            return $this->foto;
        }      
    }

?>