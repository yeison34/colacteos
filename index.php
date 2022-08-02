<!Doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Colacteos</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
	<?php include ("View/Header.php");
	?>
		<section class="login">
			<div>
				<h1>Login</h1>
			</div>
			<div class="box-image">
				<img src="img/colacteos.png">
			</div>
			<div class="form">
				<form action="Model/login.php" method="post">
					<input type="text" name="usuario" class="campoUsuario" id="usuario">	
					<input type="password" name="contrasena" placeholder="contraseña" class="campoUsuario">
					<input type="submit" name="ingresar" value="Ingresar"class="campoUsuario">
				</form>
			</div>
			<div>
				<a href="View/CrearCuenta.php">Crear Cuenta</a>
			</div>	
		</section>
	<?php include ("View/Footer.php");
	?>
	<script>
	 	var usuario = document.getElementById('cusuario');

 		var cantidad_caracteres = function(){
 			if(usuario.value.length==8){
 				console.log("ya llego a las 8 caracteres");
 			}
 		};

 		usuario.addEventListener("change",cantidad_caracteres);
 	</script>	 	
</body>
</html>