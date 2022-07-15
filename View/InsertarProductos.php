<!doctype html>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Insertar Productos</title>
		<link rel="stylesheet" type="text/css" href="../css/styles.css">
	</head>
	<body>
		<?php
			//include_once("../Model/ConsultarRegistros.php");
			include_once("header.php");
			include_once("LogoUsuario.php");
			include_once("navbarProductos.php");
		?>
		<?php
			$conexion=new Conexion();
			$conexion=$conexion->getConection();
			$sql="INSERT INTO producto VALUES(?,?,?,?,?)";
			if(isset($_POST['enviar'])){
				$stament=$conexion->prepare($sql);
				if($stament){
					$cod=$_SESSION['usuario'];
					$codigopro=$_POST['codigoProducto'];
					$nombre=$_POST['nombreProducto'];
					$des=$_POST['descripcion'];
					$valor=$_POST['precioUnitario'];
					$datos=array($codigopro,$nombre,$des,$valor,$cod);
					$stament->execute($datos);
					header("location:GestionarProductos.php");
				}
			}	
		?>			
				<section class="section-form-products">
					<br><center><h1>Insertar Producto</h1></center>
					<div class="register-products-form">	
						<form action="../View/InsertarProductos.php" method="post">
							<div class="mensajes">
								<small id="mensaje-error-codigo"></small>
								<small id="mensaje-error-nombre"></small>
								<small id="mensaje-error-descripcion"></small>
								<small id="mensaje-error-precio"></small>
							</div>	
							<ul class="inputs">
								<li><label>Codigo producto: </label><input type="text" name="codigoProducto" id="codigo_producto"></li>
								<li><label>Codigo Proveedor: </label><input type="text" name="nitEmpresa" value="<?php echo $_SESSION['usuario'];?>" disabled style="border: 2px solid black; background-color: lightgrey;"></li>
								<li><label>Nombre producto: </label><input type="text" name="nombreProducto" id="nombre-producto"></li>
								<li><label>Descripción: </label><input type="text" name="descripcion" class="campoDescripcion" id="descripcion"></li>
								<li><label>Precio Unitario: </label><input type="text" name="precioUnitario" class="camposPrecio" id="precio"></li>							
								<li class="btn-submit"><input type="submit" name="enviar" value="Insertar" id="enviar"></li>						
								
							</ul>

						</form>
						
					</div>
					
				</section>
		<?php include_once("Footer.php");?>
		<script src="../Controller/validarFormularioProductos.js"></script>

	</body>
	</html>
	