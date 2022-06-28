<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<title>Principal</title>
</head>
<body>
	
	<?php
		include ("Header.php");
		include ("Model/Logeo.php");
	?>
	<?php
		$usuario=$_POST['usuario'];
		$contrasena=$_POST['contrasena'];
		$objeto=new Logeo($usuario);
		$objeto->prueba();
		
	?>	
	
</body>
</html>
