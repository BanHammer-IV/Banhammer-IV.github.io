<?php

include("Conexion.php");

$Usuario = $_POST['usuario'];
$Password = $_POST['password'];

$query = "SELECT * FROM
 usuarios WHERE usuario = '$Usuario' AND pass = '$Password' ";

$result = $Conexion->query($query);
if($result->num_rows > 0){
    echo'Bienvenido '. $Usuario;
}else{
    echo'El Usuario y/o la contraseña no son validos';
}

?>