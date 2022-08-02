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
		include_once("LogoUsuario.php");
		include_once("../Model/Lugares/Departamentos.php");
		include_once("../Model/Lugares/Ciudades.php");
		include_once("../Model/Lugares/Paises.php");
		if(isset($_SESSION['administrador'])){
			include_once("navbarAdmin.php");
		}else if(isset($_SESSION['proveedor'])){
			include_once("navbarProductos.php");
		}


		$datos;
		if(isset($_SESSION['administrador'])){
			$administrador=new Administrador(null,null,null,null,null,null,null,null);
			$datos=$administrador->getCompleteInformation($_SESSION['administrador']);
			$paises=new Pais();
			$paises=$paises->getPaises();
			$ciudades=new Ciudad();
			$ciudades=$ciudades->getCiudades($datos['nom_depto']);
			$departamentos=new Departamento();
			$departamentos=$departamentos->getDepartamentos($datos['nom_pais']);
		}
	?>

	<section class="editarPerfil">
		<div class="user-online-update">
			<h1><?php echo strtoupper($datos['nombre_administrador'] ." ". $datos['apellido_administrador']);?></h1>
		</div>
		<h2>Datos Generales</h2>
		<div class="general">
			<form method="post" action="ActualizarPerfilAdministrador.php" enctype="multipart/form-data">
				<ul>
					<li>Nit-Empresa: <input type="text" name="" value="<?php echo strtoupper($datos['cod_administrador']);?>" disabled></li>
					<li>Nombre-Empresa: <input type="text" name="" value="<?php echo strtoupper($datos['nombre_administrador']." ". $datos['apellido_administrador'])?>" disabled></li>
					<li>Direccion: <input type="text" name="direccion" value="<?php echo strtoupper($datos['direccion']);?>"></li>
					<li>Pais: 
						<select name="pais"  id="pais">
							<option>Selecciona Pais-----</option>		
						<?php
							$cont=0;
							while($cont!=count($paises)){
								if($datos['nom_pais']!=$paises[$cont]['nom_pais']){
									?>
									<option value="<?php echo $paises[$cont]['nom_pais']?>"><?php echo $paises[$cont]['nom_pais']?></option>
								<?php
								}else{
								?>
									<option selected="<?php echo $datos['nom_pais']?>" value="<?php echo $datos['nom_pais']?>"><?php echo $datos['nom_pais']?></option>
								<?php
								}
								$cont++;
							}
						?>	
						</select>	
					</li>
					<li>Departamento:
						<select name="departamento" id="departamento">
							<option>Selecciona Depto-----</option>
						<?php
							$cont_dpto=0;
							while($cont_dpto!=count($departamentos)){
								if($datos['nom_dpto']!=$departamentos[$cont_dpto]['nom_dpto']){
								?>
									<option value="<?php echo $departamentos[$cont_dpto]['nom_dpto']?>"><?php echo $departamentos[$cont_dpto]['nom_dpto']?></option>
								<?php
								}else{
									?>
										<option selected="<?php echo $datos['nom_dpto']?>" value="<?php echo $datos['nom_dpto']?>"><?php echo $datos['nom_dpto']?></option>
									<?php
								}
								$cont_dpto++;
							}
						?>
						</select>
					</li>
					<li>Ciudad: 
						<select name="ciudad" id="ciudad">
						<option>Selecciona Ciudad-----</option>
							<?php
								$cont_ciudad=0;
								while($cont_ciudad!=count($ciudades)){
									if($datos['nom_ciudad']!=$ciudades[$cont_ciudad]['nom_ciudad']){
										?>
										<option value="<?php echo $ciudades[$cont_ciudad]['nom_ciudad']?>"><?php echo $ciudades[$cont_ciudad]['nom_ciudad']?></option>
									<?php
									}else{
										?>
											<option selected="<?php echo $datos['nom_ciudad']?>" value="<?php echo $datos['nom_ciudad']?>"><?php echo $datos['nom_ciudad']?></option>
										<?php
									}
									$cont_ciudad++;
								}
							?>
						</select>	
					</li>
					<li>Telefono: <input type="text" name="telefono" value="<?php echo $datos['telefono']?>"></li>
					<li>Correo: <input type="text" name="correo" value="<?php echo $datos['correo']?>"></li>
				</ul>	
			
		</div>	<h1>Imagen Usuario</h1>
					<h3>Imagen Actual</h3>

					<div class="img-actual">
						<img src="<?php echo $url_foto;?>">
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