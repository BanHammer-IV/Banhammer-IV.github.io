<?php

include("Conexion.php");

$Usuario = $_POST['usuario'];
$Password = $_POST['password'];

//SELECCIONANDO EL USUARIO QUE INGRESARON
$query = "SELECT * FROM
usuarios WHERE usuario = '$Usuario' AND pass = '$Password' ";

//HACIENDO EL QUERY Y GUARDANDOLA EN UNA VARIABLE
$result = $Conexion->query($query);

//IF PARA SABER SI SON VERDADEROS LOS DATOS INGRESADOS EN EL FORMULARIO
if($result->num_rows > 0){
    //CASO VERDADERO: MENSAJE DE BIENVENIDA
    echo'Bienvenido '. $Usuario;
}else{
    //CASO FALSO: MENSAJE DE INVALIDACION
    echo'El Usuario y/o la contraseña no son validos';
}

?>