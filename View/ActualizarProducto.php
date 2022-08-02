<?php
include_once("../Model/Productos/Producto.php");
session_start();
if(isset($_SESSION['proveedor'])){
        $producto=new Producto();
        $codigo=$_POST['codigo_producto'];
        $resultado=$producto->getProduct($codigo);
        $nuevo_nombre=$_POST['nombre_producto'];
        $nuevo_descripcion=$_POST['a_descripcion'];
        $nuevo_precio=$_POST['precio_unitario'];
        if(($_FILES['imagen']['name']=="" || $_FILES['imagen']['name']==null) && $resultado['imagen']=="default.png"){
            $imagen="default.png";
        }else if(($_FILES['imagen']['name']=="" || $_FILES['imagen']['name']==null)&& $resultado['imagen']!="default.png"){
           $imagen=$resultado['imagen'];
        }else{
            $imagen=rand() . $_FILES['imagen']['name'];
            $ruta_temp=$_FILES['imagen']['tmp_name'];
            $ruta_destino="../Model/Productos/img_productos/";
            move_uploaded_file($ruta_temp,$ruta_destino.$imagen);
        }
        $producto->updateProducts($codigo,$nuevo_nombre,$nuevo_descripcion,$nuevo_precio,$imagen);       
        header("location:GestionarProductos.php");
}    
?>