<?php
	include_once("../Model/Conexion.php");
	$conexion=new Conexion();
	$conexion=$conexion->getConection();
	$cod_producto=$_POST['codigo_producto'];
	$nuevo_nombre=$_POST['nombre_producto'];
	$nuevo_descripcion=$_POST['a_descripcion'];
	$nuevo_precio=$_POST['precio_unitario'];
	$sql="UPDATE producto set nombre_producto='$nuevo_nombre',descripcion='$nuevo_descripcion',precio_unit='$nuevo_precio' where cod_producto='$cod_producto'";
	$stament=$conexion->prepare($sql);
	$stament->execute();
	header("location:GestionarProductos.php");
?>				