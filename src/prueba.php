<?php 
    require_once "Clase/conexion/conexion.php" ;
    $conexion = new conexion;
    echo md5("1234");
    //$query = "insert into empleados( id, nombre, usuario, pass, puesto ) values ( '','Ivan', 'Hammer', '1234', 'adminadmin' )";
    //print_r($conexion->nonQuery( $query ));
?>