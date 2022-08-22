<?php
    session_start();
    include_once("Proveedor/Proveedor.php");
    include_once("Usuario/Usuario.php");
    if(isset($_SESSION['administrador'])){
        $usuario=$_POST['usuario'];
        $contrasena1=$_POST['contrasena1'];
        $contrasena2=$_POST['contrasena2'];
        $nombre=$_POST['nombre'];
        if(strcmp($contrasena1,$contrasena2)==0){
            $proveedor=new Proveedor($usuario,$nombre,null,null,null,null,null,null);
            $proveedor->insert();
            $user=new Usuario();
            $user->insertarUsuario($usuario,$contrasena1);
            header("location:../View/GestionarProveedores.php");
        }
    }
?>