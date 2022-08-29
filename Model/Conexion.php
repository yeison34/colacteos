<?php
    class Conexion{
        private $server="postgres://nbpncaoutwtzkt:4011d4d9cd395072d8f3d3bf02d922b363761e820f7419597b46147a976b04ef@ec2-18-215-96-22.compute-1.amazonaws.com:5432/dbfhk2s6f5jgfn";
        private $database="dbfhk2s6f5jgfn";
        private $password="4011d4d9cd395072d8f3d3bf02d922b363761e820f7419597b46147a976b04ef";
        private $user="nbpncaoutwtzkt";
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
