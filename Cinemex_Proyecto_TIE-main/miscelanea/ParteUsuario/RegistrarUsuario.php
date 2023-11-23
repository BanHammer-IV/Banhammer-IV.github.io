<?php

include("Conexion.php");

$Nombre = $_POST['nombre'];
$Telefono = $_POST['telefono'];
$Correo = $_POST['correo'];
$Usuario = $_POST['usuario'];
$Password = $_POST['password']; 
$Nacimiento = $_POST['nacimiento'];

//RESETEANDO EL ID EN CASO DE QUE SE HAYA ELIMINADO UN USUARIO
$resetid = "ALTER TABLE usuarios AUTO_INCREMENT = 1";
mysqli_query($Conexion, $resetid);

//SI EL USUARIO HA LLENADO TODOS LOS CAMPOS DEL FORMULARIO SE INSERTARAN LOS DATOS
if($Nombre && $Usuario && $Password && $Telefono && $Correo && $Nacimiento > 0){
  
    //COMPARACION PARA SABER SI EL CAMPO DE USUARIO ESTA REPETIDO
    $ValidacionUsuario = "SELECT * FROM usuarios WHERE usuario = '$Usuario' ";

    //HACIENDO EL QUERY USUARIO PARA VALIDARLO DESPUES
    $ComparacionUsuario = $Conexion->query($ValidacionUsuario);

    //VALIDANDO QUE SEA VERDADERO (SI HAY UN CAMPO REPETIDO ES VERDADERO)
    if($ComparacionUsuario->num_rows > 0){

        echo 'Ese usuario ya esta en uso';
        
    //SE VA A COMPARAR EL TELEFONO   
    }else{

        //QUERY PASA SABER SI EL TELEFONO ESTA EN USO
        $ValidacionTelefono = "SELECT * FROM usuarios WHERE telefono = '$Telefono' ";

        //HACIENDO EL QUERY PARA COMPARARLO
        $ComparacionTelefono = $Conexion->query($ValidacionTelefono);

        //EN CASO DE QUE SEA VERDADERO MENSAJE DE QUE YA ESTA EN USO
        if($ComparacionTelefono-> num_rows > 0){

            echo 'Ese telefono ya esta en uso';
        
        //SE VA A COMPARAR EL CORREO
        }else{

            //QUERY PARA COMPARAR SI EL CORREO REPETIDO
            $ValidacionCorreo = "SELECT * FROM usuarios WHERE correo = '$Correo' ";

            //HACIENDO EL QUERY PARA COMPARARLO DESPUES
            $ComparacionCorreo = $Conexion->query($ValidacionCorreo);

            //COMPARACION SI ESTA REPETIDO
            if($ComparacionCorreo->num_rows > 0){

                echo 'El correo ya esta en uso';

            }else{

                //GUARDANDO EN UNA VARIABLE LOS DATOS DEL USUARIO PARA INSERTARLOS EN LA TABLA
                $InsertarDatos = "INSERT INTO usuarios(id, nombre, telefono, correo, nacimiento,
                usuario, pass, metodo_pago) VALUES ('', '$Nombre', '$Telefono', '$Correo', '$Nacimiento',
                '$Usuario', '$Password', 'Paypal')";

                //INSERTANDO LOS DATOS DEL USUARIO EN LA TABLA
                mysqli_query($Conexion, $InsertarDatos);

            }

        }
    }

//SI EL USUARIO NO HA LENADO ALGUN CAMPO NO SE REGISTRARA
}else{

    echo 'Llene todos los campos para completar el registro';

}

?>