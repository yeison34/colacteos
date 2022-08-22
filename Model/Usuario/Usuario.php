<?php
    include_once("../Model/Conexion.php");
    
    class Usuario{
        private $resultado;
        private $conexion;
        public function __construct(){
            $this->conexion=new Conexion();
            $this->conexion=$this->conexion->getConection();
        }

        public function verificarUsuario($id){
            $sql="SELECT *from usuario where id_usuario=?";
            $datos=array($id);
            $stament=$this->conexion->prepare($sql);
            $stament->execute($datos);
            $this->resultado=$stament->fetch(PDO::FETCH_ASSOC);
            if($this->resultado>0){
                return true;
            }else{
                return false;
            }
        }

        public function verificarPassword($password1){
            if($this->resultado['contrasena']==$password1){
                return true;
            }else{
                return false;
            }
        }

        public function insertarUsuario($usuario,$password){
            $sql="INSERT into usuario values(?,?)";
            $datos=array($usuario,$password);
            $stament=$this->conexion->prepare($sql);
            $stament->execute($datos);
        }

        public function getProveedores(){
            $sql="SELECT *from proveedor";
            $stament=$this->conexion->query($sql);
            $resultado=$stament->fetchall(PDO::FETCH_ASSOC);
            return $resultado;
        }
    }
?>