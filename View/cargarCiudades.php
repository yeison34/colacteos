<?php
    //session_start();
    include_once("../Model/Conexion.php"); 
    //if(isset($_SESSION['id_usuario'])){
        if($dpto=$_POST['nom_dpto']){
            $conexion=new Conexion();
            $conexion=$conexion->getConection();
            $sql="SELECT *FROM ciudad where nom_depto='$dpto'";
            $stament=$conexion->query($sql);
            $resultado=$stament->fetchall(PDO::FETCH_ASSOC);
            $cont=0;
            ?>
                <option>Selecciona Ciudad-----</option>
            <?php
            while($cont!=count($resultado)){
                ?>
                    <option value="<?php echo $resultado[$cont]['nom_ciudad'];?>"><?php echo $resultado[$cont]['nom_ciudad'];?></option>
                <?php
                $cont++;
            }
        }
    //}
?>