<?php
include("conexion.php");
$con=conectar();

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
$promedio=$_POST['promedio'];


$sql="INSERT INTO persona(nombre,papellido,sapellido,fecha,genero,curp,numbol,alcaldia,colonia,cp,calle,numerocasaext,numerocasaint,tel,correo,escuela,entife,promedio) VALUES('$nombre','$papellido','$sapellido', '$fecha', '$genero', '$curp', '$numbol', '$alcaldia' , '$colonia' , '$cp', '$calle', '$numerocasaext', '$numerocasaint', '$tel', '$correo', '$escuela', '$entife','$promedio')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: alumno.php");
    
}else {
}
?>