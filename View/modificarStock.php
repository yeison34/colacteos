<?php
    include_once("../Model/Productos/Stock.php");
    session_start();
    if(isset($_SESSION['proveedor'])){
        if(isset($_POST['Confirmar'])){
            $codigo=$_POST['codigo'];
            $cantidad=$_POST['cantidad'];
            $stock=new Stock();
            $stock->updateStock($codigo,$cantidad);
            header("location:Almacen.php");
        }else if(isset($_POST['Cancelar'])){
            header("location:Almacen.php");
        }
    }
?>