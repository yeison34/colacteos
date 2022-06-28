<!Doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Colacteos</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<?php include ("View/Header.php");
	//include ("Controller/Conexion.php");
	?>
	<h1 id="login">Login</h1>
	<div align="center" id="logo">
		<img src="img/colacteos.png">
	</div>
	<form action="View\prueba.php" method="post" id="formLogin">
		<div align="center">
			<input type="text" name="usuario">	
			<input type="password" name="contrasena" placeholder="contraseña">
			<input type="submit" name="ingresar" value="Ingresar" id="ingresar">	
		</div>
	</form>
	<div id="crearCuenta" align="center">
			<a href="View/crearCuenta.php">Crear Cuenta</a>
	</div>
		
</body>
</html>