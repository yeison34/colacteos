<?php
    include_once("../Model/Persona/Persona.php");
    class Proveedor extends Persona{
        private $estado;
        public function __construct($id,$nombre,$direccion,$estado,$ciudad,$telefono,$correo,$foto){
            $this->estado=$estado;
            parent::__construct($id,$nombre,$direccion,$ciudad,$telefono,$correo,$foto);
        }
        public function insert(){
            if($this->verificar($this->getId())){
                echo "ya existe";
            }else{
                $sql="INSERT INTO proveedor values(?,?,?,?,?,?,?,?)";
                $datos=array($this->getId(),$this->getNombre(),$this->getDireccion(),$this->estado,$this->getCiudad(),$this->getTelefono(),$this->getCorreo(),$this->getFoto());
                $stament=$this->getConexion()->prepare($sql);
                $stament->execute($datos);
            }
        }
        public function update($id,$direccion,$estado,$ciudad,$telefono,$correo,$foto){
            $sql="UPDATE proveedor set direccion=?,estado=?,cod_ciudad=?,telefono=?,correo=?,url_foto=? where nit_empresa='$id'";
            $stament=$this->getConexion()->prepare($sql);
            $datos=array($direccion,$estado,$ciudad,$telefono,$correo,$foto);
            $stament->execute($datos);
        }

        public function selectAll(){
            $sql="SELECT *from proveedor";
            $stament=$this->getConexion()->query($sql);
            $resultado=$stament->fetchall(PDO::FETCH_ASSOC);
            return $resultado;
        }

        public function select($id){
            $sql="SELECT *from proveedor where nit_empresa=?";
            $datos=array($id);
            $stament=$this->getConexion()->prepare($sql);
            $stament->execute($datos);
            $resultado=$stament->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        }

        function delete($id){
            $sql="DELETE from proveedor where nit_empresa=?";
            $datos=array($id);
            $stament=$this->getConexion()->prepare($sql);
            $stament->execute($datos);
        }

        public function verificar($id){
            return ($this->select($id)['nit_empresa']==$id)?true:false;
        }

        function getCompleteInformation($id){
            $sql="SELECT *from proveedor join ciudad using(cod_ciudad) join departamento on nom_depto=nom_dpto join pais using(nom_pais) where nit_empresa=?";
            $datos=array($id);
            $stament=$this->getConexion()->prepare($sql);
            $stament->execute($datos);
            $resultado=$stament->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        }
    }
?>