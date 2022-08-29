<?php
    include_once("../Model/Facturas/Factura.php");
    include_once("../Model/Productos/Stock.php");
    session_start();
    if(isset($_SESSION['administrador'])){
        if(isset($_POST['Confirmar'])){
            $codigo=$_POST['codigo_Producto'];
            $cantidad=$_POST['cantidad'];
            $proveedor=$_POST['codigo_proveedor'];
            $virtual=new Factura();
            $virtual->insertVirtual($codigo,$cantidad,$proveedor,$_SESSION['administrador']);
            header("location:SolicitarProductos.php");
        }else if(isset($_POST['cancelar'])){
            header("location:SolicitarProductos.php");
        }
    }
?>
