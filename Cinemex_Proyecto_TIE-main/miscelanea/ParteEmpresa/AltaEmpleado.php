<?php

include("ConexionEmpleado.php");

$Nombre = $_POST["nombre"];
$Usuario = $_POST["usuario"];
$Pass = $_POST["password"];
$Puesto = $_POST["puesto"];

$InsertarDatos = "INSERT INTO empleados(id, nombre, usuario, pass, puesto)
VALUES('', '$Nombre', '$Usuario', '$Pass', '$Puesto')";

mysqli_query($Conexion, $InsertarDatos);

?>