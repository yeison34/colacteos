<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Solicitar Productos</title>
    <link  rel="stylesheet" href="../css/styles.css">
</head>
<?php
    include_once("Header.php");
    include_once("LogoUsuario.php");
    include_once("navbarAdmin.php");
    include_once("../Model/Productos/Producto.php");
    include_once("../Model/Productos/Stock.php");
    $producto=new Producto();
    $resultado=$producto->getProductsAllIngresados();
    $stock=new Stock();
?>
<body>

    <div class="container-modal">
            <div id="modal" class="modal-comprar-producto">
                <a href="#" class="cerrar">X</a>
                <form action="ProductosConfirmados.php" method="POST">
                    <ul class="form-solicitud">
                        <li>Cod Producto: <input type="text" name="codigo_Producto" class="valor1" value=""></li>
                        <li>Cod Proveedor: <input type="text" name="codigo_proveedor" class="valor2"></li>
                        <li>Nombre: <input type="text" name="nombre" class="valor3"></li>
                        <li>Descripcion: <input type="text" name="descripcion" class="valor4"></li>
                        <li>Precion Unitario: <input type="text" name="valor_unitario" class="valor5"></li>
                        <li>Cantidad: <input type="text" name="cantidad" class="cantidad"></li>
                        <li><label class="texto-advertencia"></label></li>
                    </ul> 
                    <ul class="botones-solicitud">
                            <li><input type="submit" value="Confirmar" id="confirmar" name="Confirmar"></li> 
                            <li><input type="submit" name="cancelar" id="cancelar" value="Cancelar"></li>   
                    </ul> 
                </form>
            </div>
    </div>
    <section id="section" class="productos-comprar">
    
        <article class="lista1">
            <div class="lista-productos">
                    <?php
                        $cont=0;
                        $proveedor=$resultado[0]['nit_empresa'];
                        while($cont!=count($resultado)){
                            $resultadoStock=$stock->getStockProducto($resultado[$cont]['cod_producto'],$resultado[$cont]['nit_empresa']);
                            ?>
                            <div class="fila">
                                <ul class="marco">
                                
                                        <li><img src="../Model/Productos/img_productos/<?php echo $resultado[$cont]['imagen']?>" class="img-just"></label></li>
                                        <li><small><?php echo strtoupper($resultado[$cont]['nombre_producto'])?></small></li>
                                        <li><?php echo "$".$resultado[$cont]['precio_unit']?></li>
                                        <li><a href="#?id_producto=<?php echo $resultado[$cont]['cod_producto']?>&id_proveedor=<?php echo $resultado[$cont]['nit_empresa']?>&nombre=<?php echo $resultado[$cont]['nombre_producto']?>&descripcion=<?php echo $resultado[$cont]['descripcion']?>&precio=<?php echo $resultado[$cont]['precio_unit']?>&stock=<?php echo $resultadoStock['cantidad']?>" id="compra<?php echo $cont?>"><button>Comprar</button></a></li>
                                </ul>
                            </div>    
                            <?php
                            $cont++;
                        }
                    ?>          
            </div>
        </article>       
    </section>
    <script src="../Controller/jquery.js"></script>
    <script src="../Controller/anadir_producto.js"></script>
    <script src="../Controller/validarStock.js"></script>                                  
    <?php
        include_once("Footer.php");
    ?>
    
</body>    
</html>