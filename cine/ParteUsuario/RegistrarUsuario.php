<?php

include("Conexion.php");

$Nombre = $_POST['nombre'];
$Usuario = $_POST['usuario'];
$Password = $_POST['password'];


//SI EL USUARIO HA LLENADO TODOS LOS CAMPOS DEL FORMULARIO SE INSERTARAN LOS DATOS
if($Nombre && $Usuario && $Password > 0){

    //GUARDANDO EN UNA VARIABLE LOS DATOS DEL USUARIO PARA INSERTARLOS EN LA TABLA
    $InsertarDatos = "INSERT INTO usuarios(id, nombre, usuario, pass)
    VALUES ('', '$Nombre', '$Usuario', '$Password')";

    //INSERTANDO LOS DATOS DEL USUARIO EN LA TABLA
    mysqli_query($Conexion, $InsertarDatos);

    //RESETEANDO EL ID EN CASO DE QUE SE HAYA ELIMINADO UN USUARIO
    $resetid = "ALTER TABLE usuarios AUTO_INCREMENT = 1";
    mysqli_query($Conexion, $resetid);  

}else{
    echo 'Llene todos los campos para completar el registro';
}

?>