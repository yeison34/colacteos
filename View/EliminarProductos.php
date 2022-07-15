<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Eliminar Productos</title>
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
	<?php
		include_once("Header.php");
		include_once("navbarProductos.php");
		include_once("LogoUsuario.php");
		include_once("../Model/Conexion.php");
		$cod=$_GET['id'];
		$conexion=new Conexion();
		$conexion=$conexion->getConection();
		$sql="DELETE FROM producto where cod_producto='$cod'";
		if($stament=$conexion->prepare($sql)){
			$stament->execute();
			header("location:GestionarProductos.php");
		} 
	?>
</body>
</html>