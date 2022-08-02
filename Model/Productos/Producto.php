<?php
    include_once("../Model/Conexion.php");
    class Producto{
        private $conexion;

        public function __construct(){
            $this->conexion=new Conexion();
            $this->conexion=$this->conexion->getConection();    
        }

        public function insertProducts($codigo,$nombre,$descripcion,$precio,$codigo_proveedor,$imagen){
            if($this->verificarProducto($codigo)){
                return "Este Producto Ya Se Encuentra Registrado";
            }else{
                $sql="INSERT into producto values(?,?,?,?,?)";
                $datos=array($codigo,$nombre,$descripcion,$precio,$imagen);
                $stament=$this->conexion->prepare($sql);
                $stament->execute($datos);
                $this->insertProductsProveedor($codigo,$codigo_proveedor);
                return "Se ha Registrado Satisfactoriamente";
            }
        }

        public function insertProductsProveedor($codigo_producto,$codigo_proveedor){
            $sql="INSERT into producto_proveedor values(?,?)";
            $datos=array($codigo_producto,$codigo_proveedor);
            $stament=$this->conexion->prepare($sql);
            $stament->execute($datos);
        }

        public function verificarProducto($codigo){
            $sql="SELECT *from producto where cod_producto=?";
            $datos=array($codigo);
            $stament=$this->conexion->prepare($sql);
            $stament->execute($datos);
            $resultado=$stament->fetch(PDO::FETCH_ASSOC);
            return ($resultado['cod_producto']==$codigo)? true:false;
        }

        public function getProductsAll($id){
            $sql="SELECT *from producto join producto_proveedor using(cod_producto) where producto_proveedor.nit_empresa=?";
            $datos=array($id);
            $stament=$this->conexion->prepare($sql);
            $stament->execute($datos);
            $resultado=$stament->fetchall(PDO::FETCH_ASSOC);
            return $resultado;
        }

        public function getProduct($id){
            $sql="SELECT *from producto where cod_producto=?";
            $datos=array($id);
            $stament=$this->conexion->prepare($sql);
            $stament->execute($datos);
            $resultado=$stament->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        }

        public function updateProducts($codigo_producto,$nombre,$descripcion,$precio,$imagen){
            $sql="UPDATE producto set nombre_producto=?,descripcion=?,precio_unit=?,imagen=? where cod_producto='$codigo_producto'";
            $datos=array($nombre,$descripcion,$precio,$imagen);
            $stament=$this->conexion->prepare($sql);
            $stament->execute($datos);
        }

        public function deleteProducts($codigo_producto){
            $sql="DELETE from producto_proveedor where cod_producto=?";
            $datos=array($codigo_producto);
            $stament=$this->conexion->prepare($sql);
            $stament->execute($datos);
        }

        public function getProductsAllIngresados(){
            $sql="SELECT *from producto join producto_proveedor using(cod_producto) join proveedor using (nit_empresa)";
            $stament=$this->conexion->query($sql);
            $stament->execute();
            $resultado=$stament->fetchall(PDO::FETCH_ASSOC);
            return $resultado;
        }

        public function getProducto_proveedor($codigo_proveedor,$codigo_producto){
            $sql="SELECT *from producto join producto_proveedor using(cod_producto) join proveedor using (nit_empresa) where nit_empresa=? and cod_producto=?";
            $datos=array($codigo_proveedor,$codigo_producto); 
            $stament=$this->conexion->prepare($sql);
            $stament->execute($datos);
            $resultado=$stament->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        }
    }

    //$producto=new Producto();
    //$producto->insertProducts('123','arroz','5 toneladas',112000,'3165593934');
?>