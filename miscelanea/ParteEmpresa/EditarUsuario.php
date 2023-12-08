<?php

include("ConexionEmpleado.php");

$ID = $_POST['id'];
$Nombre = $_POST['nombre'];
$Usuario = $_POST['usuario'];
$Telefono = $_POST['telefono'];
$Correo = $_POST['correo'];
$Pass = $_POST['password'];
$Nacimiento = $_POST['nacimiento'];


#EL QUERY PARA HACER LA ACTUALIZACION DE DATOS
$QueryEdicion = "UPDATE usuarios SET  
                nombre = '$Nombre',
                usuario = '$Usuario',
                correo = '$Correo',
                telefono = '$Telefono',
                correo = '$Correo',
                pass = '$Pass'
                WHERE id = '$ID' ";

$RealizarEdicion = mysqli_query($Conexion, $QueryEdicion);

?>