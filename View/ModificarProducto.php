<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Modificar Productos</title>
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
	<?php 
		include_once("../View/Header.php");
		include_once("../View/LogoUsuario.php");
	?>
	<?php
			include_once("../Model/Conexion.php");
			$conexion=new Conexion();
			$conexion=$conexion->getConection();
			$usuario=$_SESSION['usuario'];

			if($cod_producto=$_GET['id']){
				$sql="SELECT *FROM producto WHERE cod_producto='$cod_producto' and nit_empresa='$usuario'";
				$stament=$conexion->query($sql);
				$resultado=$stament->fetch(PDO::FETCH_ASSOC);
			}			
	?>
	<section class="section-form-products">
					<div class="register-products-form">	
						<form action="../View/BuscarModificar.php" method="post">
							<ul class="first-inputs">
								<li><label>Codigo producto: </label><input type="text" name="codigo_producto" value="<?php echo $resultado['cod_producto'];?>"  style="border: 2px solid black; background-color: lightgrey;"></li>
								<li><label>Codigo Proveedor: </label><input type="text" name="nitEmpresa" value="<?php echo $_SESSION['usuario'];?>" disabled style="border: 2px solid black; background-color: lightgrey;"></li>
								<li><label>Nombre producto: </label><input type="text" name="nombre_producto" value="<?php echo $resultado['nombre_producto'];?>"></li>
							</ul>
							<ul class="seconds-inputs">
								<li><label>Descripción: </label><input type="text" name="a_descripcion" class="campoDescripcion" value="<?php echo $resultado['descripcion'];?>"></li>
								<li><label>Precio Unitario: </label><input type="text" name="precio_unitario" class="camposPrecio" value="<?php echo $resultado['precio_unit'];?>"></li>
							</ul>
							<ul>
								<li><input type="submit" name="actualizar" value="Actualizar"></li>

							</ul>
						</form>
					</div>	
	</section>
	<?php include_once("../View/Footer.php");?>
</body>
</html>			