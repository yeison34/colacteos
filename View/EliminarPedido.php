<?php
    include_once("../Model/Facturas/Factura.php");
    session_start();
    if(isset($_SESSION['administrador'])){
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $virtual=new Factura();
            $virtual->deleteVirtualId($id);
            header("location:Pedidos.php");
        }
    }
?>