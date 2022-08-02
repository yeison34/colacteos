<?php
    //session_start();
    include_once("../Model/Conexion.php");
    //if(isset($_SESSION['usuario'])){
        if($pais=$_POST['id_pais']){
        $conexion=new Conexion();
        $conexion=$conexion->getConection();
        $sql="SELECT *FROM departamento where nom_pais='$pais'";
        $stament=$conexion->query($sql);
        $resultado=$stament->fetchall(PDO::FETCH_ASSOC);
        $cont=0;
        ?>
               <option>Selecciona Depto-----</option>
        <?php
        while($cont!=count($resultado)){
            ?>
                <option value="<?php echo $resultado[$cont]['nom_dpto'];?>"><?php echo $resultado[$cont]['nom_dpto'];?></option>
            <?php
            $cont++;
        }
        }    
    //}
?>