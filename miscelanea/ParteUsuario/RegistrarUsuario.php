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
?>

            <!DOCTYPE html>
            <html lang="en">
            <head>
                <link rel="stylesheet" href="../../Estilos/estilos_usuario/signup_styles.css">
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>unu</title>
            </head>
            <body>

                <div class="form" >

                    <div class="cls" style="position: relative; top: -60px; left: 170px">

                        <a href="RegistroUsuario.php">
                            <img src="../../images/Icon/close_button.png" alt="" height="30px" width="30px">
                        </a>

                    </div>

                    <h2>Lo sentimos, algo no salio como se esperaba:</h2>

                    <br>

                    <p>Ese nombre de usuario ya esta en uso</p>


                </div>

            </body>
            </html>

<?php
        
        
    //SE VA A COMPARAR EL TELEFONO   
    }else{

        //QUERY PASA SABER SI EL TELEFONO ESTA EN USO
        $ValidacionTelefono = "SELECT * FROM usuarios WHERE telefono = '$Telefono' ";

        //HACIENDO EL QUERY PARA COMPARARLO
        $ComparacionTelefono = $Conexion->query($ValidacionTelefono);

        //EN CASO DE QUE SEA VERDADERO MENSAJE DE QUE YA ESTA EN USO
        if($ComparacionTelefono-> num_rows > 0){
?>
        
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <link rel="stylesheet" href="../../Estilos/estilos_usuario/signup_styles.css">
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>unu</title>
            </head>
            <body>

                <div class="form" >

                    <div class="cls" style="position: relative; top: -60px; left: 170px">

                        <a href="RegistroUsuario.php">
                            <img src="../../images/Icon/close_button.png" alt="" height="30px" width="30px">
                        </a>

                    </div>

                    <h2>Lo sentimos, algo no salio bien:</h2>

                    <br>

                    <p>Ese numero de telefono ya esta en uso</p>


                </div>

            </body>
            </html>

<?php      
        //SE VA A COMPARAR EL CORREO
        }else{

            //QUERY PARA COMPARAR SI EL CORREO REPETIDO
            $ValidacionCorreo = "SELECT * FROM usuarios WHERE correo = '$Correo' ";

            //HACIENDO EL QUERY PARA COMPARARLO DESPUES
            $ComparacionCorreo = $Conexion->query($ValidacionCorreo);

            //COMPARACION SI ESTA REPETIDO
            if($ComparacionCorreo->num_rows > 0){

?>

                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <link rel="stylesheet" href="../../Estilos/estilos_usuario/signup_styles.css">
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>unu</title>
                </head>
                <body>

                    <div class="form" >

                        <div class="cls" style="position: relative; top: -60px; left: 170px">

                            <a href="RegistroUsuario.php">
                                <img src="../../images/Icon/close_button.png" alt="" height="30px" width="30px">
                            </a>

                        </div>

                        <h2>Lo sentimos, algo no salio como se esperaba:</h2>

                        <br>

                        <p>Ese Correo ya esta en uso</p>


                    </div>

                </body>
                </html>

<?php

            }else{
?>
            
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <link rel="stylesheet" href="../../Estilos/estilos_usuario/signup_styles.css">
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>unu</title>
                </head>
                <body>

                    <div class="form" >

                        <div class="cls" style="position: relative; top: -60px; left: 170px">

                            <a href="RegistroUsuario.php">
                                <img src="../../images/Icon/close_button.png" alt="" height="30px" width="30px">
                            </a>

                        </div>

                        <h2>Registro completado de forma exitosa:</h2>

                        <br>

                        <p>Se han registrado sus datos de forma exitosa</p>

                        <br><br><br>

                        <p>¡Inicia Sesion: <a class="form_link" href="InicioSesion.php">aqui!</a></p>

                    </div>

                </body>
                </html>

<?php
                $HashPass = md5($Password);
                
                //GUARDANDO EN UNA VARIABLE LOS DATOS DEL USUARIO PARA INSERTARLOS EN LA TABLA
                $InsertarDatos = "INSERT INTO usuarios(id, nombre, telefono, correo, nacimiento,
                usuario, pass, metodo_pago) VALUES ('', '$Nombre', '$Telefono', '$Correo', '$Nacimiento',
                '$Usuario', '$HashPass', 'Paypal')";

                //INSERTANDO LOS DATOS DEL USUARIO EN LA TABLA
                mysqli_query($Conexion, $InsertarDatos);
            }

        }
    }

//SI EL USUARIO NO HA LENADO ALGUN CAMPO NO SE REGISTRARA
}else{

?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <link rel="stylesheet" href="../../Estilos/estilos_usuario/signup_styles.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>unu</title>
    </head>
    <body>

        <div class="form" >

            <div class="cls" style="position: relative; top: -60px; left: 170px">

                <a href="RegistroUsuario.php">
                    <img src="../../images/Icon/close_button.png" alt="" height="30px" width="30px">
                </a>

            </div>

            <h2>registro no completado:</h2>

            <br><br><br>

            <p>Hay uno o mas campos que no han sido llenados, debe llenar todos los campos para completar el registro</p>

            <br><br><br>

        </div>

    </body>
    </html>

<?php
}

?>