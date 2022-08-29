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
        include_once("navbarAdmin.php");
        include_once("navbarPedidos.php");
        include_once("../Model/Productos/Producto.php");
        include_once("../Model/Proveedor/Proveedor.php");
        include_once("../Model/Facturas/Factura.php");
        
        if(isset($_SESSION['administrador'])){
            $producto=new Producto();
            $proveedor=new Proveedor(null,null,null,null,null,null,null,null);
            $virtual=new Factura();
            $resultado=$virtual->getVirtual($_SESSION['administrador']);
            
        }
    ?>
    
    <section class="pedidos">
        <div class="container-table-pedido">
        <center><h3>Solicitudes Pendientes</h3></center>
            <?php 
                if(count($resultado)!==0){?>
            <table>
                <tr>
                    <th>Nro</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Proveedor</th>
                    <th><th>
                </tr>
                <?php
                    $cont=0;
                    while($cont!=count($resultado)){
                        ?>
                            <tr>
                                <td><?php echo $resultado[$cont]['id_detalle']?></td>    
                                <td><?php echo $resultado[$cont]['nombre_producto']?></td>
                                <td><?php echo $resultado[$cont]['descripcion']?></td>
                                <td><?php echo $resultado[$cont]['cant']?></td>
                                <td><?php echo $resultado[$cont]['nom_empresa']?></td>
                                <td class="btn-acciones-productos"><li><a href="ModificarPedido.php?id=<?php echo $resultado[$cont]['id_detalle']?>"><button class="btn-modificar-pedido">Modificar</button></a><a href="EliminarPedido.php?id=<?php echo $resultado[$cont]['id_detalle']?>"><button class="btn-eliminar-pedido">Eliminar</button></a></li><td>
                            </tr>    
                        <?php
                        
                        $cont++;
                    }
                ?>
            </table>
            <ul>
                <li class="btn-generar-solicitud"><a href="GenerarReporte.php?bandera=<?php echo "true"?>"><button class="btn-solicitar">Solicitar</button></a><a href="GenerarReporte.php?bandera=<?php echo "False"?>"><button class="btn-cancelar-solicitud">Cancelar</button></a></li>
            </ul>    
            
            <?php
                }else{
                    ?>
                        <h3>Aun no tiene pedidos pendientes</h3>
                    <?php
                }
            ?>
        </div>
    </section>
</body>
</html>