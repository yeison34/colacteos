<?php
    include_once("../Model/Persona/Persona.php");
    
    class Administrador extends Persona{
        private $apellido;

        public function __construct($id,$nombre,$direccion,$ciudad,$telefono,$correo,$foto,$apellido){
            $this->apellido=$apellido;
            parent::__construct($id,$nombre,$direccion,$ciudad,$telefono,$correo,$foto);
        }
        
        public function insert(){
            if($this->verificar($this->getId())){
                echo "ya existe"; 
            }else{
                echo $this->apellido;
                $sql="INSERT INTO administrador values(?,?,?,?,?,?,?,?)";
                $datos=array($this->getId(),$this->getCiudad(),$this->getNombre(),$this->apellido,$this->getTelefono(),$this->getCorreo(),$this->getFoto(),$this->getDireccion());
                $stament=$this->getConexion()->prepare($sql);
                $stament->execute($datos);
            }
        }

        public function update($id,$direccion,$ciudad,$telefono,$correo,$foto){
            $sql="UPDATE administrador set cod_ciudad=?,telefono=?,correo=?,url_foto=?,direccion=? where cod_administrador='$id'";
            $stament=$this->getConexion()->prepare($sql);
            $datos=array($ciudad,$telefono,$correo,$foto,$direccion);
            $stament->execute($datos);
        }

        public function verificar($id){
            return $this->select($id)['cod_administrador']==$id;
        }

        public function selectAll(){
            $sql="SELECT *from administrador";
            $stament=$this->getConexion()->query($sql);
            $resultado=$stament->fetchall(PDO::FETCH_ASSOC);
            return $resultado;
        }

        public function select($id){
            $sql="SELECT *from administrador where cod_administrador=?";
            $datos=array($id);
            $stament=$this->getConexion()->prepare($sql);
            $stament->execute($datos);
            $resultado=$stament->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        }

        function delete($id){
            $sql="DELETE from administrador where cod_administrador=?";
            $datos=array($id);
            $stament->$this->getConexion()->prepare($sql);
            $stament->execute($id);
        }

        function getCompleteInformation($id){
            $sql="SELECT *from administrador join ciudad using(cod_ciudad) join departamento on nom_depto=nom_dpto join pais using(nom_pais) where cod_administrador=?";
            $datos=array($id);
            $stament=$this->getConexion()->prepare($sql);
            $stament->execute($datos);
            $resultado=$stament->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        }

    }
   
?>