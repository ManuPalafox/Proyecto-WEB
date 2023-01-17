<?php
$Nombre_pila = $_POST["pila"];
$EscPorc = $_POST["EscProc"];
if($EscPorc == "otro"){
    $EscPorc = $_POST["otro"];
}
$conexion = new mysqli("localhost", "root","", "form");

if($conexion -> connect_errno){
    echo "Fallo al conectar MySql: " + $conexion->connect_error;

}
else{
    echo "Tus datos se guardaron con exito\n";
    $conexion->query("INSERT INTO persona(nombre , escuela) VALUES('$Nombre_pila' , '$EscPorc')");
    header("Location: index.html")
    die();
}

?>