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
		include_once("../Model/Productos/Producto.php");
		include_once("../Model/Productos/Stock.php");
		if(isset($_SESSION['proveedor'])){
			$producto=new Producto();
			$stock=new Stock();
			$codigo_producto=$_GET['id'];
			$stock->deleteStock($codigo_producto);
			$producto->deleteProducts($codigo_producto);
			header("location:GestionarProductos.php");
		}
	?>
</body>
</html>