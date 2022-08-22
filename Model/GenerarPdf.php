<?php
    session_start();
    include_once("../pdf/fpdf.php");
    include_once("Facturas/Factura.php");
    if(isset($_SESSION['administrador'])){
        date_default_timezone_set('America/Bogota');
        $factura=new Factura();
        $resultado=$factura->getDatosReporte($_SESSION['administrador']);
        $pdf=new FPDF();
        $valor=1;
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',11);
        $pdf->cell(65);
        $pdf->Image('../img/logoColacteos.jpg',5,5,35,35);
        $pdf->Cell(70,10,'Solicitud de Productos',0,0,'C');
        $pdf->ln();
        $pdf->ln();
        $pdf->cell(170,10,'Nro. ',0,0,'R');
        $pdf->cell(20,10,$valor,1,0,'L');
        $pdf->ln();
        $pdf->cell(52,10,'Fecha de Solicitud: ' . $resultado[0]['fecha_factura'],0,0,'L');
        $pdf->ln();
        $pdf->ln();
        $pdf->cell(190,10,utf8_decode('Descripción de Producto Solicitado'),0,0,'C');
        $pdf->ln();
        $pdf->cell(20,10,'No.',1);
        $pdf->cell(142,10,'Producto Solicitado',1,0,'C');
        $pdf->cell(28,10,'Cantidad',1);
        $cont=0;
        while($cont!=count($resultado)){
            $pdf->ln();
            $pdf->cell(20,10,$cont+1,1);
            $pdf->cell(142,10,$resultado[$cont]['nombre_producto'],1,0,'L');
            $pdf->cell(28,10,$resultado[$cont]['cant'],1); 
            $cont++;
        }
        $pdf->ln();
        $pdf->ln();
        $pdf->cell(190,10,utf8_decode('FUNCIONARIO QUE SOLICITA PRODUCTOS'),0,0,'C');
        $pdf->ln();
        $pdf->cell(130,10,utf8_decode('NOMBRE Y APELLIDOS'),1,0,'L');
        $pdf->cell(61,10,utf8_decode('FIRMA'),1,0,'L');
        $pdf->ln();
        $pdf->cell(130,10,utf8_decode($resultado[0]['nombre_administrador'] ." ". $resultado[0]['apellido_administrador']),1,0,'L');
        $pdf->cell(61,10,utf8_decode(''),1,0,'L');
        $pdf->ln();
        $pdf->ln();
        $pdf->cell(190,10,utf8_decode('FUNCIONARIO O ENTIDAD QUE RECIBE LA SOLICITUD'),0,0,'C');
        $pdf->ln();
        $pdf->cell(130,10,utf8_decode('NOMBRES'),1,0,'L');
        $pdf->cell(61,10,utf8_decode('FIRMA'),1,0,'L');
        $pdf->ln();
        $pdf->cell(130,10,'',1,0,'L');
        $pdf->cell(61,10,utf8_decode(''),1,0,'L');
        $pdf->ln();
        $name=rand() . $_SESSION['administrador'] . rand() . ".pdf";
        $factura->setReportePdf($_SESSION['administrador'],$resultado[0]['nit_empresa'],date('Y-m-d'),date('h:i:s'),$name);
        $pdf->Output('F','../ReportesPdfs/' . $name);
    }
?>