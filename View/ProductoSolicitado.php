<?php
    include_once("../Model/Productos/Producto.php");
    session_start();
    if($_SESSION['administrador']){
        if(isset($_POST['arreglo'])){
            //$proveedor=$_POST['arreglo'];
            //$producto=array($_POST['arreglo']);
            /*$producto=new Producto();
            $resultado=$producto->getProducto_proveedor($proveedor,$producto);
            */
           
                    
            
            ?>
            <tr>
                <li><?//php echo $resultado['cod_producto']?></li>
                <td><?php print_r(explode(",",$_POST['arreglo']))?></td>
            </tr>    
            <?php
               
        } 
    }
?>