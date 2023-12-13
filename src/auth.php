<?php
    require_once "Clase/auth.class.php";
    require_once "Clase/respuestas.class.php";

    $_auth = new auth;
    $respuestas = new respuestas;

    if( $_SERVER['REQUEST_METHOD'] == "POST" ){
        //recibir datos
        $postBody = file_get_contents("php://input");

        //enviamos datos al manejador
        $datosArray = $_auth->login( $postBody );

        //devolvemos una respuesta
        header('Content-Type: aplication/json');
        if( isset( $datosArray["result"]["error_id"] ) ){
            $responseCode = $datosArray["result"]["error_id"];
            http_response_code( $responseCode );
        } else {
            http_response_code( 200 );
        }
        echo json_encode( $datosArray );
    } else {
        header('Content-Type: aplication/json');
        $datosArray = $respuestas->error_405();
        echo json_encode( $datosArray );
    }

?>