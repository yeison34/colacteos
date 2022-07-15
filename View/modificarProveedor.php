
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Modificar Usuario</title>
	<link  rel="stylesheet" href="../css/styles.css">
</head>
<body>
	<?php
		include_once("Header.php");
		include_once("navbarProductos.php");
		include_once("LogoUsuario.php");

		$conexion=new Conexion();
		$conexion=$conexion->getConection();
		$sql="SELECT *FROM pais";
		$stament=$conexion->query($sql);
		$resultado=$stament->fetchall(PDO::FETCH_ASSOC);
	?>
	<section class="editarPerfil">
		<div class="user-online-update">
			<h1><?php echo strtoupper($nom_usuario);?></h1>
		</div>
		<h2>Datos Generales</h2>
		<div class="general">
			<form method="post" action="subirFotousuario.php" enctype="multipart/form-data">
				<ul>
					<li>Nit-Empresa: <input type="text" name="" value="<?php echo $_SESSION['usuario'];?>"></li>
					<li>Nombre-Empresa: <input type="text" name="" value="<?php echo $nom_usuario?>"></li>
					<li>Direccion: <input type="text" name="" value="<?php echo $direccion;?>"></li>
					<li>Estado: 
						<select name="estado">
							<optgroup>
								<option>Selected</option>
								<option>Activo</option>
								<option>Inactivo</option>
							</optgroup>
						</select>
					</li>
					<li>Pais: 
						<select name="pais" id="pais">
								<option>Selected</option>
								<?php
								$cont=0;
									while($cont!=count($resultado)){
										?>
										<option><?php echo $resultado[$cont]['nom_pais'];?>
											
										</option>
									<?php 
										$cont++;
									}?>	
						</select>	
					</li>
					<li>Departamento:
						
						<select name="departamento" id="departamento"></select>
					</li>
					<li>Ciudad: 
						<select name="ciudad" id="ciudad">
						</select>	
					</li>
					<li>Telefono: <input type="text"></li>
					<li>Correo: <input type="text"></li>
				</ul>	
			
		</div>	<h1>Imagen Usuario</h1>
					<h3>Imagen Actual</h3>

					<div class="img-actual">
						<img src="<?php echo $url_img;?>">
					</div>
					<div class="imagen-usuario">
						<h3>Imagen Nueva</h3>
						<input type="file" name="foto">
					</div>
					<div class="submit-actualizar">
						<input type="submit" value="Actualizar">
					</div>	
			</form>
	</section>
	<script src="../Controller/jquery.js"></script>
	<script src="../Controller/llenarDepartamentos.js"></script>
	<script src="../Controller/llenarCiudades.js"></script>
	
	<?php include_once("..//View/Footer.php");?>
	
	
</body>
</html>