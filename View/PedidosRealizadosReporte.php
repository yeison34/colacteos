<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pedidos Realizados</title>
	<link  rel="stylesheet" href="../css/styles.css">
</head>
<body>
<?php
   //session_start();
    include_once("../Model/Facturas/Factura.php");
    include_once("Header.php");
    include_once("LogoUsuario.php");
    include_once("navbarAdmin.php");
    include_once("navbarPedidos.php");
    if(isset($_SESSION['administrador'])){
        $reportes=new Factura();
        $reportes=$reportes->getReportesPdfAdmin($_SESSION['administrador']);
    }
?>
    <section class="reportes">
         <table>
            <tr>
                <th>Fecha Solicitud</th>
                <th>Hora</th>
                <th>Nombre Reporte</th>
            </tr>
            <?php
                $cont=0;
                while($cont!=count($reportes)){
                    ?>
                        <tr>
                            <td><?php echo $reportes[$cont]['fecha_reporte']?></td>
                            <td><?php echo $reportes[$cont]['hora']?></td>
                            <td><a href="../ReportesPdfs/<?php echo $reportes[$cont]['nombre_reporte']?>"><?php echo $reportes[$cont]['nombre_reporte']?></a></td>
                        </tr>
                    <?php
                    $cont++;
                }
            ?>
        </table>      
    </section>
</body>
<?php
    include_once("Footer.php");
?>
</html>
