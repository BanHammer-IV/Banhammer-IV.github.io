<?php

include("Conexion.php");

$Nombre = $_POST['nombre'];
$ApellidoP = $_POST['apellido_paterno'];
$ApellidoM = $_POST['apellido_materno'];
$Usuario = $_POST['usuario'];
$Password = $_POST['password'];

mysqli_query($Conexion, "INSERT INTO usuarios(nombre, apellido_paterno, apellido_materno, usuario, pass)
VALUES ($Nombre, $Apellido', $ApellidoM, $Usuario, $Password)");

?>