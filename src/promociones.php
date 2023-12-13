<?php 
    require_once "../Clase/respuestas.class.php";
    require_once "../Clase/promocion.class.php";

    $_respuestas = new respuestas;
    $idPromociones = new promocion;

    if( $_SERVER['REQUEST_METHOD'] == 'GET'){
        if( isset( $_GET["page"] ) ){
            $pagina = $_GET["page"];
            $listaPromociones = $idPromociones->listaPromociones( $pagina );
            header('Content-Type: application/json');
            echo json_encode( $listaVenta );
            http_response_code( 200 );

        } else if( isset($_GET['id']) ){
            $usuarioID = $_GET['id'];
            $datosPromociones = $idPromociones->obtenerPromociones( $usuarioID );
            header('Content-Type: application/json');
            echo json_encode( $datosPromociones );
            http_response_code( 200 );
        }
    } else if( $_SERVER['REQUEST_METHOD'] == 'POST'){
        //Recibimos los datos enviados
        $postBody = file_get_contents( "php://input" );

        //enviarmos los datos al manejador
        $datosArray = $idPromociones->post( $postBody );
        
        //devolvemos una respuesta
        header('Content-Type: aplication/json');
        if( isset( $datosArray["result"]["error_id"] ) ){
            $responseCode = $datosArray["result"]["error_id"];
            http_response_code( $responseCode );
        } else {
            http_response_code( 200 );
        }
        echo json_encode( $datosArray );

    } else if( $_SERVER['REQUEST_METHOD'] == 'PUT'){
        //Recibimos los datos enviados
        $postBody = file_get_contents( "php://input" );
        //enviarmos los datos al manejador
        $datosArray = $idPromociones->put( $postBody );
        
        //devolvemos una respuesta
        header('Content-Type: aplication/json');
        if( isset( $datosArray["result"]["error_id"] ) ){
            $responseCode = $datosArray["result"]["error_id"];
            http_response_code( $responseCode );
        } else {
            http_response_code( 200 );
        }
        echo json_encode( $datosArray );

    } else if( $_SERVER['REQUEST_METHOD'] == 'DELETE'){
        //Recibimos los datos enviados
        $postBody = file_get_contents( "php://input" );
        //enviarmos los datos al manejador
        $datosArray = $idPromociones->delete( $postBody );
        
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
        header('Content-Type: application/json');
        $datosArray = $_respuestas->error_405();
        echo json_encode( $datosArray );
    }
?>