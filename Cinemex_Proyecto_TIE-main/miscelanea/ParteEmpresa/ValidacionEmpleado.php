<?php

include("ConexionEmpleado.php");

$Usuario = $_POST['usuario'];
$Pass = $_POST['password'];

//GUARDANDO UN QUERY EN UNA VARIABLE PARA VALIDARLA DESPUES
$Validacion = "SELECT * FROM empleados WHERE usuario = '$Usuario' AND pass = '$Pass' ";

//SE REALIZA EL QUERY
$result = $Conexion->query($Validacion);

//DE VERIFICA QUE SEA VERDADERO LOS DATOS RECION INGRESADOS
if ($result->num_rows > 0){
    echo'Usuario valido';
}else{
    echo 'Usuario no vaido';
}

?>