<?php

session_start();

//En este archivo nos conectamos a una base de datos para extraer información de un usuario
    include("./fpdf185/fpdf.php");
    include("./phpMailer/class.phpmailer.php");
include("./phpMailer/class.smtp.php");

$email_user = "bustillos.leon.le@gmail.com"; //Debes actualizar esta línea con tu información
$email_password = "zctikuxeczumypxw"; //Debes actualizar esta línea con tu información
$the_subject = "Prueba de PHPMailer por BLLE (Jan 2023)";
//$address_to = "lalito260402lebl@gmail.com"; //Debes actualizar esta línea con tu información
$from_name = "TDAW";
$phpmailer = new PHPMailer();
$phpmailer->Username = $email_user;
$phpmailer->Password = $email_password;
$phpmailer->SMTPSecure = 'ssl';
$phpmailer->Host = "smtp.gmail.com"; // GMail
$phpmailer->Port = 465;
$phpmailer->IsSMTP(); // use SMTP
$phpmailer->SMTPAuth = true;
$phpmailer->setFrom($phpmailer->Username,$from_name);


date_default_timezone_set('UTC'); //Universal Time Coordinated
date_default_timezone_set("America/Mexico_City");

    class PDF extends FPDF
    {
        // Cabecera de página
        function Header()
        {
            // Logo
            $this->Image('pruebafondo2.png', 0, 0, $this->w,$this->h);
            $this->Image('pruebacabecera.png',5,5,200);
            $this->Ln(20);
            
        }
        
        // Pie de página
        function Footer()
        {
            $this->Image('logoipn.png',100,270,10);
        }
    }

    //Conexión a la BD y extracción de la información de nuestro interes
    $boleta = $_SESSION["boleta"];
    $curp = $_SESSION["curp"];
    $conexion = mysqli_connect("localhost","root","","form");
    $sql = "SELECT * FROM persona WHERE numbol = $boleta";
    $res = mysqli_query($conexion, $sql);
    $alumno = mysqli_fetch_array($res);
    $address_to = $alumno[15];
    $phpmailer->AddAddress($address_to); // recipients email

    // Creación del objeto de la clase heredada
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(10,8,"",0,1);
    $pdf->Cell(10,8,utf8_decode("IDENTIDAD:"),0,1);
    $pdf->Cell(10,4,"",0,1);
    $pdf->Cell(25,8,utf8_decode("ID:"),1,0,'C');
    $pdf->Cell(50,8,utf8_decode("Nombre de pila:"),1,0,'C');
    $pdf->Cell(50,8,utf8_decode("Apellido paterno:"),1,0,'C');
    $pdf->Cell(50,8,utf8_decode("Apellido materno:"),1,1,'C');
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(25,8,utf8_decode("$alumno[0]"),1,0,'C');
    $pdf->Cell(50,8,utf8_decode("$alumno[1]"),1,0,'C');
    $pdf->Cell(50,8,utf8_decode("$alumno[2]"),1,0,'C');
    $pdf->Cell(50,8,utf8_decode("$alumno[3]"),1,1,'C');
    $pdf->Cell(10,4,"",0,1);
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(50,8,utf8_decode("F. de Nacimiento:"),1,0,'C');
    $pdf->Cell(25,8,utf8_decode("Genero:"),1,0,'C');
    $pdf->Cell(50,8,utf8_decode("CURP:"),1,0,'C');
    $pdf->Cell(50,8,utf8_decode("No. de boleta:"),1,1,'C');
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(50,8,utf8_decode("$alumno[4]"),1,0,'C');
    $pdf->Cell(25,8,utf8_decode("$alumno[5]"),1,0,'C');
    $pdf->Cell(50,8,utf8_decode("$alumno[6]"),1,0,'C');
    $pdf->Cell(50,8,utf8_decode("$alumno[7]"),1,1,'C');
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(10,16,utf8_decode("CONTACTO:"),0,1);
    $pdf->Cell(50,8,utf8_decode("Alcaldia:"),1,0,'C');
    $pdf->Cell(50,8,utf8_decode("Colonia:"),1,0,'C');
    $pdf->Cell(25,8,utf8_decode("C.P.:"),1,0,'C');
    $pdf->Cell(50,8,utf8_decode("Calle:"),1,1,'C');
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(50,8,utf8_decode("$alumno[8]"),1,0,'C');
    $pdf->Cell(50,8,utf8_decode("$alumno[9]"),1,0,'C');
    $pdf->Cell(25,8,utf8_decode("$alumno[10]"),1,0,'C');
    $pdf->Cell(50,8,utf8_decode("$alumno[11]"),1,1,'C');
    $pdf->Cell(10,4,"",0,1);
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(25,8,utf8_decode("No. Ext.:"),1,0,'C');
    $pdf->Cell(25,8,utf8_decode("No. Int.:"),1,0,'C');
    $pdf->Cell(50,8,utf8_decode("Telefono:"),1,0,'C');
    $pdf->Cell(75,8,utf8_decode("Correo Electronico:"),1,1,'C');
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(25,8,utf8_decode("$alumno[12]"),1,0,'C');
    $pdf->Cell(25,8,utf8_decode("$alumno[13]"),1,0,'C');
    $pdf->Cell(50,8,utf8_decode("$alumno[14]"),1,0,'C');
    $pdf->Cell(75,8,utf8_decode("$alumno[15]"),1,1,'C');
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(10,16,utf8_decode("PROCEDENCIA:"),0,1);
    $pdf->Cell(175,8,utf8_decode("Escuela de procedencia:"),1,1,'C');
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(175,8,utf8_decode("$alumno[16]"),1,1,'C');
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(10,4,"",0,1);
    $pdf->Cell(145,8,utf8_decode("Entidad federativa de procedencia:"),1,0,'C');
    $pdf->Cell(30,8,utf8_decode("Promedio:"),1,1,'C');
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(145,8,utf8_decode("$alumno[17]"),1,0,'C');
    $pdf->Cell(30,8,utf8_decode("$alumno[18]"),1,1,'C');
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(10,4,"",0,1);
    $pdf->Cell(150,8,"LUGAR Y HORA DEL EXAMEN:",0,1);
    $pdf->Cell(100,8,"Laboratorio",1,0,'C');
    $pdf->Cell(75,8,"Horario",1,1,'C');
    $pdf->SetFont('Arial','',12);
    if($alumno[0]>0&&$alumno[0]<26){
        $pdf->Cell(100,8,"Laboratorio 1",1,0,'C');
        $pdf->Cell(75,8,"8:00am-9:30am",1,1,'C');
    }else if($alumno[0]>26&&$alumno[0]<51){
        $pdf->Cell(100,8,"Laboratorio 2",1,0,'C');
        $pdf->Cell(75,8,"8:00am-9:30am",1,1,'C');
    }else if($alumno[0]>50&&$alumno[0]<76){
        $pdf->Cell(100,8,"Laboratorio 3",1,0,'C');
        $pdf->Cell(75,8,"8:00am-9:30am",1,1,'C');
    }else if($alumno[0]>75&&$alumno[0]<101){
        $pdf->Cell(100,8,"Laboratorio 4",1,0,'C');
        $pdf->Cell(75,8,"8:00am-9:30am",1,1,'C');
    }else if($alumno[0]>100&&$alumno[0]<126){
        $pdf->Cell(100,8,"Laboratorio 5",1,0,'C');
        $pdf->Cell(75,8,"8:00am-9:30am",1,1,'C');
    }else if($alumno[0]>125&&$alumno[0]<151){
        $pdf->Cell(100,8,"Laboratorio 6",1,0,'C');
        $pdf->Cell(75,8,"8:00am-9:30am",1,1,'C');
    }else if($alumno[0]>150&&$alumno[0]<176){
        $pdf->Cell(100,8,"Laboratorio 1",1,0,'C');
        $pdf->Cell(75,8,"9:45am-11:15am",1,1,'C');
    }else if($alumno[0]>175&&$alumno[0]<201){
        $pdf->Cell(100,8,"Laboratorio 2",1,0,'C');
        $pdf->Cell(75,8,"9:45am-11:15am",1,1,'C');
    }else if($alumno[0]>200&&$alumno[0]<226){
        $pdf->Cell(100,8,"Laboratorio 3",1,0,'C');
        $pdf->Cell(75,8,"9:45am-11:15am",1,1,'C');
    }else if($alumno[0]>225&&$alumno[0]<251){
        $pdf->Cell(100,8,"Laboratorio 4",1,0,'C');
        $pdf->Cell(75,8,"9:45am-11:15am",1,1,'C');
    }else if($alumno[0]>250&&$alumno[0]<276){
        $pdf->Cell(100,8,"Laboratorio 5",1,0,'C');
        $pdf->Cell(75,8,"9:45am-11:15am",1,1,'C');
    }else if($alumno[0]>275&&$alumno[0]<301){
        $pdf->Cell(100,8,"Laboratorio 6",1,0,'C');
        $pdf->Cell(75,8,"9:45am-11:15am",1,1,'C');
    }
//$pdf->Output();
$pdfdoc = $pdf->Output('', 'S');
$phpmailer->Subject = $the_subject;	
$phpmailer->Body .="<h1 style='color:#3498db;'>Envio de datos</h1>";
$phpmailer->Body .= "<p>Por medio del siguiente correo se hace entrega del formulario con los datos validados del usuario.</p>";
$phpmailer->Body .= "<p><b>Fecha: ".date("d-m-Y H:i:s")."</b></p>";
$phpmailer->IsHTML(true);
$phpmailer->addStringAttachment($pdfdoc, 'validacion.pdf');
if(!$phpmailer->Send()){
    echo "El correo no se pudo enviar";
}else{
    header("Location: index.html");
}

?>