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
					<th><a href="../View/InsertarProductos.php"><button>Nuevo</button></a></th>
				</tr>
				<?php
					$user=$_SESSION['usuario'];
					$consulta="SELECT *FROM producto where nit_empresa='$user' order by 2";
					$request=$conexion->query($consulta);
					$resul=$request->fetchall(PDO::FETCH_ASSOC);
					$cont=0;
					while($cont!=count($resul)){
						?>
						<tr>
							<td><?php echo $cont+1;?></td>
							<td><?php echo $resul[$cont]['nit_empresa'];?></td>
							<td><?php echo $resul[$cont]['cod_producto'];?></td>
							<td><?php echo $resul[$cont]['nombre_producto'];?></td>	
							<td><?php echo $resul[$cont]['descripcion'];?></td>
							<td><?php echo $resul[$cont]['precio_unit'];?></td>
							<td><a href="../View/ModificarProducto.php?id=<?php echo$resul[$cont]['cod_producto']?>"><button class="modificar">Modificar</button></a></td>
							<td><a href="../View/EliminarProductos.php?id=<?php echo $resul[$cont]['cod_producto']?>"><button class="eliminar">Eliminar</button></a></td>
						</tr>
				<?php		
					$cont++;
					}?>
				
			</table>	
		</div>
	</section>
	<?php
		include_once("../View/Footer.php");
	?>
</body>
</html>