<?php
    class Conexion{
        private $server="localhost";
        private $database="colacteosdb";
        private $password="3424";
        private $user="postgres";
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
