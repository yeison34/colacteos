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
		include_once("../Model/Usuario/Usuario.php");
		if(isset($_SESSION['administrador'])){
			$usuarios=new Usuario();
            $resultado=$usuarios->getProveedores();
		}
	?>
    <section class="gestionar-proveedores">
        <div class="tabla-gestionar-proveedores">
            <table>
                <th>No.</th>
                <th>Nit</th>
                <th>Nombre</th>
                <th>Estado</th>
                <th><a href="RegistrarProveedores.php"><button class="nuevo-proveedor">Nuevo</button></a></th>        
                <?php
                    $cont=0;
                    while($cont!=count($resultado)){
                        ?>
                            <tr>
                                <td><?php echo $cont+1?></td>
                                <td><?php echo $resultado[$cont]['nit_empresa']?></td>
                                <td><?php echo $resultado[$cont]['nom_empresa']?></td>
                                <td><?php echo $resultado[$cont]['estado']?></td>
                                <td><a href="../Model/EliminarProveedor.php?id=<?php echo $resultado[$cont]['nit_empresa']?>"><button class="eliminar-proveedor">Eliminar</button></a></td>
                            </tr>    
                        <?php
                        $cont++;
                    }
                ?>
            </table>

        </div>    
    </section>    
	<?php include_once("..//View/Footer.php");?>
	
	
</body>
</html>