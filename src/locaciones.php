<?php 
    require_once "../Clase/respuestas.class.php";
    require_once "../Clase/locaciones.class.php";

    $_respuestas = new respuestas;
    $idLocaciones = new locacion;

    if( $_SERVER['REQUEST_METHOD'] == 'GET'){
        if( isset( $_GET["page"] ) ){
            $pagina = $_GET["page"];
            $listaLocaciones = $idLocaciones->listaLocaciones( $pagina );
            header('Content-Type: application/json');
            echo json_encode( $listaLocaciones );
            http_response_code( 200 );

        } else if( isset($_GET['id']) ){
            $usuarioID = $_GET['id'];
            $datosUsuarios = $idLocaciones->obtenerLocacion( $usuarioID );
            header('Content-Type: application/json');
            echo json_encode( $datosUsuarios );
            http_response_code( 200 );
        }
    } else if( $_SERVER['REQUEST_METHOD'] == 'POST'){
        //Recibimos los datos enviados
        $postBody = file_get_contents( "php://input" );

        //enviarmos los datos al manejador
        $datosArray = $idLocaciones->post( $postBody );
        
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
        $datosArray = $idLocaciones->put( $postBody );
        
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
        $datosArray = $idLocaciones->delete( $postBody );
        
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