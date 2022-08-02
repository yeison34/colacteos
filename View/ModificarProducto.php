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
		include_once("../Model/Productos/Producto.php");
		include_once("../View/navbarProductos.php");
	?>
	<?php
		$producto;
		if(isset($_SESSION['proveedor'])){
			$producto=new Producto();
			$cod_producto=$_GET['id'];
			$resultado=$producto->getProduct($cod_producto);
		}		
	?>
	<section class="section-form-products">
					<div class="register-products-form">	
						<form action="../View/ActualizarProducto.php" method="post" enctype="multipart/form-data">
							<ul class="first-inputs">
								<li><label>Codigo producto: </label><input type="text" name="codigo_producto" value="<?php echo $cod_producto;?>"></li>
								<li><label>Codigo Proveedor: </label><input type="text" name="nitEmpresa" value="<?php echo $_SESSION['proveedor'];?>" disabled style="border: 2px solid black; background-color: lightgrey;"></li>
								<li><label>Nombre producto: </label><input type="text" name="nombre_producto" value="<?php echo $resultado['nombre_producto'];?>"></li>
							</ul>
							<ul class="seconds-inputs">
								<li><label>Descripción: </label><input type="text" name="a_descripcion" class="campoDescripcion" value="<?php echo $resultado['descripcion'];?>"></li>
								<li><label>Precio Unitario: </label><input type="text" name="precio_unitario" class="camposPrecio" value="<?php echo $resultado['precio_unit'];?>"></li>
								<li class="imagen-producto"><label>Imagen Actual: </label><img src="../Model/Productos/img_productos/<?php echo $resultado['imagen']?>" id="img_producto"></li>
								<li><label>Imagen Nueva</label><input type="file" name="imagen"></li>
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