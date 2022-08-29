<?php
    class Conexion{
        private $server="ec2-54-160-109-68.compute-1.amazonaws.com";
        private $database="d8hicuidnjuh57";
        private $password="54f732dd2ad2f6180ee01ac6759985d30f592dfab91640bbead081660d01915f";
        private $user="plrtplzrogxgxa";
        private $conexion;

        public function __construct(){
            
            try{
                $this->conexion=new PDO("pgsql:host=".$this->server.";dbname=".$this->database.";user=".$this->user.";password=".$this->password);
                    //echo "Conexion Existosa";    
            }catch(Exception $e){
                echo "<br>No se pudo conectar a la base de datos: ".$this->database."<br>";
            }    

        }

        public function getConection(){
            return $this->conexion;
        }

    }
?>
