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
			include_once("header.php");
			include_once("LogoUsuario.php");
			include_once("navbarProductos.php");
			include_once("../Model/Productos/Producto.php");
		?>
		<?php
			if(isset($_SESSION['proveedor'])){
				if(isset($_POST['enviar'])){
					$producto=new Producto();
					$cod=$_SESSION['proveedor'];
					$codigopro=$_POST['codigoProducto'];
					$nombre=$_POST['nombreProducto'];
					$des=$_POST['descripcion'];
					$valor=$_POST['precioUnitario'];
					
					if($_FILES['imagen']['name']=="" || $_FILES['imagen']['name']==null){
						$name="default.png";
					}else{
						$name=rand() . $_FILES['imagen']['name'];
						$ruta_temp=$_FILES['imagen']['tmp_name'];
						$ruta_destino="../Model/Productos/img_productos/";
						move_uploaded_file($ruta_temp,$ruta_destino.$name);
					}
					$producto->insertProducts($codigopro,$nombre,$des,$valor,$cod,$name);
					header("location:GestionarProductos.php");
				}	
			}
		?>			
				<section class="section-form-products">
					<br><center><h1>Insertar Producto</h1></center>
					<div class="register-products-form">	
						<form action="../View/InsertarProductos.php" method="post" enctype="multipart/form-data">
							<div class="mensajes">
								<small id="mensaje-error-codigo"></small>
								<small id="mensaje-error-nombre"></small>
								<small id="mensaje-error-descripcion"></small>
								<small id="mensaje-error-precio"></small>
							</div>	
							<ul class="inputs">
								<li><label>Codigo producto: </label><input type="text" name="codigoProducto" id="codigo_producto"></li>
								<li><label>Codigo Proveedor: </label><input type="text" name="nitEmpresa" value="<?php echo $_SESSION['proveedor'];?>"  style="border: 2px solid black; background-color: lightgrey;"></li>
								<li><label>Nombre producto: </label><input type="text" name="nombreProducto" id="nombre-producto"></li>
								<li><label>Descripción: </label><input type="text" name="descripcion" class="campoDescripcion" id="descripcion"></li>
								<li><label>Precio Unitario: </label><input type="text" name="precioUnitario" class="camposPrecio" id="precio"></li>	
								<l1><input type="file" name="imagen"></li>						
								<li class="btn-submit"><input type="submit" name="enviar" value="Insertar" id="enviar"></li>						
							</ul>
						</form>
					</div>
				</section>
		<?php include_once("Footer.php");?>
		<script src="../Controller/validarFormularioProductos.js"></script>
	</body>
	</html>
	