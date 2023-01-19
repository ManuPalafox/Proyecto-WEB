<?php
//En este archivo nos conectamos a una base de datos para extraer información de un usuario
    include("./fpdf185/fpdf.php");
    
    class PDF extends FPDF
    {
        // Cabecera de página
        function Header()
        {
            // Logo
            $this->Image('pruebacabecera.png',5,5,200);
            $this->Ln(20);
        }

        // Pie de página
        function Footer()
        {
            // Posición: a 1,5 cm del final
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Número de página
            $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
        }
    }

    //Conexión a la BD y extracción de la información de nuestro interes
    $boleta = '2020630001';
    $conexion = mysqli_connect("localhost","root","","sem20231");
    $sql = "SELECT * FROM alumno WHERE boleta = $boleta";
    $res = mysqli_query($conexion, $sql);
    $alumno = mysqli_fetch_array($res);

    $contenidoPDF = "$alumno[0] - $alumno[1] $alumno[2] $alumno[3]";

    // Creación del objeto de la clase heredada
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,'',0,1);
    $pdf->Cell(0,7,"$alumno[0]",0,1);
    $pdf->Cell(0,7,"$alumno[1]",0,1);
    $pdf->Cell(0,7,"$alumno[2]",0,1);
    $pdf->Cell(0,7,"$alumno[3]",0,1);
    for($i=1;$i<=3;$i++){
        $pdf->Cell(0,10,"$contenidoPDF / ".$i,0,1);
    }
    $pdf->Output();
?>