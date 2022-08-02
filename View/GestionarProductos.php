<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Gestionar Productos</title>
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
	<?php
		include_once("../View/Header.php");
		include_once("../View/navbarProductos.php");
		include_once("../View/LogoUsuario.php");
		include_once("../Model/Productos/Producto.php");
	?>
	<br><center><h1>Productos Registrados</h1></center>
	<section class="gestionar-productos">
		<div class="tabla-productos">
			<table>
				<tr>
					<th>No</th>
					<th>Codigo Proveedor</th>
					<th>Codigo Producto</th>
					<th>Nombre Producto</th>
					<th>Descripción</th>
					<th>Valor Unitario</th>
					<th class="img_products">Imagen</th>
					<th class='btn-nuevo'><a href="../View/InsertarProductos.php"><button>Nuevo</button></a></th>
				</tr>
				<?php
					if(isset($_SESSION['proveedor'])){
						$user=$_SESSION['proveedor'];
						$producto=new Producto();
						$resultado=$producto->getProductsAll($user);
						$cont=0;
						while($cont!=count($resultado)){
						?>
						<tr>
							<td><?php echo $cont+1;?></td>
							<td><?php echo $resultado[$cont]['nit_empresa'];?></td>
							<td><?php echo $resultado[$cont]['cod_producto'];?></td>
							<td><?php echo $resultado[$cont]['nombre_producto'];?></td>	
							<td><?php echo $resultado[$cont]['descripcion'];?></td>
							<td><?php echo $resultado[$cont]['precio_unit'];?></td>
							<td><img src="../Model/Productos/img_productos/<?php echo $resultado[$cont]['imagen']?>" class="imagen-products"></td>
							<td><a href="../View/ModificarProducto.php?id=<?php echo$resultado[$cont]['cod_producto']?>"><button class="modificar">Modificar</button></a><a href="../View/EliminarProductos.php?id=<?php echo $resultado[$cont]['cod_producto']?>"><button class="eliminar">Eliminar</button></a></td>
						</tr>
				<?php		
					$cont++;
					}
				}?>
			</table>	
		</div>
	</section>
	<?php
		include_once("../View/Footer.php");
	?>
</body>
</html>