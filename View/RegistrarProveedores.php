<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registrar Usuario</title>
	<link  rel="stylesheet" href="../css/styles.css">
</head>
<body>
	
	<?php
		include_once("Header.php");
		include_once("LogoUsuario.php");	
		include_once("navbarAdmin.php");
	?>

	<section class="section-register-form-usuario">
		<center><h2>Registrar Usuario</h2></center>
		<div class="container-form">
            <div class="register-user">
                <form method="post" action="../Model/registrarProveedores.php">
                    <ul id="form-user-container">
                        <li>Usuario</li>
                        <li><input type="text" name="usuario" value="" placeholder="Usuario"></li>
                        <li>Nombre</li>
                        <li><input type="text" name="nombre" value="" placeholder="Nombre Proveedor"></li>
                        <li>Contraseña</li>
                        <li><input type="password" name="contrasena1" value="" placeholder="Contraseña"></li>
                        <li>Confirmar Contraseña</li>
                        <li><input type="password" name="contrasena2" value="" placeholder="Confirmar contraseña"></li>
                    </ul>	
                        <div class="submit-actualizar">
                            <input type="submit" value="Registrar">
                        </div>	
                </form>
            </div> 
        </div>       
	</section>	
	<?php include_once("..//View/Footer.php");?>
	
	
</body>
</html>