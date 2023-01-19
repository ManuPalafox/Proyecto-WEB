<?php
session_start();
$_SESSION["boleta"] = $_POST["nbol"];
$_SESSION["curp"] = $_POST["curp"];
$bol = $_POST["nbol"];
$curp = $_POST["curp"];
//$_SESSION["boleta"] = "2021630048";
//$_SESSION["curp"] = "BULL020426HDFSNSA9";
header("Location: genpdf.php");
?>