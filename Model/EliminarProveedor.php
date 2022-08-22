<?php
    session_start();
    include_once("Proveedor/Proveedor.php");
    if($_SESSION['administrador']){
        $proveedor=new Proveedor(null,null,null,null,null,null,null,null);
        $id=$_GET['id'];
        $proveedor->delete($id);
        header("location:../View/GestionarProveedores.php");
    }
?>