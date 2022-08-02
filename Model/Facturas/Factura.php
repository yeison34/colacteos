<?php
    include_once("../Model/Conexion.php");
    class Factura{
        private $conexion;
        private $id;
        public function __construct(){
            $this->conexion=new Conexion();
            $this->conexion=$this->conexion->getConection();
        }

        public function insertVirtual($codigo_producto,$cant,$proveedor,$codigo){
            $sql="INSERT into virtual (cod_producto,cant,nit_empresa,cod_administrador) values(?,?,?,?)";
            $datos=array($codigo_producto,$cant,$proveedor,$codigo);
            $stament=$this->conexion->prepare($sql);
            $stament->execute($datos);
        }

        public function insertDetalleFactura(){
            $valor=$this->getUltimoValor()['max'];
            $sql="INSERT into detalle_factura (cod_producto,cant,nit_empresa,cod_factura) select cod_producto,cant,nit_empresa,'$valor' from virtual";
            $stament=$this->conexion->prepare($sql);
            $stament->execute();
        }

        public function insertFactura($fecha_factura,$codigo_administrador){
            $sql="INSERT into factura (fecha_factura,cod_administrador) values(?,?)";
            $datos=array($fecha_factura,$codigo_administrador);
            $stament=$this->conexion->prepare($sql);
            $stament->execute($datos);
            $base=new Conexion();
        }

        public function getVirtual($id){
            $sql="SELECT *from virtual join producto using(cod_producto) join proveedor using(nit_empresa) where cod_administrador=? order by id_detalle";
            $datos=array($id);
            $stament=$this->conexion->prepare($sql);
            $stament->execute($datos);
            $resultado=$stament->fetchall(PDO::FETCH_ASSOC);
            return $resultado;
        }

        public function deleteVirtual($id){
            $sql="delete from virtual where cod_administrador=?";
            $datos=array($id);
            $stament=$this->conexion->prepare($sql);
            $stament->execute($datos);
        }

        public function deleteVirtualId($id){
            $sql="delete from virtual where id_detalle=?";
            $datos=array($id);
            $stament=$this->conexion->prepare($sql);
            $stament->execute($datos);
        }

        public function getUltimoValor(){
            $sql="SELECT max(cod_factura) from factura";
            $stament=$this->conexion->prepare($sql);
            $stament->execute();
            $resultado=$stament->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        }
        public function getUltimoValorFactura($id){
            $sql="SELECT max(cod_factura) from factura where cod_administrador=?";
            $datos=array($id);
            $stament=$this->conexion->prepare($sql);
            $stament->execute($datos);
            $resultado=$stament->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        } 

        public function getDatosReporte($id){
            $ultimo=$this->getUltimoValorFactura($id)['max'];
            $sql="SELECT *from factura join detalle_factura using(cod_factura) join administrador using(cod_administrador) join producto using(cod_producto) where cod_administrador=? and cod_factura=?";
            $datos=array($id,$ultimo);
            $stament=$this->conexion->prepare($sql);
            $stament->execute($datos);
            $resultado=$stament->fetchall(PDO::FETCH_ASSOC);
            return $resultado;
        }
    }

?>