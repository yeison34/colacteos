<?php
    include_once("../Model/Usuario/Usuario.php");
    include_once("../Model/Proveedor/Proveedor.php");
    include_once("../Model/Administrador/Administrador.php");
    $usuario=new Usuario();
    if(!empty($_POST['usuario']) && !empty($_POST['contrasena'])){
        $id=$_POST['usuario'];
        $password=$_POST['contrasena'];
        if($usuario->verificarUsuario($id)){
            if(!$usuario->verificarPassword($password)){
                echo "Contraseña Incorrecta<br>";
            }else{
                session_start();
                $administrador=new Administrador(null,null,null,null,null,null,null,null);
                $proveedor=new Proveedor(null,null,null,null,null,null,null,null);
                
                if($administrador->select($id)>0){
                    $_SESSION['administrador']=$id;
                    header("location:../View/administradores.php");
                }else if($proveedor->select($id)>0){
                    $_SESSION['proveedor']=$id;
                    header("location:../View/PaginaProductos.php");
                }
            }    
        }else{
            echo "Correo y Contraseña Incorrectos<br>";
        }
    }
    
?>