<?php

include("ConexionEmpleado.php");

$Nombre = $_POST["nombre"];
$Usuario = $_POST["usuario"];
$Pass = $_POST["password"];
$Puesto = $_POST["puesto"];

//RESETEANDO EL ID EN CASO DE QUE SE HAYA ELIMINADO UN USUARIO
$resetid = "ALTER TABLE empleados AUTO_INCREMENT = 1";
mysqli_query($Conexion, $resetid);


//VALORANDO SI TODOS LOS CAMPOS FUERON LLENADOS
if($Nombre && $Usuario && $Pass && $Puesto > 0){

    //QUERY PARA SABER SI EL USUARIO HA SIDO REPETIDO
    $ValidacionUsuario = "SELECT * FROM empleados WHERE usuario = '$Usuario' ";

    //HACIENDO EL QUERY
    $ComparacionUsuario = $Conexion->query($ValidacionUsuario);

    //COMPARACION USUARIO
    if($ComparacionUsuario->num_rows > 0){

        echo "Ese usuario ya ha sido usado";

    }else{

        //GUARDANDO EL QUERY EN UNA VARIABLE
        $InsertarDatos = "INSERT INTO empleados(id, nombre, usuario, pass, puesto)
        VALUES('', '$Nombre', '$Usuario', '$Pass', '$Puesto')";

        //HACIENDO EL QUERY
        mysqli_query($Conexion, $InsertarDatos);

    }
    

//SI ALGUN CAMPO NO SE HA LLENADO: "MI LOCO DELE PA FUERA"
}else{

    echo "Es necesario llenar todos los campos";

}

?>