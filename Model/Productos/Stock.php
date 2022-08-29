<?php
include_once("../Model/Conexion.php");
    class Stock{
        private $conexion;

        public function __construct(){
            $this->conexion=new Conexion();
            $this->conexion=$this->conexion->getConection();    
        }

        public function insertarStock($cod_producto,$cantidad,$nit_empresa){
            $sql="INSERT into stock values(?,?,?)";
            $datos=array($cod_producto,$cantidad,$nit_empresa);
            $stament=$this->conexion->prepare($sql);
            $stament->execute($datos);
        }

        public function updateStock($cod_producto,$cantidad){
            $sql="UPDATE stock set cantidad=cantidad + '$cantidad' where cod_producto='$cod_producto'";
            //$datos=array($cod_producto);
            $stament=$this->conexion->prepare($sql);
            $stament->execute();
        }

        public function getStock($id){
            $sql="SELECT *from stock where nit_empresa=?";
            $datos=array($id);
            $stament=$this->conexion->prepare($sql);
            $stament->execute($datos);
            $resultado=$stament->fetchall(PDO::FETCH_ASSOC);
            return $resultado;
        }

        public function getStockProducto($id,$empresa){
            $sql="SELECT *from stock where cod_producto=? and nit_empresa=?";
            $datos=array($id,$empresa);
            $stament=$this->conexion->prepare($sql);
            $stament->execute($datos);
            $resultado=$stament->fetch(PDO::FETCH_ASSOC);
            return $resultado;

        }

        public function deleteStock($id){
            $sql="DELETE from stock where cod_producto=?";
            $datos=array($id);
            $stament=$this->conexion->prepare($sql);
            $stament->execute($datos);
        }
    }    
?>        