<?php

include("conexion.php");
$con=conectar();

$idpersona=$_POST['idpersona'];
$nombre=$_POST['nombre'];
$papellido=$_POST['papellido'];
$sapellido=$_POST['sapellido'];
$fecha=$_POST['fecha'];
$genero=$_POST['genero'];
$curp=$_POST['curp'];
$numbol=$_POST['numbol'];
$alcaldia=$_POST['alcaldia'];
$colonia=$_POST['colonia'];
$cp=$_POST['cp'];
$calle=$_POST['calle'];
$numerocasaext=$_POST['numerocasaext'];
$numerocasaint=$_POST['numerocasaint'];
$tel=$_POST['tel'];
$correo=$_POST['correo'];
$escuela=$_POST['escuela'];
$entife=$_POST['entife'];
$promedio=$_POST['promedio'];;

$sql="UPDATE persona SET  nombre='$nombre',papellido='$papellido',sapellido='$sapellido' , fecha='$fecha',genero='$genero',curp='$curp' ,numbol='$numbol',alcaldia='$alcaldia',colonia='$colonia' ,cp='$cp', calle='$calle',numerocasaext='$numerocasaext' ,numerocasaint='$numerocasaint',tel='$tel',correo='$correo' ,escuela='$escuela',entife='$entife',promedio='$promedio' WHERE idpersona='$idpersona'";
$query=mysqli_query($con,$sql);

    if($query){
        header("Location: alumno.php");
    }
?>