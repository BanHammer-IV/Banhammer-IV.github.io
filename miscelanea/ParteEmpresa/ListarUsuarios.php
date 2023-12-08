<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">USUARIO</th>
                <th scope="col">CORREO</th>
                <th scope="col">TELEFONO</th>
                <th scope="col">FECHA DE NACIMIENTO</th>
                <th scope="col">CONTRASEÑA</th>
            </tr>
        </thead>
        <tbody>

            <?php

            include("ConexionEmpleado.php");

            $Usuarios = "SELECT * FROM usuarios";
            $QueryUsuarios = mysqli_query($Conexion, $Usuarios);


            while($Mostrar = mysqli_fetch_array($QueryUsuarios)){

            ?>

            <tr>
                <th scope="row"> <?php echo $Mostrar["id"] ?> </th>
                <td> <?php echo $Mostrar["nombre"] ?> </td>
                <td> <?php echo $Mostrar["usuario"] ?> </td>
                <td> <?php echo $Mostrar["telefono"] ?> </td>
                <td> <?php echo $Mostrar["correo"] ?> </td>
                <td> <?php echo $Mostrar["nacimiento"] ?> </td>
                <td> <?php echo $Mostrar["pass"] ?> </td>
                <td>
                    <form action="AlterarUsuario.php">
                        <input type="hidden" name="id" value="<?php echo $Mostrar['id']; ?>">
                        <button class="btn btn-outline-warning">Editar</button>
                    </form>

                    <br>

                    <form action="EliminarUsuario.php">
                        <input type="hidden" name="id" value="<?php echo $Mostrar['id']; ?>">
                        <button class="btn btn-outline-danger">Eliminar</button>
                    </form>
                </td>
            </tr>

        </tbody>

        <?php
            }
        ?>
        
    </table>
</body>
</html>