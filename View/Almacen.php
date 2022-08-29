<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Almacen</title>
	<link  rel="stylesheet" href="../css/styles.css">
</head>
<body>
	<?php
		include_once("Header.php");
		include_once("LogoUsuario.php");	
		include_once("navbarProductos.php");
        include_once("../Model/Productos/Stock.php");
        if(isset($_SESSION['proveedor'])){
            $stock=new Stock();
            $resul=$stock->getStock($_SESSION['proveedor']);
        }
	?>
    <div class="container-modal-almacen">
        <div class="almacen-container">
            <form action="modificarStock.php" method="POST">
                <input type="text" name="codigo" class="codigo">
                <input type="text" name="cantidad">
                <ul>
                    <input type="submit" value="Confirmar" name="Confirmar">
                    <input type="submit" value="Cancelar" name="Cancelar">
                </ul>    
            </form>    
        </div>   
    </div>   
    <section class="almacen">
        <div class="container-table-stock padre">
            <table>
                <th>Codigo</th>
                <th>Cantidad</th>
                <th>Agregar Existencias</th>    
                <?php
                    $cont=0;
                    while($cont!=count($resul)){
                        ?>
                        <div  class="padre">
                            <tr>
                                <td><?php echo $resul[$cont]['cod_producto']?></td>
                                <td><?php echo $resul[$cont]['cantidad']?></td>
                                <td><a href="#?id=<?php echo $resul[$cont]['cod_producto']?>" id="ide<?php echo $cont?>"><button class="existencias"><h1>+</h1></button></a></td>
                            </tr>
                        </div>    
                        <?php
                        $cont++;
                    }
                ?>
            </table>
        </div>            
    </section>
    
        
</body>
<?php
	    include_once("Footer.php");
	?>
    <script src="../Controller/jquery.js"></script>
    <script src="../Controller/modificarStock.js"></script>
</html>    