<?php
    session_start();
    include_once("../Model/Facturas/Factura.php");
    if(isset($_SESSION['administrador'])){
        $factura=new Factura();
        $bandera=$_GET['bandera'];
        if($bandera=="true"){
            $fecha=date("d-m-Y");
            $factura->insertFactura($fecha,$_SESSION['administrador']);
            $factura->insertDetalleFactura();
            $factura->deleteVirtual($_SESSION['administrador']);
            include_once("../Model/GenerarPdf.php");
            header("location:Pedidos.php");
        }else if($bandera=="false"){
            $factura->deleteVirtual();
            header("location:Pedidos.php");
        }
    }
?>