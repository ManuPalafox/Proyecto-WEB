<?php

include("conexion.php");
$con=conectar();

$idpersona=$_GET['id'];

$sql="DELETE FROM persona  WHERE idpersona='$idpersona'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: alumno.php");
    }
?>
