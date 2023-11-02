<?php

include("Conexion.php");

$Nombre = $_POST['nombre'];
$Usuario = $_POST['usuario'];
$Password = $_POST['password'];

if($Nombre && $Usuario && $Password > 0){
    $InsertarDatos = "INSERT INTO usuarios(id, nombre, usuario, pass)
    VALUES ('', '$Nombre', '$Usuario', '$Password')";

    mysqli_query($Conexion, $InsertarDatos);    
}else{
    echo 'Llene los campos no sea imbecil';
}

?>