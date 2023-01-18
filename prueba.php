<?php
$Nombre_pila = $_POST["pila"];
$AP = $_POST["AP"];
$AM = $_POST["AM"];
$FN = $_POST["FN"];
$Gen = $_POST["Gen"];
$CURP = $_POST["CURP"];
$NB = $_POST["NB"];
$ALC = $_POST["ALC"];
$Col = $_POST["Col"];
$CP = $_POST["CP"];
$NC = $_POST["NC"];
$NE = $_POST["NE"];
$NI = $_POST["NI"];
$Tel = $_POST["Tel"];
$C = $_POST["C"];
$EscPorc = $_POST["EscProc"];
if($EscPorc == "otro"){
    $EscPorc = $_POST["otro"];
}
$EFP = $_POST["EFP"];
$Prom = $_POST["Prom"];



$conexion = new mysqli("localhost", "root","", "form");

if($conexion -> connect_errno){
    echo "Fallo al conectar MySql: " + $conexion->connect_error;

}
else{
    $conexion->query("INSERT INTO persona(nombre,papellido,sapellido,fecha,genero,curp,numbol,alcaldia,colonia,cp,calle,numerocasaext,numerocasaint,tel,correo,escuela,entife,promedio) VALUES('$Nombre_pila' , '$AP' , '$AM' , '$FN' , '$Gen' , '$CURP' , '$NB' , '$ALC' , '$Col' , '$CP' , '$NC' , '$NE' , '$NI' , '$Tel' , '$C' , '$EscPorc' , '$EFP' , '$Prom')");
    header("Location: index.html");
    die();
}

?>

