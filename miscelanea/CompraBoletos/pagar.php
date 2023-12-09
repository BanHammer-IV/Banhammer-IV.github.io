<?php 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../Estilos/estilos_usuario/login_styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia Sesion</title>
</head>
<body>
    
    <!-- BOTON DE CERRAR -->
    <div class="cerrar">
        <a href="../../index.php">
            <img src="../../images/Icon/close_button.png" width="60px" height="60px">
        </a>
    </div>

    <!--FORMULARIO DE INICIO DE SESION-->
    <form class="form" method="post" action="ValidacionInicioSesion.php">
        <!--TITULO DEL FORMULARIO-->
        <h2 class="form_title">Inicia Sesion</h2>
        <!--ENLACE A REGISTRO DE CUENTAS-->
        <p class="form_paragraph">¿No tienes cuenta? <a href="RegistroUsuario.php" class="form_link">Entra Aqui</a></p>
        <!--CONTENIDO DEL FORMULARIO-->
        <div class="form_container">

            <!--DIV DEL USUARIO-->
            <div class="form_group">
                <!--USUARIO-->
                <input type="text" class="form_input" name="usuario" placeholder=" ">
                <label for="usuario" class="form_label">Usuario:</label><br>
                <span class="form_line"></span>
            </div>

            <!--DIV DE LA CONTRASEÑA-->
            <div class="form_group">
                <!--CONTRASEÑA-->
                <input type="password" class="form_input" name="password" placeholder=" ">
                <label for="password" class="form_label">Contraseña:</label><br>
                <span class="form_line"></span>
            </div>

            <!--BOTON-->
            <input type="submit" value="Iniciar Sesion" class="form_submit">
        </div>
    </form>
</body>
</html>